<link rel="stylesheet" href="/css/main.css">
<center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/backend/config.php';
if($_SESSION['loggedin'] == 'yes') {header('location: /chatroom1/');}
if(empty(trim($_POST["name"]))){
    echo "Please enter a name. <a href='/chatroom1/account.php'>go back?</a>";
    die();
} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["name"]))){
    echo "Name can only contain letters, numbers, and underscores. <a href='/chatroom1/account.php'>go back?</a>";
    die();
} elseif (strlen(trim($_POST["name"])) < 3) {
    echo "Your name must be at least 3 characters. <a href='/chatroom1/account.php'>go back?</a>";
    die();
} elseif (60 < strlen(trim($_POST["name"]))) {
    echo "Your name's length must be less than 60 characters <a href='/chatroom1/account.php'>go back?</a>";
    die();
};
if($_SERVER["REQUEST_METHOD"] == 'POST' && empty($name_err)) { 
    $name = htmlspecialchars($_POST["name"]);
    $sql = "INSERT INTO accounts (id, name, ip) VALUES (NULL, '".$name."', '".$iphash."')";
    if ($link->query($sql) === TRUE) {
      echo "account created";
    } else {
      echo "Error: " . $sql . "<br>" . $link->error;
    }
}
header('location: /chatroom1/account.php');
?>
</center>