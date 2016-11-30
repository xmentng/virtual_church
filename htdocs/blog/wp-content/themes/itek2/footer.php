
</div>
</div><!-- #page -->

<?php do_action( 'itek_before_footer_nav' ); ?>
    <?php if ( has_nav_menu( 'footer' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
        <?php get_template_part( 'nav-footer' ); 
    endif; // End check for menu. ?>
<?php do_action( 'itek_after_footer_nav' ); ?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<?php do_action( 'itek_in_before_colophon' ); ?>
		<div class="site-info">
		<div class="container">
			<?php do_action( 'itek_before_credits' ); ?>
			<?php printf( __( 'Proudly Powered By', '' ) ); ?><a target="_Blank" href="<?php echo esc_url( __( 'http://wordpress.org/', '' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'itek' ); ?>"><?php printf( __( ' %s', 'itek' ), 'IMM!' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'BLW', '' ) ); ?><a target="_blank" href="<?php echo esc_url( __( 'http://www.wpstrapcode.com/blog/itek', '' ) ); ?>"><?php printf( __( ' ', '' ), 'iTek' ); ?></a><?php printf( __( ' aka %s', 'itek' ), 'ChristEmbassy Internetional!' ); ?>
		<?php do_action( 'itek_after_credits' ); ?>
	    </div>
	    </div><!-- .site-info -->
<?php do_action( 'itek_in_after_colophon' ); ?>
</footer><!-- #colophon -->
<?php do_action( 'itek_below_footer' ); ?>
	
	<?php wp_footer(); ?>
	</body>
</html>