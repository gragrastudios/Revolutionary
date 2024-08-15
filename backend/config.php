<?php 
session_start();
include $_SERVER["DOCUMENT_ROOT"].'/backend/db.php';

$iphash = md5($_SERVER["REMOTE_ADDR"]);
$nameq = mysqli_query($link, "SELECT * FROM accounts WHERE ip='$iphash'") or die(mysqli_error($link));
$name = mysqli_fetch_assoc($nameq);
?>