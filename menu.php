<?php ob_start(); ?>


<div class="navbar navbar-expand flex-column flex-md-row bd-navbar">
		
		<div class="degrade">
			<nav>	
				<div class="container">
					<ul class="nav nav-pills justify-content-end">
						<li class="nav-item">
							<!-- Button trigger modal -->
							<button class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModal">
								Connexion
							</button>

							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">

									<div class="modal-content">

										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Mon compte</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

										<div class="modal-body">
											<form action="compte_login.php?action=login" method="post"><!-- Formulaire -->
											<div class="form-group">
												
													<label for="login">E-mail</label>
													<input type="email" class="form-control" name="login" id="login">
												</div>

												<div class="form-group">
													<label for="pass">Mot de passe</label>
													<input type="password" class="form-control" name="pass" id="pass"">
												</div>

													<button type="submit" class="btn btn-primary">Connexion</button>
											</form><!-- Formulaire -->
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="index.php?action=espace_perso">Nouveau client ? Inscription</a>
										</div>

									</div>

								</div>
							</div>
						</li>
						
						<li class="nav-item dropdown" >
							<a class="btn btn-outline-light" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>	

							<div class="dropdown-menu">
								<a class="dropdown-item" href="index.php?action=accueil">Accueil</a>
								<a class="dropdown-item" href="index.php?action=agence">Nos agences</a>
								<a class="dropdown-item" href="index.php?action=nos_vehicules">Nos véhicules</a>
								<a class="dropdown-item" href="index.php?action=cnam_car">Qui sommes nous</a>
								<a class="dropdown-item" href="index.php?action=faq">FAQ</a>
								<a class="dropdown-item" href="index.php?action=mentions">Mentions légales</a>
								<a class="dropdown-item" href="index.php?action=test">Test</a>
								<a class="dropdown-item" href="index.php?action=espace_perso">Espace Client</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Separated link</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>			
		</div>
	</div>


<?php $menu = ob_get_clean(); ?>