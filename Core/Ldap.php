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
        $this->ldapBind = ldap_bind($this->ldapConn, $config['ldapUser'], $config['ldapPassword']);
        if ($this->ldapBind){
                error_log("ldapBind: ok\n", 0);

        } else {
                error_log("ldapBind: ruim \n", 0);
        }
    }

    public function pesquisaUsuario($user, $pass){

        $ldapSearch = ldap_search($this->ldapConn, $this->config['ldapBaseDN'], "(uid={$user})");

        if ($ldapSearch) {
                $ldapEntry = ldap_first_entry($this->ldapConn, $ldapSearch);
                $ldapAtributes = ldap_get_attributes($this->ldapConn, $ldapEntry);
                $atributeArray = implode(" - ", $ldapAtributes);
                error_log("ldapAtribute: {$atributeArray}, {$ldapAtributes} \n", 0);
                $dn = ldap_get_values($this->ldapConn, $ldapEntry, "dn");
                //$uid = implode(lda_get_values($this->ldapConn, $ldapEntry, "uid"));
                ldap_get_errorno();
                // json_decode()  - > testar
                error_log("user dn: {$dn}, {$uid} \n", 0);
        } else {
                die("Erro na pesquisa LDAP: " . ldap_error($this->ldapConn));
        }
    }

    
    public function autorizaUsuario($user, $pass){
        $ldapEntries = ldap_first_entry($this->ldapConn, $ldapSearch);
        error_log("ldaps ENTRY: {$ldapEntries} \n", 0);

        if ($ldapEntries['count'] == 1) {
                $userDN = $ldapEntries[0]['dn'];
                error_log("user dn: {$userDN} \n", 0);
                $userBind = ldap_bind($this->ldapConn, $userDN, $password);
                if ($userBind) {
                        //$userBind
                        return true;
                } else {
                        die("Senha incorreta!");
                }
        } else {
                die ("Usuário não encontrado!");
        }
    }

}

?>