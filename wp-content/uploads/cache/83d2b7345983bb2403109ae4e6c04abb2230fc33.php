


<?php
  $title = get_field('title');
?>


<section class="country">
  <div class="country__container container">
    <div class="country__top flex">

      <h2 class="country__title title"><?php echo e($title); ?></h2>

      <div class="country__buttons flex">

        <button class="country__button country__button_prev"><svg class="country__button-icon" width="20px" height="14px"><use xlink:href="<?php echo e(svg_sprite_path()); ?>#arrow-slider"></use></svg>
        </button>

        <button class="country__button country__button_next"><svg class="country__button-icon" width="20px" height="14px"><use xlink:href="<?php echo e(svg_sprite_path()); ?>#arrow-slider"></use></svg>
        </button>

      </div>

    </div>

    <?php
      $countries = get_terms( [
        'taxonomy' => 'country',
        'hide_empty' => false,
      ] );

      // var_dump($countries)
    ?>


    <?php if( $countries ): ?>
      <?php
        $i = 0;
      ?>
    <div class="country__slider swiper-container">
      <div class="swiper-wrapper">

        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $i++;
            // var_dump($country);
          ?>
        <div class="country__slide swiper-slide">
          <a class="country__link" href="<?php echo e(get_term_link( $country->term_id, $taxonomy = 'country' )); ?>">
            <svg class="country__flag" width="76px" height="45px">
              <use xlink:href="<?php echo e(svg_sprite_path()); ?>#country-<?php echo e($i); ?>"></use>
            </svg>
            <div class="country__name"><?php echo e($country->name); ?></div>
          </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
      <div class="country__controls flex">
        <div class="country__scrollbar"></div>
      </div>
    </div>
    <?php endif; ?>


  </div>
</section>