<?php
session_start();
require_once 'funcs.php';
loginCheck();

$email = $_SESSION['user_id'];
$hotel = $_POST['hotel'];
$flight = $_POST['flight'];
$engaging = $_POST['engaging'];
$smoking = $_POST['smoking'];
$drinking = $_POST['drinking'];
$eating = $_POST['eating'];

$pdo = db_conn();

$stmt = $pdo->prepare('UPDATE tabifrie_user SET hotel = :hotel, flight = :flight, engaging = :engaging, smoking = :smoking, drinking = :drinking, eating = :eating WHERE email = :user_id;');
$stmt->bindValue(':hotel', $hotel, PDO::PARAM_STR);
$stmt->bindValue(':flight', $flight, PDO::PARAM_STR);
$stmt->bindValue(':engaging', $engaging, PDO::PARAM_STR);
$stmt->bindValue(':smoking', $smoking, PDO::PARAM_STR);
$stmt->bindValue(':drinking', $drinking, PDO::PARAM_STR);
$stmt->bindValue(':eating', $eating, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $email, PDO::PARAM_STR);

$status = $stmt->execute();

if($status === false){
  $error = $stmt->errorInfo();
  exit('Error Message:'.$error[2]);
}else{
  
  header('Location: plan.php'); 
}