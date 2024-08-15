<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Revolutionary Account Creation</title>
</head>
<body>
<?php 

include $_SERVER["DOCUMENT_ROOT"].'/backend/config.php';

$userq = mysqli_query($link, "SELECT * FROM accounts WHERE ip = '$iphash'");
$usercount = mysqli_num_rows($userq);
if ($usercount == '0') { ?>
<center><br><br><br><br><br><br><div style="border: yellow thin solid; width: 700px;">
<form action="createaccount.php" method="POST">
<br><br>
<div style="border: red solid; width: 400px; color: white;"><br>Our detection system has detected you don't currently <br>have an account, to make one just enter your desire name.<br><br></div><br>
<h1>Account Creation</h1><br>
<label for="name">Name</label><br><br>
<input type="text" id="name" name="name" value="blahblahblah"><br><br>
<button type="submit">Create</button><br><br>
</form>
<p>By clicking Create you abide by our <a href="tos.html">terms of service</a> and <a href="privacy.html">privacy policy</a>.</p><br><br>
<br>
</div></center>
<?php 
}else {
    echo 'User found, loading chat room...';
    //$_SESSION["id"] = $user['id'];
    header("Location: /chatroom1/list.php");
    exit();
} 
?>
</body>
</html>
