<div class="article">
  <?php if(has_post_thumbnail()): ?>
    <div class="article__top">
      <div class="article__image">
        <?php echo e(the_post_thumbnail('full')); ?>

      </div>
    </div>
  <?php endif; ?>
  <div class="article__row container flex">
    <section class="content article__content">
      <div class="breadcrumbs content__breadcrumbs">
        <?php if(function_exists('yoast_breadcrumb')): ?>
          <?php yoast_breadcrumb() ?>
        <?php endif; ?>
      </div>
      <h1 class="content__title title title_big"><?php echo e(the_title()); ?></h1>
      <div class="content__text text">
        <?php echo e(the_content()); ?>

      </div>
    </section>

    <aside class="sidebar article__sidebar">
      <div class="sidebar__block sidebar__block_recent">

        <h3 class="sidebar__block-title">Recent Posts</h3>

        <?php
            $args = [
              'post_type' => 'post',
              'cat'  => 'articles',
              'posts_per_page' => 3,
              'order' => 'DESC',
              'orderby' => 'date'
            ];

            $query = new WP_Query($args);
        ?>

        <?php if($query->have_posts()): ?>
          <ul class="sidebar__list">
            <?php while($query->have_posts()): ?> <?php $query->the_post() ?>
            <li class="sidebar__item">
              <a class="sidebar__item-link flex" href="<?php echo e(the_permalink()); ?>">
                <svg class="sidebar__item-icon" width="22px" height="22px">
                  <use xlink:href="<?php echo e(svg_sprite_path()); ?>#recent-posts-icon"></use>
                </svg>

                <div class="sidebar__item-title"><?php echo e(the_title()); ?></div>
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
