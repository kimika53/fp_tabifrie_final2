<?php

//DB接続
function db_conn()
{
    try {
        // // local接続
        // $db_name = 'tabifrie';    //データベース名
        // $db_id   = 'root';      //アカウント名
        // $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        // 本番環境
        $db_name = "gs-dev27-34_fp_tabifrie";  
        $db_host = "mysql3101.db.sakura.ne.jp"; 
        $db_id = "gs-dev27-34_fp_tabifrie"; 
        $db_pw = "sakura1234"; 
        $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='. $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQL Error:' . $error[2]);
}


// ログインチェク処理 
function loginCheck()
{       // ログイン失敗時、
    if (!isset($_SESSION['chk_ssid'])  ||  $_SESSION['chk_ssid']  !==  session_id()) {
        // redirect('login.php');
        // redirect('signup.php');
        exit("Login Error");
    } else {
        // ログイン成功時、新しいSession Keyを発行
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}

