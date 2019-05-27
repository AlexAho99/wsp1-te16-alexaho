<?php
header("Content-type: text/plain; charset=utf-8")

require "settings.php";
require "global.inc.php";

$dbh = get_dbh();

$sql = "SELECT * FROM articles ORDER BY pubdate DESC";
$stmt = $dbh->prepare($sql);
$stmt->execute();

while($article = $stmt->fetch()) {
    var_dump($article)
}