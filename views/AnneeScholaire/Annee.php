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
		<section class="vh-100" style="background-color: #e2d5de;">
		  <div class="container py-5 h-100">
		    <div class="row d-flex justify-content-center align-items-center h-100">
		      <div class="col col-xl-10">

		        <div class="card" style="border-radius: 15px;">
		          <div class="card-body p-5">

		            <h6 class="mb-3">Annee Scolaire</h6>

		            <form action="/annee" method="post" class="d-flex align-items-end mb-4">
		              <div class="col-md-6 mt-md-0 mt-3">
		                <label>Libelle</label>
		                <input type="text" name="libelle" class="form-control" required style="width:450px">
		              </div>
		              <input type="submit" value="Add" class="btn btn-primary btn-lg ms-2">
		            </form>

		            <ul class="list-group mb-0">
		              <?php foreach ($params['annees'] as $annee) : ?>
		                  <li class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
		                    <div class="d-flex align-items-center">

		                      <?= $annee['libelle'] ?>
		                    </div>
												<div class="d-flex align-items-center justify-content-center">

		                      <?php if($annee['active'] == 0) :?>
													<span class="badge bg-danger rounded-pill">Inactive</span>
												<?php else : ?>
													<span class="badge bg-success rounded-pill" style="margin-right: 70px;">Active</span>
												<?php endif ?>
		                    </div>
                        <div>
													<?php if ($annee['active'] == 0) : ?>
                        <a href="/annee/active/<?= $annee['id_annee_scolaire']; ?>" class="btn btn-success">Active</a>
													<?php endif ?>
		                    <a href="/annee/<?= $annee['id_annee_scolaire']; ?>" class="btn btn-danger">Delete</a>
                        </div>
		                  </li>
		              <?php endforeach; ?>
		            </ul>
		            <h3 style="color:red">
		              <?php
                  session_start();
                  echo $_SESSION['erreur'] ?? '';
                  echo $_SESSION['erreur1'] ?? '';

                  if (isset($_SESSION['erreur']) || isset($_SESSION['erreur1'])) {
                    session_destroy();
                  } ?>
		            </h3>
                
		            <script>

		            </script>
		          </div>
		        </div>

		      </div>
		    </div>
		  </div>
		</section>