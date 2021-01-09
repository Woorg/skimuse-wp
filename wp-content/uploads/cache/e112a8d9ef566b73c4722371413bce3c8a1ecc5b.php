


<?php
  $title       = get_field('title');
  $text        = get_field('text');
  $button_text = get_field('button_text');
  $button_link = get_field('button_link');

?>


<section class="hero">
  <?php if( have_rows('slider') ): ?>
  <div class="hero__slider swiper-container">

    <div class="swiper-wrapper">

      <?php while( have_rows('slider') ): ?> <?php the_row() ?>
      <div class="hero__slide swiper-slide">
        <?php
          $image = get_sub_field('image');
        ?>

        <?php echo wp_get_attachment_image( $image, 'full', false , ['class' => 'hero__image swiper-lazy' ] ); ?>


        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
      </div>
      <?php endwhile; ?>

    </div>

  </div>

  <?php endif; ?>

  <div class="hero__w">
    <div class="hero__container container">
      <div class="hero__content">

        <?php if($title): ?>
        <h1 class="hero__title"><?php echo e($title); ?></h1>
        <?php endif; ?>

        <?php if($text): ?>
        <div class="hero__text">
          <?php echo $text; ?>

        </div>
        <?php endif; ?>

        <?php if($button_text): ?>
        <a class="hero__call-to-action open-popup button" href="<?php echo e($button_link); ?>"><?php echo e($button_text); ?></a>
        <?php endif; ?>


      </div>

    </div>
  </div>


  <?php if( have_rows('slider') ): ?>
  <div class="hero__thumbs-w">
    <div class="hero__thumbs swiper-container">
      <div class="swiper-wrapper">

        <?php while( have_rows('slider') ): ?> <?php the_row() ?>
          <?php
            $image        = get_sub_field('image');
            $slider_title = get_sub_field('slider_title');
          ?>

        <div class="hero__thumb swiper-slide">
          <a class="hero__thumb-w" href="">
            <?php echo wp_get_attachment_image( $image, 'medium', false , ['class' => 'hero__thumb-image swiper-lazy' ] ); ?>

            <span class="hero__thumb-title"><?php echo e($slider_title); ?></span>
            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
          </a>

        </div>
        <?php endwhile; ?>

      </div>
    </div>


    <div class="hero__controls flex">

      <div class="hero__buttons flex">
        <button class="hero__button hero__button_prev"><svg class="hero__button-icon" width="12px" height="9px"><use xlink:href="<?php echo e(svg_sprite_path()); ?>#arrow-hero"></use></svg>
        </button>

        <button class="hero__button hero__button_next"><svg class="hero__button-icon" width="12px" height="9px"><use xlink:href="<?php echo e(svg_sprite_path()); ?>#arrow-hero"></use></svg>
        </button>

      </div>

      <div class="hero__scrollbar"></div>
      <div class="hero__counter"></div>
    </div>

  </div>
  <?php endif; ?>

</section>