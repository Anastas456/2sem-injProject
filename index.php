<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Инженерный проект</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/media.css">
        <link rel="stylesheet" href="css/print.css">
    </head>
<body>
<?php
    require 'header.php';

    if( $_GET['p'] == 'viewer' ){
        include 'slider.php';
        include 'viewer.php'; 
        if( !isset($_GET['pg']) || $_GET['pg']<0 ) 
            $_GET['pg']=0;
        echo getMenu($_GET['pg']);
    }
    else
    if( $_GET['p'] == 'menu' ) { 
        include 'menu.php'; 
        if( !isset($_GET['pg']) || $_GET['pg']<0 ) 
            $_GET['pg']=0;
        echo getDishes($_GET['pg']);
    }
    else
    if( $_GET['p'] == 'recipes' ) { 
        include 'recipes.php'; 
        if( !isset($_GET['pg']) || $_GET['pg']<0 ) 
            $_GET['pg']=0;
        echo getRecipes($_GET['pg']);
    } 
    else
    if( $_GET['p'] == 'add-recipes' ) { 
        include 'add-recipes.php'; 
    } 
    else
    if( $_GET['p'] == 'edit-recipes' ) { 
        include 'edit-recipes.php'; 
    } 
    else
    if( $_GET['p'] == 'delete-recipes' ) { 
        include 'delete-recipes.php'; 
    } 


    require 'footer.php';

?>
</body>
</html>