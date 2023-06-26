<?php
session_start(); // セッションを開始

require 'database.php'; // データベース接続のスクリプト

$email = $_SESSION['email']; // セッションからメールアドレスを取得

$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE email = :email");
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    // エラーハンドリング
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "名前：".$result['name'] . '<br>'; // 名前を表示
        echo "コンテンツ:".$result['content'] . '<br>'; // コンテンツを表示
        echo "Eメール:".$result['email'] . '<br>'; // コンテンツを表示
        echo "パスワード:".$result['pass'] . '<br>'; // コンテンツを表示
        


    }
}
?>