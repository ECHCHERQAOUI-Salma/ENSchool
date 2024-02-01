<?php
require("../config/config.php");

switch($_GET["action"]){
    case "sup":
        try{
            $q= $conn->prepare("delete from professeur where idProfesseur=?");
            $q->execute([$_GET["idProfesseur"]]);
            $q2= $conn->prepare("delete from users where login=?");
            $q2->execute([$_GET["email"]]);
            header("location:../prof.php");
        }
            catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case "add":
        try{
            $q= $conn->prepare("insert into professeur values(NULL,? ,?, ?)");
            $q->execute([$_GET["nomComplet"] ,$_GET["email"], $_GET["motPass"] ]);
            $q2= $conn->prepare("insert into users values(? ,?, ?)");
            $q2->execute([$_GET["email"] ,$_GET["motPass"], "prof" ]);
            header("location:../prof.php");
        }
            catch(Exception $e){
            echo $e->getMessage();
        }
        break;
        case "maj":
            try{
                $q2= $conn->prepare("update users set login =? ,password =? where login=(select email from professeur where idProfesseur =?)");
                $q2->execute([$_GET["email"],$_GET["motPass"],$_GET["idProfesseur"]]);

                $q= $conn->prepare("update professeur set nomComplet=?, email=?, motPass=? where idProfesseur =?");
                $q->execute([$_GET["nomComplet"] , $_GET["email"] , $_GET["motPass"], $_GET["idProfesseur"]  ]);

                header("location:../prof.php");
            }
                catch(Exception $e){
                echo $e->getMessage();
            }
            break;

        

}



?>