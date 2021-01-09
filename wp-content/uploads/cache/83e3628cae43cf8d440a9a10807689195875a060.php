<?php $__env->startSection('content'); ?>
  <div class="article article_archive">
    <div class="article__row container flex">

      <div class="article__content content">
        <div class="breadcrumbs content__breadcrumbs">
          <?php if(function_exists('yoast_breadcrumb')): ?>
            <?php yoast_breadcrumb() ?>
          <?php endif; ?>
        </div>

        <?php while( have_posts() ): ?> <?php the_post() ?>
        <div class="article__item">
          <a class="article__link" href="<?php echo e(the_permalink()); ?>">
            <?php if(has_post_thumbnail()): ?>
            <div class="article__image-w">
              <?php echo e(the_post_thumbnail('full', [ 'class' => 'article__image swiper-lazy'])); ?>

            </div>
            <?php endif; ?>
            <div class="article__name"><?php echo e(the_title()); ?>

              <svg class="article__name-icon" width="16px" height="16px">
                <use xlink:href="<?php echo e(svg_sprite_path()); ?>#ext-link-arrow"></use>
              </svg>
            </div>
            <div class="article__text"><?php echo e(the_excerpt()); ?></div>
            <div class="article__date"><?php echo e(the_time('d M Y')); ?></div>
          </a></div>
        <?php endwhile; ?>
        <?php
          wp_reset_postdata();
          the_posts_pagination();
        ?>

      </div>

      <aside class="sidebar article__sidebar">
        <div class="sidebar__block sidebar__block_recent">
          <h3 class="sidebar__block-title">Recent Posts</h3>

          <?php
            $args = [
              // 'post_type' => 'post',
              'cat' => 'articles',
              'posts_per_page' => 3,
              'order' => 'DESC',
              'orderby' => 'date'
            ];
            $query = new WP_Query($args);
          ?>

          <?php if($query->have_posts()): ?>
            <ul class="sidebar__list">
              <?php while($query->have_posts()): ?> <?php $query->the_post(); ?>
              <li class="sidebar__item">
                <a class="sidebar__item-link flex" href="<?php echo e(get_the_permalink(get_the_ID())); ?>">
                  <svg class="sidebar__item-icon" width="22px" height="22px">
                    <use xlink:href="<?php echo e(svg_sprite_path()); ?>#recent-posts-icon"></use>
                  </svg>
                  <div class="sidebar__item-title"><?php echo e(get_the_title(get_the_ID())); ?></div>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata() ?>
          <?php endif; ?>
        </div>
      </aside>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-inner-resort-2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>