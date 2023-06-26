<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>ログインフォーム</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-4">
        <h3 class="mb-3">ログイン</h3>
        <?php
        // フォーム送信後のメッセージ表示（例）
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
          echo '<p>フォームが送信されました。</p>';
        }
        ?>
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="inputEmail">メールアドレス</label>
            <input type="email" class="form-control" id="inputEmail" name="email" required>
          </div>
          <div class="form-group mt-2">
            <label for="inputPassword">パスワード</label>
            <input type="password" class="form-control" id="inputPassword" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary mt-3">ログイン</button>
        </form>
        <div class="mt-3">
          <a href="a.php" class="btn btn-secondary">会員登録</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
