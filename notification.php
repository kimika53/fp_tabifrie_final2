<?php

session_start();
require_once 'funcs.php';
loginCheck();
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT 
    tabifrie_plan.name as name,
    tabifrie_plan.email as email,
    tabifrie_plan.start as start,
    tabifrie_plan.end as end,

    tabifrie_user.gender as gender,
    tabifrie_user.age as age,
    tabifrie_user.hotel as hotel,
    tabifrie_user.flight as flight,
    tabifrie_user.engaging as engaging,
    tabifrie_user.smoking as smoking,
    tabifrie_user.drinking as drinking,
    tabifrie_user.eating as eating,
    tabifrie_plan.area as area,
    tabifrie_plan.country as country
FROM tabifrie_plan
INNER JOIN tabifrie_user
ON tabifrie_plan.email = tabifrie_user.email WHERE tabifrie_user.email = :email;'); 
$email = $_SESSION['user_id'];
$stmt->bindValue(':email', $email, PDO::PARAM_STR);

$status = $stmt->execute();
if($status === false) {
    sql_error($stmt);
}
$my_val = $stmt->fetch();

// ユーザデータ取得ー条件１
$marea = $my_val['area']; 
$mcountry = $my_val['country'];
$mstart = $my_val['start'];
$mend = $my_val['end'];
$mgender = $my_val['gender'];

// ユーザデータ取得ー条件２
$mhotel = $my_val['hotel'];
$mflight = $my_val['flight'];
$mengaging = $my_val['engaging'];
$msmoking = $my_val['smoking'];
$mdrinking = $my_val['drinking'];
$meating = $my_val['eating'];


// DBから一致したデータ取得ー条件１
$pdo2 = db_conn();
$stmt2 = $pdo2->prepare('SELECT 
    tabifrie_plan.name as name,
    tabifrie_plan.email as email,
    tabifrie_plan.start as start,
    tabifrie_plan.end as end,

    tabifrie_user.gender as gender,
    tabifrie_user.age as age,
    tabifrie_user.hotel as hotel,
    tabifrie_user.flight as flight,
    tabifrie_user.engaging as engaging,
    tabifrie_user.smoking as smoking,
    tabifrie_user.drinking as drinking,
    tabifrie_user.eating as eating,
    tabifrie_area.area as area,
    tabifrie_country.country as country
FROM tabifrie_plan
INNER JOIN tabifrie_user
ON tabifrie_plan.email = tabifrie_user.email

INNER JOIN tabifrie_area
ON tabifrie_plan.area = tabifrie_area.id

INNER JOIN tabifrie_country
ON tabifrie_plan.country = tabifrie_country.id WHERE tabifrie_plan.area = :area AND tabifrie_plan.country = :country AND tabifrie_plan.start = :start AND tabifrie_plan.end = :end AND tabifrie_user.gender = :gender AND tabifrie_user.email != :email ;'); 
$stmt2->bindValue(':area', $marea, PDO::PARAM_STR);
$stmt2->bindValue(':country', $mcountry, PDO::PARAM_STR);
$stmt2->bindValue(':start', $mstart, PDO::PARAM_STR);
$stmt2->bindValue(':end', $mend, PDO::PARAM_STR);
$stmt2->bindValue(':gender', $mgender, PDO::PARAM_STR);
$stmt2->bindValue(':email', $email, PDO::PARAM_STR);

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
    <link rel="stylesheet" href="css/notification.css" />
    <title>旅フレ‐マッチング結果</title>
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
            <div  class="table">
                <table>
                    <thead>
                        <tr>
                            <th class="">旅ふれの名前</th>
                            <th class="">プロフィール</th>
                            <th class="">エリア</th>
                            <th class="">国</th>
                            <th class="">出発日</th>
                            <th class="">帰国日</th>

                        </tr>
                    </thead>
                    <tbody> 
                    <?php

foreach( $vals as $plan) {
    $count = 0;
    
    if($plan['hotel'] == $mhotel){ 
        $count++;
    }
    if($plan['flight'] == $mflight){ 
        $count++;
    }
    if($plan['engaging'] == $mengaging){ 
        $count++;
    }
    if($plan['smoking'] == $msmoking){ 
        $count++;
    }
    if($plan['drinking'] == $mdrinking){ 
        $count++;
    }
    if($plan['eating'] == $meating){
        $count++;
    }
    //もしカウントが5以上なら
    if($count >= 5) {
        //表示する配列に要追加?>
        <tr>  
            <td class=""><?= $plan['name'] ?></td>
            <td class=""><a href="profile_tabifrie.php?user_id=<?= $plan['email'] ?>">詳細</a></td>
            <td class=""><?= $plan['area'] ?></td>
            <td class=""><?= $plan['country'] ?></td>
            <td class=""><?= substr($plan['start'],0,4)?>年<?= substr($plan['start'],4,2)?>月<?= substr($plan['start'],6,2)?>日</td>
            <td class=""><?= substr($plan['end'],0,4)?>年<?= substr($plan['end'],4,2)?>月<?= substr($plan['end'],6,2)?>日</td>
        </tr>
        <?php
    } 
} ?>
                    </tbody>
                </table>
            </div>
            <div class="hidden">
                <p><?php
                    if (empty($vals)){
                        echo("まだマッチングされた旅ふれがいません。");
                    } ?>
                </p>
            </div>                
        </div>
    </section>
    <script language="javascript" type="text/javascript">  
        alert("マッチング結果をご確認ください。");
    </script>
</body>

</html>
