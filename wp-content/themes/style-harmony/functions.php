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
			'menu_icon'           => 'dashicons-format-gallery',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => [ 'skills' ],
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
			'taxonomies'          => [ 'skills' ],
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
			'menu_icon'           => 'dashicons-awards',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
			// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => [ 'skills' ],
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
		wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Poppins:400,500%7CTeko:300,400,500%7CMaven+Pro:500' );

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
		add_theme_support( 'post-thumbnails', array( 'post', 'slider', 'service' ) );

//		add_theme_support( 'post-formats', $args = array( 'aside', 'gallery', 'video' ) );
		add_image_size( 'slider_thumb', 1920, 850, true );
	}


	/**
	 * Add CSS to admin pages.
	 *
	 * @param string $css String to be added to admin pages.
	 *
	 * @return string
	 */
	function my_admin_css( $css ) {
		$css .= '
        #site-heading a span { color:blue !important; }
        #favorite-actions { display:none; }
     @font-face {
    font-family: "fl-bigmug-line";
    src: url("../fonts/fl-bigmug-line.eot");
    src: url("../fonts/fl-bigmug-line.eot#iefix") format("embedded-opentype"), url("/wp-content/themes/style-harmony/assets/fonts/fl-bigmug-line.woff") format("woff"), url("../fonts/fl-bigmug-line.ttf") format("truetype"), url("../fonts/fl-bigmug-line.svg") format("svg");
    font-weight: normal;
    font-style: normal;
}

.fl-bigmug-line-ico,
[class^="fl-bigmug-line-"]:before, [class*=" fl-bigmug-line-"]:before,
[class^="fl-bigmug-line-"]:after, [class*=" fl-bigmug-line-"]:after {
    font-family: "fl-bigmug-line";
    font-size: inherit;
    font-weight: 400;
    font-style: normal;
}
.box-icon-ruby-icon {
	font-size: 16px;
	line-height: 1;
	display:inline-block;
}


.fl-bigmug-line-add137:before {
    content: "\e000";
}

.fl-bigmug-line-add139:before {
    content: "\e001";
}

.fl-bigmug-line-add149:before {
    content: "\e002";
}

.fl-bigmug-line-airplane86:before {
    content: "\e003";
}

.fl-bigmug-line-alarm31:before {
    content: "\e004";
}

.fl-bigmug-line-arrow592:before {
    content: "\e005";
}

.fl-bigmug-line-attach8:before {
    content: "\e006";
}

.fl-bigmug-line-attachment15:before {
    content: "\e007";
}

.fl-bigmug-line-audio46:before {
    content: "\e008";
}

.fl-bigmug-line-back44:before {
    content: "\e009";
}

.fl-bigmug-line-back46:before {
    content: "\e00a";
}

.fl-bigmug-line-big104:before {
    content: "\e00b";
}

.fl-bigmug-line-book188:before {
    content: "\e00c";
}

.fl-bigmug-line-bookmark28:before {
    content: "\e00d";
}

.fl-bigmug-line-bottle34:before {
    content: "\e00e";
}

.fl-bigmug-line-button5:before {
    content: "\e00f";
}

.fl-bigmug-line-buttons5:before {
    content: "\e010";
}

.fl-bigmug-line-cellphone55:before {
    content: "\e011";
}

.fl-bigmug-line-cellular9:before {
    content: "\e012";
}

.fl-bigmug-line-center10:before {
    content: "\e013";
}

.fl-bigmug-line-chat51:before {
    content: "\e014";
}

.fl-bigmug-line-chat55:before {
    content: "\e015";
}

.fl-bigmug-line-checkmark14:before {
    content: "\e016";
}

.fl-bigmug-line-checkmark15:before {
    content: "\e017";
}

.fl-bigmug-line-checkmark16:before {
    content: "\e018";
}

.fl-bigmug-line-circular220:before {
    content: "\e019";
}

.fl-bigmug-line-circular224:before {
    content: "\e01a";
}

.fl-bigmug-line-circular228:before {
    content: "\e01b";
}

.fl-bigmug-line-circular229:before {
    content: "\e01c";
}

.fl-bigmug-line-clipboard68:before {
    content: "\e01d";
}

.fl-bigmug-line-close42:before {
    content: "\e01e";
}

.fl-bigmug-line-cloud255:before {
    content: "\e01f";
}

.fl-bigmug-line-cloud260:before {
    content: "\e020";
}

.fl-bigmug-line-cocktail26:before {
    content: "\e021";
}

.fl-bigmug-line-code30:before {
    content: "\e022";
}

.fl-bigmug-line-collapse5:before {
    content: "\e023";
}

.fl-bigmug-line-comment45:before {
    content: "\e024";
}

.fl-bigmug-line-compass80:before {
    content: "\e025";
}

.fl-bigmug-line-contract5:before {
    content: "\e026";
}

.fl-bigmug-line-copy23:before {
    content: "\e027";
}

.fl-bigmug-line-crescent23:before {
    content: "\e028";
}

.fl-bigmug-line-cropping1:before {
    content: "\e029";
}

.fl-bigmug-line-cross81:before {
    content: "\e02a";
}

.fl-bigmug-line-cross83:before {
    content: "\e02b";
}

.fl-bigmug-line-cube29:before {
    content: "\e02c";
}

.fl-bigmug-line-double97:before {
    content: "\e02d";
}

.fl-bigmug-line-double98:before {
    content: "\e02e";
}

.fl-bigmug-line-double99:before {
    content: "\e02f";
}

.fl-bigmug-line-down55:before {
    content: "\e030";
}

.fl-bigmug-line-down56:before {
    content: "\e031";
}

.fl-bigmug-line-down58:before {
    content: "\e032";
}

.fl-bigmug-line-down59:before {
    content: "\e033";
}

.fl-bigmug-line-down64:before {
    content: "\e034";
}

.fl-bigmug-line-download136:before {
    content: "\e035";
}

.fl-bigmug-line-download142:before {
    content: "\e036";
}

.fl-bigmug-line-download146:before {
    content: "\e037";
}

.fl-bigmug-line-download147:before {
    content: "\e038";
}

.fl-bigmug-line-download148:before {
    content: "\e039";
}

.fl-bigmug-line-electrical17:before {
    content: "\e03a";
}

.fl-bigmug-line-electronic57:before {
    content: "\e03b";
}

.fl-bigmug-line-email64:before {
    content: "\e03c";
}

.fl-bigmug-line-email67:before {
    content: "\e03d";
}

.fl-bigmug-line-equalization3:before {
    content: "\e03e";
}

.fl-bigmug-line-equalizer26:before {
    content: "\e03f";
}

.fl-bigmug-line-event6:before {
    content: "\e040";
}

.fl-bigmug-line-expand25:before {
    content: "\e041";
}

.fl-bigmug-line-expanding2:before {
    content: "\e042";
}

.fl-bigmug-line-fast33:before {
    content: "\e043";
}

.fl-bigmug-line-favourites5:before {
    content: "\e044";
}

.fl-bigmug-line-file68:before {
    content: "\e045";
}

.fl-bigmug-line-file69:before {
    content: "\e046";
}

.fl-bigmug-line-film57:before {
    content: "\e047";
}

.fl-bigmug-line-flag53:before {
    content: "\e048";
}

.fl-bigmug-line-fog10:before {
    content: "\e049";
}

.fl-bigmug-line-foggy3:before {
    content: "\e04a";
}

.fl-bigmug-line-folder173:before {
    content: "\e04b";
}

.fl-bigmug-line-fork34:before {
    content: "\e04c";
}

.fl-bigmug-line-four87:before {
    content: "\e04d";
}

.fl-bigmug-line-full40:before {
    content: "\e04e";
}

.fl-bigmug-line-games32:before {
    content: "\e04f";
}

.fl-bigmug-line-gear30:before {
    content: "\e050";
}

.fl-bigmug-line-giftbox54:before {
    content: "\e051";
}

.fl-bigmug-line-graphical8:before {
    content: "\e052";
}

.fl-bigmug-line-headphones32:before {
    content: "\e053";
}

.fl-bigmug-line-hot67:before {
    content: "\e054";
}

.fl-bigmug-line-images21:before {
    content: "\e055";
}

.fl-bigmug-line-ink12:before {
    content: "\e056";
}

.fl-bigmug-line-label25:before {
    content: "\e057";
}

.fl-bigmug-line-left144:before {
    content: "\e058";
}

.fl-bigmug-line-left145:before {
    content: "\e059";
}

.fl-bigmug-line-left146:before {
    content: "\e05a";
}

.fl-bigmug-line-left148:before {
    content: "\e05b";
}

.fl-bigmug-line-left152:before {
    content: "\e05c";
}

.fl-bigmug-line-left153:before {
    content: "\e05d";
}

.fl-bigmug-line-left158:before {
    content: "\e05e";
}

.fl-bigmug-line-left159:before {
    content: "\e05f";
}

.fl-bigmug-line-like51:before {
    content: "\e060";
}

.fl-bigmug-line-link52:before {
    content: "\e061";
}

.fl-bigmug-line-list63:before {
    content: "\e062";
}

.fl-bigmug-line-list65:before {
    content: "\e063";
}

.fl-bigmug-line-lock64:before {
    content: "\e064";
}

.fl-bigmug-line-login12:before {
    content: "\e065";
}

.fl-bigmug-line-login9:before {
    content: "\e066";
}

.fl-bigmug-line-map87:before {
    content: "\e067";
}

.fl-bigmug-line-megaphone11:before {
    content: "\e068";
}

.fl-bigmug-line-men25:before {
    content: "\e069";
}

.fl-bigmug-line-menu40:before {
    content: "\e06a";
}

.fl-bigmug-line-menu41:before {
    content: "\e06b";
}

.fl-bigmug-line-microphone76:before {
    content: "\e06c";
}

.fl-bigmug-line-microphone77:before {
    content: "\e06d";
}

.fl-bigmug-line-minus79:before {
    content: "\e06e";
}

.fl-bigmug-line-minus80:before {
    content: "\e06f";
}

.fl-bigmug-line-minus83:before {
    content: "\e070";
}

.fl-bigmug-line-minus86:before {
    content: "\e071";
}

.fl-bigmug-line-monitor74:before {
    content: "\e072";
}

.fl-bigmug-line-music218:before {
    content: "\e073";
}

.fl-bigmug-line-music219:before {
    content: "\e074";
}

.fl-bigmug-line-music221:before {
    content: "\e075";
}

.fl-bigmug-line-musical100:before {
    content: "\e076";
}

.fl-bigmug-line-musical98:before {
    content: "\e077";
}

.fl-bigmug-line-mute34:before {
    content: "\e078";
}

.fl-bigmug-line-new83:before {
    content: "\e079";
}

.fl-bigmug-line-nine16:before {
    content: "\e07a";
}

.fl-bigmug-line-note35:before {
    content: "\e07b";
}

.fl-bigmug-line-notebook41:before {
    content: "\e07c";
}

.fl-bigmug-line-notification4:before {
    content: "\e07d";
}

.fl-bigmug-line-notification5:before {
    content: "\e07e";
}

.fl-bigmug-line-opened25:before {
    content: "\e07f";
}

.fl-bigmug-line-oval34:before {
    content: "\e080";
}

.fl-bigmug-line-paintbrush9:before {
    content: "\e081";
}

.fl-bigmug-line-paper122:before {
    content: "\e082";
}

.fl-bigmug-line-pause37:before {
    content: "\e083";
}

.fl-bigmug-line-pencil85:before {
    content: "\e084";
}

.fl-bigmug-line-phone351:before {
    content: "\e085";
}

.fl-bigmug-line-photo181:before {
    content: "\e086";
}

.fl-bigmug-line-pin42:before {
    content: "\e087";
}

.fl-bigmug-line-planetary2:before {
    content: "\e088";
}

.fl-bigmug-line-play83:before {
    content: "\e089";
}

.fl-bigmug-line-portfolio23:before {
    content: "\e08a";
}

.fl-bigmug-line-print34:before {
    content: "\e08b";
}

.fl-bigmug-line-radio46:before {
    content: "\e08c";
}

.fl-bigmug-line-rain30:before {
    content: "\e08d";
}

.fl-bigmug-line-rectangular78:before {
    content: "\e08e";
}

.fl-bigmug-line-recycling10:before {
    content: "\e08f";
}

.fl-bigmug-line-rewind37:before {
    content: "\e090";
}

.fl-bigmug-line-right139:before {
    content: "\e091";
}

.fl-bigmug-line-right141:before {
    content: "\e092";
}

.fl-bigmug-line-right142:before {
    content: "\e093";
}

.fl-bigmug-line-right144:before {
    content: "\e094";
}

.fl-bigmug-line-right148:before {
    content: "\e095";
}

.fl-bigmug-line-right153:before {
    content: "\e096";
}

.fl-bigmug-line-right154:before {
    content: "\e097";
}

.fl-bigmug-line-right156:before {
    content: "\e098";
}

.fl-bigmug-line-rounded51:before {
    content: "\e099";
}

.fl-bigmug-line-sand14:before {
    content: "\e09a";
}

.fl-bigmug-line-save15:before {
    content: "\e09b";
}

.fl-bigmug-line-search74:before {
    content: "\e09c";
}

.fl-bigmug-line-search78:before {
    content: "\e09d";
}

.fl-bigmug-line-share27:before {
    content: "\e09e";
}

.fl-bigmug-line-shopping198:before {
    content: "\e09f";
}

.fl-bigmug-line-shopping199:before {
    content: "\e0a0";
}

.fl-bigmug-line-shopping202:before {
    content: "\e0a1";
}

.fl-bigmug-line-shopping204:before {
    content: "\e0a2";
}

.fl-bigmug-line-shuffle17:before {
    content: "\e0a3";
}

.fl-bigmug-line-sort47:before {
    content: "\e0a4";
}

.fl-bigmug-line-sort48:before {
    content: "\e0a5";
}

.fl-bigmug-line-speaker75:before {
    content: "\e0a6";
}

.fl-bigmug-line-speaker80:before {
    content: "\e0a7";
}

.fl-bigmug-line-speaker81:before {
    content: "\e0a8";
}

.fl-bigmug-line-speaker86:before {
    content: "\e0a9";
}

.fl-bigmug-line-speaker87:before {
    content: "\e0aa";
}

.fl-bigmug-line-speech96:before {
    content: "\e0ab";
}

.fl-bigmug-line-square152:before {
    content: "\e0ac";
}

.fl-bigmug-line-square156:before {
    content: "\e0ad";
}

.fl-bigmug-line-square160:before {
    content: "\e0ae";
}

.fl-bigmug-line-store10:before {
    content: "\e0af";
}

.fl-bigmug-line-sun81:before {
    content: "\e0b0";
}

.fl-bigmug-line-sunrise3:before {
    content: "\e0b1";
}

.fl-bigmug-line-switch23:before {
    content: "\e0b2";
}

.fl-bigmug-line-switch24:before {
    content: "\e0b3";
}

.fl-bigmug-line-tag47:before {
    content: "\e0b4";
}

.fl-bigmug-line-television20:before {
    content: "\e0b5";
}

.fl-bigmug-line-text108:before {
    content: "\e0b6";
}

.fl-bigmug-line-text109:before {
    content: "\e0b7";
}

.fl-bigmug-line-three142:before {
    content: "\e0b8";
}

.fl-bigmug-line-timer35:before {
    content: "\e0b9";
}

.fl-bigmug-line-tool16:before {
    content: "\e0ba";
}

.fl-bigmug-line-triangle33:before {
    content: "\e0bb";
}

.fl-bigmug-line-trophy55:before {
    content: "\e0bc";
}

.fl-bigmug-line-two311:before {
    content: "\e0bd";
}

.fl-bigmug-line-two316:before {
    content: "\e0be";
}

.fl-bigmug-line-two317:before {
    content: "\e0bf";
}

.fl-bigmug-line-two319:before {
    content: "\e0c0";
}

.fl-bigmug-line-two323:before {
    content: "\e0c1";
}

.fl-bigmug-line-unlocked27:before {
    content: "\e0c2";
}

.fl-bigmug-line-up100:before {
    content: "\e0c3";
}

.fl-bigmug-line-up102:before {
    content: "\e0c4";
}

.fl-bigmug-line-up103:before {
    content: "\e0c5";
}

.fl-bigmug-line-up104:before {
    content: "\e0c6";
}

.fl-bigmug-line-up107:before {
    content: "\e0c7";
}

.fl-bigmug-line-up111:before {
    content: "\e0c8";
}

.fl-bigmug-line-up112:before {
    content: "\e0c9";
}

.fl-bigmug-line-up114:before {
    content: "\e0ca";
}

.fl-bigmug-line-up98:before {
    content: "\e0cb";
}

.fl-bigmug-line-up99:before {
    content: "\e0cc";
}

.fl-bigmug-line-upload91:before {
    content: "\e0cd";
}

.fl-bigmug-line-upload92:before {
    content: "\e0ce";
}

.fl-bigmug-line-upper8:before {
    content: "\e0cf";
}

.fl-bigmug-line-user143:before {
    content: "\e0d0";
}

.fl-bigmug-line-user144:before {
    content: "\e0d1";
}

.fl-bigmug-line-video163:before {
    content: "\e0d2";
}

.fl-bigmug-line-wallet26:before {
    content: "\e0d3";
}

.fl-bigmug-line-weather21:before {
    content: "\e0d4";
}

.fl-bigmug-line-weekly14:before {
    content: "\e0d5";
}

.fl-bigmug-line-weekly15:before {
    content: "\e0d6";
}

.fl-bigmug-line-wind24:before {
    content: "\e0d7";
}

.fl-bigmug-line-window50:before {
    content: "\e0d8";
}

.fl-bigmug-line-winds4:before {
    content: "\e0d9";
}

.fl-bigmug-line-wrench66:before {
    content: "\e0da";
}

.fl-bigmug-line-zoom60:before {
    content: "\e0db";
}   
    ';

		return $css;
	}

	add_filter( 'c2c_add_admin_css', 'my_admin_css' );

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
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function style_symfony_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'style-symfony' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'style-symfony' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'style_symfony_widgets_init' );

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

