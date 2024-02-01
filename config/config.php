<?php

try {
	
	$conn =new PDO("mysql:host=localhost;dbname=gestion_ecole","root","");
 } catch (Exception $e) {
 	die ($e->getMessage());
 } 

?>