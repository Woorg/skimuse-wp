

<?php
  $title = get_field('title');
?>

<section class="blog-slider">
  <div class="blog-slider__container container">

    <div class="blog-slider__top flex">
      <h2 class="blog-slider__title title"><?php echo e($title); ?></h2>
      <div class="blog-slider__buttons flex">
        <button class="blog-slider__button blog-slider__button_prev">
          <svg class="blog-slider__button-icon" width="20px" height="14px">
            <use xlink:href="<?php echo e(svg_sprite_path()); ?>#arrow-slider"></use>
          </svg>
        </button>
        <button class="blog-slider__button blog-slider__button_next">
          <svg class="blog-slider__button-icon" width="20px" height="14px">
            <use xlink:href="<?php echo e(svg_sprite_path()); ?>#arrow-slider"></use>
          </svg>
        </button>
      </div>
    </div>

    <?php
      $args = [
        'post_type' => 'post',
        'cat' => 'articles',
        'posts_per_page' => 4,
        'order' => 'DESC',
        'orderby' => 'date'
      ];

      $query = new WP_Query($args);
    ?>


    <?php if( $query->have_posts() ): ?>
      <div class="blog-slider__slider swiper-container">
        <div class="swiper-wrapper">
          <?php while( $query->have_posts() ): ?> <?php $query->the_post() ?>
          <div class="blog-slider__slide swiper-slide">
            <a class="blog-slider__link" href="<?php echo e(the_permalink()); ?>">
              <div class="blog-slider__image-w">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'full', ['class' => 'blog-slider__image swiper-lazy']); ?>

              </div>
              <div class="blog-slider__name"><?php echo e(the_title()); ?>

                <svg class="blog-slider__name-icon" widt
                     h="16px" height="16px">
                  <use xlink:href="<?php echo e(svg_sprite_path()); ?>#ext-link-arrow"></use>
                </svg>
              </div>
              <div class="blog-slider__text"><?php echo e(the_excerpt()); ?></div>
              <div class="blog-slider__date"><?php echo e(the_time('d M Y')); ?></div>
            </a>
          </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata() ?>

        </div>
        <div class="blog-slider__controls flex">
          <div class="blog-slider__scrollbar"></div>
        </div>
        <?php endif; ?>

      </div>


</section>
