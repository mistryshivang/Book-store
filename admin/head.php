<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Store Admin</title>
<?php session_start() ?>
<?php include('../class/DataClass.php');?>
<link rel="stylesheet" href="../style.css">
<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
        echo "<script> 
        alert('do not directly go to this page');
        window.location='../register.php';
        </script>";
       exit;
}
?>