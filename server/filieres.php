<?php
require("../config/config.php");

switch($_GET["action"]){
    case "sup":
        try{
            $q= $conn->prepare("delete from filiere where idFiliere=?");
            $q->execute([$_GET["idFiliere"]]);
            header("location:../filieres.php");
        }
            catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case "add":
        try{
            $q= $conn->prepare("insert into filiere (idFiliere, nomFiliere) values(NULL ,?)");
            $q->execute([$_GET["nomFiliere"]]);
            header("location:../filieres.php");
        }
            catch(Exception $e){
            echo $e->getMessage();
        }
        break;
    

}



?>