<?php
/**
 * Classe base para widgets Aztra.
 *
 * @package Aztra
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

abstract class Aztra_Widget_Base {
    /**
     * Renderiza o widget.
     */
    abstract public function render( $settings = array() );
}
