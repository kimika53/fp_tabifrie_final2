<?php
session_start();
require_once 'funcs.php';
loginCheck();

$name = $_SESSION['user_name'];
$email = $_SESSION['user_id'];
$to_name = $_POST['to_name'];
$to_email = $_POST['to_email'];
$content = $_POST['content'];

$pdo = db_conn();
$stmt = $pdo->prepare('INSERT INTO tabifrie_message(id, name, email, to_name, to_email, content, date_submit) VALUES(NULL, :name, :email, :to_name, :to_email, :content,  NOW())');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':to_name', $to_name, PDO::PARAM_STR);
$stmt->bindValue(':to_email', $to_email, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

$status = $stmt->execute();


if($status === false) {
  $error = $stmt->errorInfo();
  exit('Error Message:'.$error[2]);
}else{
  header('Location: message_detail.php?user_id='.$to_email); 
}