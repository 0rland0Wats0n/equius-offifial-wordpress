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
			<?php the_custom_logo() ?>
			<p class="type__caption">(415) 382-2500  -  3 Hamilton Landing, Suite 130, Novato CA 94949, USA</p>
			<ul class="social-nav"></ul>
			<p class="type__caption">&copy; <?php echo date('Y'); ?> Equius Partners Inc. All rights reserved.</p>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
