<?php
include("config/config.php");
$req = "select * from professeur";
$tab =  "<table class='table table-bordered'>";
$tab .= "<tr><th>ID Professeur</th><th>Nom Complet</th><th>Email</th><th>Actions</th></tr>";
foreach($conn->query($req) as $ligne){ 
    $tab .= "<tr>";
    $tab .= "<td>".$ligne[0]."</td>";
    $tab .= "<td>".$ligne[1]."</td>";
    $tab .= "<td>".$ligne[2]."</td>";
    $tab .= "<td><a class='buton' href='server/professeurs.php?action=sup&idProfesseur=".$ligne[0]."&email=".$ligne[2]."'>Supprimer</a>";
    $tab .="  <a class='buton maj' data-idProfesseur=".$ligne[0]." data-nomComplet=".$ligne[1]." data-email=".$ligne[2]." data-motPass=".$ligne[3].">Modifier</a></td>";
    $tab .= "</tr>";
}
$tab .= "</table>";
?>

<?php include "header.php";?>


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
						<li class="nav-item active">
							<a class="nav-link" href="espaceConnex.php">Espace Connexion</a>
						</li>
						<li >
							<a class="nav-link" href="espaceEtudiant.php">Espace Etudiant</a>
						</li>

						<li><a class="nav-link" href="index.php#sectionContact">Contacter nous</a></li>

					</ul>

					
				</div>
			</div>
				
		</nav>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
    <div class="container profs">
        <div class="row">
            <div class="col-6">
                <button class="btn" type="button" id="new">+ Professeur</button>
            </div>
        </div>
        <div class="row">
            <?php
               echo $tab;
                    
            ?>
        </div>
    </div>
    



    <!-- Modal -->
<div class="modal fade" id="modalnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="server/professeurs.php?action=add">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau professeur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="col-12">
                        <label for="nomComplet">Nom Complet</label>
                        <input type="text" name="nomComplet" id="nomComplet" required 
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required 
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="motPass">Mot de passe</label>
                        <input type="password" name="motPass" id="motPass" required 
                        class="form-control">
                    </div>
                    

      </div>
      <div class="modal-footer">
        <button type="submit" name="action" value="add" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>



    <!-- Modal -->
    <div class="modal fade" id="modalmaj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="server/professeurs.php?action=maj">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification des informations du professeur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-12">
                        <label for="idProfesseur">ID Professeur</label>
                        <input type="text" name="idProfesseur" id="idProfesseur1" required readonly
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="nomComplet">Nom Complet</label>
                        <input type="text" name="nomComplet" id="nomComplet1" required
                        class="form-control">
                    </div>
                    
                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email1" required 
                        class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="motPass">Mot de passe</label>
                        <input type="password" name="motPass" id="motPass1" required 
                        class="form-control">
                    </div>
                    

      </div>
      <div class="modal-footer">
        <button type="submit" name="action" value="maj" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
<script>
    $("#new").click(function(){
       $("#modalnew").modal("show");
    });

    $(".maj").click(function(){
        
        $("#idProfesseur1").val($(this).attr("data-idProfesseur"));
        $("#nomComplet1").val($(this).attr("data-nomComplet"));
        $("#email1").val($(this).attr("data-email"));
        $("#motPass1").val($(this).attr("data-motPass"));

        $("#modalmaj").modal("show");

    })
</script>
</body>
</html>


<style>
  .profs{
    margin-top:2%;
  }
  .btn:focus{
    background-color: #F5F5DC;
        color: #5b3c11;
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