<?php
  $logo = get_field('logo', 'options');
?>

<header class="header">
  <div class="header__container container flex">
    <a class="header__logo logo" href="<?php echo e(home_url('/')); ?>"><?php echo $logo; ?></a>
      <?php if(has_nav_menu('primary_navigation')): ?>
      <button class="nav-trigger header__nav-trigger">
      <svg class="nav-trigger__close" width="22px" height="22px">
          <use xlink:href="<?php echo e(svg_sprite_path()); ?>#close-icon"></use>
      </svg>

      <svg class="nav-trigger__open" width="20px" height="15px">
          <use xlink:href="<?php echo e(svg_sprite_path()); ?>#menu-icon"></use>
      </svg>

      </button>

      <nav class="nav header__nav">
        <div class="nav__container container">
          <?php echo wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_id' => '',
            'container' => 'ul',
            'menu_class' => 'nav__list flex',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '']); ?>

        </div>
      </nav>
      <?php endif; ?>
  </div>
</header>








