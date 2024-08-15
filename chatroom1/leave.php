<?php 

include $_SERVER["DOCUMENT_ROOT"].'/backend/config.php';
$chatroomid = $_GET['ID'];
$sigmaname = $name['name'];
$query2 = mysqli_query($link, "SELECT * FROM chatrooms WHERE id = '$chatroomid'");
$chatroom = mysqli_fetch_assoc($query2);
$minus = $chatroom['people'] - 1;
mysqli_query($link, "DELETE FROM people WHERE name = '$sigmaname'") or die(mysqli_error($link));
mysqli_query($link, "UPDATE `chatrooms` SET `people` = '".$minus."' WHERE `id` = '".$chatroomid."'") or die(mysqli_error($link));
$loggedin = "no";
print 'Left Chat Room!';
header('Location: /chatroom1/list.php');

?>