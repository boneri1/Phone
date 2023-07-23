<?php 
session_start();
 if(!isset($_SESSION['secure'])){
 	header("location:index.php");
 }
?>