<?php
header("Content-type: text/plain; charset=8");
$dbh = new PDO('mysql:host=localhost;dbname=skolschema', 'phpuser', 'ovWDhZmO7MxYkYfa');
if ( ! $dbh ) {
    echo "Kontakt ej etablerad";
    exit;
}
echo "Kontakt etablerad. Hurra!";

$sql = "SELECT * FROM lärare ORDER BY lastName DESC";

$stmt = $dbh->prepare($sql);

$stmt->execute();

while ( $larare = $stmt->fetch()) {
    var_dump($larare);
}

$dbh = new PDO(
    'mysql:host=localhost;dbhname=skolschema; charset=utf8', 
    'phpuser', 'ovWDhZmO7MxYkYfa'
);