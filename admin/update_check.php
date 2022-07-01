<?php
require_once __DIR__ . "/classes/Auther.class.php";
$auther = new Auther();

$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : "";
$mail_address  = isset($_POST['mail_address']) ? $_POST['mail_address'] : "";
$pass_word = isset($_POST['pass_word']) ? $_POST['pass_word'] : "";
$auther->login_chk();

$errors = [
    'user_name' => [] ,
    'mail_address ' => [] ,
    'pass_word' => [] ,
];
if($user_name === ""){
    $errors[]['user_name'] ="User Nameが未入力です。";
}
if($user_name === ""){
    $errors[]['mail_address'] ="Mail addressが未入力です。";
}
if (!preg_match('|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|', $mail_address )) {
    $errors[]['mail_address'] ="Mail addressのフォーマットが不正です。";
}
if($user_name === ""){
    $errors[]['pass_word'] ="Pass wordが未入力です。";
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
    <?php if(!empty($errors['user_name']) ||
             !empty($errors['mail_address '] )||
             !empty($errors['pass_word'] ) ) { ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach($errors['user_name'] as $errors) {?>
                <?php echo $errors ;?><br>
            <?php } ?>
            <?php foreach($errors['mail_address '] as $errors) {?>
                <?php echo $errors ;?><br>
            <?php } ?>
            <?php foreach($errors['pass_word'] as $errors) {?>
                <?php echo $errors ;?><br>
            <?php } ?>
        </div>

    <form method="POST" action="./update_check.php">
    <input type="hidden" name="user_id" value="<?php echo $user_id ; ?>">
    <div class="mb-3">
        <label for="examplInputusername" class="form-label">Username</label>
        <input type="text" class="form-control <?php if( !empty($errors['user_name']))echo 'border-danger'; ?>" >
  </div>
    <div class="mb-3">
        <label for="examplInputEmailaddress" class="form-label">Emailaddress</label>
        <input type="txet" class="form-control" name="mail_address " aria-describedby="emailHelp" value="<?php echo $mail_address ; ?>">
  </div>
  <div class="mb-3">
        <label for="examplInputPassword" class="form-label">Password</label>
        <input  type="text" class="form-control" name="pass_word" aria-describedby="emailHelp" value="<?php echo $pass_word; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
<?php } else { ?>
    <form method="POST" action="./update_comp.php">
    
    <div class="mb-3">
        <label for="examplInputusername" class="form-label">Username</label>
        <input type="text" class="form-control" readnly id="examplInputusername" name="user_name"aria-describedby="emailHelp" value="<?php echo $user_name; ?>"> 
  </div>
    <div class="mb-3">
        <label for="examplInputEmailaddress" class="form-label">Emailaddress</label>
        <input type="email" class="form-control" readnly id="examplInputEmailaddress" name="mail_address" aria-describedby="emailHelp" value="<?php echo $mail_address ; ?>">
  </div>
  <div class="mb-3">
        <label for="examplInputPassword" class="form-label">Pass_word</label>
        <input  type="pass_word" class="form-control" readnly id="examplInputPassword" name="pass_word" aria-describedby="emailHelp" value="<?php echo $pass_word; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
<form method="POST" action="./input.php">
<input type="hidden" class="form-control" readnly id="examplInputusername" name="user_name"aria-describedby="emailHelp" value="<?php echo $user_name; ?>"> 
<input type="hedden" class="form-control" readnly id="examplInputEmailaddress" name="mail_address " aria-describedby="emailHelp" value="<?php echo $mail_address ; ?>">
<input type="hedden" class="form-control" readnly id="examplInputPassword" name="pass_word" aria-describedby="emailHelp" value="<?php echo $pass_word; ?>">
<?php } ?>

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