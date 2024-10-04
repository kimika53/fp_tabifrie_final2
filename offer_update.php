<?php
session_start();
require_once 'funcs.php';
loginCheck();

$id = $_POST['id'];
$result = $_POST['result'];

$pdo = db_conn();

$stmt = $pdo->prepare('UPDATE tabifrie_offer SET result = :result WHERE id = :id ;');

$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':result', $result, PDO::PARAM_INT);


$status = $stmt->execute();

if (!$status) {
    sql_error($stmt);
} else {
    header('Location: offer.php');
}
?>
