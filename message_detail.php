<?php
session_start();
require_once 'funcs.php';
loginCheck();

$memail = $_SESSION['user_id'];
$temail = $_GET['user_id'];

$pdo = db_conn();

//相手情報の取得
$stmt = $pdo->prepare('SELECT * FROM tabifrie_user WHERE email = :email');
$stmt->bindValue(':email', $temail, PDO::PARAM_STR);
$status = $stmt->execute();
if($status === false) {
    sql_error($stmt);
}
$tuser = $stmt->fetch();

//自分と相手の会話を抽出
$stmt2 = $pdo->prepare('SELECT *
FROM tabifrie_message
WHERE ( email = :memail AND to_email = :temail ) OR ( email = :temail AND to_email = :memail ) ;');
$stmt2->bindValue(':memail', $memail, PDO::PARAM_STR);
$stmt2->bindValue(':temail', $temail, PDO::PARAM_STR);

$status2 = $stmt2->execute();
if($status2 === false) {
    sql_error($stmt2);
}
$vals = $stmt2->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/message_detail.css" />
    <title>旅フレ‐メッセージ</title>
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
        <div class="tabifrie_name">
            <p><?= $tuser['name'] ?>さん</p>
        </div>
    
        <div class="messages">
        <?php
        foreach($vals as $message) {
            $from_msg = "";
            if($message['email'] == $memail ){
                $from_msg = "msg_right";
            } else if($message['email'] == $temail ){
                $from_msg = "msg_left";
            }
        ?>
            <!--メッセージ１（左側）-->
            <div class="message <?= $from_msg ?>">
                <div class="message_box">
                    <div class="message_content">
                        <div class="message_text">
                            <?= $message['content'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->
        <?php } ?>
        </div>
        <div >
            <form action="message_act.php" method="post" class="my-msg">
                <div>
                  <textarea name=content class="send_message" required></textarea> 
                </div>
                <input type="hidden" name="to_name" value="<?= $tuser['name'] ?>" />
                <input type="hidden" name="to_email" value="<?= $temail ?>" />
                <button class="btn_s">送信</button>
            </form>
        </div>
        <div class="offer_choice">
            <form action="offer_act.php" method="post">
                <input type="hidden" name="receiver" value="<?= $temail ?>" />
                <button class="btn_s" type="submit" name="invitation" value="1">旅ふれとしてオファーする</button>
            </form>
        </div>
    </section>
</body>

</html>