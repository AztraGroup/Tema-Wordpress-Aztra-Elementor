<?php
/**
 * Template para páginas não encontradas.
 *
 * @package Aztra
 */
get_header();
?>

<main id="primary" class="site-main">
    <h1 class="page-title"><?php esc_html_e( 'Página não encontrada', 'aztra' ); ?></h1>
    <p><?php esc_html_e( 'Desculpe, mas o conteúdo que você procura não existe.', 'aztra' ); ?></p>
</main>
<?php get_footer(); ?>
