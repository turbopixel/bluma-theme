<header class=" bg-light">
  <div class="container text-center">
    <section class="hero is-link">
      <div class="hero-body">
        <h1 class="title is-3">
          <?= $site->slogan(); ?>
        </h1>
        <?php if ($site->description()): ?>
          <h3 class="subtitle is-5"><?= $site->description(); ?></h3>
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

<?php
/** @var Page $page */
foreach ($content as $page):
  ?>

  <?php Theme::plugins('pageBegin'); ?>

  <div class="card is-shadowless" id="post-<?= $page->uuid(); ?>">
    <header class="card-header">
      <a href="<?= $page->permalink() ?>" class="card-header-title"><?= $page->title(); ?></a>
    </header>
    <div class="card-content">
      <?php
      if ($page->description()) {
        ?>
        <div class="block"><em><?= $page->description(); ?></em></div>
        <?php
      } else {
        $content = $page->contentBreak(false);
        if (strlen($content) > 400) {
          $content = strip_tags($content);
          ?>
          <div class="block"><?= substr($content, 0, 400) ?> [...]</div>
          <div class="block">
            <a href="<?= $page->permalink() ?>"><?= $L->get('Read more') ?> &raquo;</a>
          </div>
          <?php
        } else {
          ?>
          <div class="block"><?= $content ?></div>
          <?php
        }
      }
      ?>
    </div>
  </div>

  <?php Theme::plugins('pageEnd'); ?>
  <br/>
<?php endforeach ?>

<?php if (Paginator::numberOfPages() > 1): ?>
  <nav class="pagination is-centered" role="navigation" aria-label="pagination">
    <ul class="pagination-list">
      <?php if (Paginator::showPrev()): ?>
        <li><a class="pagination-previous" href="<?= Paginator::previousPageUrl() ?>" tabindex="-1">&laquo; Weiter</a></li>
      <?php endif; ?>
      <?php if (Paginator::showNext()): ?>
        <li><a class="pagination-previous" href="<?= Paginator::nextPageUrl() ?>" tabindex="-1">Zurück &raquo;</a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif ?>
