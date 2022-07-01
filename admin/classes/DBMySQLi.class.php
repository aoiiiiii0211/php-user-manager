<?php
class DBMySQLi{

    protected $db_link = null;

    public function __construct()
    {
        // MYSQLiコネクタを生成
        $this->db_link = mysqli_connect("localhost", "root", "", "test");

        // DBコネクタを確立
        if(!$this->db_link) {
            throw new Exception("コネクションエラー");
        }
    }
    
}
?>