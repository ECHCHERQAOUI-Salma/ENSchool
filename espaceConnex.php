<?php
    session_start();
    if(isset($_POST["user"]) && isset($_POST["pass"])){
        $usr = $_POST["user"];
        $pas = $_POST["pass"];
        $msg =NULL;
        include("config/config.php");
        $q= $conn->prepare("select count(*) from users where login=? and password = ?");
        $t= $conn->prepare("select type from users where login=? and password = ?");
        $q->execute([ $usr ,$pas ]);
        $t->execute([ $usr ,$pas ]);

        $r =  $q->fetchColumn();
        $r2 =  $t->fetchColumn();

        if($r==0) $msg ="Erreur de connexion , login et/ou mot de passe invalide!";
    }
    include "header.php";
?>


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
       <section>
       <div class="container1">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/login.jpg" alt="">
        <div class="text">
          <span class="text-1">Bienvenue !  </span>
          <span class="text-2">Veuillez s'authentifier pour acceder a votre espace</span>
        </div>
      </div>
      
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">S'authentifier</div>
          <form method="POST" action="espaceConnex.php">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="user" id="user" placeholder="Entrer votre email" required>
              </div>
              <div class="input-box">
                <input type="password" name="pass" id="pass" placeholder='Entrer le mot de pass' required>
              </div>
              <?php
                            if(isset($_POST["user"]) && isset($_POST["pass"])){
                                if($msg == NULL && $r2 == "admin") {
                                    $_SESSION["login"] = $_POST["user"];
                                    header("location:adminDashboard.php");
                                }
                                else if ($msg == NULL && $r2 == "prof") {
                                    $_SESSION["login"] = $_POST["user"];
                                    header("location:profDashboard.php?login=".$_SESSION["login"]."");
                                } 
                                else {
                                    echo "<div class='alert alert-danger'>$msg</div>";
                                }
                            }
                            ?>
              <div class="button input-box">
                <input type="submit" value="Envoyer">
              </div>
            </div>
        </form>
      </div>
        
    </div>
    </div>
  </div>
        </section>
        

                       
        <?php include "footer.php";?>
		
<style>

.container1{
  position: relative;
  max-width: 850px;
  width: 100%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  perspective: 2700px;
  height: 70%;
  margin:auto;
  margin-top:2%;
  margin-bottom:2%;
}
.container1 .cover{
  position: absolute;
  top: 0;
  left: 50%;
  height: 100%;
  width: 50%;
  z-index: 98;
  transition: all 1s ease;
  transform-origin: left;
  transform-style: preserve-3d;
}

 .container1 .cover .front,
 .container1 .cover .back{
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.container1 .cover::before,
.container1 .cover::after{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  background:  #93775a;
  opacity: 0.5;
  z-index: 12;
}

.container1 .cover img{
  position: absolute;
  height: 100%;
  width: 100%;
  object-fit: cover;
  z-index: 10;
}
.container1 .cover .text{
  position: absolute;
  z-index: 130;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.cover .text .text-1,
.cover .text .text-2{
  font-size: 26px;
  font-weight: 600;
  color: #fff;
  text-align: center;
}
.cover .text .text-2{
  font-size: 15px;
  font-weight: 500;
}
.container1 .forms{
  height: 100%;
  width: 100%;
  background: #fff;
}
.container1 .form-content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form-content .login-form,
.form-content .signup-form{
  width: calc(100% / 2 - 25px);
}
.forms .form-content .title{
  position: relative;
  font-size: 24px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .title:before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 25px;
  background: #5b3c11;
}
.forms .signup-form  .title:before{
  width: 20px;
}
.forms .form-content .input-boxes{
  margin-top: 30px;
}
.forms .form-content .input-box{
  display: flex;
  align-items: center;
  height: 50px;
  width: 100%;
  margin: 10px 0;
  position: relative;
}
.form-content .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}
.form-content .input-box input:focus,
.form-content .input-box input:valid{
  border-color: #a8954e;
}
.form-content .input-box i{
  position: absolute;
  color: #a8954e;
  font-size: 17px;
}
.forms .form-content .text{
  font-size: 14px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .text a{
  text-decoration: none;
}
.forms .form-content .text a:hover{
  text-decoration: underline;
}
.forms .form-content .button{
  color: #fff;
  margin-top: 40px;
}
.forms .form-content .button input{
  color:#F5F5DC;
  background:#a8954e;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}
.forms .form-content .button input:hover{
    background-color: #F5F5DC;
        color: #5b3c11;
}
.forms .form-content label{
  color: #5b13b9;
  cursor: pointer;
}
.forms .form-content label:hover{
  text-decoration: underline;
}
.forms .form-content .login-text,
.forms .form-content .sign-up-text{
  text-align: center;
  margin-top: 25px;
}
.container1 #flip{
  display: none;
}
@media (max-width: 730px) {
  .container1 .cover{
    display: none;
  }
  .form-content .login-form,
  .form-content .signup-form{
    width: 100%;
  }
  .form-content .signup-form{
    display: none;
  }
  .container1 #flip:checked ~ .forms .signup-form{
    display: block;
  }
  .container1 #flip:checked ~ .forms .login-form{
    display: none;
  }
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