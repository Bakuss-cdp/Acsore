<?php
/*
* Template Name: Formulaire de Contact
*/
?>


 <?php get_header();?>

 <?php
// ---------------------------------------- Envoie de Mail ---------------------------------------------------------

     // ---------------------- Créer une fonction et inserer ce code dans le fichier fonction --------------- 
			
if(isset($_POST['valider'])){
	
    $nom_expediteur   = $_REQUEST['nom_expediteur'];
	$email_expediteur = $_REQUEST['email_expediteur'];
	$phone_expediteur = $_REQUEST['telephone'];
	$pole_concerne    = $_REQUEST['les_poles'];
	$objet_message    = $_REQUEST['objet_message'];
	$fichier_joint    = $_FILES['fichier_joint']['name'];
	$message_redige   = $_REQUEST['message'];
	
    $message_redige   = stripslashes($message_redige);	
	$objet_message    = stripslashes($objet_message);
	
 $message_complet = "Expediteur:" . " " . $nom_expediteur . "\r\n\r\n" . "Phone:" . " " . $phone_expediteur . "\r\n\r\n" . "Contenu du message:" . "\r\n" . $message_redige;	           

 $message_complet = wordwrap($message_complet, 70, "\r\n");	
 
 $provient_de = "From:" . $email_expediteur;
 					 
					 
  $liste_poles = array("Communication",
                       "Animation",
					   "Bénévolat",
					   "WebMaster",
					   "Direction",
					   "Logistique",
					   "Juridique");
					   
					   
 //	Pour les tests: des emails provisoires sont utilisés	
 
  $liste_emails = array("communication@acsore.org",
                        "secretariat@acsore.org",
						"contact@acsore.org",
						"secretariat@acsore.org",
						"secretariat.acsore@gmail.com",
						"communication@acsore.org",
						"secretariat.acsore@gmail.com");  	
		
		
		
	  foreach($liste_poles as $key => $le_pole) {

            if($le_pole === $pole_concerne)   {
				
				    $email_concerne = $liste_emails[$key];
	  				 				 
					  $mgs_envoye =	mail($email_concerne, $objet_message, $message_complet, $provient_de);
					    
						 if($mgs_envoye =!false){
							 
							 echo "Votre mail a été envoyé avec succès au pôle:" . $pole_concerne; 
						                         }
										 
						 else{echo "Echec d'envoie de mail";}				 
					                          
										               // }
                        
                             					
										        }	  
										
			                                     }	               
				
                            }
							
							
 if(isset($_POST['abandonner'])){
	 
	header('location:http://acsore.org/nous-ecrire/'); 
                             }							


?>


<!----------------------------------------- formulaire de saisie ----------------------------------------------------->
<h1 class="entry-title">Écrire à Acsore</h1>
<div class="container">
  <div class="row">
 
  <div id = "formulaire_contact" style="width:80%; border:1px solid purple; margin:auto; margin-bottom: 20px; margin-top: 15px; padding:10px;">
	  
	<form method = "POST" Action ="<?php echo the_permalink();?>" enctype="multipart/form-data">
	  
	   <fieldset style="width:95%; margin:auto; border-radius:9px"><legend> Adresser un message à Acsore </legend><br/>
	   
		  <label for="nom">  Nom: </label> <input type="text" name="nom_expediteur" size="45" required="required" value=" <?php echo $_POST['nom_expediteur'];?>" /> <br/><br/>
		  
		  <label for="email">  Email: </label> <input type="email" name="email_expediteur" size="100" required="required" value=" <?php echo $_POST['email_expediteur'];?>" /> <br/><br/>
		  
		  <label for="phone">  Téléphone: </label> <input type="tel" name="telephone" size="65" required="required" value="<?php echo $_POST['telephone'];?>" /> <br/><br/>
		  
		  <label for="pole">  Pôle Concerné: </label> <select name="les_poles">   
		                                              <option value="<?php echo $_POST['les_poles'];?>"> <?php echo $_POST['les_poles'];?> </option> 
													  <option value="Communication" /> Pôle Communication </option>
													  <option value="Animation" /> Pôle Animation </option>
													  <option value="Bénévolat" /> Pôle Bénévolat </option>
													  <option value="WebMaster" /> Le WebMaster </option>
													  <option value="Direction" /> La Direction </option>
													  <option value="Logistique" /> Service Logistique </option>
													  <option value="Juridique" /> Service Juridique </option>									
													  </select> <em><span style="color:green;">Votre msg lui sera directement envoyé</span></em> <br/><br/><br/> 
		 <label for="objet"> Objet: </label> <input  type="text" name="objet_message" size="65" required="required" value="<?php echo $_POST['objet_message'];?>" /> <br/><br/>											  
		 <label for="fichier"> Joindre un fichier: </label> <input  type="file" name="fichier_joint" size="65" /> <br/><br/>
		 
		 <label for="message">  Votre message: </label> <textarea name="message" rows="10" cols="100" /> <?php echo $_POST['message'];?> </textarea><br/><br/><br/>
           
	<!--  <p style="margin-bottom:20px; text-align:center;"> <input type="submit" name="submit" value="Visualiser" /> <input type="reset" name="reset" value="Effacer" /> </p>-->
	  <p style="margin-bottom:20px; text-align:center;"> <input type="submit" name="valider" value="Envoyer"> <input type="reset" name="abandonner" value="Abandonner"> </p>
	                            
	   </fieldset>
	  
	</form>
</div>

  </div><!--fin de row-->
</div><!--fin de container-->

 <?php get_footer();?>