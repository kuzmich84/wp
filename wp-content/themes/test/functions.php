<?php

/* Подключение скриптов и стилей */

function test_scripts()
{
    wp_enqueue_style('test-bootstrapcss', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('test-style', get_stylesheet_uri());

    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js');
    wp_enqueue_script('jquery');

    wp_enqueue_script('test-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', false, false, true);
    wp_enqueue_script('test-bootsrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', false, false, true);
}

add_action('wp_enqueue_scripts', 'test_scripts');

/*Регистрирует поддержку новых возможностей темы в WordPress*/


function test_setup()
{
    add_theme_support('post-thumbnails'); //Позволяет устанавливать миниатюру посту.
    add_theme_support('title-tag'); //добавлет title
    add_image_size('my-thumb', 100, 100); //Добавим новые размеры миниатюр
    register_nav_menus(array(
        'header_menu' => 'Меню в шапке',
        'footer_menu' => 'Меню в футере'
    ));
}

add_action('after_setup_theme', 'test_setup');


// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<nav class="navigation" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

// выводим пагинацию
the_posts_pagination(array(
    'end_size' => 2,
));