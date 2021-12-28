<!-- Load Bludit Plugins: Page Begin -->
<?php Theme::plugins('pageBegin'); ?>

<!-- Page title -->
<h1 class="title"><?php echo $page->title(); ?></h1>

<!-- Page description -->
<?php if ($page->description()): ?>
  <p class="page-description"><?php echo $page->description(); ?></p>
<?php endif ?>

<!-- Page cover image -->
<?php if ($page->coverImage()): ?>
  <div class="block">
    <figure class="image is-16by9">
      <img src="<?php echo $page->coverImage(); ?>" alt="">
    </figure>
  </div>
<?php endif ?>

<!-- Page content -->
<div class="content">
  <?php echo $page->content(); ?>
</div>

<!-- Load Bludit Plugins: Page End -->
<?php Theme::plugins('pageEnd'); ?>