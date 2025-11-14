<?php
include '../db.php';
session_start(); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email']) && isset($_POST['passwd'])) {
        
        $email = $_POST['email'];
        $password = $_POST['passwd'];

        $query = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result)===1) {

            $user_data = mysqli_fetch_assoc($result);
            if($password === $user_data['password']){
                $_SESSION['user_id'] = $user_data['user_id'];
                $_SESSION['name'] = $user_data['name'];
                $_SESSION['surname'] = $user_data['surname'];
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['birth_date'] = $user_data['birth_date'];
                $_SESSION['sex'] = $user_data['sex'];
                $_SESSION['created_at'] = $user_data['created_at'];

                header("Location: ../index.php");
                exit();

            }else{
                echo "Nieprawidłowe hasło.";
            }
           
        }
    }else{
        echo "Nieprawidłowy email.";
    }
}
?>
