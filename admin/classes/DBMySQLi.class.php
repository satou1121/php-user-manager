<?php

class DBMySQLi {

    protected $db_link = null;

    public function __construct()
    {
    //MySQLiコネクタを生成
    $this->db_liuk = mysqli_connect("localhost", "root","", "test");

    //DBコネクションを確立
    if( !$this->db_liuk) {
        throw new Exception("コネクションエラー");
    }
    }

}