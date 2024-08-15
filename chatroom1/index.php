<?php 

include $_SERVER["DOCUMENT_ROOT"].'/backend/config.php';
$chatroomid = $_GET["ID"];
if($_SESSION['loggedin'] == 'no') {header('location: /chatroom1/account.php'); exit();}
//if($_SESSION['loggedin'] == 'yes') {echo 'loggedinyes';}
$name2 = $name['name'];
$query = mysqli_query($link, "SELECT * FROM people WHERE name = '$name2' AND chatroomid = '$chatroomid'");
$check = mysqli_num_rows($query);
$query2 = mysqli_query($link, "SELECT * FROM chatrooms WHERE id = '$chatroomid'");
$chatroom = mysqli_fetch_assoc($query2);
// other people
// user 1
$user = mysqli_fetch_assoc($query);
if ($user['position'] == '2' or '3') {
        $user1q = mysqli_query($link, "SELECT * FROM people WHERE chatroomid = '$chatroomid' AND position = '1'");
        $check1 = mysqli_num_rows($user1q);
        $user1 = mysqli_fetch_assoc($user1q);
}
// user 2
if (!$user['position'] == '1' or '3') {
        $user2q = mysqli_query($link, "SELECT * FROM people WHERE chatroomid = '$chatroomid' AND position = '2'");
        $check2 = mysqli_num_rows($user2q);
        $user2 = mysqli_fetch_assoc($user2q);
}
// user 3
if ($user['position'] == '2' or '1') {
        $user3q = mysqli_query($link, "SELECT * FROM people WHERE chatroomid = '$chatroomid' AND position = '3'");
        $check3 = mysqli_num_rows($user3q);
        $user3 = mysqli_fetch_assoc($user3q);
}
$add = $chatroom['people'] + 1;
if ($check == '1') {
    //print 'Account found.';
}elseif ($chatroom['people'] == '0') {
    mysqli_query($link, "UPDATE `chatrooms` SET `people` = '$add' WHERE `id` = '$chatroomid'");
    $sql = mysqli_query($link, "INSERT INTO people (id, name, chatroomid, position) VALUES (NULL, '".$name2."', '".$chatroomid."', '1')") or die(mysqli_error($link));
    header("Refresh:0");
}elseif ($chatroom['people'] == '1') {
    mysqli_query($link, "UPDATE `chatrooms` SET `people` = '$add' WHERE `id` = '$chatroomid'");
    $sql = mysqli_query($link, "INSERT INTO people (id, name, chatroomid, position) VALUES (NULL, '".$name2."', '".$chatroomid."', '2')") or die(mysqli_error($link));
    header("Refresh:0");
}elseif ($chatroom['people'] == '2') {
    mysqli_query($link, "UPDATE `chatrooms` SET `people` = '$add' WHERE `id` = '$chatroomid'");
    $sql = mysqli_query($link, "INSERT INTO people (id, name, chatroomid, position) VALUES (NULL, '".$name2."', '".$chatroomid."', '3')") or die(mysqli_error($link));
    header("Refresh:0");
}
//str_repeat (header("Refresh:0"),13);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revolutionary Chat Room</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
        .sigma
        {
            <?php ?>
        }
    </style>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script>

    setInterval(runFunction,1000);

    function runFunction()
    {
        $.post("fetchmsg.php", {room: '<?php echo $chatroom['name']; ?>'}
            function(data,status)
            {
                document.getElementsByClassName()
            }
        )
    }

  </script>
</head>
<body>
<br><br><br><br><br><br><center><div style="border: yellow thin solid; width: 900px;">
<?php if($check1 == '0'){$display1 = 'none';} if($check2 == '0'){$display2 = 'none';} if($check3 == '0'){$display3 = 'none';}?>
<h1>Welcome <?php echo $name2; ?></h1>
<div style="border: yellow thin solid; width: 250px; height: 500px; margin-right: 570px;"><br><sigma style="display: <?php echo $display1; ?>; "><?php echo $user1['name']; ?>:<br><br>sigma</sigma></div>
<div style="border: yellow thin solid; width: 250px; height: 500px; margin-right: -10px; margin-top: -500px;"><br><sigma style="display: <?php echo $display2; ?>; "><?php echo $user2['name']; ?>:<br><br>sigma</sigma></div>
<div style="border: yellow thin solid; width: 250px; height: 500px; margin-right: -590px; margin-top: -500px;"><br><sigma style="display: <?php echo $display3; ?>; "><?php echo $user3['name']; ?>:<br><br>sigma</sigma></div>
<br>
<form method="post" action="/chatroom1/leave.php?ID=<?php echo $chatroomid; ?>">
    <button type="submit">Leave Chat Room</button>
</form><br>
</div></center>
</body>
</html>