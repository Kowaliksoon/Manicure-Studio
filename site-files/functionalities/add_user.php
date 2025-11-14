<?php

include '../db.php';

$name=$_POST['name'];
$surname = $_POST['surname'];
$password = $_POST['passwd'];
$birth_date=$_POST['birth-date'];
$sex=$_POST['gender'];
$email=$_POST['email'];

$query = "INSERT INTO users(name,surname,email,password,birth_date,sex) values('$name','$surname','$email','$password','$birth_date','$sex')";



$result=mysqli_query($conn,$query);

echo "Zarejestrowano klienta";


mysqli_close($conn);

header("Location: ../register.php");
exit();

?>