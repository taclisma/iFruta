<?php 
phpinfo();
if (extension_loaded('ldap')) {
    echo "LDAP extension is enabled.";
} else {
    echo "LDAP extension is not enabled.";
}
?>
