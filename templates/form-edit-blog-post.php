<?php
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title><?php echo"{$blogpost['title']} - Läxhjälpens blogg"; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' />
</head>
<body class="subpage">

<?php
require("masthead.php");
require("menu.php");

echo <<<MAIN
<div role="main">
  <form action="editblogpost.php" method="post" class="editblog">
    <input type="hidden" name="articlesID" value="{$blogpost['artcilesID']}" />
    <p>
      <label for="b_title">
        Inläggets rubrik
        <strong class="error">{$b_error['title']}</strong>
      </label>
      <input name="title" id="b_title" value="{$blogpost['title']}" />
    </p>
    <p>
      <label for="b_title">
        Inläggets brödtext
        <strong class="error">{$b_error['text']}</strong>
      </label>
      <textarea name="text" id="b_title" value="{$blogpost['text']}"</textarea>
    </p>
    <!-- saker som skapas automatiskt ac systemet -->
    <p>
      <small>Posat: <i>{$blogpost['pubdate']}</i> av
      <i>{$blogpost['username']}</i>.
      Slug: <i>{$blogpost['slug']}</i><small>
    </p>
    <p>
      <input type="submit" value="spara" />
    </p>
     </form>
    </div>
MAIN;

require("footer.php");
?>
<script src ="/ckeditor/ckeditor.js"></script>
<script>CKEDITOR('text');</script>
</body>
</html>