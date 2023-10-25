<?php

// conectar e checar ldap

namespace Core;

use LDAP\Connection;

class Ldap {
    protected Connection|false $ldapConn;
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
    }

    public function pesquisaUsuario($user, $pass){
        $this->ldapBind = ldap_bind($this->ldapConn, $this->config['ldapUser'], $this->config['ldapPassword']) or die("Incapaz de autenticar pelo servidor LDAP");

        $ldapSearch = ldap_search($this->ldapConn, $this->config['ldapBaseDN'], "(uid={$user})");

        if ($ldapSearch) {

            $ldapEntry = ldap_first_entry($this->ldapConn, $ldapSearch);
            $userBind = $this->autorizaUsuario($ldapEntry, $pass);
            if ($userBind) {

                $ldapAtributes = ldap_get_attributes($this->ldapConn, $ldapEntry);

                $curso = explode("=", explode(",", $ldapAtributes['memberOf'][0])[0])[1];
                $matricula = explode("@", $ldapAtributes['mail'][0])[0];
                $nome = $ldapAtributes['cn'][0];

                return [
                    'matricula' => $matricula,
                    'curso' => $curso,
                    'nome' => $nome,
                    'login' => $user
                ];
            }
        }
        return null;
    }

    public function autorizaUsuario($entry, $pass){
        if ($entry){
            $userdn =  ldap_get_dn($this->ldapConn, $entry);
            error_log("user dn : {$userdn}");
            $userBind = ldap_bind($this->ldapConn, $userdn, $pass);
            if ($userBind)
                return $userBind;
            // abort("falha no bind user");
        }
        // die("usuário nao encontrado");
        return null;
    }
}

?>
