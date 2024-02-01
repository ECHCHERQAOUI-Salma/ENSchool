<?php
require("../config/config.php");

switch($_GET["action"]){
    case "sup":
        try{
            $q= $conn->prepare("delete from emploisdutemps where idEmplois=?");
            $q->execute([$_GET["idEmplois"]]);
            header("location:../emplois.php");
        }
            catch(Exception $e){
            echo $e->getMessage();
        }
    break;

}



?>