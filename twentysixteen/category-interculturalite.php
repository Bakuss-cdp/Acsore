<?php
/**
* A Simple Category Template
*/
get_header(); ?>

<section id="primary" class="site-content">

		<script type ="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
		  $(".contenu_infos").hide();
			$("h2").mouseenter(function(){
				$(this).css("cursor", "pointer")
			});
			  $("h2").click(function(){
				$(this).next().slideToggle("slow");
		  });
		});
		</script>

    <div id="content" role="main" class="cat_interculturalite ">
			<?php
			if ( have_posts() ) : ?>

			<header class="archive-header">
				<h1 class="archive-title">Acsore et InterCulturalités</h1>
			</header>

			<div class="groupe_articles">
				<div class="row"> <!--Début de 1ère colonne-->
				<div class="col-sm-2">
				</div>
					<div class="col-sm-8">
						<?php
						// The Loop
						while ( have_posts() ) : the_post(); ?>
						<div class="block_actualites">
								<h2><a href="#" title="Actualité <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

							<div class="contenu_infos">
								<small><?php the_time('j F, Y') ?> <strong>par Richard D.</strong><?php //the_author_posts_link() ?></small>

								<div class="entry">
									<?php 
										$attachments = get_children( array(
													'post_parent'    => get_the_ID(),
													'post_type'      => 'attachment',
													'numberposts'    => 1, // show all -1
													'post_status'    => 'inherit',
													'post_mime_type' => 'image',
													'order'          => 'ASC',
													'orderby'        => 'menu_order ASC'
													) );
										foreach ( $attachments as $attachment_id => $attachment ) 
										{
											echo wp_get_attachment_image( $attachment_id );
											
										}
									?>
									
									<?php  the_excerpt(); ?>
							    </div>
							</div>
					    </div><!-- Fin de block_actualités -->
						<?php endwhile;
						?>
					</div><!-- Fin de col-sm-6 -->
                     <div class="col-sm-2">
				     </div>
					<!-- Add the pagination functions here. -->
					
                
				
					<div class="pages_articles">
						<?php next_posts_link( 'Voir Activités Suivantes ' ); ?> <?php previous_posts_link( 'Voir Activités Précedentes' ); ?>
					</div>
				</div><!-- Fin de row -->
					
					<?php
					else: ?>

					<p>Désolé, il y'a pas d'article pour cette catégorie </p>

					<?php endif; ?>

			</div><!-- Fin de groupe_articles -->
    </div> <!-- Fin cat_Interculturalité -->                                        
</section>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>



