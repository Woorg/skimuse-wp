<?php $__env->startSection('content'); ?>
  <div class="article article_archive">
    <div class="article__row container flex">

      <div class="article__content content">
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
          // wp_reset_postdata();
          the_posts_pagination();
        ?>

      </div>

      
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-inner-resort-2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>