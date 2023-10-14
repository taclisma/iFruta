<?php 

// conectar e checar ldap

namespace Core;

class Ldap {
    protected $ldapConn;
    protected $config;
    protected $ldapBind;

    public function __construct($config){
        $this->config = $config;
        $this->ldapConn = ldap_connect($config['ldapServer']) or die("Incapaz de chegar ao servidor LDAP.");
        ldap_set_option($this->ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($this->ldapConn, LDAP_OPT_REFERRALS, 0);
        if($this->ldapConn){
                error_log("ldapConn: conn ok \n", 0);
        } else {
                error_log("ldapConn: conn ruim \n", 0);
        }
        // $this->ldapBind = ldap_bind($this->ldapConn, $config['ldapUser'], $config['ldapPassword']);
        // if ($this->ldapBind){
        //         error_log("ldapBind: ok\n", 0);

        // } else {
        //         error_log("ldapBind: ruim \n", 0);
        // }
    }

    public function pesquisaUsuario($user, $pass){

        $ldapSearch = ldap_search($this->ldapConn, $this->config['ldapBaseDN'], "(uid={$user})");

        if ($ldapSearch) {
                $ldapEntry = ldap_first_entry($this->ldapConn, $ldapSearch);
                $userBind = $this->autorizaUsuario($ldapEntry, $pass);
                #die("deu bom");

                // Retrieve attributes and their values
                $ldapAtributes = ldap_get_attributes($this->ldapConn, $ldapEntry);

                #print_r($ldapAtributes['memberOf'][0]);

                // Mudanção Luis
                //
                #$string= $ldapAtributes['memberOf'][0];
                #$parts = explode(",", $string);
                #$curso = explode("=", $parts[0]);
                #$curso = $curso[1];
                #echo $curso;
                $curso= explode("=",  explode(",", $ldapAtributes['memberOf'][0])[0])[1]; // são as mesmas linhas de cima mas em uma só
                $matricula= explode("@", $ldapAtributes['mail'][0])[0];
                $nome= $ldapAtributes['cn'][0];

                echo "Matrícula: ".$matricula."<br>Curso: ".$curso."<br>Nome: ".$nome."<br>Login: ".$user;
                #print_r(explode("@", $ldapAtributes['mail'][0]));

                // FIM MUDANÇA LUIS     



                        error_log("ldapAtribute: {$ldapAtributes} user : {$ldapAtributes[1]}\n", 0);
                        $uid = ldap_get_values($this->ldapConn, $ldapEntry, '(uid={$uid})');
                        print_r($uid);
                        // Loop through and display attributes and values
                        foreach ($uid as $attributeName => $attributeValues) {
                                error_log("  Attribute: {$attributeName} :" , 0);
                                for ($i = 0; $i < $attributeValues['count']; $i++) {
                                        error_log("{$attributeValues[$i]}", 0);
                                }
                        }

                        error_log("user edunickname: {$uid[0]}} \n", 0);
                } else {
                        die("Erro na pesquisa LDAP: " . ldap_error($this->ldapConn));
                }
        }


    
    public function autorizaUsuario($entry, $pass){
        if ($entry){
                $userdn =  ldap_get_dn($this->ldapConn, $entry);
                error_log("user dn : {$userdn}");
                $userBind = ldap_bind($this->ldapConn, $userdn, $pass);
                if ($userBind)
                        return $userBind;
                die("falha no bind user");
        }
        die("usuário nao encontrado");
}

}

?>
