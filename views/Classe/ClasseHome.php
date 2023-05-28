		<style>
			.big-link {
  display: inline-block;
  font-size: 24px;
  padding: 40px;
  background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(57,161,255,1) 0%, rgba(48,46,185,1) 54%);
  border-radius: 8px;
  margin: 40px;
  text-decoration: none;
  color: #000;
  transition: background-color 0.3s ease;
}
.menu-contain {
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 80vh;
}

.big-link:hover {
  background-color: #e9ecef;
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
    <div class="container menu-contain">
    <div class="row justify-content-center">
			<?php foreach ($params['niveauId'] as $classe) : ?>
					<a class="big-link" href="/list/<?= $classe['id_classe'] ?>"><?= $classe['libelle'] ?></a>
			<?php endforeach; ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>


