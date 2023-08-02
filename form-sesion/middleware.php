<?php 
session_start();

if(!isset($_SESSION["admin"])) {
    header('Location: registro.php');
}
else {
    header('Location: ../index.php');
}