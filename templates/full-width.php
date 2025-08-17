<?php
/**
 * Template de página em largura total.
 *
 * Template Name: Largura Total
 *
 * @package Aztra
 */

get_header(); ?>

<div class="aztra-full-width">
    <?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
</div>

<?php get_footer(); ?>
