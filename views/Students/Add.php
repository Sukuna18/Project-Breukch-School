		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div>
		    <li class="nav-item" style="display: flex; align-items: center;">
		      <a class="nav-link d-flex align-items-center me-3" href="/">
		        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;Se deconnecter
		      </a>
		    </li>
		  </div>
		  <!-- Container wrapper -->
		  <div class="container">
		    <!-- Navbar brand -->
		    <a class="navbar-brand" href="/list"><img id="MDB-logo" src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/modern-school-logo-design-template-1d88683e857f70116bf3ba828be9a84e_screen.jpg?ts=1576966343" alt="MDB Logo" draggable="false" height="30" /></a>

		    <!-- Toggle button -->
		    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <i class="fas fa-bars"></i>
		    </button>

		    <!-- Collapsible wrapper -->
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <!-- Left links -->

		      <!-- Left links -->

		      <form class="d-flex align-items-center w-100 form-search">
		        <div class="input-group">
		          <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
		        </div>
		        <a href="#!" class="text-white"><i class="fas fa-search ps-3"></i></a>
		      </form>

		      <ul class="navbar-nav ms-3">
		        <li class="nav-item">
		          <a class="nav-link d-flex align-items-center me-3" href="/list">
		            <i class="fas fa-bookmark pe-2"></i>Liste
		          </a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link d-flex align-items-center me-2" href="/class">
		            <i class="fa-solid fa-landmark pe-2"></i>Classes
		          </a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link d-flex align-items-center me-3" href="/annee">
		            <i class="fa-solid fa-calendar-days pe-2"></i>Annee
		          </a>
		        </li>
		      </ul>
		    </div>
		    <!-- Collapsible wrapper -->
		  </div>
		  <!-- Container wrapper -->
		</nav>
		<!-- Navbar -->
		<div class="wrapper rounded bg-white">

		  <div class="h3">Formulaire d'Enregistrement Eleves</div>

		  <div class="form">

		    <form action="/add" method="post">
		      <div class="row">
		        <div class="col-md-6 mt-md-0 mt-3">
		          <label for="prenom">Prenom</label>
		          <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prenom" required>
		        </div>
		        <div class="col-md-6 mt-md-0 mt-3">
		          <label for="nom">Nom</label>
		          <input type="text" name="nom" id="nom" class="form-control" placeholder="nom" required>
		        </div>
            <h6 id="prenomError" style="color: red;"></h6>
            <h6 id="nameError" style="color: red; margin-left:50%;"></h6>
		      </div>
		      <div class="row">
		        <div class="col-md-6 mt-md-0 mt-3">
		          <label for="birthday">Date de naissance</label>
		          <input type="text" name="birthday" id="birthday" class="form-control" placeholder="YYYY-MM-DD" required>
		        <h6 id="birth-error" style="color: red;"></h6>
            </div>
		        <div class="col-md-6 mt-md-0 mt-3">
		          <label for="lieu">lieu de naissance</label>
		          <input type="text" name="lieu" class="form-control" placeholder="lieu de naissance">
		        </div>
		      </div>
		      <div class="row">
		        <div class="col-md-6 mt-md-0 mt-3">
		          <label for="numero">Numero</label>
		          <input type="number" name="numero" id="numero" class="form-control" placeholder="numero">
		        </div>
		        <div class="col-md-6 mt-md-0 mt-3">
		          <label for="">Sexe</label>
		          <input type="radio" name="sexe" value="M"> garcon
		          <input style="display: inline;" type="radio" name="sexe" value="F"> fille
		        </div>
            <h6 id="numError" style="color: red;">
						<?php
                  session_start();
                  echo $_SESSION['erreur'] ?? '';
                  if (isset($_SESSION['erreur'])) {
                    session_destroy();
                  } ?>
						</h6>
		      </div>
		      <div class="row">
		        <div class="col-md-6 mt-md-0 mt-3">
		          <label for="niveau">Niveau</label>
		          <select class="form-select" name="niveau" id="niveau" aria-label="Default select example">
		            <option selected>Niveau</option>
		            <option value="1">Elementaire</option>
		            <option value="2">Secondaire</option>
		            <option value="3">Moyen</option>
		          </select>
		        </div>
		        <div class="col-md-6 mt-md-0 mt-3">
		          <label for="classe">Classes</label>
		          <select class="form-select" id="classe" name="niveau" aria-label="Default select example">
              <option selected>Choisir un niveau</option>
		          </select>
		        </div>
		      </div>
		      <input type="submit" id="submit" value="Enregistrer" class="btn btn-primary mt-3" style="margin-left:40%;">
		    </form>
		  </div>




		</div>
		<script src="/js/add.js"></script>