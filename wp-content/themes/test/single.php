<?php get_header(); ?>

<div class="container">
    <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <!-- post -->

            <div class="col-md-12">
                <div class="card">
                   <?php if ( has_post_thumbnail()): {
                       the_post_thumbnail('large');
                   } ?>
                    <?php else: ?>
                    <div class="card-body">

                        <img src="https://picsum.photos/id/237/200/300" alt="Photo">
                        <?php endif; ?>
                        <h1 class="card-title"><a <?php the_title(); ?></a></h1>
                        <p class="card-text"><?php the_content(); ?></p>

                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    </div>
</div>

<?php get_footer(); ?>