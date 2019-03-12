
<?php
/*
 * Template Name: Espace Membre
 */
?>

<?php get_header(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="js/acsore_manager.js"></script>
<link type="text/css" media="screen" rel="stylesheet" href="..css/acsore_manager.css" />

<?php 

     global $current_user;

   // $current_user = get_currentuserinfo();
	  
    $current_user = wp_get_current_user();
?>

<section id="primary" class="site-content">

	<h3 class="bienvenue_msg"><?php echo 'Bienvenue: ' . $current_user->user_lastname;?></h3>

		<p class="espace_membre_acsore"> Espace Membre de ACSORE </p>

 <div class="container contenu_session_membre">
    <div class="row"> 
  
		<div class="col-sm-9">
		  <p style="text-align:left; color:#3A9D23; font-weight:bold;"> Info aux membres </p>
				<div class="zone_information_urgente">
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Information Importante'));?>
				</div>
		</div> <!-- Fin de  Colonne 9/12 -->
		
		<div class="col-sm-3">
		    <a href="<?php echo wp_logout_url(home_url()); ?>" title="Se déconnecter">Se déconnecter</a>
        </div>
		
    </div> <!-- Fin de row  -->
 
 
	 <div class ="fichiers_a_introduction">
		<?php 
		 $current_user   = wp_get_current_user();
						 $role = $current_user->roles[0];
		 if($role == 'administrator'){
		include('la_fiche_edition_membre.php'); 
		  }
		?>
	</div>
	
        <div class="row"> 
		   
		    <ul class="agenda_projet_compterendu">
				<li class="current"><a href="#zone_agenda"><img class="picto-rubrique" src=""><span>Agenda</span></a>
				<p> Agenda des activités</p>
				</li>
				<li><a href="#zone_appelsaprojets"><img class="picto-rubrique" src=""><span>Appels a Projets</span></a>
				<p> Etant membre de Acsore, tu bénéficier du financement d'un projet en vu de sa réalisation</p>
				</li>
				<li><a href="#zone_compterendus"><img class="picto-rubrique" src=""><span>Comptes rendus</span></a>
				<p> Les comptes rendus sont à disposition, ils sont téléchargeables </p>
				</li>
				<li><a href="#zone_divers"><img class="picto-rubrique" src=""><span>Les Divers</span></a>
				<p> Une société de montage  </p>
				</li>
			</ul>
		     
       </div> 
	   
	   
	   <div class="row"> 
		   <div class="tabs_contenu">
				  <div id="zone_agenda" class="tab-contenu current">
			        <h3 style="margin-bottom:20px;"> Agenda </h3>
				      <iframe style="border: 0;" src="">
				      </iframe>
					  testy
			       </div>

				  <div id="zone_appelsaprojets" class="tab-contenu">
					<h3 style="margin-bottom:20px;"> Appels à Projets </h3>
					  <a href=" ">
					  <img src=" " alt="projets" width="400" height="270" align="center">
					  </a>
					  testy2
				  </div>
			   
			   <div id="zone_compterendus" class="tab-contenu">
		        <h3 style="margin-bottom:20px;"> Comptes rendus de reunions </h3>
                  <a href=" ">
			      <img src=" " alt="projets" width="400" height="270" align="center">
			      </a>
               </div>
			   
			   
			   <div id="zone_divers" class="tab-contenu">
		        <h3 style="margin-bottom:20px;"> Divers  </h3>
                  <a href=" ">
			      <img src=" " alt="divers" width="400" height="270" align="center">
			      </a>
				  <p> Divers & Annonces </p>
               </div>
		
       </div> 
	 </div> 
 
</div><!-- Fin de contenu_session_membre  -->
</section>

<?php get_footer(); ?>