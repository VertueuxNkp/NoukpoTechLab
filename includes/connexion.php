<?php
    try{
        define("HOST","localhost");
        define("USER","root");
        define("PASS","");
        define("BDNAME","noukpotechlab");

        $bdd = mysqli_connect(HOST, USER, PASS, BDNAME);
    }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
?>