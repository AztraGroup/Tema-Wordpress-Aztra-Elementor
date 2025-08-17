<?php
/**
 * Widget de imagem simples.
 *
 * @package Aztra
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Aztra_Widget_Image extends Aztra_Widget_Base {
    public function render( $settings = array() ) {
        $url = isset( $settings['url'] ) ? esc_url( $settings['url'] ) : '';
        $alt = isset( $settings['alt'] ) ? esc_attr( $settings['alt'] ) : '';
        if ( $url ) {
            echo '<div class="aztra-widget-image"><img src="' . $url . '" alt="' . $alt . '"></div>';
        }
    }
}
