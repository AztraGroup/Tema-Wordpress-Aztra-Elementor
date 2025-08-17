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
 * Registra opções de personalização do tema.
 *
 * @param WP_Customize_Manager $wp_customize Instância do gerenciador de customização.
 */
function aztra_customize_register( $wp_customize ) {
    // Seção de estilos gerais.
    $wp_customize->add_section(
        'aztra_style_section',
        array(
            'title'       => __( 'Estilos do Tema', 'aztra' ),
            'description' => __( 'Configure cores e tipografia.', 'aztra' ),
            'priority'    => 30,
        )
    );

    // Cor primária.
    $wp_customize->add_setting(
        'aztra_primary_color',
        array(
            'default'           => '#333333',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'aztra_primary_color_control',
            array(
                'label'   => __( 'Cor Primária', 'aztra' ),
                'section' => 'aztra_style_section',
                'settings'=> 'aztra_primary_color',
            )
        )
    );

    // Fonte do corpo.
    $wp_customize->add_setting(
        'aztra_body_font',
        array(
            'default'           => 'Arial, sans-serif',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'aztra_body_font_control',
        array(
            'label'   => __( 'Fonte do Corpo', 'aztra' ),
            'section' => 'aztra_style_section',
            'settings'=> 'aztra_body_font',
            'type'    => 'select',
            'choices' => array(
                'Arial, sans-serif'    => 'Arial',
                'Helvetica, sans-serif'=> 'Helvetica',
                'Georgia, serif'       => 'Georgia',
            ),
        )
    );
}
add_action( 'customize_register', 'aztra_customize_register' );

/**
 * Aplica as opções de cor e tipografia definidas no Customizer.
 */
function aztra_customizer_css() {
    $primary_color = get_theme_mod( 'aztra_primary_color', '#333333' );
    $body_font     = get_theme_mod( 'aztra_body_font', 'Arial, sans-serif' );

    $css  = 'body{font-family:' . esc_attr( $body_font ) . ';color:' . esc_attr( $primary_color ) . ';}';
    $css .= 'a{color:' . esc_attr( $primary_color ) . ';}';

    wp_add_inline_style( 'aztra-style', $css );
}
add_action( 'wp_enqueue_scripts', 'aztra_customizer_css', 20 );

/**
 * Carrega widgets personalizados.
 */
require_once get_template_directory() . '/inc/widgets/class-aztra-widget-base.php';
require_once get_template_directory() . '/inc/widgets/class-aztra-widget-text.php';
require_once get_template_directory() . '/inc/widgets/class-aztra-widget-image.php';

/**
 * Integração com o plugin Aztra Builder.
 */
function aztra_theme_plugin_integration() {
    if ( function_exists( 'aztra_builder_active' ) && aztra_builder_active() ) {
        do_action( 'aztra_builder_loaded' );
    }
}
add_action( 'init', 'aztra_theme_plugin_integration' );
