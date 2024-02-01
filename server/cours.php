<?php
require("../config/config.php");

switch($_GET["action"]){
    case "sup":
        try{
            $q= $conn->prepare("delete from cours where idCours=?");
            $q->execute([$_GET["idCours"]]);
            header("location:../profDashboard.php");
        }
            catch(Exception $e){
            echo $e->getMessage();
        }
    break;

}



?>