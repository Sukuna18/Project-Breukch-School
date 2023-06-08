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
          <a class="nav-link d-flex align-items-center me-2" href="/discipline/gestion">
					<i class="fa-solid fa-chalkboard-user pe-2"></i>Discipline
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
	<div class="container" style="margin-top:7%">
		<div class="row gutters">
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="account-settings">
							<div class="user-profile">
								<div class="user-avatar">
									<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
								</div>
								<h5 class="user-name"><?= $params['student']['prenom']; ?> <?= $params['student']['nom']; ?></h5>
								<h6 class="user-email"><?= $params['student']['birthday']; ?></h6>
								<h3>Description</h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, quia! Velit sint nulla repellat beatae. Impedit repellendus vitae unde eaque.</p>
							</div>
							<form action="/delete/<?= $params['student']['id'] ?>" method="get">
								<div class="form-group" style="display: flex; justify-content: center;">
									<button type="submit" class="btn btn-primary btn-block">Delete</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<form action="/class/liste/edit/<?= $params['student']['id'] ?>" method="post">
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="mb-2 text-primary">Mettre a jour infos eleves</h6>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="prenom">Prenom</label>
										<input value="<?= $params['student']['prenom'] ?>" type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrer nom complet">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="nom">Nom</label>
										<input value="<?= $params['student']['nom'] ?>" type="text" name="nom" class="form-control" id="nom" placeholder="Entrer nom">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="birthday">Naissance</label>
										<input value="<?= $params['student']['birthday'] ?>" type="text" name="birthday" class="form-control" id="birthday" placeholder="YY-MM-JJ">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="birthday">Lieu de Naissance</label>
										<input value="<?= $params['student']['lieu_naissance'] ?>" type="text" name="lieu_naissance" class="form-control" id="naissance">
									</div>
								</div>
								<div class="col-md-6 mt-md-0 mt-3">
									<label for="">Sexe Actuel = <?= $params['student']['sexe'] ?></label>
									<div>
										<h5>Choisir sexe</h5>
										<input type="radio" name="sexe" value="M"> M
										<input style="display: inline;" type="radio" name="sexe" value="F"> F
									</div>
								</div>

							</div>
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="text-right" style="margin-top: 60px; margin:20% 0 0 40%;">
										<a href="/niveau" id="input" class="btn btn-secondary">Annuler</a>
										<input type="submit" id="input" value="Confirmer" class="btn btn-primary">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>