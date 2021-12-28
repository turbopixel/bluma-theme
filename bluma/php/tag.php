<div class="block">
  <h1 class="title is-3"><?= $L->get("archive_tag_title") ?> &quot;<?= $url->slug() ?>&quot;</h1>
</div>
<br/>

<?php
if (!empty($content)) {
  foreach ($content as $page) {
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
  <?php } ?>

  <?php if (Paginator::numberOfPages() > 1) { ?>
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
      <ul class="pagination-list">
        <?php if (Paginator::showPrev()) { ?>
          <li><a class="pagination-previous" href="<?= Paginator::previousPageUrl() ?>" tabindex="+1">&laquo; <?= $L->get("pagination_previous") ?></a></li>
        <?php } ?>
        <?php if (Paginator::showNext()) { ?>
          <li><a class="pagination-next" href="<?= Paginator::nextPageUrl() ?>" tabindex="-1"><?= $L->get("pagination_next") ?> &raquo;</a></li>
        <?php } ?>
      </ul>
    </nav>
  <?php } ?>
<?php } ?>
