<?php
// register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
// register_taxonomy_for_object_type('post_tag', 'html5-blank');
register_post_type('advantages', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Advantages', 'generic'), // Rename these to suit
		'singular_name' => __('Advantage', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		'editor',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-universal-access-alt',
	'menu_position'	   => 5,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
register_post_type('teacher', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Teachers', 'generic'), // Rename these to suit
		'singular_name' => __('Teacher', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		'editor',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-welcome-learn-more',
	'menu_position'	   => 5,
	'publicly_queryable'  => false,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
register_post_type('artist', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Artists', 'generic'), // Rename these to suit
		'singular_name' => __('Artist', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		// 'editor',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-admin-users',
	'menu_position'	   => 5,
	'publicly_queryable'  => false,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
register_post_type('schoolcourses', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('School courses', 'generic'), // Rename these to suit
		'singular_name' => __('School course', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		'editor',
		'thumbnail',
		'page-attributes'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-editor-expand',
	'menu_position'	   => 5,
	'publicly_queryable'  => true,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
register_post_type('team', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Team members', 'generic'), // Rename these to suit
		'singular_name' => __('Team member', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		// 'editor',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-admin-users',
	'menu_position'	   => 5,
	'publicly_queryable'  => false,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
register_post_type('photo', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Photos', 'generic'), // Rename these to suit
		'singular_name' => __('Photo', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-camera',
	'menu_position'	   => 5,
	'publicly_queryable'  => false,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
register_post_type('video', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Videos', 'generic'), // Rename these to suit
		'singular_name' => __('Video', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-video-alt',
	'menu_position'	   => 5,
	'publicly_queryable'  => false,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
register_post_type('kursi', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Courses', 'generic'), // Rename these to suit
		'singular_name' => __('Course', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => false,
	'supports' => array(
		'title',
		'editor',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-welcome-learn-more',
	'menu_position'	   => 7,
	'publicly_queryable'  => true,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
// register_post_type('program', // Register Custom Post Type
//	 array(
//	 'labels' => array(
//		 'name' => __('Обучающая программа', 'generic'), // Rename these to suit
//		 'singular_name' => __('Обучающая программа', 'generic'),
//		 'add_new' => __('Add', 'generic'),
//		 'add_new_item' => __('Add element', 'generic'),
//		 'edit' => __('Edit', 'generic'),
//		 'edit_item' => __('Edit element', 'generic'),
//		 'new_item' => __('New element', 'generic'),
//		 'view' => __('Review', 'generic'),
//		 'view_item' => __('Review element', 'generic'),
//		 'search_items' => __('Search', 'generic'),
//		 'not_found' => __('Не найдены elementы', 'generic'),
//		 'not_found_in_trash' => __('Не найден ни один element в корзине', 'generic')
//	 ),
//	 'public' => true,
//	 'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
//	 'has_archive' => false,
//	 'supports' => array(
//		 'title',
// 		'excerpt',
//		 'thumbnail'
//	 ), // Go to Dashboard Custom HTML5 Blank post for supports
//	 'can_export' => true, // Allows export in Tools > Export
// 	'menu_icon'		   => 'dashicons-media-text',
// 	'menu_position'	   => 5,
// 	'publicly_queryable'  => false,
//	 // 'taxonomies' => array(
//	 //	 // 'post_tag',
//	 //	 // 'category'
//	 // ) // Add Category and Post Tags support
// ));
register_taxonomy('type', 'review',
	array(
	'labels' => array(
		'name' => __('Types', 'generic'), // Rename these to suit
		'singular_name' => __('Type', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true
));
register_taxonomy_for_object_type('type', 'review');
register_post_type('review', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Reviews', 'generic'), // Rename these to suit
		'singular_name' => __('Review', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => true,
	'supports' => array(
		'title',
		'editor',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-exerpt-view',
	'menu_position'	   => 5,
	'publicly_queryable'  => true,
	'rewrite' => array('slug' => 'otzivy'),
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
register_post_type('project', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Projects', 'generic'), // Rename these to suit
		'singular_name' => __('Project', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => true,
	'supports' => array(
		'title',
		'editor',
		'excerpt',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-archive',
	'menu_position'	   => 6,
	'publicly_queryable'  => true,
	'rewrite' => array('slug' => 'proekty'),
	// 'show_in_nav_menus' => true,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
register_post_type('production', // Register Custom Post Type
	array(
	'labels' => array(
		'name' => __('Production', 'generic'), // Rename these to suit
		'singular_name' => __('Production', 'generic'),
		'add_new' => __('Add', 'generic'),
		'add_new_item' => __('Add element', 'generic'),
		'edit' => __('Edit', 'generic'),
		'edit_item' => __('Edit element', 'generic'),
		'new_item' => __('New element', 'generic'),
		'view' => __('Review', 'generic'),
		'view_item' => __('Review element', 'generic'),
		'search_items' => __('Search', 'generic'),
		'not_found' => __('Nothing found', 'generic'),
		'not_found_in_trash' => __('Nothing found in trash', 'generic')
	),
	'public' => true,
	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
	'has_archive' => true,
	'supports' => array(
		'title',
		'editor',
		'excerpt',
		'thumbnail'
	), // Go to Dashboard Custom HTML5 Blank post for supports
	'can_export' => true, // Allows export in Tools > Export
	'menu_icon'		   => 'dashicons-video-alt2',
	'menu_position'	   => 7,
	'publicly_queryable'  => true,
	// 'rewrite' => array('slug' => 'proekty'),
	// 'show_in_nav_menus' => true,
	// 'taxonomies' => array(
	//	 // 'post_tag',
	//	 // 'category'
	// ) // Add Category and Post Tags support
));
