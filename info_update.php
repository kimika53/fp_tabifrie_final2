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
    <link rel="stylesheet" href="css/signup.css" />
    <title>旅フレ‐基本情報更新</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅ふれロゴ" width="232px" class=""> 
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
            <h3>基本情報</h3>
            <form action="info_update_act.php" method="post">
                ニックネーム <input type="text" name="name" value="<?= $val['name']?>"><br><br>
                性別
                <label><input type="radio" name="gender" value="女" <?php if($val["gender"] == "女") { echo " checked"; } ?> >女</label>
                <label><input type="radio" name="gender" value="男" <?php if($val["gender"] == "男") { echo " checked"; } ?> >男</label><br><br>
                年齢
                <select name="age">
                    <option value=""></option>
                    <option value="20代" <?php if($val["age"] == "20代") { echo " selected"; } ?>>20代</option>
                    <option value="30代" <?php if($val["age"] == "30代") { echo " selected"; } ?>>30代</option>
                    <option value="40代" <?php if($val["age"] == "40代") { echo " selected"; } ?>>40代</option>
                    <option value="50代" <?php if($val["age"] == "50代") { echo " selected"; } ?>>50代</option>
                    <option value="60代or以上" <?php if($val["age"] == "60代or以上") { echo " selected"; } ?>>60代or以上</option>
                </select><br><br>
                メールアドレス <p><?= $val['email']?> </p><br><br>
                パスワード <input id="password" type="password" name="password" value="<?= $val['password']?>" /><br><br><br>
                <button class="btn_s">変更</button>
            </form>
        </div>
        <div>
            <img src="./img/banner.png" alt="トップページバナー" width="640px" class=""> 
        </div>
    </section>
    <script language="javascript" type="text/javascript">  
        const password = document.querySelector("#password");
        password.addEventListener('click', (e)=>{
            if (password.getAttribute("type") === "password") {
            password.setAttribute("type", "text");
            } else {
            password.setAttribute("type", "password");
            }
        }
    )
    </script>
</body>

</html>
