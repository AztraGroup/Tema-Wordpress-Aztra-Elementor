<?php
/**
 * Funções principais do tema Aztra.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Configurações iniciais do tema.
 */
function aztra_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'aztra' ),
    ) );
}
add_action( 'after_setup_theme', 'aztra_theme_setup' );

/**
 * Carrega scripts e estilos.
 */
function aztra_theme_scripts() {
    wp_enqueue_style( 'aztra-style', get_stylesheet_uri(), array(), '0.1.0' );
    wp_enqueue_style( 'aztra-theme', get_template_directory_uri() . '/assets/css/style.css', array( 'aztra-style' ), '0.1.0' );
    wp_enqueue_script( 'aztra-theme', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), '0.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'aztra_theme_scripts' );

/**
 * Carrega widgets personalizados.
 */
require_once get_template_directory() . '/inc/widgets/class-aztra-widget-base.php';
require_once get_template_directory() . '/inc/widgets/class-aztra-widget-text.php';

/**
 * Integração com o plugin Aztra Builder.
 */
function aztra_theme_plugin_integration() {
    if ( function_exists( 'aztra_builder_active' ) && aztra_builder_active() ) {
        do_action( 'aztra_builder_loaded' );
    }
}
add_action( 'init', 'aztra_theme_plugin_integration' );
