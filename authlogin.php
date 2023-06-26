<?php
session_start();

// フォームからの入力値を取得
$email = $_POST['email'];
$code = $_POST['code'];

// ログインの検証処理
// ここでデータベースやファイルから保存されたメールアドレスと認証コードとの比較を行います

// 例: 正しいメールアドレスと認証コードが一致する場合
if ($email === '登録されたメールアドレス' && $code === '保存された認証コード') {
    // ログイン状態をセッションに保存
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;

    // ログイン後のリダイレクト先を指定（a.phpにリダイレクトする場合）
    header('Location:user_dashboard.php');
    exit();
} else {
    // 認証エラーの場合は適切な処理を行う（例: エラーメッセージの表示など）
    echo 'ログイン失敗';
}
?>
<!-- GPTのいうlogin.php 

authlogin.php
-->
