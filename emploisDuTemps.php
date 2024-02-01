<?php include "header.php";?>



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
						<li>
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
        <h1>Les emplois du temps </h1>
        <div class="contain">

  <div class="card">
    <img src="images/etudiant1.png" alt="Person" class="card__image">
    <p class="card__name">Emploi du temps CLE</p>
    <div class="grid-container">

      <div class="grid-child-posts">
       Cycle de licence de l'enseignement
      </div>
    </div>
    
  
    <button class="button draw-border"><a href='display_pdf.php?idEmplois=3' target='_blank'>Voir emploi</a></button>
  </div>
  <div class="card">
    <img src="images/etudiant2.png" alt="Person" class="card__image">
    <p class="card__name">Emploi du temps LPE</p>
    <div class="grid-container">

    <div class="grid-child-posts">
       Licence prof de l'enseignement
      </div>
    </div>
    
    
    <button class="button draw-border"><a href='display_pdf.php?idEmplois=4' target='_blank'>Voir emploi</a></button>
  </div>
</div>


        <?php include "footer.php";?>
		
        <style>
body{
    background-color: #f5f5f5;
}
h1{
    color: #5b3c11;
    margin:2% 30%;
}
.contain {
  display: grid;
  grid-template-columns: 300px 300px ;
  grid-gap: 50px;
  justify-content: center;
  align-items: center;
  height: 100vh;
  
}

.card {
  background-color: #a8954e;
  height: 30rem;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.7);
  color: white;
}

.card__name {
  margin-top: 15px;
  font-size: 1.5em;
}

.card__image {
  height: 200px;
  width: 200px;
  margin-top: 20px;
}


.draw-border {
  box-shadow: inset 0 0 0 4px #F5F5DC;
  color:#F5F5DC;
  -webkit-transition: color 0.25s 0.0833333333s;
  transition: color 0.25s 0.0833333333s;
  position: relative;
}

.draw-border::before,
.draw-border::after {
  border: 0 solid transparent;
  box-sizing: border-box;
  content: '';
  pointer-events: none;
  position: absolute;
  width: 0rem;
  height: 0;
  bottom: 0;
  right: 0;
}

.draw-border::before {
  border-bottom-width: 4px;
  border-left-width: 4px;
}

.draw-border::after {
  border-top-width: 4px;
  border-right-width: 4px;
}

.draw-border:hover {
  color: #5b3c11;
}

.draw-border:hover::before,
.draw-border:hover::after {
  border-color: #5b3c11;
  -webkit-transition: border-color 0s, width 0.25s, height 0.25s;
  transition: border-color 0s, width 0.25s, height 0.25s;
  width: 100%;
  height: 100%;
}

.draw-border:hover::before {
  -webkit-transition-delay: 0s, 0s, 0.25s;
  transition-delay: 0s, 0s, 0.25s;
}

.draw-border:hover::after {
  -webkit-transition-delay: 0s, 0.25s, 0s;
  transition-delay: 0s, 0.25s, 0s;
}

.button {
  background: none;
  border: none;
  cursor: pointer;
  line-height: 1.5;
  font: 700 1.2rem 'Roboto Slab', sans-serif;
  padding: 0.75em 2em;
  letter-spacing: 0.05rem;
  margin: 1em;
  width: 13rem;
}




.grid-container {
 
  font-size: 1.2em;
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