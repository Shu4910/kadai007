<?php
session_start(); // セッションを開始

require 'database.php'; // データベース接続のスクリプト

$email = $_POST['email']; // POSTからメールアドレスを取得
$password = $_POST['password']; // POSTからパスワードを取得

$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE email = :email AND pass = :password");
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    // エラーハンドリング
} else {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $_SESSION['email'] = $email; // セッションにメールアドレスを保存
        header('Location: user_dashboard.php'); // ユーザーダッシュボードにリダイレクト
    } else {
        echo "メールアドレスまたはパスワードが間違っています。";
    }
}
?>
