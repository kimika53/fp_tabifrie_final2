<?php
session_start();
require_once 'funcs.php';
loginCheck();

$email = $_SESSION['user_id'];

$area = $_POST['area'];
$country = $_POST['country'];
$startYear = $_POST['start-year'];
$startMonth = $_POST['start-month'];
$startDate = $_POST['start-date'];
$endYear = $_POST['end-year'];
$endMonth = $_POST['end-month'];
$endDate = $_POST['end-date'];

$pdo = db_conn();

$stmt = $pdo->prepare('UPDATE tabifrie_plan SET area = :area, country = :country, start = :start, end = :end WHERE email = :user_id;'); 

$stmt->bindValue(':user_id', $email, PDO::PARAM_STR);

$stmt->bindValue(':area', $area, PDO::PARAM_STR);
$stmt->bindValue(':country', $country, PDO::PARAM_STR);
$stmt->bindValue(':start', $startYear.$startMonth.$startDate, PDO::PARAM_STR);
$stmt->bindValue(':end', $endYear.$endMonth.$endDate, PDO::PARAM_STR);

$status = $stmt->execute();

if($status === false){
  $error = $stmt->errorInfo();
  exit('Error Message:'.$error[2]);
}else{
  header('Location: profile.php');
}