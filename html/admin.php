<?php
/**
 * Page controler för adminsidan
 * 
 */

 session_start();

 require "../includes/settings.php";
 require "../includes/global.inc.php";

 require "../includes/users.php";
 
 $dbh = get_dbh();

 if ( empty($_SESSION['username']) && empty($_POST) ) {
      // Visa blankt i inloggningsformulär
      $h1span = "Logga in"; // För masthead-mallen
      $admintitle = "Logga in som admin på Läxhjälpen";
      $adminbody = "loginform";
      $login_username = "";
      $login_errormsg = "";

 } elseif (empty($_SESSION['username']) ) {
      // Kontrollera om inloggningen lyckats
      $username = filter_input(INPUT_POST, 'username', FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW);
      $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW);
      $login_ok = users::verify_login($username, $password, $dbh, $errormsg);

      if ( $login_ok ) {
            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            
            //avsnitt 15.9
            if ( isset($_SESSION['referer']) ) {
                  // kopiera till en icke-sessionsvariabel
                  $referer = $_SESSION['referer'];

                  //Ta bort sassionsvariabeln så att den inte följer i framtiden
                  unset($_SESSION['referer']);

                  header("Location: {$refererer}");
                  exit; //viktigt att stoppa exekveringen efter omdirigering.
            }

            $h1span = "Adminstration";
            $admintitle = "Adminstration av Läxhjälpen";
            $adminbody = "adminpanel";
      } else {
            $h1span = "Logga in";
            $admintitle = "Logga in som admin på Läxhjälpen";
            $adminbody = "loginform";
            $login_username = htmlspecialchars($username, ENT_QUOTES);
            $login_errormsg = "<p class=\"error\">Inloggningen misslyckades. Orsak: {$errormsg}.</p>";
      }
} elseif ( empty($_POST) ) {
    // Visa adminpanel
    echo "<h2>Inloggad som {$_SESSION['username']}</h2>";
    echo "<p><a href=\"logout.php\">Logga ut</p>";
    exit;

} else {
    // Kontrollera och ev. uppdatera användarinfo
    if ( isset($_POST['new_password']) ) {
      //Kontrollera att nya lösenordet är OK
      //Denna plats i koden är POSITION 4 (4)
      exit ("Position 4 kod ej skriven ännu");

    } else {
          //Kontrollera att anna anändardata är OK
          echo "<h2>Inloggad som {$_SESSION['username']}</h2>";
          echo "<p><a href=\"logout.php\">Logga ut</p>";
          exit;
    }
}
header("Content-type: text/html; charset=utf-8");
require "../templates/admintemplate.php";
?>