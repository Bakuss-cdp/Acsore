<?php
/*
Template Name: connexion membre
*/
?>


<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
        ?>
		   
    <div class="entry-content">
	
	    <h1 class="entry-title">Se Connecter en tant que Membre</h1>
		     

		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<fieldset style="width:95%; border:1px solid #CECECE; height:300px;">
					<legend style="color:#0071ba;"> Se Connecter et accéder l'espace membre</legend>
					<p> <?php wp_login_form(); ?></p>
					</fieldset>
				</div>

				<div class="col-sm-4">
					<h4> Je n'ai pas de compte </h4>
					<p>
					 Je veux devenir membre de Acsore, donc je m'<a href="http://acsore.org/devenir-membre/">inscris </a>
					</p>
				</div>

			</div>
		</div>

    </div><!-- .entry-content -->

		<?php	
			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php /* get_sidebar( 'content-bottom' ); */ ?>

</div><!-- .content-area -->

<?php /*get_sidebar(); */ ?>
<?php get_footer(); ?>
