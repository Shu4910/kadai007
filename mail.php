<?php


require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// フォームからメールアドレスを取得
$email = $_POST['email'];

// PHPMailerのインスタンスを作成
$mail = new PHPMailer();

// SMTP設定
$mail->isSMTP();
$mail->Host = $_ENV['SMTP_HOST']; // SMTPサーバーのホスト名
$mail->Port = $_ENV['SMTP_PORT']; // SMTPサーバーのポート番号
$mail->SMTPAuth = true; // SMTP認証を使用するかどうか
$mail->Username = $_ENV['SMTP_USER']; // SMTP認証のユーザー名
$mail->Password = $_ENV['SMTP_PASS']; // SMTP認証のパスワード




// 送信元と宛先の設定
$mail->setFrom('postmaster@komaki0910.sakura.ne.jp', 'Test'); // 送信元メールアドレスと送信者名
$mail->addAddress($email); // フォームから取得したメールアドレスを送信先に設定

// メールの設定
$mail->isHTML(true); // HTML形式のメールを送信するかどうか
$mail->Subject = '=?UTF-8?B?' . base64_encode('認証コード') . '?='; // メールの件名（UTF-8エンコード）

// ランダムな認証コードを生成
$code = generateRandomCode(); // 例: 6桁のランダムな数字コード

// メール本文の設定
$mail->Body = '認証コードは <strong>' . $code . '</strong> です。'; // 認証コードを本文に挿入

// 認証コードの有効期限を設定（60分）
$expiration = time() + (60 * 60); // 現在の時間に5分を加算

// セッションに認証コードと有効期限を保存
session_start();
$_SESSION['code'] = $code;
$_SESSION['expiration'] = $expiration;

// メール送信
if ($mail->send()) {
    // セッションにメール送信成功のフラグを保存
    $_SESSION['mail_sent'] = true;
    // リダイレクト先を設定
    header('Location: index.php');
    exit(); // 必ずリダイレクト後はexit()を呼び出してください
} else {
    echo 'メールの送信に失敗しました。エラー: ' . $mail->ErrorInfo;
}

// ランダムな6桁の数字コードを生成する関数
function generateRandomCode() {
    $digits = 6; // 生成するコードの桁数
    $code = '';
    for ($i = 0; $i < $digits; $i++) {
        $code .= rand(0, 9); // 0から9までのランダムな数字を追加
    }
    return $code;
}
?>