
<?php
/*
 * Template Name: Espace Membre
 */
?>

<?php get_header(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".agenda_projet_compterendu li").mouseenter(function(){
		$(this).css({"cursor":"pointer"});
	});
   $(".agenda_projet_compterendu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-contenu").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
</script>

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



<style type="text/css">
 
 /* --------------------------------- Le Conteneur ----------------------------------- */
.contenu_session_membre
{
  margin:auto;
  padding:7px;  
}
					   
					   
 /* --------------------------  Zone et Images de profile  -------------------- */	   					 
.espace_membre_acsore
{
  font-size:30px;
  font-weight:bold;
  background-color:#0071b9;
  color:white;
  margin:auto;
  margin:38px;
  text-align:center;
  position:relative;
}

					   
.espace_membre_acsore:before
{
  content:"";
  border-left:15px solid transparent;
  border-right:15px solid #0071b9;
  border-top:15px solid #0071b9;
  border-bottom:15px solid transparent;
  width:0px;
  position:absolute;
  top:100%;
  left:0;
}
		  
		  
.espace_membre_acsore:after
{
  content:"";
  border-left:15px solid #0071b9;
  border-right:15px solid transparent;
  border-top:15px solid #0071b9;
  border-bottom:15px solid transparent;
  width:0px;
  position:absolute;
  top:100%;
  right:0;
}

		  
.zone_information_urgente
{
  width:98%;
  min-height:220px
  max-height:350px;	
  margin:auto;
  margin-top:20px;
  padding:5px;
  text-align:justify;
  color:grey;
  border:2px dotted pink;	
  font-size:13px;
  border-radius:5px;
  overflow: scroll;
// position:absolute;
}
				  
.zone_information_urgente .first-span
{
  background-color:red; 
  color:white; 
  border-radius:45px;
  padding:8px; 
  font-size:15px;
}	

 
.agenda_projet_compterendu
{
  display:flex;
  padding:5px;
  margin-left:3%;
  margin-top:15px;
  margin-bottom!30px;
}

.agenda_projet_compterendu li 
{
  width:30%;
  height:180px;
  border-radius:7px;
  border:1px solid purple;
  display:inline-block;
  padding:5px;
  margin-left:3%;
  margin-top:15px;
  transition-duration: 0.3s;
}
					   		   
.agenda_projet_compterendu li:hover,
.agenda_projet_compterendu li:focus,
.agenda_projet_compterendu li:active
{
  -ms-transform: scale(1.1);
  -webkit-transform: scale(1.1); 
  transform: scale(1.1);
}	
	
.agenda_projet_compterendu li a
{
   color: grey;
}

.agenda_projet_compterendu li:hover
{
   background-color: orange;
}


.picto-rubrique
{
  width:70px;
  height:70px;
  float:left;
  margin-left:8px;
  margin-right:5px;
  border-radius:9px;
}


			
         /* -------------------- Partie Tabulation -------------------------- */
		
body 
{
  padding: 20px;
  font-family: Arial, Helvetica, sans-serif;
  line-height: 1.5;
  font-size: 14px;        
}


#tabs-container
{
  width:99%;
  // display:inline-block;
  float:left;
  margin:10px auto;
  padding:12px;
  border:1px solid red;
  height:450px;
}
			  

#tabs_block_menu
{
  border:1px solid blue;
  padding-top:5px;
  padding-left:5px;
  width:30%;
  height:410px;
  margin-left:7px;
  //display:inline-block;
  float:left;
}


#tabs_block_menu li
{
  list-style-type:none;
  width:130%;
  height:50px;
  margin:auto;
  border-radius:7px;
  margin-top:10px;
  padding-top:10px;
  border:1px solid green;
  text-align:center;
  transition-duration: 0.3s;
}

#tabs_block_menu li:hover,
#tabs_block_menu li:focus,
#tabs_block_menu li:active
{
  -ms-transform: scale(1.1);
  -webkit-transform: scale(1.1); 
  transform: scale(1.1);
}				 

#tabs_block_menu a
{
  text-transform:uppercase;
}	 					 
				 
#tabs_block_menu li a:hover
{
  background-color:#0071b9;
  color:white;
}	 					 
				 
.tabs_contenu
{
  width:80%;
  min-height:350px;
  margin:auto;
  padding:7px;
  border:1px solid purple;
  border-radius:3px;
  box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
}

			  
 .tabs_contenu h3{
 text-align:center;
 color:blue;
 font-size:28px;
 font-weight:bold;
 font-family:arial;
 background-color!purple;
              }
			  
.tabs_contenu p{
 text-align:justify;
 color:grey;
 font-size:18px;
 font-family:roboto;
              }			  
			  
.tabs-menu {
    height: 30px;
    float: left;
    clear: both;
           }


.tab-contenu {
 display:none;
            }
	
	
.tab-contenu.current {
        display:block;
                     }

 li.current a, li.current a:hover {
        background:#fff;
        color:#4c4c4c;
    }

			

.fichiers_a_introduction	{ /*
	width:500px;
	height:200px;
	border:2px dotted red;
	margin:5px;
	padding:5px;
                   */ }	

				   
 </style>
 



<?php get_footer(); ?>