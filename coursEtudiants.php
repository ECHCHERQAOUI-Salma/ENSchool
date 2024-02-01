<?php
include("config/config.php");
$req1 = "select * from cours";
$tab1 =  "<table class='table table-bordered'>";
$tab1 .= "<tr><th>Titre de Cour</th><th>Actions</th></tr>";
foreach($conn->query($req1) as $ligne){
     
    $tab1 .= "<tr>";
    $tab1 .= "<td>".$ligne[1]."</td>";
    $tab1 .= "<td><a class='buton' href='cours/display_pdf.php?idCours=".$ligne[0]."' target='_blank'>Ouvrir le PDF</a>";
    $tab1 .= "</tr>";
}
$tab1 .= "</table>";
?>
<!DOCTYPE html>

<html lang="en">
<head>
    
    <title>etudiant</title>
</head>
<?php include "header.php"?>
<body>
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
  <a class="navbar-brand" href="index.html">ENSchool<span>.</span></a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsFurni">
    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
      <li >
        <a class="nav-link" href="index.php">Accueil</a>
      </li>
      
      <li><a class="nav-link" href="index.php#sectionContact">A propos de nous </a></li>
      <li >
        <a class="nav-link" href="espaceConnex.php">Espace Connexion</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="espaceEtudiant.php">Espace Etudiant</a>
      </li>

      <li><a class="nav-link" href="index.php#sectionContact">Contacter nous</a></li>

    </ul>

    
  </div>
</div>
  
</nav>

    <div class="container etudiant">
        <div class="row">
            <?php
               echo $tab1;
                    
            ?>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="modalmaj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="server/etudiants.php">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification des informations de l'étudiant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="col-12">
                        <label for="cin">CIN</label>
                        <input type="text" name="cin" id="cin" required  readonly
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="cne">CNE</label>
                        <input type="text" name="cne" id="cne" required 
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="nomComplet">Nom Complet</label>
                        <input type="text" name="nomComplet" id="nomComplet" required 
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="dateNaissance">Date de naissance</label>
                        <input type="date" name="dateNaissance" id="dateNaissance" required 
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="tel">Téléphone</label>
                        <input type="text" name="tel" id="tel" required 
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required 
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="motPass">Mot de passe</label>
                        <input type="password" name="motPass" id="motPass" required 
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="idFiliere">Filière</label>
                        <select name="idFiliere" id="idFiliere" required class="form-control">
                        <?php  
                            $req ="select * from filiere";
                            $list ="";
                             foreach($conn->query($req) as $ligne){ 
                                $list .= "<option value='".$ligne[0]."'>".$ligne[1]."</option>";
                            }
                            echo  $list;
                            ?>
                         </select>
                    </div>

      </div>
      <div class="modal-footer">
        <button type="submit" name="action" value="maj" class="btn">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php include "footer.php";?>
<script>
    $(".maj").click(function(){
       
      $("#cin").val($(this).attr("data-cin"));
      $("#cne").val($(this).attr("data-cne"));
      $("#nomComplet").val($(this).attr("data-nomComplet"));
      $("#dateNaissance").val($(this).attr("data-dateNaissance"));
      $("#tel").val($(this).attr("data-tel"));
      $("#email").val($(this).attr("data-email"));

     

        $("#modalmaj").modal("show");

    })
</script>
</body>
</html>


<style>
  .etudiant{
    margin-top:2%;
  }
  .buton{
    color: #F5F5DC;
  background: #a8954e;
  text-decoration:none;
  border-radius: 6px;
  padding: 10;
  cursor: pointer;
  transition: all 0.4s ease;
  }
  .buton:hover{
  color:#a8954e;
  background: #F5F5DC;
  text-decoration:none;
  border-radius: 6px;
  padding: 10;
  cursor: pointer;
  transition: all 0.4s ease;
  }
  .buton:focus{
    color:#a8954e;
  background: #F5F5DC;}
  
  a {
  text-decoration: none ;
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease;
  color: #2f2f2f;
  }
  a:hover {
    color: #2f2f2f;
   }
  a.more {
    font-weight: 600; }

.custom-navbar {
  background: 	#93775a !important;
  padding-top: 20px;
  padding-bottom: 20px; }
  .custom-navbar .navbar-brand {
    font-size: 32px;
    font-weight: 600; }
    .custom-navbar .navbar-brand > span {
      opacity: .4; }
  .custom-navbar .navbar-toggler {
    border-color: transparent; }
    .custom-navbar .navbar-toggler:active, .custom-navbar .navbar-toggler:focus {
      -webkit-box-shadow: none;
      box-shadow: none;
      outline: none; }
  @media (min-width: 992px) {
    .custom-navbar .custom-navbar-nav li {
      margin-left: 15px;
      margin-right: 15px; } }
  .custom-navbar .custom-navbar-nav li a {
    font-weight: 500;
    color: #ffffff !important;
    opacity: .5;
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease;
    position: relative; }
    @media (min-width: 768px) {
      .custom-navbar .custom-navbar-nav li a:before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 8px;
        right: 8px;
        background:  #F5F5DC;
        height: 5px;
        opacity: 1;
        visibility: visible;
        width: 0;
        -webkit-transition: .15s all ease-out;
        -o-transition: .15s all ease-out;
        transition: .15s all ease-out; } }
    .custom-navbar .custom-navbar-nav li a:hover {
      opacity: 1; }
      .custom-navbar .custom-navbar-nav li a:hover:before {
        width: calc(100% - 16px); }
  .custom-navbar .custom-navbar-nav li.active a {
    opacity: 1; }
    .custom-navbar .custom-navbar-nav li.active a:before {
      width: calc(100% - 16px); }
  .custom-navbar .custom-navbar-cta {
    margin-left: 0 !important;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row; }
    @media (min-width: 768px) {
      .custom-navbar .custom-navbar-cta {
        margin-left: 40px !important; } }
    .custom-navbar .custom-navbar-cta li {
      margin-left: 0px;
      margin-right: 0px; }
      .custom-navbar .custom-navbar-cta li:first-child {
        margin-right: 20px; }
  </style>



