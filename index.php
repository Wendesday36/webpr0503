<?php
include_once 'user.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
    <?php
    $adatbazis = new User();
    $adatbazis-> oszlopMegjelenit("felhasznalo","felhasznalonev","szuldatum");
    ?>
    </main>
</body>

</html>