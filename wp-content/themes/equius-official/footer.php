<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package equiusofficial
 */

?>

	</div><!-- #content -->

	<footer>
		<div class="footer__content">
			<?php the_custom_logo() ?>
			<p class="type__caption">(415) 382-2500  -  3 Hamilton Landing, Suite 130, Novato CA 94949, USA</p>
			<ul class="social-nav"></ul>
			<p class="type__caption">&copy; <?php echo date('Y'); ?> Equius Partners Inc. All rights reserved.</p>
		</div>
	</footer>

	<!-- <footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'equius-official' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'equius-official' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'equius-official' ), 'equius-official', '<a href="http://www.orlandogwatson.com">Orlando Watson</a>' );
				?>
		</div><!-- .site-info
	</footer> -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
