<?php
session_start();

$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];


require_once 'funcs.php';
$pdo = db_conn();

$stmt = $pdo->prepare('INSERT INTO tabifrie_user(id, name, gender, age, email, password) VALUES(NULL, :name, :gender, :age, :email, :password)'); 

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

$status = $stmt->execute();

if($status === false){
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  $_SESSION['chk_ssid'] = session_id(); 
  $_SESSION['user_name'] = $name;
  $_SESSION['user_id'] = $email;
  header('Location: preference.php');
}