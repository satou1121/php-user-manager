<?php
    require_once __DIR__ . "/classes/Auther.class.php";
    require_once __DIR__ . "/classes/Users.class.php";

    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

    $auther = new Auther();
    $users = new Users();
    $user = $users->getdetail($user_id);
    $auther->login_chk();
    
    

?>
<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>ユーザーリスト｜管理画面</title>
  </head>

  <body>
    <h1>ユーザーリスト｜管理画面</h1>
    <d1>
        <dt>ユーザーID</dt>
        <dd><?php echo $user['user_id']; ?></dd>
    </d1>
    <d1>
        <dt>ユーザー名</dt>
        <dd><?php echo $user['user_name']; ?></dd>
    </d1>
    <d1>
        <dt>パスワード</dt>
        <dd><?php echo str_repeat["*",6]; ?></dd>
    </d1>
    <d1>
        <dt>メールアドレス</dt>
        <dd><?php echo $user['mail_address']; ?></dd>
    </d1>
    <d1>
        <dt>作成日時</dt>
        <dd><?php echo data( "Y/m/d H時i分";  $user['create_dt']); ?></dd>
    </d1>
    <d1>
        <dt>更新日時</dt>
        <dd><?php echo data( "Y/m/d H時i分";  $user['updata_dt']); ?></dd>
    </d1>

    <form method="POST" action="updata.php">
        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
        <button type="submit" class="btn btn-info">編集画面へ</button>
    </form>
    <form method="POST" action="delete_check.php">
        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
        <button type="submit" class="btn btn-danger">削除</button>
    </form>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </body>
</html>