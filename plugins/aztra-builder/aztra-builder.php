<?php
/**
 * Plugin Name: Aztra Builder
 * Description: Page builder simples para o tema Aztra.
 * Version: 0.1.0
 * Author: Your Name
 * Text Domain: aztra-builder
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AZTRA_BUILDER_VERSION', '0.1.0' );
if ( ! class_exists( 'Aztra_Widget_Text' ) ) {
    require_once get_template_directory() . '/inc/widgets/class-aztra-widget-base.php';
    require_once get_template_directory() . '/inc/widgets/class-aztra-widget-text.php';
}

/**
 * Verifica se o builder está ativo.
 */
function aztra_builder_active() {
    return true; // Em um ambiente real, poderíamos checar dependências aqui.
}

/**
 * Registra menu de administração.
 */
function aztra_builder_admin_menu() {
    add_menu_page(
        __( 'Theme Builder', 'aztra-builder' ),
        __( 'Theme Builder', 'aztra-builder' ),
        'manage_options',
        'aztra-builder',
        'aztra_builder_admin_page',
        'dashicons-layout',
        60
    );
}
add_action( 'admin_menu', 'aztra_builder_admin_menu' );

/**
 * Conteúdo da página de administração.
 */
function aztra_builder_admin_page() {
    echo '<div class="wrap"><h1>Aztra Builder</h1><div id="aztra-builder-root">Arraste e solte componentes aqui.</div></div>';
    wp_enqueue_script( 'aztra-builder-admin', plugins_url( 'admin/js/builder.js', __FILE__ ), array( 'jquery' ), AZTRA_BUILDER_VERSION, true );
    wp_enqueue_style( 'aztra-builder-admin', plugins_url( 'admin/css/builder.css', __FILE__ ), array(), AZTRA_BUILDER_VERSION );
}

/**
 * Shortcode simples para renderizar widgets de texto.
 */
function aztra_builder_shortcode( $atts, $content = '' ) {
    $widget = new Aztra_Widget_Text();
    ob_start();
    $widget->render( array( 'content' => $content ) );
    return ob_get_clean();
}
add_shortcode( 'aztra_text', 'aztra_builder_shortcode' );
