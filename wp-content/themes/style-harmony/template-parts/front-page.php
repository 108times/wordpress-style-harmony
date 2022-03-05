<!--Настройки главной страницы-->
<?php
$page_settings = new WP_Query(
	[
		'post_type'  => 'pages_settings',
		'meta_query' => [
			[
				'meta_key'   => 'ID',
				'meta_value' => '79',
			],
		],
	]
);

$settings = null;
while ( $page_settings->have_posts() ) :
	$page_settings->the_post();
	$settings = get_fields();
endwhile;
wp_reset_postdata();

console_log( $settings, true );
?>
<!-- Слайдер -->
<?php
if ( $settings['show_slider'] === 'Да' ) {
	get_template_part( 'template-parts/front-page',
	                   'slider',
	                   [
		                   'settings' => $settings,
	                   ] );
}
?>
<!-- Услуги -->
<?php
if ( $settings['show_services'] === 'Да' ) {
	get_template_part( 'template-parts/front-page',
	                   'services',
	                   [
		                   'settings' => $settings,
	                   ] );
}
?>
<!-- Преимущества -->
<?php
if ( $settings['show_advantages'] === 'Да' ) {
	get_template_part( 'template-parts/front-page',
	                   'advantages',
	                   [
		                   'settings' => $settings,
	                   ] );
}
?>
<!-- Баннер 1 -->
<?php
if ( $settings['show_banner_1'] === 'Да' ) {
	get_template_part( 'template-parts/front-page',
	                   'banner-1',
	                   [
		                   'settings' => $settings,
	                   ] );
} ?>
<!-- Проекты -->
<?php
if ( $settings['show_projects'] === 'Да' ) {
	get_template_part( 'template-parts/front-page',
	                   'projects',
	                   [
		                   'settings' => $settings,
	                   ] );
}
?>
<!--Калькулятор-->
<?php
if ( $settings['show_calculator'] === 'Да' ) {
	get_template_part( 'template-parts/front-page',
	                   'calculator',
	                   [
		                   'settings' => $settings,
	                   ] );
}
?>
<!-- Отзывы -->
<?php
if ( $settings['show_reviews'] === 'Да' ) {
	get_template_part( 'template-parts/front-page',
	                   'reviews',
	                   [
		                   'settings' => $settings,
	                   ] );
}
?>
<!--Баннер #2-->
<?php
if ( $settings['show_banner_2'] === 'Да' ) {
	get_template_part( 'template-parts/front-page',
	                   'banner-2',
	                   [
		                   'settings' => $settings,
	                   ] );
}
?>
<!--Клиенты-->
<?php
if ( $settings['show_clients'] === 'Да' ) {
	get_template_part( 'template-parts/front-page',
	                   'clients',
	                   [
		                   'settings' => $settings,
	                   ] );
} ?>