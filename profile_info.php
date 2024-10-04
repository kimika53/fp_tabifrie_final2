<?php
session_start();
require_once 'funcs.php';
loginCheck();

$email = $_SESSION['user_id'];
$pdo = db_conn();

$stmt = $pdo->prepare('SELECT * FROM tabifrie_user WHERE email = :email');
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$status = $stmt->execute();
if($status === false) {
    sql_error($stmt);
}
$val = $stmt->fetch();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/profile.css" />
    <title>旅フレ‐プロフィール</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅フレロゴ" width="232px" class=""> 
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="profile_info.php">プロフィール</a></li>
                <li><a href="profile_info.php">オファーリスト</a></li>
                <li><a href="profile_info.php">マッチング結果</a></li>
                <li><a href="profile_info.php">メッセージ</a></li>
            </ul>
        </nav>
        <p><?= $_SESSION['user_name'] ?>さん、こんにちは！</p>
        <button class="btn" onclick="document.location='logout.php'">ログアウト</button>
    </header>
    <section class="container profile">
        <h2>プロフィール</h2>
        <div>
            <h3>基本情報</h3>
            <div class="info">
                <p>ニックネーム</p><p><?= $val['name'] ?></p>
                <p>年齢</p><p><?= $val['age']  ?></p>
                <p>性別</p><p><?= $val['gender'] ?></p>
            </div>
            <div class="info">
                <p>メールアドレス</p><p><?= $val['email']?></p>
                <p>パスワード</p><p><?= $val['password'] [0]?>*****</p>
            </div><br>
            <button class="btn" onclick="document.location='info_update.php'">変更</button>
        </div><br>
        <div>
            <h3>旅行の好み</h3>
            
            <button class="btn_s" onclick="document.location='preference.php'">登録</button>
        </div><br>
    </section>
    <script language="javascript" type="text/javascript">  
        alert("旅の好みを登録してください。")
    </script>
</body>

</html>
