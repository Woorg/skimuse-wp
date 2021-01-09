<?php $__env->startSection('content'); ?>
  <div class="article article_taxonomy">
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
            <div class="article__image-w">
              <?php echo e(the_post_thumbnail('full', ['class' => 'article__image swiper-lazy'])); ?>

            </div>

            <span class="article__name"><?php echo e(the_title()); ?></span>
          </a>
        </div>
        <?php endwhile; ?>
        <?php
          // wp_reset_postdata();
          the_posts_pagination();
        ?>

      </div>

      
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-inner-resort', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>