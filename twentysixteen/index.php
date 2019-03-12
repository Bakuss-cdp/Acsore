<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				
			<?php endif; ?>
					
			<div class="home_element_content"> 
				<div class ="home_slider">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home_Slider'));?>
			  
				</div>
			   
			   
				  <div class ="asile_don_parcours">
			       
					   <div class ="asiledontemoin">
					   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Demander_Asile'));?>
					   </div>
					   
					   <div class ="asiledontemoin">
					   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Fais_Don'));?>
					   </div>
					   
					   <div class ="asiledontemoin">
					   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Parcours'));?>
					   </div>
					   
				 </div> 
	        </div>
			
			<div class="home_element_content_act"> 
	            
				<div class ="nos_activites">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Nos Activites'));?>
			  
			    </div>
				
				    <div class="les_activites"> 
				
						<div class ="activite">
					  
						   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Accueil'));?>
					  
						</div>
						
						<div class ="activite">
					  
						   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Interculture'));?>
					  
						</div>
					   
					   
						
						<div class="activite">
					  
						   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Profession'));?>
					  
						</div>
						
						
						<div class ="activite">
					  
						   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Retour'));?>
					  
						</div>
						
						
						
				
				    </div>
	   
	        </div>
			
  
		<div class="row">	
			<div class="home_element_content"> 
	  
				<div class ="home_actualites">
			         <h2> Les Recentes Actualités </h2>
         
				    <?php 
						global $id_image_une, $l_id_image_une, $id_de_article, $tab_post_id;  
						$tab_image_une;
						$tab_post_id;
						$le_tab_post_id = array();
						$le_tab_image_une = array();
	                 ?> 
                      
					<?php 
					 // Obtenir les trois derniers articles de la catégorie Actualité
						$args = array(
							'posts_per_page'   => 3,
							'order'            => 'DESC',					
							'post_type'        => 'post',
							'category_name' => 'actualites',
							'post_status'      => 'publish'						 
									  );
						
						  $les_posts = get_posts($args);
									
					    foreach($les_posts as $lepost){
						$id_de_article = $lepost -> ID;					
						$id_image_une = get_post_thumbnail_id($id_de_article);                 
						$tab_image_une .= $id_image_une . " ";					
						$tab_post_id .= $id_de_article . " " ;					
												  }
						
						// Passer d'une chaine à un tableau (Id articles et Id images)
						$le_tab_image_une = explode(" ", $tab_image_une);
						$le_tab_post_id = explode(" ", $tab_post_id);

						// Obtenir le dernier ID  des image à la Une					
						$l_id_image_une = (max($le_tab_image_une));
				     ?>
					 
					<?php 					
						// Supprimer dernier indice du tableau avec array_slice(); 							   
						$new_tab_post_id = array_slice($le_tab_post_id, 0, 3);	
					  
																	  							   
						foreach($new_tab_post_id as $article_id){ 
																   
							$info_article = get_post($article_id);
							
								
								 // Formater la date en j/m/a
								$date_publication = $info_article->post_date;
								$date_publication = new DateTime($date_publication);
								$date_publication = date_format($date_publication, 'd F Y');

								
				        if(has_post_thumbnail($article_id) && get_post_thumbnail_id($article_id) == $l_id_image_une):
			        ?>
         
			        <div class="block_gauche">
							<ul>
														
								<li><span class="date_publication"> <?php echo $date_publication; ?></span>
														
								<a href="<?php echo get_the_permalink($article_id);?>"><strong> <?php echo $info_article->post_title; ?> </strong></li></a> 
																
								 <?php $imag_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($article_id));?>                                      
												 <img class="alignleft" src="<?php echo $imag_thumb[0];?>" width="200" height="200">
																	 
								  
								 <li> <?php echo $info_article->post_content; ?> </li> 
							</ul>
		            </div>
					  
	        <?php elseif(is_numeric($l_id_image_une) && (!has_post_thumbnail() || has_post_thumbnail() && get_post_thumbnail_id($article_id) != $l_id_image_une)): ?>
             
				  
				    <div class="block_droite">  
						<ul>				   
							<li> <span class="date_publication"><?php echo $date_publication; ?></span>
											   
							<a href="<?php echo get_the_permalink($article_id);?>"><strong> <?php echo $info_article->post_title; ?> </strong></a></li>

								  <li> <?php  echo $info_article->post_content; ?> </li>  
						</ul>
                      </div>
	        <?php else: ?>
		     
				    <div class="block_horizon">  
						 <ul>
											   
						   <li> <?php echo $date_publication; ?></li>
											   
						   <li><strong> <?php echo $info_article->post_title; ?> </strong></li>

						<li><?php echo $info_article->post_content; ?></li>

						</ul>
				    </div>
               
		     <?php endif; } ?>
                    
		    </div> 
		           <div class ="plus_actualite">
				      <h3> <a href="#"> Retrouver plus d'actualités </a> </h3>
			       </div>		
	   </div>

			<div id="home_element_content_cercles" class="home_element_content"> 
				<div class="home_trois_cercles">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Cours Integration'));?>
			  
			    </div>
				
				<div class="home_trois_cercles">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Talent Culturel'));?>
			  
			    </div>
				
				<div class="home_trois_cercles">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Benevoles'));?>
			  
			    </div>
	   
	        </div>
			
		
		<div class="home_element_content"> 
	  
				<div class="home_evenements">
			  
				   <?php // if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Evenements'));?>
				   
				   <h2> Evenements </h2>
				   
				   <div class ="home_event" id ="home_event_1">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Event_1'));?>
			  
			       </div>
				   
				   <div class ="home_event" id ="home_event_2">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Event_2'));?>
			  
			       </div>
				   
				   
				   <div class ="home_event" id ="home_event_2">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Event_3'));?>
			  
			       </div>
				   
				   
				   <div class ="home_event" id ="home_event_4">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Event_4'));?>
			  
			       </div>
			  
			    </div>	

				<div class="flash_infos">
				   
						 <div class ="flash_info" id="flash_info">
						   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Flash Info'));?>
						 </div>
						 
						 <?php
						 // Les articles de Flash Infos Réseaux
						 $my_posts = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '3', 'category_name' => 'flashinforeseaux'));
	
								if($my_posts->have_posts()) :

								while($my_posts->have_posts()) : $my_posts->the_post(); 
							?>
								<div class="article-flash-info">
								
									 <!--<small><?php //the_time('j F, Y') ?> par <?php // the_author_posts_link() ?></small>-->
								
									<a href="<?php the_permalink()?>"><strong><?php the_title(); ?></strong></a>
									
									<?php  the_excerpt(); ?>
									
								</div>
								
								<?php endwhile; ?>
							<?php else: ?>
								<p>Aucun article trouvé.</p>
								
							<?php endif; 

						      // ------ Fin Info Réseaux --------
						    ?> 
						 
						 
			   </div>
	    </div>
			 
			 
		<?php
			
			endif;
			
		 ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>
