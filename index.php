<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
<?php
session_start(); // 必要な場合はここでセッションを開始
if (isset($_SESSION['mail_sent']) && $_SESSION['mail_sent']) {
    echo '<p>認証コードが送信されました。</p>';
    // メッセージを表示したらフラグを削除
    unset($_SESSION['mail_sent']);
}
?>


    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>フリーアンケート</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>Email：<input type="email" name="email"></label><br>
                <label><textArea name="content" rows="4" cols="40"></textArea></label><br>
                <label>パスワード：<input type="password" name="pass"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form> 

    <form method="post" action="login.php">
        <label>Email：<input type="text" name="email"></label><br>
        <label>パスワード：<input type="password" name="password"></label><br>
        <input type="submit" value="ログイン">
    </form>

    <form method="post" action="mail.php">
        <label>Email：<input type="email" name="email"></label><br>
        <input type="submit" value="認証メールを送信">
    </form>

    <!-- ログインフォーム -->
    <form method="post" action="authlogin.php">
        <label>Email：<input type="text" name="email"></label><br>
        <label>認証コード：<input type="text" name="code"></label><br>
        <input type="submit" value="ログイン">
    </form>

 


    <button id="select-button" style="margin: 10px;">select.phpへ</button>

    <script>
        document.getElementById('select-button').addEventListener('click', function() {
            location.href = 'select.php';
        });
    </script>

</body>

</html>
