<?php
/**
 * Template principal do tema.
 *
 * @package Aztra
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    else :
        echo '<p>' . __( 'Nenhum conteúdo encontrado.', 'aztra' ) . '</p>';
    endif; ?>
</main>

<?php get_footer(); ?>
