<?php

require_once __DIR__ . "/classes/Auther.class.php";
require_once __DIR__ . "/classes/Users.class.php";

$auther = new Auther();
$users = new Users();
$auther->login_chk();

$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : "";
$mail_address  = isset($_POST['mail_address']) ? $_POST['mail_address'] : "";
$pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : "";

$erros = [];
try {
    //MySQLiコネクタを生成
    $link = mysqli_connect("localhost", "root","", "test");

    //DBコネクションを確立
    if(!$link) {
        die("コネクションエラー");
    }


    //メールアドレスが重複していた場合
    if(!$users->isDiolication($mail_address,$user_id)) {
      //エラーで終了
      throw new Exception("メールアドレスが重複してます。");
    }
    //メールアドレスが重複していなかった場合
    else{
      users->updateUser($user_id,$user_name,$mail_address,$pass_word );
    }
     
  }catch(Exception $e){
    $erros[] = $e->getMessage();
  }

  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ユーザー登録</title>
  </head>

  <body>
    <h1>ユーザー登録</h1>
    <?php if( empty($erros) ) { ?>
      <div class="alert alert-danger" role="alert">
      登録完了
    </div>
    <a href="./input.php" class="btn btn-info">入力画面へ</a>
      <?php } else { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo implode('<br>' , $erros ) ?> 
        </div>
        <form method="POST" action="./check.php">
    <div class="mb-3">
        <label for="examplInputusername" class="form-label">Username</label>
        <input type="text" class="form-control"  name="user_name"aria-describedby="emailHelp" value="<?php echo $user_name; ?>">
        <div class="col-sm-10">
    </div>
  </div>
    <div class="mb-3">
        <label for="examplInputEmailaddress" class="form-label">Emailaddress</label>
        <input type="email" class="form-control"  name="mail_address " aria-describedby="emailHelp" value="<?php echo $mail_address ; ?>">
        <div class="col-sm-10">
    </div>
  </div>
  <div class="mb-3">
        <label for="examplInputPassword" class="form-label">Pass_word</label>
        <input  type="pass_word" class="form-control"  name="pass_word" aria-describedby="emailHelp" value="<?php echo $pass_word; ?>">
        <div class="col-sm-10">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>

    <?php } ?>
</body>
</html>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  