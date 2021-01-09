<!doctype html>
<html <?php echo get_language_attributes(); ?>>
<?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body <?php body_class('page page_inner page_resort') ?>>
<?php do_action('get_header') ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v9.0" nonce="5K8O41QH"></script>
<?php echo $__env->make('partials.header-inner-resort', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<main class="page__inner">
  <?php echo $__env->yieldContent('content'); ?>
</main>
<?php do_action('get_footer') ?>
<?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php wp_footer() ?>

</body>
</html>
