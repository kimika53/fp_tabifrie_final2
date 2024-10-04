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
$empty = "";


//ホテル
$hotel[1] = "1万円以下";
$hotel[2] = "1万円から2万5千円まで";
$hotel[3] = "2万5千円以上";

//航空券
$flight[1] = "激安";
$flight[2] = "普通";
$flight[3] = "プレミアム";

//行動時間
$engaging[1] = "フライトとホテルのみ";
$engaging[2] = "フライト、ホテルと食事";
$engaging[3] = "フライト、ホテル、食事と観光";

//タバコ
$smoking[1] = "禁煙";
$smoking[3] = "喫煙";
$smoking[2] = "どちらでもよい";

//お酒
$drinking[3] = "飲む";
$drinking[1] = "飲まない";
$drinking[2] = "どちらでもよい";

//食事
$eating[3] = "なんでも食べれる";
$eating[2] = "食べれないものがある";
$eating[1] = "ベジタリアン";

$stmt2 = $pdo->prepare('SELECT * FROM tabifrie_plan WHERE email = :email');
$stmt2->bindValue(':email', $email, PDO::PARAM_STR);
$status2 = $stmt2->execute();
if($status2 === false) {
    sql_error($stmt);
}
$val2 = $stmt2->fetch();

$area[1] = "北米";
$area[2] = "アジア";
$area[3] = "欧州";

$country[1] = "カナダ";
$country[2] = "アメリカ";
$country[3] = "韓国";
$country[4] = "台湾";
$country[5] = "タイ";
$country[6] = "マレーシア";
$country[7] = "ベトナム";
$country[8] = "イギリス";
$country[9] = "フランス";
$country[10] = "イタリア";
$country[11] = "スペイン";
$country[12] = "ドイツ";

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
                <li><a href="profile_pref.php">プロフィール</a></li>
                <li><a href="profile_pref.php">オファーリスト</a></li>
                <li><a href="profile_pref.php">マッチング結果</a></li>
                <li><a href="profile_pref.php">メッセージ</a></li>
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
            <div class="prefer">
                <p>Q. 一泊の予算は？</p>
                <p>A. <?= $hotel[$val['hotel']] ?></p>
            </div>
            <div class="prefer">
                <p>Q. 航空券の予算は？</p>
                <p>A. <?= $flight[$val['flight']] ?></p>
            </div>
            <div class="prefer">
                <p>Q. 一緒の行動時間は？</p>
                <p>A. <?= $engaging[$val['engaging']]?></p>
            </div>
            <div class="prefer">
                <p>Q. ホテルの部屋タイプは？</p>
                <p>A. <?= $smoking[$val['smoking']]?></p>
            </div>
            <div class="prefer">
                <p>Q. お酒は飲む？</p>
                <p>A. <?= $drinking[$val['drinking']]?></p>
            </div>
            <div class="prefer">
                <p>Q. 食事の好みは？</p>
                <p>A. <?= $eating[$val['eating']]?></p>
            </div><br>
            <button class="btn" onclick="document.location='preference_update.php'">変更</button>
        </div><br>
        <div>
            <h3>旅プラン</h3>
            
            <button class="btn_s" onclick="document.location='plan.php'">登録</button>
        </div><br>
    </section>
    <script language="javascript" type="text/javascript">  
        alert("旅プランを登録してください。")
    </script>
</body>

</html>
