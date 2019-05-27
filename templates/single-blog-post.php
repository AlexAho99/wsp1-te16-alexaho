<?


?>

<!DOCTYPE html> 
<html lang="sv"> 
<head> 
  <meta charset="utf‐8" /> 
  <title><?php echo "{$blogpost['title']} - Läxhjälpens blogg"; ?></title> 
  <meta http‐equiv="X‐UA‐Compatible" content="IE=edge"> 
  <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' /> 
  <link href="css/laxhjalpen.css" rel="stylesheet" /> 
</head> 
<body class="subpage">
    <?php
Require "masthead.php";
Require "menu.php";

    
    echo <<<MAIN
    <div role = "main">
    <article class ="singleblogpost">
    <h2>{$blogpost['title']}</h2>
    <p><small>Postad {$blogpost['Pubdate']} av {$blogpost['author']}</small></p>
    <div class="blogtext">
    </div>
    <h3>Kommentarer</h3>

MAIN;

    foreach ( $comments as $cmt) {
        echo <<<CMT
        <article class="comment">
        <h4><a class="c_name" rel="nofollow href="{$cmt['website']}">{$cmt['name']}</a> säger:</h4>
        <p class="c_time"><small>{$cmt['ctime']}</small></p>
        <div class="c_text">
        {$cmt['text']}
        </div>
        </article>
CMT;
    }
    if ( empty($comments) ){
        echo "<p>Inga kommentarer ännu.</p>\n";
    }

if ( isset($_SESSION['username']) ) {
    echo <<<ELINK
    <p class="editlink">
    <a href="editblogpost.php?id={$blogpost['articlesID']}>Redigera inlägg<a/></p>"
ELINK;
}

require "footer.php";

?>
</main>
</body>
</html>