<!-- If the login Account is suucessful, that acc will be remembered -->
<?php

session_start();
include '../Config/DBconnect.php';
$email = $_POST['email'];
$password = $_POST['password'];
$admin = 0;
$user = array(1,2,3);



$sqlAdmin = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND user_type = '$admin'";
$showAdmin = $conn->query($sqlAdmin);

if ($showAdmin->num_rows > 0) {
    $_SESSION['email'] = $email;
    header('Location: ../Server/Adminindex.php');
} 
elseif (!isset($_SESSION['email'])) {
    // For user type 1
    $sqlUser1 = "SELECT * FROM user WHERE email='$email' AND password = '$password' AND user_type = '$user[0]'";
    $showUser1 = $conn -> query($sqlUser1);

    // For user type 2
    $sqlUser2 = "SELECT * FROM user WHERE email='$email' AND password = '$password' AND user_type = '$user[1]'";
    $showUser2 = $conn -> query($sqlUser2);

    // For user type 3
    $sqlUser3 = "SELECT * FROM user WHERE email='$email' AND password = '$password' AND user_type = '$user[2]'";
    $showUser3 = $conn -> query($sqlUser3);

    if ($showUser1 -> num_rows > 0 && isset($user[0])) {
        $_SESSION['email'] = $email;
        header('Location: ../Client/Home.php');
    }
    else if ($showUser2->num_rows > 0 && isset($user[1])){
        $_SESSION['email'] = $email;
        header('Location: ../Client/Home.php');
    }
    else if ($showUser3->num_rows > 0 && isset($user[2])){
        $_SESSION['email'] = $email;
        header('Location:../Client/Home.php');
    }
}
