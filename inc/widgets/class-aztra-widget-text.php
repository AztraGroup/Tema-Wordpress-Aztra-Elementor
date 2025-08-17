<?php
/**
 * Widget de texto simples.
 *
 * @package Aztra
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Aztra_Widget_Text extends Aztra_Widget_Base {
    public function render( $settings = array() ) {
        $content = isset( $settings['content'] ) ? $settings['content'] : '';
        echo '<div class="aztra-widget-text">' . wp_kses_post( $content ) . '</div>';
    }
}
