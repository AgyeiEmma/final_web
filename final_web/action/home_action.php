<?php
session_start();
include '../setting/connection.php'; // Ensure this path is correct

if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE Email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);
    // var_dump($res);

    
    if (!empty($res)) {
        if (password_verify($password, $res['Password'])) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $res['UserID'];
            header("Location: ../view/user_dashboard_view.php");
        } else {
            echo "Incorrect password";
        }
    }else {
        
        echo "User does not exist";
    }
    

}

?>