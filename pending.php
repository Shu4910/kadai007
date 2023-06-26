<?php
    session_start();

    // ログイン状態のチェック
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // ログインしていない場合はログインページにリダイレクト
        header('Location: login.php');
        exit();
    }

    // ログイン状態のユーザーのみが表示されるコンテンツなどを追加します

    // a.phpのコンテンツを追加
    echo 'ログインに成功しました！ここにログイン後のコンテンツを表示します。';
    ?>