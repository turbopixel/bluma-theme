<!-- page -->
<?php Theme::plugins('pageBegin'); ?>

<!-- title -->
<h1 class="title"><?= $page->title(); ?></h1>
<h4 class="subtitle"><?= $L->get("Published") ?> <?= $page->date() ?></h4>

<?php if ($page->description()): ?>
  <!-- description -->
  <p class="page-description"><?= $page->description(); ?></p>
<?php endif ?>

<?php if ($page->coverImage()): ?>
  <!-- cover image -->
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

<?php
$tags = $page->tags();
if (!empty($tags)) {
  ?>
  <!-- tags -->
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

<?php Theme::plugins('pageEnd'); ?>
<!-- page end -->
