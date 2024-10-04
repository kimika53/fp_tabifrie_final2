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
    <link rel="stylesheet" href="css/preference.css" />
    <title>旅フレ‐旅行の好み更新</title>
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
            <img src="./img/banner.png" alt="トップページバナー" width="640px" class=""> 
        </div>
        <div>
            <h3>旅行の好み</h3>
            <form action="preference_update_act.php" method="post">
                <div><p>Q. 一泊の予算は？</p>A.
                    <label><input type="radio" name="hotel" value="1" <?php if($val["hotel"] == 1) { echo " checked"; } ?> >1万円以下</label>
                    <label><input type="radio" name="hotel" value="2"  <?php if($val["hotel"] == 2) { echo " checked"; } ?> >1万円から2万5千円まで</label>
                    <label><input type="radio" name="hotel" value="3"  <?php if($val["hotel"] == 3) { echo " checked"; } ?> >2万5千円以上</label>
                </div><br>
                <div><p>Q. 航空券の予算は？</p>A.
                    <label><input type="radio" name="flight" value="1"  <?php if($val["flight"] == 1) { echo " checked"; } ?> >激安</label>
                    <label><input type="radio" name="flight" value="2"  <?php if($val["flight"] == 2) { echo " checked"; } ?> >普通</label>
                    <label><input type="radio" name="flight" value="3"  <?php if($val["flight"] == 3) { echo " checked"; } ?> >プレミアム</label>
                </div><br>
                <div><p>Q. 一緒の行動時間は？</p>A.
                <select name="engaging">
                    <option value=""></option>
                    <option value="1"  <?php if($val["engaging"] == 1) { echo " selected"; } ?> >フライトとホテルのみ</option>
                    <option value="2" <?php if($val["engaging"] == 2) { echo " selected"; } ?>>フライト、ホテルと食事</option>
                    <option value="3" <?php if($val["engaging"] == 3) { echo " selected"; } ?>>フライト、ホテル、食事と観光</option>
                </select>
                </div><br>
                <div><p>Q. ホテルの部屋タイプは？</p>A.
                    <label><input type="radio" name="smoking" value="1"  <?php if($val["smoking"] == 1) { echo " checked"; } ?> >禁煙</label>
                    <label><input type="radio" name="smoking" value="3"  <?php if($val["smoking"] == 3) { echo " checked"; } ?> >喫煙</label>
                    <label><input type="radio" name="smoking" value="2"  <?php if($val["smoking"] == 2) { echo " checked"; } ?> >どちらでもよい</label>
                </div><br>
                <div><p>Q. お酒は飲む？</p>A.
                    <label><input type="radio" name="drinking" value="3"  <?php if($val["drinking"] == 3) { echo " checked"; } ?> >飲む</label>
                    <label><input type="radio" name="drinking" value="1"  <?php if($val["drinking"] == 1) { echo " checked"; } ?> >飲まない</label>
                    <label><input type="radio" name="drinking" value="2"  <?php if($val["drinking"] == 2) { echo " checked"; } ?> >どちらでもよい</label>
                </div><br>
                <div><p>Q. 食事の好みは？</p>A.
                <select name="eating">
                    <option value=""></option>
                    <option value="3" <?php if($val["eating"] == 3) { echo " selected"; } ?>>なんでも食べれる</option>
                    <option value="2" <?php if($val["eating"] == 2) { echo " selected"; } ?>>食べれないものがある</option>
                    <option value="1" <?php if($val["eating"] == 1) { echo " selected"; } ?>>ベジタリアン</option>
                </select>
                </div><br><br>
                <button class="btn_s">更新</button>
            </form>
            
        </div>
        
    </section>
</body>

</html>
