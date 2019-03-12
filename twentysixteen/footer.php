<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			
			<div class="home_element_content_footer"> 
	         
				<div class ="infos_footer">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Liste Partenaires'));?>
			  
			    </div>
			   
			   
				<div class ="infos_footer">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('News Letter'));?>
			  
			    </div>
				
				<div class ="infos_footer">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Nous Contacter'));?>
			  
			    </div>
				
				<div class="infos_footer">
			  
				   <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Nous Retrouver'));?>
			  
			    </div>
	   
	    </div>
			
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>

			<div class="site-info">
				<?php
					/**
					 * Fires before the twentysixteen footer text for footer customization.
					 *
					 * @since Twenty Sixteen 1.0
					 */
					do_action( 'twentysixteen_credits' );
				?>
			<p class="last_text">
				<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>: 1a Place des Orphélins 67000 Strasbourg</span>
				<span class="site-title"> <a href="" >Plan du  site </a></span> <span class="site-title"> <a href="" >Mention légale </a> </span> 
				<p/> 
				<a href="<?php // echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>"><?php // printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
