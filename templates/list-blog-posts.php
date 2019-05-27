<?


?>

<!DOCTYPE html> 
<html lang="sv"> 
<head> 
  <meta charset="utf‐8" /> 
  <title>Vilka vi är ‐ Läxhjälpen</title> 
  <meta http‐equiv="X‐UA‐Compatible" content="IE=edge"> 
  <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' /> 
  <link href="css/laxhjalpen.css" rel="stylesheet" /> 
</head> 
<body class="subpage">
    <?php
Require "masthead.php";
Require "menu.php";

    ?>
<main>
<h2> De senaste blogginläggen </h2>

<?php
foreach ($stmt as $blogpost){
    $blogpost ['slug'] = urlencode($blogpost['slug']);
echo <<<ARTICLE
<article class="blogpostlist">
    <h3><a href="blog.php?slug={$blogpost['slug']}">{$blogpost['title']}</a></h3>
    <p><small>Postad {$blogpost['Pubdate']} av {$blogpost['author']}</small></p>
    <div class="blogtext">
    {$blogpost['text']}
    </div>
        </article>

ARTICLE;
}


require "footer.php";
?>

</main>
</body>
</html>

