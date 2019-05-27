<?php 
   
   header("Content-type: text/html; charset= utf-8");
   $dbh = new PDO('mysql:host=localhost;dbname=fusioncore;charset=utf8', 'phpuser', 'fredrikhatarmig');

   if (! $dbh) {
echo "Kontakt ej etablerad";
exit;


}

echo "<h1>Kontakt Etablerad. Hurra!</h1>";

$sql = "SELECT * FROM users  ORDER BY regdate DESC";

$stmt = $dbh ->prepare ($sql);

$stmt -> execute();

while($user=$stmt->fetch()){
    var_dump($user);
}