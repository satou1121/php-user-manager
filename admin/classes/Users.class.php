<?php

require_once __DIR__ . "/DBMySQLi.class.php";

class Users extends DBMySQLi {

    public function __construct()
    {
        parent::__construct();
    }

    public function getList()
    {
        $returnAry = [];
        $query = "SELECT user_id , user_name , create_dt, updata_dt FROM users ORDER BY user_id";
        $stmt = mysqli_prepare($this->$db_link, $query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$district);
        mysqli_stmt_fetch($stmt);
        var_dump($district);

        if(empty($district)){
            return [];
        }else{
            return $district;
        }
    }


    public function getDetail($user_id)
    {
        if(empty($user_id)){
            throw new Exception("ユーザーIDが空です。");
        }

        $query = "SELECT user_id , user_name, mail_address, pass_word, create_dt FROM users  WHERE user_id = ? LIMIT 1";
        $stmt = mysqli_prepare($this->$db_link, $query);
        mysqli_stmt_bind_param($stmt, 'd', $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $user_id, $user_name, $mail_address, $pass_word, $create_dt);
        mysqli_stmt_fetch($stmt);

        return [
            'user_id' => $user_id ,
            'user_name' => $user_name,
            'mail_address' => $mail_address,
            'pass_word' => $pass_word,
            'create_dt' => strtotime($create_dt) ,
            'updata_dt' => strtotime($updata_dt) ,
        ];
    }
    public function isDiplication($mail_address, $user_id = null)
    {
    //メールアドレスの重複チェック
    $query = "SELECT user_id FROM users WHERE mail_address = ? AND user_id != ? LIMIT 1";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, 'sd', $mail_address,$user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$district);
    mysqli_stmt_fetch($stmt);

    if(empty(district)) {
        return true;
    } else {
        return false;
    }
    }
    public function updateUser($user_id,$user_name,$mail_address,$pass_word  = null)
    {
      //ユーザー登録
      if(!empty($pass_word)) {
        $query = "UPDATE users SET user_name = ?, mail_address = ?, update_dt = ?, pass_word = ?, WHERE user_id = ?";
      //パスワードを不可逆変換する
      $cry_pass_word = md5($pass_word);
      //現在日時を取得
      $now_dt = date("Y-m-d H:i:s");

      $stmt = mysqli_prepare($link, $query);
      mysqli_stmt_bind_param($stmt, 'sssssd', $user_name , $mail_address ,$now_dt, $cry_pass_word, $user_id );
      mysqli_stmt_execute($stmt);
    
    }else{
      $query = "UPDATE users SET user_name = ?, mail_address = ?, update_dt = ?  WHERE user_id = ?";
      $stmt = mysqli_prepare($this->db_link, $query);
    //現在日時を取得
      $now_dt = date("Y-m-d H:i:s");
      mysqli_stmt_bind_param($stmt, 'sssd', $user_name , $mail_address ,$now_dt, $user_id );
      mysqli_stmt_execute($stmt);
    }   
    }
    public function deleteUser($user_id)
    {
        $query = "DELETE FROM users  WHERE user_id = ? LIMIT 1";
        $stmt = mysqli_prepare($this->db_link, $query);
        mysqli_stmt_bind_param($stmt, 'd', $user_id );
        mysqli_stmt_execute($stmt);  
    }
}