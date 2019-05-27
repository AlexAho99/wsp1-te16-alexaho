<?php
/**
 * Mall för adminsidan
 * 
 * De olika tillstånden sidan kan ha sköts med extremallar
*/
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title><?php echo $admintitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' />
    <link href="css/laxhjalpen.css" rel="stylesheet" />
</head>
<body class="subpage">
<?php
require "masthead.php";
require "menu.php";

require "{$adminbody}.php";

require "footer.php";
?>
</body>
</html>