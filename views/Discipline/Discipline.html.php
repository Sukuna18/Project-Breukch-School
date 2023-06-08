		<style>
		  body {
		    color: #000;
		    overflow-x: hidden;
		    height: 100%;
		  }

		  .card {
		    padding: 30px 40px;
		    margin-top: 60px;
		    margin-bottom: 60px;
		    border: none !important;
		    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
		  }

		  .blue-text {
		    color: #00BCD4
		  }

		  .form-control-label {
		    margin-bottom: 0
		  }

		  input,
		  textarea,
		  button {
		    padding: 8px 15px;
		    border-radius: 5px !important;
		    margin: 5px 0px;
		    box-sizing: border-box;
		    border: 1px solid #ccc;
		    font-size: 18px !important;
		    font-weight: 300
		  }

		  input:focus,
		  textarea:focus {
		    -moz-box-shadow: none !important;
		    -webkit-box-shadow: none !important;
		    box-shadow: none !important;
		    border: 1px solid #00BCD4;
		    outline-width: 0;
		    font-weight: 400
		  }

		  .btn-block {
		    text-transform: uppercase;
		    font-size: 15px !important;
		    font-weight: 400;
		    height: 43px;
		    cursor: pointer
		  }

		  .btn-block:hover {
		    color: #fff !important
		  }

		  button:focus {
		    -moz-box-shadow: none !important;
		    -webkit-box-shadow: none !important;
		    box-shadow: none !important;
		    outline-width: 0
		  }
		</style>
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
		    <a class="navbar-brand" href="/niveau"><img id="MDB-logo" src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/modern-school-logo-design-template-1d88683e857f70116bf3ba828be9a84e_screen.jpg?ts=1576966343" alt="MDB Logo" draggable="false" height="30" /></a>

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
		          <a class="nav-link d-flex align-items-center me-3" href="/add">
		            <i class="fas fa-bookmark pe-2"></i>Enregister
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
		<div class="container-fluid px-1 py-5 mx-auto">
		  <div class="row d-flex justify-content-center">
		    <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
		      <h3>Formulaire de gestion discipline</h3>
		      <div class="card">
		        <h5 class="text-center mb-4">Discipline</h5>
		        <form action="/discipline/gestion" method="post" class="form-card discipline-form">

		          <div class="row">
		            <div class="col-md-6 mt-md-0 mt-3">
		              <label for="niveau">Niveau</label>
		              <select class="form-select" name="niveau" id="niveau" aria-label="Default select example">
		              </select>
		            </div>
		            <div class="col-md-6 mt-md-0 mt-3">
		              <label for="classe">Classes</label>
		              <select class="form-select" id="classe" name="classe" aria-label="Default select example">
		              </select>
		            </div>
		          </div>
              <div class="row">
		            <div class="col-md-6 mt-md-0 mt-3">
		              <label for="niveau" style="margin-top: 7px;">Groupe discipline</label>
		              <select class="form-select" name="groupe_discipline" id="g_discipline" aria-label="Default select example">
										<option value=""></option>		
                    <option value="new" id="new">Nouveau</option>
		              </select>
		            </div>
                <div class="col-md-6 mt-md-0 mt-3">
		              <label for="discipline">Discipline</label>
                  <div style="gap:20px" class="d-flex justify-content-between">
		              <input type="text" name="discipline" class="discipline_add" class="form-control">
                  <button type="submit" id="btn-add" class="btn btn-primary">ajouter</button>
                  </div>
		            </div>
		          </div>
              <br><br>
              <div class="row">
                <h3 id="title">Les discipline de la classe de</h3>
              <ul class="list-group rounded-0" style="display: flex; flex-direction: row;" id="items-container">
							<?php foreach($params['discipline'] as $discipline): ?>
								<li class="list-group-item border-0 item" id="discipline-<?=$discipline['id_discipline']?>">
                <input onchange="handleChecked(this)" class="form-check-input me-3" data-id="<?=$discipline['id_discipline']?>" id="checkBtn" type="checkbox" value="" aria-label="..." checked />
                <span><?= $discipline['libelle']?>(<?= $discipline['code']?>)</span>
              </li>
							<?php endforeach; ?>
              
            </ul>
              </div>
              <button type="submit"  class="btn btn-primary" id="maj">Mettre a jour</button>
		        </form>
		      </div>
		    </div>
		  </div>
      <div style="background-color: #eee; max-width: 440px; width: 100%; position: absolute; top: 5%; left: 35%; display: none;" class="container card" id="modal">
    <div class="absolute-top">
      <form class="discipline-form">
        <div style="position: relative;" class="form-group">
        <i id="close" style="position: absolute; top: 0; right:0; cursor: pointer;" class="fa-solid fa-xmark"></i>
          <label for="exampleFormControlInput1">Groupe discipline</label>
          <input type="text" id="groupe-discipline" name="g_discipline" class="form-control" placeholder="Entrez groupe discipline">
        </div>
        <button type="submit" id="envoyer" class="btn btn-primary">Envoyer</button>
      </form>
    </div>
    <!-- Le reste du contenu de la page -->
  </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/discipline.js"></script>