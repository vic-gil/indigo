<?php
/**
 * Parte de la plantilla para mostrar una tarjeta con formato BI
 *
 * @package Capital Media
 * @subpackage Reporte Indigo
 * @since Reporte Indigo 3.0.0
 */
$args = wp_parse_args($args, [ 'class' => '' ]);
$tema = get_the_terms( get_the_ID(), 'ri-tema' );
?>
<div class="bi-card <?=$args['class'];?>">
    <article itemtype="http://schema.org/Article">
        <figure itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <picture>
                    <?php the_post_thumbnail("large"); ?>
                </picture>
            </a>
        </figure>
        <div class="entry-data">
            <?php
            if( ! empty($tema) ) : $tema = $tema[0]
                ?>
                <div class="entry-category">
                    <h2>
                        <a href="<?=get_term_link($tema);?>" title="<?=$tema->name;?>">
                            <?=$tema->name;?>
                        </a>
                    </h2>
                </div>
            <?php
            endif;
            ?>
            <div class="entry-title">
                <h3>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_title();?>
                    </a>
                </h3>
            </div>
            <div class="entry-excerpt">
                <?php the_excerpt(); ?>
            </div>
            <address itemprop="author" itemscope="" itemtype="http://schema.org/Person" rel="author">
                <?php the_author_posts_link();?>
            </address>
        </div>
    </article>
</div>