<?php
//select.phpの一番上に1行追記
require_once('funcs.php');

//1.  DB接続します
// try {
//     //Password:MAMP='root',XAMPP=''
//     $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
// } catch (PDOException $e) {
//     exit('DBConnectError'.$e->getMessage());
// }


require "database.php";


//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status === false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $view .= '<p>';
      $view .=  h($result['id']) . ' : ' . h($result['name']) . ' | '. h($result['content']) . ' | ' . h($result['email']). ' | <input type="password" class="password" value="' . h($result['pass']) . '" readonly>';
      $view .= '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <!-- パスワード表示切り替えボタン -->
    <button id="togglePassword">パスワード表示切り替え</button>

    <div class="container jumbotron">
        <?= $view ?>
    </div>
</div>
<!-- Main[End] -->

<script>
document.getElementById("togglePassword").addEventListener("click", function() {
    var passwords = document.getElementsByClassName("password");

    for (var i = 0; i < passwords.length; i++) {
        if (passwords[i].type === "password") {
            passwords[i].type = "text";
        } else {
            passwords[i].type = "password";
        }
    }
});
</script>

</body>
</html>