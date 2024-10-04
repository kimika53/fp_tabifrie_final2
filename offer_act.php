<?php
session_start();
require_once 'funcs.php';
loginCheck();

$sender = $_SESSION['user_id'];
$receiver = $_POST['receiver'];
$result = 0;

$pdo = db_conn();

$stmt = $pdo->prepare('INSERT INTO tabifrie_offer (id, sender, receiver, offer_date, result) VALUES (NULL, :sender, :receiver, NOW(), :result)');
$stmt->bindValue(':sender', $sender, PDO::PARAM_STR);
$stmt->bindValue(':receiver', $receiver, PDO::PARAM_STR);
$stmt->bindValue(':result', $result, PDO::PARAM_INT);
$status = $stmt->execute();


if (!$status) {
    sql_error($stmt);
} else {
    header('Location: offer.php');
}
?>
