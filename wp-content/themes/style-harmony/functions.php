<?php
/**
 * Style Symfony functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Style_Symfony
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function style_symfony_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Style Symfony, use a find and replace
		* to change 'style-symfony' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'style-symfony', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );


	add_action( 'init', 'register_post_types' );
	function register_post_types() {

		register_post_type( 'pages_settings', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Настройки страниц',
				// основное название для типа записи
				'singular_name'      => 'Настройка страницы',
				// название для одной записи этого типа
				'add_new'            => 'Добавить настройку страницы',
				// для добавления новой записи
				'add_new_item'       => 'Добавление настройки страницы',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование настройки страницы',
				// для редактирования типа записи
				'new_item'           => 'Новая настройка страницы',
				// текст новой записи
				'view_item'          => 'Смотреть настройку страницы',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать настройку страницы',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Настройки страниц',
				// название меню
			],
			'description'         => 'Настройки для разных страниц',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-text-page',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => [],
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );


		/*
		register_taxonomy( 'slider-position', [ 'slider' ], [
			'label'              => '',
			// определяется параметром $labels->name
			'labels'             => [
				'name'                       => 'Категории',
				'singular_name'              => 'Категория',

				// название для одной записи этого типа
				'add_new'            => 'Добавить категорию',
				// для добавления новой записи
				'add_new_item'       => 'Добавление категории',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование категории',
				// для редактирования типа записи
				'new_item'           => 'Новая категория',
				// текст новой записи
				'view_item'          => 'Смотреть категорию',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать категорию',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Ктегория',
				// название меню
			],
			'description'        => 'Расположение слайдера',
			// описание таксономии
			'public'             => true,

			'publicly_queryable' => true,
			// равен аргументу public
			'show_in_admin_bar'   => true,

			'show_in_rest'        => true,

			'hierarchical' => false,

			'rewrite' => true,

		] );
		*/

		register_post_type( 'slider', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Слайы',
				'singular_name'      => 'Слайд',

				// название для одной записи этого типа
				'add_new'            => 'Добавить слайд',
				// для добавления новой записи
				'add_new_item'       => 'Добавление слайда',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование слайда',
				// для редактирования типа записи
				'new_item'           => 'Новый слайд',
				// текст новой записи
				'view_item'          => 'Смотреть слайд',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать слайд',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Слайдер',
				// название меню
			],
			'description'         => 'Это слайдер на главной',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-slides',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );


		register_post_type( 'service', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Услуги',
				// основное название для типа записи
				'singular_name'      => 'Услуга',
				// название для одной записи этого типа
				'add_new'            => 'Добавить услугу',
				// для добавления новой записи
				'add_new_item'       => 'Добавление услуги',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование услуги',
				// для редактирования типа записи
				'new_item'           => 'Новая услуга',
				// текст новой записи
				'view_item'          => 'Смотреть услугу',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать услугу',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Услуги',
				// название меню
			],
			'description'         => 'Услуги',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-building',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => [],
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );


		register_post_type( 'advantage', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Преимущества',
				'singular_name'      => 'Преимущество',

				// название для одной записи этого типа
				'add_new'            => 'Добавить преимущество',
				// для добавления новой записи
				'add_new_item'       => 'Добавление преимущества',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование преимущества',
				// для редактирования типа записи
				'new_item'           => 'Новое преимущество',
				// текст новой записи
				'view_item'          => 'Смотреть преимущество',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать преимущество',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Преимущества',
				// название меню
			],
			'description'         => 'Преимущества на главной',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-awards',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );

		register_post_type( 'banner', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Баннеры',
				'singular_name'      => 'Баннер',

				// название для одной записи этого типа
				'add_new'            => 'Добавить баннер',
				// для добавления новой записи
				'add_new_item'       => 'Добавление баннера',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование баннера',
				// для редактирования типа записи
				'new_item'           => 'Новый баннер',
				// текст новой записи
				'view_item'          => 'Смотреть баннер',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать баннер',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Баннеры',
				// название меню
			],
			'description'         => 'Баннеры',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-align-center',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );

		register_post_type( 'project', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Проекты',
				'singular_name'      => 'Проект',

				// название для одной записи этого типа
				'add_new'            => 'Добавить проект',
				// для добавления новой записи
				'add_new_item'       => 'Добавление проекта',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование проекта',
				// для редактирования типа записи
				'new_item'           => 'Новый проект',
				// текст новой записи
				'view_item'          => 'Смотреть проект',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать проект',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Проекты',
				// название меню
			],
			'description'         => 'Проекты',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-format-aside',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );

		register_post_type( 'review', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Отзывы',
				'singular_name'      => 'Отзыв',

				// название для одной записи этого типа
				'add_new'            => 'Добавить отзыв',
				// для добавления новой записи
				'add_new_item'       => 'Добавление отзыва',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование отзыва',
				// для редактирования типа записи
				'new_item'           => 'Новый отзыв',
				// текст новой записи
				'view_item'          => 'Смотреть отзыв',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать отзыв',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Отзывы',
				// название меню
			],
			'description'         => 'Отзывы',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-admin-comments',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );

		register_post_type( 'client', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Клиенты',
				'singular_name'      => 'Клиент',

				// название для одной записи этого типа
				'add_new'            => 'Добавить клиента',
				// для добавления новой записи
				'add_new_item'       => 'Добавление клиента',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование клиента',
				// для редактирования типа записи
				'new_item'           => 'Новый клиент',
				// текст новой записи
				'view_item'          => 'Смотреть клиента',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать клиента',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Клиенты',
				// название меню
			],
			'description'         => 'Клиенты',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-admin-users',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );
		register_post_type( 'contact_info', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Контактная информация',
				'singular_name'      => 'Контактная информация',

				// название для одной записи этого типа
				'add_new'            => 'Добавить',
				// для добавления новой записи
				'add_new_item'       => 'Добавление',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование',
				// для редактирования типа записи
				'new_item'           => 'Новый объект',
				// текст новой записи
				'view_item'          => 'Смотреть',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Контактная информация',
				// название меню
			],
			'description'         => 'Контактная информация',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-phone',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );
		register_post_type( 'gallery', [
			'label'               => NULL,
			'labels'              => [
				'name'               => 'Галлерея',
				'singular_name'      => 'Галлерея',

				// название для одной записи этого типа
				'add_new'            => 'Добавить изображение',
				// для добавления новой записи
				'add_new_item'       => 'Добавление',
				// заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Редактирование',
				// для редактирования типа записи
				'new_item'           => 'Новый объект',
				// текст новой записи
				'view_item'          => 'Смотреть',
				// для просмотра записи этого типа.
				'search_items'       => 'Искать',
				// для поиска по этим типам записи
				'not_found'          => 'Не найдено',
				// если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Не найдено в корзине',
				// если не было найдено в корзине
				'parent_item_colon'  => '',
				// для родителей (у древовидных типов)
				'menu_name'          => 'Галлерея',
				// название меню
			],
			'description'         => 'Галлерея',
			'public'              => true,
			'publicly_queryable'  => true,
			// зависит от public
			'exclude_from_search' => false,
			// зависит от public
			'show_ui'             => true,
			// зависит от public
			'show_in_nav_menus'   => true,
			// зависит от public
			'show_in_menu'        => true,
			// показывать ли в меню адмнки
			'show_in_admin_bar'   => true,
			// зависит от show_in_menu
			'show_in_rest'        => true,
			// добавить в REST API. C WP 4.7
			'rest_base'           => NULL,
			// $post_type. C WP 4.7
			'menu_position'       => 4,
			'menu_icon'           => 'dashicons-phone',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		] );

	}


	add_action( 'wp_enqueue_scripts', 'get_theme_styles' );

	function get_theme_styles() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array() );
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Poppins:400,500%7CMaven+Pro:500' );

		wp_enqueue_style( 'theme-fonts', get_template_directory_uri() . '/assets/css/fonts.css' );


		wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/style.css', array( 'bootstrap' ) );
	}

	add_action( 'wp_footer', 'get_theme_scripts' );


	function get_theme_scripts() {
		wp_enqueue_script( 'core', get_template_directory_uri() . '/assets/js/core.min.js', [], NULL, true );
		wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/js/script.js', [], NULL, true );
	}

	add_action( 'after_setup_theme', 'theme_register_nav_menu' );
	function theme_register_nav_menu() {
		register_nav_menu( 'header-menu', 'Меню в шапке' );
		add_theme_support( 'post-thumbnails', array( 'post', 'slider', 'service', 'banner', 'project', 'review', 'client') );

//		add_theme_support( 'post-formats', $args = array( 'aside', 'gallery', 'video' ) );
		add_image_size( 'slider_thumb', 1920, 850, true );
	}



	add_action( 'widgets_init', 'register_my_widgets' );
	function register_my_widgets(){
		register_sidebar( array(
			                  'name'          => "Сайдбар в меню",
			                  'id'            => "main-sidebar",
			                  'description'   => '',
			                  'class'         => '',
			                  'before_widget' => '<li style="list-style:none ;">',
			                  'after_widget'  => "</li>\n",
			                  'before_title'  => '<div class="rd-navbar-project-modern-header"><h4 class="rd-navbar-project-modern-title">',
			                  'after_title'   => '</h4>
                    <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                      <div class="project-close"><span></span><span></span></div>
                    </div>
                  </div>',
			                  'before_sidebar' => '', // WP 5.6
			                  'after_sidebar'  => '', // WP 5.6
		                  ) );
	}

	@require 'admin-part-customizations/link_with_icon_widget.php';
	@require 'admin-part-customizations/add_bigmug_line_icons_to_admin.php';


	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'style-symfony' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'style_symfony_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

add_action( 'after_setup_theme', 'style_symfony_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function style_symfony_content_width() {
	$GLOBALS[ 'content_width' ] = apply_filters( 'style_symfony_content_width', 640 );
}

add_action( 'after_setup_theme', 'style_symfony_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function style_symfony_scripts() {
	wp_enqueue_style( 'style-symfony-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'style-symfony-style', 'rtl', 'replace' );

	wp_enqueue_script( 'style-symfony-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'style_symfony_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


require get_template_directory() . '/tgm/style-symfony.php';

function console_log( $value, $jsonify = false ) {
	$string = '`' . $value . '`';
	if ( $jsonify ) {
		$value  = json_encode( str_replace('"', "'", $value ) );
		$string = 'JSON.parse(`' . $value . '`.replaceAll("\n", ""))';
	}
	echo '<script>console.log(' . $string . ')</script>';
}
