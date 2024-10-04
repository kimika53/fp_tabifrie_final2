<?php
session_start();
require_once 'funcs.php';
loginCheck();

$email = $_SESSION['user_id'];

// 重複のないメッセージやり取りを取得
$pdo = db_conn();

$stmt = $pdo->prepare('SELECT DISTINCT `to_name`, `to_email`, `email`, `name` FROM `tabifrie_message` WHERE email = :email');

$stmt->bindValue(':email', $email, PDO::PARAM_STR);

$status = $stmt->execute();
if($status === false) {
    sql_error($stmt);
}
$vals = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/message.css" />
    <title>旅フレ‐メッセージリスト</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅フレロゴ" width="232px" class=""> 
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="profile.php">プロフィール</a></li>
                <li><a href="offer.php">オファーリスト</a></li>
                <li><a href="notification.php">マッチング結果</a></li>
                <li><a href="message.php">メッセージ</a></li>
            </ul>
        </nav>
        <p><?= $_SESSION['user_name'] ?>さん、こんにちは！</p>
        <button class="btn" onclick="document.location='logout.php'">ログアウト</button>
    </header>
    <section class="container">
        <div>
            
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>旅ふれの名前</th>
                            <th>メッセージ</th>
                        </tr>
                    </thead>
                    <tbody> 
                    <?php
                    foreach( $vals as $message) {
                        if($message['email'] == $email ){
                            $name =  $message['to_name'];
                            $user_id = $message['to_email'];
                        } else {
                            $name =  $message['name'];
                            $user_id = $message['email'];
                        }
                    ?>
                    <tr>  
                        <td><?= $name ?></td>
                        <td><a href="message_detail.php?user_id=<?= $user_id ?>">詳細</a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>   
            <div class="hidden">
                <p><?php
                    if (empty($vals)){
                        echo("まだメッセージがありません。");
                    } ?>
                </p>
            </div>        
        </div>
    </section>
</body>

</html>
