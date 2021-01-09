

<?php
  $title = get_field('title');
?>

<section class="resort-slider">
  <div class="resort-slider__container container">
    <div class="resort-slider__top flex">
      <h2 class="resort-slider__title title"><?php echo e($title); ?></h2>
      <div class="resort-slider__buttons flex">
        <button class="resort-slider__button resort-slider__button_prev">
          <svg class="resort-slider__button-icon" width="20px" height="14px">
            <use xlink:href="<?php echo e(svg_sprite_path()); ?>#arrow-slider"></use>
          </svg>
        </button>

        <button class="resort-slider__button resort-slider__button_next">
          <svg class="resort-slider__button-icon" width="20px" height="14px">
            <use xlink:href="<?php echo e(svg_sprite_path()); ?>#arrow-slider"></use>
          </svg>
        </button>
      </div>

    </div>


    <?php if( have_rows('slider') ): ?>
      <div class="resort-slider__slider swiper-container">
        <div class="swiper-wrapper">

          <?php while( have_rows('slider') ): ?> <?php the_row() ?>
          <?php
            $image       = get_sub_field('image');
            $link        = get_sub_field('link');
            $slide_title = get_sub_field('slide_title');
          ?>

          <div class="resort-slider__slide swiper-slide">
            <a class="resort-slider__link" href="<?php echo e($link); ?>">
              <?php echo wp_get_attachment_image( $image, 'full', false, [ 'class' => 'resort-slider__image swiper-lazy' ] ); ?>


              <span class="resort-slider__name"><?php echo e($slide_title); ?></span>
            </a>
          </div>
          <?php endwhile; ?>

        </div>
      </div>

    <?php endif; ?>


    <button class="resort-slider__more button button_invert loadmore">Show more</button>


  </div>
</section>


