<!-- page begin -->
<?php Theme::plugins('pageBegin'); ?>

<!-- title -->
<h1 class="title"><?= $page->title(); ?></h1>
<h4 class="subtitle"><?= $L->get("Published") ?> <?= $page->date() ?></h4>

<!-- description -->
<?php if ($page->description()): ?>
  <p class="page-description"><?= $page->description(); ?></p>
<?php endif ?>

<!-- cover image -->
<?php if ($page->coverImage()): ?>
  <div class="block">
    <figure class="image is-16by9">
      <img src="<?= $page->coverImage(); ?>" alt="">
    </figure>
  </div>
<?php endif ?>

<!-- content -->
<div class="card mb-5" id="post-<?= $page->uuid(); ?>">
  <div class="card-content">
    <div class="content">
      <?= $page->content(); ?>
    </div>
  </div>
</div>

<!-- tags -->
<?php
$tags = $page->tags();
if (!empty($tags)) {
  ?>
  <div class="tags">
    <?php
    foreach (explode(",", $tags) as $item) {
      ?>
      <a href="<?= DOMAIN_TAGS . $item ?>" title="<?= $L->get('tag') ?> <?= $item ?>" class="tag"><?= $item ?></a>
      <?php
    }
    ?>
  </div>
  <?php
}
?>

<!-- page end -->
<?php Theme::plugins('pageEnd'); ?>