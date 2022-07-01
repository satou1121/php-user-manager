<?php
    require_once __DIR__ . "/classes/Auther.class.php";
    $auther = new Auther();

    $mail_address = isset($_POST['mail_address']) ? $_POST['mail_address'] : "";
    $pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : "";

//ユーザー登録のバリデーションを入れる
$erros = [
  'mail_address' => [] ,
  'pass_word' => [] ,
];
//メールアドレスのバリデーション
if($user_name === ""){
  $errors[]['mail_address'] ="Mail addressが未入力です。";
}
if (!preg_match('|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', $mail_address )) {
  $errors[]['mail_address'] ="Mail addressのフォーマットが不正です。";
}
//パスワードのバリデーション
if($user_name === ""){
  $errors[]['pass_word'] ="Pass wordが未入力です。";
}

if( empty($erros['mail_address']) && empty($erros['pass_word'])){
  //ログインチェック
  if($auther->login($mail_address, $pass_word)) {
    $_SESSION[ Auther::LOGIN_CHK_KEY ] = true;
  }
}
$auther->login_chk(true);

?>
<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ログイン画面</title>
  </head>

  <body>
    <h1>ログイン画面</h1>
    <form class="containar">
        <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3">
    </div>
  </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="Password" class="form-control" id="inputPassword3">
    </div>
  </div>
  <button type="submit" class="btn btn-success">ログイン</button>
  </form>

<!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
</html>