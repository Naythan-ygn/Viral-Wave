<!-- If the login Account is suucessful, that acc will be remembered -->
<?php

session_start();
include '../Config/DBconnect.php';
$email = $_POST['email'];
$password = $_POST['password'];
$admin = 0;
$user = array(1,2);



$sqlAdmin = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND user_type = '$admin'";
$showAdmin = $conn->query($sqlAdmin);

if ($showAdmin->num_rows > 0) {
    $_SESSION['email'] = $email;
    header('Location: ../Server/Adminindex.php');
} 
elseif (!isset($_SESSION['email'])) {
    $sqlUser = "SELECT * FROM user WHERE email='$email' AND password = '$password' AND user_type = '$user[1]'";
    $showUser = $conn -> query($sqlUser);

    if ($showUser -> num_rows > 0 && isset($user[1])) {
        $_SESSION['email'] = $email;
        header('Location: ../Client/Home.php');
    }
    else if (isset($user[2])){
        $_SESSION['email'] = $email;
        header('Location: ../Client/Home.php');
    }
}
