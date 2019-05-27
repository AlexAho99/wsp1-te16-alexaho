<?php
/**
 * Användare i systemet
 */
class users
{
    /**
     * 
     */
    public static function verify_login($username, $password, PDO $dbh, &$errorinfo)
    {
        $sql = "SELECT password FROM users WHERE username = :username";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $hash = $stmt->fetchColumn();
        if ( empty($hash) ) {
            $errorinfo = "Felaktigt användarnamn";
            return false;
        }
        if ( !password_verify($password, $hash ) ) {
            $errorinfo = "Felaktigt lösenord";
            return false;
        }
        return true;
    }
}
?>