<?php
include "./includes/connect.php"; 
?>
<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $appname ?></title>
  <meta name="description" content="A simple from <?= $copyright ?> that's never, ever going to be maintained. Need help? Email the IT department!">
  <meta name="author" content="Jason Scanzoni - Appian Solutions Consultant">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

  <script>
  $( function() {
    <?php foreach($fields as $field){
      if ($field->type=="date"){
        echo "\$( \"#$field->field\" ).datepicker();\n";
        for($i=0;$i<=20;$i++)
          echo "\$( \"#lineitem-$field->field$i\" ).datepicker();\n";
      }
    }
    ?>
    
  } );
  </script>

</head>

<body>