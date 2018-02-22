<?php
function generic_metaboxes() {
	// Start with an underscore to hide fields from custom fields list
	global $options;
	$p = $options['prfx'];

	/**
	 * Initiate the metabox
	 */
	if(isset($_GET['post'])){
		$post_id = $_GET['post'];
	} elseif(isset($_POST['post_ID'])){
		$post_id = $_POST['post_ID'];
	} else {
		$post_id='';
	}
	$mpost=get_post($post_id);
	// print_r($post_id);
	//$post_id = get_the_ID() ;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
	// $pt=get_post_type($post_id);
	// $pt=get_current_screen()->post_type;
	// check for a template type
	$cmb_main = new_cmb2_box( array(
		'id'			=> 'modules_metabox',
		'title'		 => __( 'Условия вывода блоков', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on'	   => array( 'key' => 'page-template', 'value' => 'tpl-main.php' ),
		'context'	   => 'normal',
		'priority'	  => 'high',
		'show_names'	=> true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		'closed'	 => true, // Keep the metabox closed by default
	) );
	$cmb_main->add_field( array(
		'name' => __( 'Спрятать блок "Главный слайдер"?', 'spdaks' ),
		'id'   => $p.'mod_slider',
		'type' => 'checkbox'
	) );

	$cmb_main = new_cmb2_box( array(
		'id'            => 'main_metabox',
		'title'         => __( 'Данные для этой страницы', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on'       => array( 'key' => 'page-template', 'value' => 'template-main.php' ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );
	$main_slider = $cmb_main->add_field( array(
		'id'          => $p.'mainslider',
		'type'        => 'group',
		'description' => __( 'Слайды для главного слайдера', 'generic' ),
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => __( 'Элемент {#}', 'generic' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Добавить', 'generic' ),
			'remove_button' => __( 'Удалить', 'generic' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );
	$cmb_main->add_group_field( $main_slider, array(
		'name' => __( 'Изображение', 'generic' ),
		'id'   => 'image',
		'type' => 'file',
		'query_args' => array(
			'type' => array('image/jpeg')
		)
	) );
	$cmb_main->add_field( array(
		'name' => __( 'Описание блока "О нас"', 'generic' ),
		'id'   => $p.'about_descr',
		'type' => 'wysiwyg'
	) );
	$cmb_main->add_field( array(
		'name'    => __( 'Прикрепленные сотрудники', 'generic' ),
		// 'desc'    => __( 'Select which programs to show on this page', 'generic' ),
		'id'      => $p.'attached_staff',
		'type'    => 'custom_attached_posts',
		'options' => array(
			'show_thumbnails' => false, // Show thumbnails on the left
			'filter_boxes'    => false, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 999,
				'post_type'      => 'staff',
			)
		),
	) );
}
