<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- post -->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>

                        <div class="card-body">
                            <?php the_post_thumbnail('my-thumb'); ?>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
                <!-- post navigation -->

                <?php the_posts_pagination(array(
                    'prev_text' => __('« '),
                    'next_text' => __(' »'),
                    'type' => 'list'

                )); ?>
            <?php else: ?>
                <!-- no posts found -->
                <p>Постов нет...</p>
            <?php endif; ?>
        </div>
    </div>


<?php get_footer(); ?>