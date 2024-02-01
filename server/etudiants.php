<?php
require("../config/config.php");

switch($_GET["action"]){
    
    case "sup":
        try{
            $q= $conn->prepare("delete from etudiants where cin=?");
            $q->execute([$_GET["cin"]]);
            header("location:../etd.php");
        }
            catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    
    case "add":
        try{
            $q= $conn->prepare("insert into etudiants values(? ,? ,? ,? ,? ,? ,?, ? )");
            $q->execute([$_GET["cin"] ,$_GET["cne"]  ,$_GET["nomComplet"]  ,$_GET["dateNaissance"] ,$_GET["tel"]  ,$_GET["email"] ,$_GET["motPass"] ,$_GET["idFiliere"]  ]);
            header("location:../listeEtudiants.php");
        }
            catch(Exception $e){
            echo $e->getMessage();
        }
        break;

        case "maj":
            try{
                $q = $conn->prepare("UPDATE etudiants SET cne=?, nomComplet=?, dateNaissance=?, tel=?, email=?, motPass=?, idFiliere=? WHERE cin=?");

                $result = $q->execute([$_GET["cne"], $_GET["nomComplet"], $_GET["dateNaissance"], $_GET["tel"], $_GET["email"], $_GET["motPass"], $_GET["idFiliere"], $_GET["cin"]]);
                
                if ($result) {
                    $rowCount = $q->rowCount();
                    echo "Update successful. $rowCount row(s) affected.";
                } else {
                    $errorInfo = $q->errorInfo();
                    echo "Update failed. Error: " . $errorInfo[2];
                }
                header("location:../etd.php");
            }
                catch(Exception $e){
                echo $e->getMessage();
            }
            break;

        

}



?>