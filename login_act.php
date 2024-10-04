<?php

session_start();
$email = $_POST['email'];
$password = $_POST['password'];

require_once 'funcs.php';
$pdo = db_conn();

// tabifrie_userに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM tabifrie_user WHERE email = :email AND password = :password');
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if($status === false) {
    sql_error($stmt);
}
$val = $stmt->fetch();


$pdo2 = db_conn();

$stmt2 = $pdo2->prepare('SELECT * FROM tabifrie_plan WHERE email = :email');
$stmt2->bindValue(':email', $email, PDO::PARAM_STR);

$status2 = $stmt2->execute();

if($status2 === false) {
    sql_error($stmt2);
}
$val2 = $stmt2->fetch();


if($val['id']){
    $_SESSION['chk_ssid'] = session_id(); 
    $_SESSION['user_name'] = $val['name'];
    $_SESSION['user_id'] = $val['email'];  
    if(empty($val['hotel'])){
      //リダイレクト処理
        header('Location: preference.php');
    } 
    else if(empty($val2)){
        //リダイレクト処理
          header('Location: plan.php');
      } 
     else {
    //ログイン処理
    header('Location: offer.php');
    // header('Location: notification.php'); 【変更】
  }}
else {
     //Login失敗時(Logout経由)
    header('Location: login_2.php');
}
exit();
