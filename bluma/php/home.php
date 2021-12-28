
<header class="welcome bg-light">
  <div class="container text-center">
    <section class="hero is-link">
      <div class="hero-body">
        <h1 class="title is-3">
          <?php echo $site->slogan(); ?>
        </h1>
        <?php if ($site->description()): ?>
          <h3 class="subtitle is-5"><?php echo $site->description(); ?></h3>
        <?php endif ?>
      </div>
    </section>
  </div>
</header>
<br/>

<?php if (empty($content)): ?>
  <div class="text-center p-4">
    <?php $language->p('No pages found') ?>
  </div>
<?php endif ?>

<?php foreach ($content as $page): ?>

  <?php Theme::plugins('pageBegin'); ?>

  <div class="card is-shadowless" id="post-<?= $page->uuid(); ?>">
    <header class="card-header">
      <a href="<?php echo $page->permalink(); ?>" class="card-header-title"><?php echo $page->title(); ?></a>
    </header>
    <div class="card-content">
      <?php if ($page->description()): ?>
        <div class="block"><em><?php echo $page->description(); ?></em></div>
      <?php else: ?>
        <div class="block"><?php echo $page->contentBreak(); ?></div>
      <?php endif ?>

      <div class="media">
        <div class="media-content">
          <small>Veröffentlicht am: <?= $page->dateRaw() ?></small>
        </div>
      </div>
    </div>
    <footer class="card-footer">
      <?php if ($page->readMore()): ?>
        <a href="<?php echo $page->permalink(); ?>" class="card-footer-item"><?php echo $L->get('Read more'); ?></a>
      <?php endif ?>
    </footer>
  </div>

  <?php Theme::plugins('pageEnd'); ?>
  <br/>
<?php endforeach ?>

<?php if (Paginator::numberOfPages() > 1): ?>
  <nav class="pagination is-centered" role="navigation" aria-label="pagination">
    <ul class="pagination-list">
      <?php if (Paginator::showPrev()): ?>
        <li><a class="pagination-previous" href="<?php echo Paginator::previousPageUrl() ?>" tabindex="-1">&laquo; Weiter</a></li>
      <?php endif; ?>
      <?php if (Paginator::showNext()): ?>
        <li><a class="pagination-previous" href="<?php echo Paginator::nextPageUrl() ?>" tabindex="-1">Zurück &raquo;</a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif ?>
