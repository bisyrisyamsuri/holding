<?php
    require 'db.php';

    class DatabaseAction 
    {
        public function GetUser($koneksi)
        {
            $sql = "SELECT * FROM tb_user";
            $result = mysqli_query($koneksi, $sql);
            $resultCheck = mysqli_num_rows($result);

            //algo ngambil UserName

            echo "DickyArya";
        }

       
       public function InsertFormKerjasama($koneksi, $userId, $proposalBisnis, $cashFlow, $projekKerjasama)
       {
            $sql = "INSERT INTO tb_userbisnisprofile (id_user, proposal_bisnis, cash_flow, pojek_kerjasama) VALUES ($userId, $proposalBisnis, $cashFlow, $projekKerjasama)";
            mysqli_query($koneksi ,$sql);
       }
    }
    
    $databaseAction = new DatabaseAction();

?>