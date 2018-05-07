<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Initializr
 * @subpackage initializr_responsive
 * @since Initializr Responsive 1.0
 */
?>       

		<footer id="footer" class="container-fluid">
		   
			<?php if (is_active_sidebar('myfooter')) : ?>
				<div id="myfooter" class="col-xs-12 col-sm-6 col-md-6 col-lg-3" >
					<?php dynamic_sidebar('myfooter'); ?>
				</div>
			<?php endif; ?> 

			<?php if (is_active_sidebar('sidebar-3')) : ?>
				<div id="sidebar-3" class="col-xs-12 col-sm-6 col-md-6 col-lg-3" >
					<?php dynamic_sidebar('sidebar-3'); ?>
				</div>
			<?php endif; ?> 

			<?php if (is_active_sidebar('sidebar-4')) : ?>
				<div id="sidebar-4" class="col-xs-12 col-sm-6 col-md-6 col-lg-3" >
					<?php dynamic_sidebar('sidebar-4'); ?>
				</div>
			<?php endif; ?> 
			
			<?php if (is_active_sidebar('sidebar-5')) : ?>
				<div id="sidebar-5" class="col-xs-12 col-sm-6 col-md-6 col-lg-3" >
					<?php dynamic_sidebar('sidebar-5'); ?>
				</div>
				<?php endif; ?> 
		   

		</footer>
		
		<?php if (is_active_sidebar('rrss')) : ?>
		<div id="rrss" class="col-xs-12">
			<?php dynamic_sidebar('rrss'); ?>
		</div>
		<?php endif; ?> 

		</div><!-- cierra el div que se abre en header para incluir todo el contenido -->
		
		<?php if (has_action('custom_left_sidebar', 'render_custom_left_sidebar')) : ?>
		<?php do_action('custom_left_sidebar', 'render_custom_left_sidebar'); ?>
		<?php elseif (is_active_sidebar('floating-left-sidebar')) : ?>		
		<div class="sb-slidebar sb-left sb-style-overlay">
			<?php dynamic_sidebar('floating-left-sidebar'); ?>
		</div>
		<?php endif; ?> 

		<?php if (is_active_sidebar('floating-right-sidebar')) : ?>
		<div class="sb-slidebar sb-right sb-style-overlay">
			<?php dynamic_sidebar('floating-right-sidebar'); ?>
		</div>
		<?php endif; ?> 

<?php
 
 wp_footer();
 
 do_action( 'custom_footer' );
?>
<?php if (is_active_sidebar('last-script')) : ?>		
	<?php dynamic_sidebar('last-script'); ?>
<?php endif; ?>
</body>
</html>