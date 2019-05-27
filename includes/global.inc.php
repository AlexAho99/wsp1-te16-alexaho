<?php
/**
 * Funktion för att ansluta till en databas
 *
 * Funktionen förutsätter att några konstanter redan har satts:
 * LAXHJ_DB_DBNAME som är namnet på databasen att ansluta till.
 * LAXHJ_DB_USERNAME som är det användarnamn PHP använder för att ansluta.
 * LAXHJ_DB_PASSWORD som är lösenordet.
 * LAXHJ_TZ som är den tidszon som applikationen ska fungera inom.
 * Funktionen kan anropas flera gånger, utan att någon ny uppkoppling sker.
 * Funktionen gör grundläggande inställningar kring UTF-8 och svensk tidszon
 * för databasförbindelsen.
 *
 * OBS! Funktionen saknar ännu vettig felhantering!
 *
 * @return PDO Databaskopplingen som ett PDO-objekt
 */
function get_dbh()
 {
     static $dbh;
     if ( is_null($dbh) ) {
         $dsn = "mysql:host=localhost;dbname=" . LAXHJ_DB_NAME . ";charset=utf8";

         $attributes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
             try{
                 $dbh = new PDO($dsn, LAXHJ_DB_USERNAME, LAXHJ_DB_PASSWORD, $attributes);
                 
                 if(empty ($dbh) ){
                     throw new Exception("PDO kunde inte instansieras, uppkoppling misslyckad.");
                 }

                 $ts_sql = "SET time_zone = '" . LAXHJ_TZ . "'";
                 $svar = $dbh->query($ts_sql);
                 $mode_sql = "SET SESSION sql_mode = 'STRICT_ALL_TABLES,NO_ZERO_DATE,NO_ZERO_IN_DATE'";
                 $svar = $dbh->query($mode_sql);

                 $safe_sql = "SET sql_safe_updates=1,sql_select_limit=1000,max_join_size=1000000";
                 $svar = $dbh->query($safe_sql);
             }
             catch(Exception  $e){
                 echo "<pre>";
                 var_dump($e);
                 echo "<hr />";
                 var_dump($dbh ->errorInfo());
                 echo "<hr />";
                 exit;
             }             
     }
     return $dbh;
 }
/**
 * Funktion som hämtar alla kommentarer som hör ihop med ett enskilt blogginlägg
 * 
 * @param int $articlesID Blogginläggets ID i databasen
 * @param PDO $dbh        Databasanslutningen att använda
 * @return Array          Kommentarerna
 */
function fetch_blog_comments($articleID, $dbh)
{
    $sql = "SELECT * FROM comments WHERE articlesID = :aid ORDER BY ctime ASC";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":aid", $articleID);
    $stmt->execute();
    $comments=$stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($comments as &$cmt ){
        $cmt['name'] = htmlspecialchars($cmt['name'], ENT_QUOTES);
        $cmt['text'] = htmlspecialchars($cmt['text'], ENT_QUOTES);
    }
    return $comments;
}