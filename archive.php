<?php
/**
 * Template para arquivos (categorias, tags, etc.).
 *
 * @package Aztra
 */
get_header();
?>

<main id="primary" class="site-main">
    <header class="page-header">
        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
        <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
    </header>

    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            echo '<article>'; the_title( '<h2>', '</h2>' ); the_excerpt(); echo '</article>';
        endwhile;
    else :
        echo '<p>' . __( 'Nenhum conteúdo encontrado.', 'aztra' ) . '</p>';
    endif; ?>
</main>
<?php get_footer(); ?>
