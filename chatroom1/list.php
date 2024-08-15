<?php 

include $_SERVER["DOCUMENT_ROOT"].'/backend/config.php';

$searchusername = $_GET['q'] ?? "";
$searchusername = mysqli_real_escape_string($link, $searchusername);

$tuserq = mysqli_query($link, "SELECT * FROM chatrooms WHERE name LIKE '%$searchusername%' ORDER BY people DESC");
$usercount = mysqli_num_rows($tuserq);
$usersperpage = 5;
$pages = ceil($usercount / $usersperpage);
$page = $_GET['page'] ?? 1;
$page = intval($page);

if ($page < 1) {
  $page = 1;
}

if ($page >= $pages) {
  $page = $pages;
}

$offset = ($page * $usersperpage) - $usersperpage;

if ($offset < 1) {
  $offset = 0;
}
$userq = mysqli_query($link, "SELECT * FROM chatrooms  WHERE name LIKE '%$searchusername%' ORDER BY people DESC LIMIT $usersperpage OFFSET $offset") or die(mysqli_error($link));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Revolutionary Chatrooms</title>
</head>
<body>
<center><br><br><br><br><br><br><div style="border: yellow thin solid; width: 700px;">
<br><br>
<h1>Select A Room To Join!</h1>
<a href="/chatroom1/create.php" style="font-size: 20px; color: blue;">Create a room.</a><br><br>
<?php
                    $resultsperpage = 5;
                    $check = mysqli_query($link, "SELECT * FROM chatrooms");
                    $usercount = mysqli_num_rows($check);

                    $numberofpages = ceil($usercount/$resultsperpage);

                    if(!isset($_GET['page'])) {
                        $page = 1;
                    }else{
                        $page = $_GET['page'];
                    }

                    $thispagefirstresult = ($page-1)*$resultsperpage;
                    
                    $searchusername = $_GET['q'] ?? "";
$searchusername = mysqli_real_escape_string($link, $searchusername);

                    $check = mysqli_query($link, "SELECT * FROM chatrooms WHERE name LIKE '%$searchusername%' ORDER BY people DESC LIMIT ".$thispagefirstresult.",".$resultsperpage);

                    while($row = mysqli_fetch_assoc($check)) {

    $id = htmlspecialchars($row['id']);
    $name = htmlspecialchars($row['name']);
    $creator = htmlspecialchars($row['creator']);
    $people = htmlspecialchars($row['people']);
    if (htmlspecialchars($row['people']) < 3) {
        $joinbutton = '<a style="color: blue;" href="/chatroom1/?ID='.$id.'">Join Room</a>';
    } else {
        $joinbutton = '<a style="color: red;" href="">Room Full</a>';
    }
// <img src='api/avatar/getthumb.php?id=$id' width='60'>
        echo '
<div style="border: yellow thin solid; width: 500px;"><br>'.$name.'<br>Created by: '.$creator.'<br>'.$people.'/3 people</br>'.$joinbutton.'<br><br></div><br>';


                    }


                        echo "
                        <tr class='GridPager'>
                            <td colspan='4'>
                                <table border='0'>
                                    <tbody>
                        ";
                     
                    if($page <= $page) {  
                    $pagefix = $page + 9;
                    }
                    if($pagefix > $numberofpages) {
                    $pagefix = $numberofpages;
                    }
                    $page2 = $page - 1;
                    $page3 = $page - 2;
                    $page4 = $page - 3;
                    $page5 = $page - 4;
                    $page6 = $page - 5;
                    
                    
                    if($page == 1 OR $page == 2 OR $page == 3 OR $page == 4 OR $page == 5) {
                    }else{
                    echo"<td>
                            <a href='/chatroom1/list.php?page=".$page6."'>".$page6." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$page5."'>".$page5." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$page4."'>".$page4." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$page3."'>".$page3." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$page2."'>".$page2." </a>
                        </td>
                    ";
                    }
                    
                    $pager = $page - 1;
                    $pager1 = $page - 2;
                    $pager2 = $page - 3;
                    $pager3 = $page - 4;
                    if($page == 5) {
                    echo"<td>
                            <a href='/chatroom1/list.php?page=".$pager3."'>".$pager3." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$pager2."'>".$pager2." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$pager1."'>".$pager1." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$pager."'>".$pager." </a>
                        </td>
                    ";
                    }else{
                    }
                    
                    $pagej = $page - 1;
                    $pagej1 = $page - 2;
                    $pagej2 = $page - 3;
                    if($page == 4) {
                    echo"<td>
                            <a href='/chatroom1/list.php?page=".$pagej2."'>".$pagej2." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$pagej1."'>".$pagej1." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$pagej."'>".$pagej." </a>
                        </td>
                    ";
                    }else{
                    }
                    
                    $pagey = $page - 1;
                    $pagey1 = $page - 2;
                    if($page == 3) {
                    echo"<td>
                            <a href='/chatroom1/list.php?page=".$pagey1."'>".$pagey1." </a>
                        </td>
                    <td>
                            <a href='/chatroom1/list.php?page=".$pagey."'>".$pagey." </a>
                        </td>
                    ";
                    }else{
                    }
                    
                    $paget = $page - 1;
                    if($page == 2) {
                    echo"<td>
                            <a href='/chatroom1/list.php?page=".$paget."'>".$paget." </a>
                        </td>
                    ";
                    }else{
                    }
                    

                    for ($page<=$pagefix;$page<=$pagefix;$page++) {

                        echo "
                        <td>
                            <a href='/chatroom1/list.php?page=".$page."'>".$page." </a>
                        </td>
                        ";
                    }

                    echo "
<td><a href='/chatroom1/list.php?page=$numberofpages'>...</a></td>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    ";
                    ?>
<br>
</div></center><br><br>
</body>
</html>