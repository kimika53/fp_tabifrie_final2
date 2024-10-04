<?php
session_start();
require_once 'funcs.php';
loginCheck();

$email = $_SESSION['user_id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$password = $_POST['password'];

$pdo = db_conn();

$stmt = $pdo->prepare('UPDATE tabifrie_user SET name = :name, gender = :gender, age = :age, password = :password WHERE email = :user_id;'); 

$stmt->bindValue(':user_id', $email, PDO::PARAM_STR);

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);


$status = $stmt->execute();

if($status === false){
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  $_SESSION['chk_ssid'] = session_id(); 
  $_SESSION['user_name'] = $name;
  $_SESSION['user_id'] = $email;
  header('Location: profile.php');
}