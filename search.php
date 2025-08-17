<?php
/**
 * Template para resultados de busca.
 *
 * @package Aztra
 */
get_header();
?>

<main id="primary" class="site-main">
    <header class="page-header">
        <h1 class="page-title"><?php printf( esc_html__( 'Resultados da busca: %s', 'aztra' ), get_search_query() ); ?></h1>
    </header>

    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            echo '<article>'; the_title( '<h2>', '</h2>' ); the_excerpt(); echo '</article>';
        endwhile;
    else :
        echo '<p>' . __( 'Nenhum resultado encontrado.', 'aztra' ) . '</p>';
    endif; ?>
</main>
<?php get_footer(); ?>
