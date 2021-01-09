<div class="resort">
  <div class="resort__top">
    <?php if(has_post_thumbnail()): ?>
      <div class="resort__image">
        <?php echo e(the_post_thumbnail('full')); ?>

      </div>
    <?php endif; ?>
    <div class="resort__specs">
      <div class="resort__container container flex">
        <div class="resort__specs-item resort__specs-item_info">
          <div class="resort__specs-title">Information</div>

          <?php $resort_stars = get_field('resort_stars') ?>

          <?php switch($resort_stars):
            case (1): ?>
            <div class="resort__stars rating" aria-label="1 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
            </div>
            <?php break; ?>

            <?php case (2): ?>
            <div class="resort__stars rating" aria-label="2 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
            </div>
            <?php break; ?>

            <?php case (3): ?>
            <div class="resort__stars rating" aria-label="3 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
            </div>
            <?php break; ?>

            <?php case (4): ?>
            <div class="resort__stars rating" aria-label="4 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star"></div>
            </div>
            <?php break; ?>

            <?php case (5): ?>
            <div class="resort__stars rating" aria-label="5 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
            </div>
            <?php break; ?>


            

          <?php endswitch; ?>


          <?php $resort_cost = get_field('resort_cost') ?>

          <?php switch($resort_cost):
            case (1): ?>
            <div class="resort__cost cost" aria-label="1 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
            </div>
            <?php break; ?>

            <?php case (2): ?>
            <div class="resort__cost cost" aria-label="2 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
            </div>
            <?php break; ?>

            <?php case (3): ?>
            <div class="resort__cost cost" aria-label="3 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
            </div>
            <?php break; ?>

            <?php case (4): ?>
            <div class="resort__cost cost" aria-label="4 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star"></div>
            </div>
            <?php break; ?>

            <?php case (5): ?>
            <div class="resort__cost cost" aria-label="5 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
            </div>
            <?php break; ?>

            

          <?php endswitch; ?>

          <?php
            $resort_status = get_field('resort_status');
            $resort_class_name = 'status__text status__text_active';
          ?>


          <div class="resort__status status">
            <?php if($resort_status == true): ?>
              <div class="<?php echo e($resort_class_name); ?>">Open</div>
              <div class="status__sep">/</div>
              <div class="status__text">Closed</div>
            <?php endif; ?>

            <?php if($resort_status == false): ?>
              <div class="status__text">Open</div>
              <div class="status__sep">/</div>
              <div class="<?php echo e($resort_class_name); ?>">Closed</div>
            <?php endif; ?>
          </div>

        </div>

          <?php
            $resort_weather = get_field('resort_weather');

            // temperature
            $main_weather_json = $resort_weather['weather_data']->main;
            $main_weather_data = json_decode(json_encode($main_weather_json),true);

            // var_dump($main_weather_data);

            $main_weather_temp = round($main_weather_data['temp']);
            $main_weather_feels = round($main_weather_data['feels_link']);
            $main_weather_min = round($main_weather_data['temp_min']);
            $main_weather_max = round($main_weather_data['temp_max']);
            $main_weather_pressure = $main_weather_data['pressure'];
            $main_weather_humidity = $main_weather_data['humidity'];

            // icon & show, clouds,rain
            $adict_json = $resort_weather['weather_data']->weather;
            $adict_data = json_decode(json_encode($adict_json),true);

            // var_dump($adict_data[0]);

            $adict_id = $adict_data[0]['id'];
            $adict_main = $adict_data[0]['main'];
            $adict_description = $adict_data[0]['description'];
            $adict_icon = $adict_data[0]['icon'];

          ?>

        <div class="resort__specs-item resort__specs-item_weather">
          <div class="resort__specs-title">Current weather</div>
          <div class="resort__weather flex">
            <div class="resort__weather-row flex">
              <svg class="resort__weather-icon" width="32px" height="32px">
                <use xlink:href="<?php echo e(svg_sprite_path()); ?>#weather-icon"></use>
              </svg>

              <div class="resort__weather-now"><?php echo e($main_weather_temp); ?>°F</div>

            </div>
            <div class="resort__weather-row flex">
              <?php if($main_weather_max): ?>
              <div class="resort__weather-col">
                <span class="resort__weather-middle">High:</span>
                <span class="resort__weather-val"><?php echo e($main_weather_max); ?>°F</span>
              </div>
              <?php endif; ?>
              <?php if($main_weather_min): ?>
              <div class="resort__weather-col">
                <span class="resort__weather-middle">Low:</span>
                <span class="resort__weather-val"><?php echo e($main_weather_min); ?>°F</span>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <?php
          $resort_lift = get_field('resort_lift');
        ?>

        <?php if($resort_lift): ?>
          <div class="resort__specs-item resort__specs-item_lift">
            <div class="resort__specs-title">Lift status</div>
            <div class="resort__lift flex">
              <svg class="resort__lift-icon" width="27px" height="27px">
                <use xlink:href="<?php echo e(svg_sprite_path()); ?>#lift-icon"></use>
              </svg>

              <div class="resort__lift-text"><?php echo e($resort_lift); ?></div>
            </div>
          </div>
        <?php endif; ?>

        <?php
          $resort_skiable_area = get_field('resort_skiable_area');
        ?>

        <?php if($resort_skiable_area): ?>

          <div class="resort__specs-item resort__specs-item_area">
            <div class="resort__specs-title">Skiable area</div>
            <div class="resort__area flex">
              <svg class="resort__area-icon" width="25px" height="25px">
                <use xlink:href="<?php echo e(svg_sprite_path()); ?>#area-icon"></use>
              </svg>
              <div class="resort__area-text"><?php echo e($resort_skiable_area); ?></div>
            </div>
          </div>
        <?php endif; ?>


        <?php if(have_rows('resort_pistes')): ?>
          <div class="resort__specs-item resort__specs-item_pistes">
            <div class="resort__specs-title">Pistes</div>
            <div class="resort__pistes flex">
              <?php while(have_rows('resort_pistes')): ?> <?php the_row() ?>
              <?php
                $resort_pistes_item = get_sub_field('resort_pistes_item');
              ?>
              <div class="resort__pistes-item"><?php echo e($resort_pistes_item); ?> km</div>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>

      </div>
    </div>


    <?php
      $resort_best_for = get_field('resort_best_for');
    ?>

    <?php if($resort_best_for): ?>
      <div class="resort__know">
        <div class="resort__container container flex">
          <div class="resort__know-title">Best know for:</div>
          <ul class="resort__know-list flex">
            <?php $__currentLoopData = $resort_best_for; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $best_for): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <?php switch($best_for):
                case ($best_for): ?>
                <li class="resort__know-item">
                  <svg class="resort__know-icon" width="16px" height="16px">
                    <use xlink:href="<?php echo e(svg_sprite_path()); ?>#<?php echo e($best_for); ?>-icon"></use>
                  </svg>
                  <div class="resort__know-text"><?php echo e($best_for); ?></div>
                </li>
                <?php break; ?>

                <?php default: ?>

              <?php endswitch; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </ul>
        </div>
      </div>
    <?php endif; ?>

  </div>

  <div class="resort__row container flex">
    <section class="content resort__content">

      <div class="breadcrumbs content__breadcrumbs">
        <?php if(function_exists('yoast_breadcrumb')): ?>
          <?php yoast_breadcrumb() ?>
        <?php endif; ?>
      </div>

      <h1 class="content__title title title_big"><?php echo e(the_title()); ?></h1>
      <div class="content__text text"><?php echo e(the_content()); ?></div>

      <aside class="sidebar content__side content__side_mob">
        <?php
          $resort_gallery  = get_field('resort_gallery');
          $resort_altitude = get_field('resort_altitude');
          $resort_gallery  = get_field('resort_gallery', get_the_ID());
        ?>

        <?php if($resort_gallery): ?>
          <div class="sidebar__block sidebar__block_slider">
            <div class="sidebar__slider swiper-container">
              <div class="swiper-wrapper">
                <?php $__currentLoopData = $resort_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    ?>
                  <div class="sidebar__slide swiper-slide">
                    <a class="sidebar__image" href="<?php echo e(wp_get_attachment_image_url( $gallery_id, 'full' )); ?>">
                      <?php echo wp_get_attachment_image( $gallery_id, 'full', false, [ 'class' => 'swiper-lazy' ] ); ?>

                    </a>
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="sidebar__dots"></div>
            </div>
          </div>
        <?php endif; ?>


        <?php if($resort_altitude): ?>
          <div class="sidebar__block">
            <h3 class="sidebar__block-title">Altitude</h3>
            <dl class="sidebar__list">
              <div class="sidebar__item flex">
                <svg class="sidebar__item-icon" width="32px" height="32px">
                  <use xlink:href="<?php echo e(svg_sprite_path()); ?>#altitude-icon"></use>
                </svg>

                <dd class="sidebar__item-desc"><?php echo e($resort_altitude); ?> m</dd>
              </div>
            </dl>
          </div>
        <?php endif; ?>


        <?php if( have_rows('resort_get') ): ?>
          <?php
            $i = 0;
          ?>
          <div class="sidebar__block">
            <h3 class="sidebar__block-title">How to get there</h3>
            <dl class="sidebar__list">
              <?php while( have_rows('resort_get') ): ?> <?php the_row() ?>
              <?php
                $i++;
                $city = get_sub_field('resort_get_city');
                $distance = get_sub_field('resort_get_distance');
              ?>
              <div class="sidebar__item flex">
                <svg class="sidebar__item-icon" width="32px" height="33px">
                  <use xlink:href="<?php echo e(svg_sprite_path()); ?>#get-<?php echo e($i); ?>"></use>
                </svg>

                <dd class="sidebar__item-term"><?php echo e($city); ?>:</dd>
                <dd class="sidebar__item-desc"><?php echo e($distance); ?> km</dd>
              </div>
              <?php endwhile; ?>

            </dl>
          </div>
        <?php endif; ?>



        <?php if(have_rows('resort_skipass')): ?>
          <div class="sidebar__block sidebar__block_ski-pass">
            <h3 class="sidebar__block-title">Ski-pass</h3>
            <dl class="sidebar__list flex">
              <?php while(have_rows('resort_skipass')): ?> <?php the_row() ?>
              <?php
                $resort_skipass_day   = get_sub_field('resort_skipass_day');
                $resort_skipass_price = get_sub_field('resort_skipass_price');
              ?>
              <div class="sidebar__item flex">
                <dd class="sidebar__item-term"><?php echo e($resort_skipass_day); ?>:</dd>
                <dd class="sidebar__item-desc"><?php echo e($resort_skipass_price); ?></dd>
              </div>
              <?php endwhile; ?>
            </dl>
          </div>
        <?php endif; ?>
      </aside>


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

      <?php if($query->have_posts()): ?>
        <div class="content__related blog-slider related-slider">
          <div class="blog-slider__top flex">
            <h2 class="blog-slider__title title">Guide posts</h2>
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


          <div class="blog-slider__slider swiper-container">
            <div class="swiper-wrapper">
              <?php while($query->have_posts()): ?> <?php $query->the_post() ?>
              <div class="blog-slider__slide swiper-slide">
                <a class="blog-slider__link" href="<?php echo e(the_permalink()); ?>">
                  <div class="blog-slider__image">
                    <?php echo e(the_post_thumbnail('full', [ 'class' => 'swiper-lazy'])); ?>

                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                  </div>
                  <div class="blog-slider__name"><?php echo e(the_title()); ?>

                    <svg class="blog-slider__name-icon" width="16px" height="16px">
                      <use xlink:href="<?php echo e(svg_sprite_path()); ?>#ext-link-arrow"></use>
                    </svg>
                  </div>
                  <div class="blog-slider__text"><?php echo e(the_excerpt()); ?>

                  </div>
                  <div class="blog-slider__date"><?php echo e(the_time('d M Y')); ?></div>
                </a></div>
              <?php endwhile; ?>
              <?php
                wp_reset_postdata();
              ?>
            </div>
            <div class="blog-slider__controls flex">
              <div class="blog-slider__scrollbar"></div>
            </div>
          </div>
        </div>

      <?php endif; ?>

      <div class="content__reviews">
        <h2 class="content__reviews-title title">User reviews</h2>
        <div class="content__reviews-w"></div>
        <div class="fb-comments" data-href="<?php echo e(the_permalink()); ?>" data-width="" data-numposts="5"></div>
      </div>
    </section>


    <aside class="sidebar resort__sidebar">
      <div class="sidebar__block sidebar__block_slider">

        <?php if($resort_gallery): ?>
          <div class="sidebar__block sidebar__block_slider">
            <div class="sidebar__slider swiper-container">
              <div class="swiper-wrapper">
                <?php $__currentLoopData = $resort_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    ?>
                  <div class="sidebar__slide swiper-slide">
                    <a class="sidebar__image" href="<?php echo e(wp_get_attachment_image_url( $gallery_id, 'full' )); ?>">
                      <?php echo wp_get_attachment_image( $gallery_id, 'medium', false, [ 'class' => 'swiper-lazy' ] ); ?>

                    </a>
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="sidebar__dots"></div>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <?php if($resort_altitude): ?>
        <div class="sidebar__block">
          <h3 class="sidebar__block-title">Altitude</h3>
          <dl class="sidebar__list">
            <div class="sidebar__item flex">
              <svg class="sidebar__item-icon" width="32px" height="32px">
                <use xlink:href="<?php echo e(svg_sprite_path()); ?>#altitude-icon"></use>
              </svg>

              <dd class="sidebar__item-desc"><?php echo e($resort_altitude); ?> m</dd>
            </div>
          </dl>
        </div>
      <?php endif; ?>

      <?php if( have_rows('resort_get') ): ?>
        <?php
          $i = 0;
        ?>
        <div class="sidebar__block">
          <h3 class="sidebar__block-title">How to get there</h3>
          <dl class="sidebar__list">
            <?php while( have_rows('resort_get') ): ?> <?php the_row() ?>
            <?php
              $i++;
              $city = get_sub_field('resort_get_city');
              $distance = get_sub_field('resort_get_distance');
            ?>
            <div class="sidebar__item flex">
              <svg class="sidebar__item-icon" width="32px" height="33px">
                <use xlink:href="<?php echo e(svg_sprite_path()); ?>#get-<?php echo e($i); ?>"></use>
              </svg>

              <dd class="sidebar__item-term"><?php echo e($city); ?>:</dd>
              <dd class="sidebar__item-desc"><?php echo e($distance); ?> km</dd>
            </div>
            <?php endwhile; ?>

          </dl>
        </div>
      <?php endif; ?>


      <?php if(have_rows('resort_skipass')): ?>
        <div class="sidebar__block sidebar__block_ski-pass">
          <h3 class="sidebar__block-title">Ski-pass</h3>
          <dl class="sidebar__list flex">
            <?php while(have_rows('resort_skipass')): ?> <?php the_row() ?>
            <?php
              $resort_skipass_day   = get_sub_field('resort_skipass_day');
              $resort_skipass_price = get_sub_field('resort_skipass_price');

            ?>
            <div class="sidebar__item flex">
              <dd class="sidebar__item-term"><?php echo e($resort_skipass_day); ?>:</dd>
              <dd class="sidebar__item-desc"><?php echo e($resort_skipass_price); ?></dd>
            </div>
            <?php endwhile; ?>
          </dl>
        </div>
      <?php endif; ?>
    </aside>
  </div>
</div>
