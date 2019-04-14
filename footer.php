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
		<?php get_template_part( 'template-parts/widgets/mailing',  'list-plus' ); ?>
		<div class="footer__content">
			<span>
				<a href="<?php echo get_home_url() ?>" class="custom-logo-link" rel="home" itemprop="url">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo_footer.svg' ?>" class="custom-logo"/>	
				</a>
				<p class="type__caption">(415) 382-2500  -  3 Hamilton Landing, Suite 130, Novato CA 94949, USA</p>
			</span>
			<p class="type__caption">&copy; <?php echo date('Y'); ?> Equius Partners Inc. All rights reserved.</p>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
