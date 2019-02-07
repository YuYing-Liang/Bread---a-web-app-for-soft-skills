<?php
function head($title){
  $str = <<<EOF
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>$title</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">

     <!-- Compiled and minified JavaScript -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
EOF;
echo $str;

    if($title == "Registration" || $title == "Login"){
      echo "<script src='./main.js'></script>";
    }

    if($title == "Dashboard"){
      echo "<script src='./dashboard.js'></script>";
    }
  $str = <<<EOF
  </head>
  <body>
EOF;
echo $str;
}
