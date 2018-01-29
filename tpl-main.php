<?php /* Template Name: Главная */ get_header();
global $options, $tpl, $pmeta, $p;
$pmeta=get_post_meta( $post->ID, '', false );

	if (have_posts()): while (have_posts()) : the_post();

		if (empty($pmeta[$p.'mod_slider'][0])) {
			get_template_part( 'assets/php/blocks/block', 'index_top' );
		}
		if (empty($pmeta[$p.'mod_descr_block'][0])) {
			get_template_part( 'assets/php/blocks/block', 'teachers_main' );
		}
		if (empty($pmeta[$p.'mod_adw'][0])) {
			get_template_part( 'assets/php/blocks/block', 'adw' );
		}
		if (empty($pmeta[$p.'mod_courses'][0])) {
			get_template_part( 'assets/php/blocks/block', 'courses' );
		}
		if (empty($pmeta[$p.'mod_register'][0])) {
			get_template_part( 'assets/php/blocks/block', 'register_main' );
		}
		if (empty($pmeta[$p.'mod_ourteachers'][0])) {
			get_template_part( 'assets/php/blocks/block', 'ourteachers' );
		}
		if (empty($pmeta[$p.'mod_reviews'][0])) {
			get_template_part( 'assets/php/blocks/block', 'reviews' );
		}
		if (empty($pmeta[$p.'mod_partners'][0])) {
			get_template_part( 'assets/php/blocks/block', 'partners' );
		}

	endwhile;
	else: ?>
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'spdaks' ); ?></h2>
	</article>
	<?php endif;

get_footer(); ?>
