<nav class="navbar is-link" role="navigation" aria-label="main navigation">
  <div class="container is-max-desktop">
    <div class="navbar-brand">
      <div class="navbar-item">
        <a class="button is-link has-text-weight-bold" href="<?= Theme::siteUrl(); ?>"><?= $site->title(); ?></a>
      </div>
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a href="/" class="navbar-item">Startseite</a>
        <?php
        if (isset($staticContent) && is_array($staticContent)) {
          foreach ($staticContent as $staticPage) { ?>
            <a class="navbar-item" href="<?= $staticPage->permalink(); ?>"><?= $staticPage->title(); ?></a>
            <?php
          }
        }
        ?>
      </div>

      <div class="navbar-end">
        <?php if (Theme::rssUrl()): ?>
          <a class="navbar-item" href="<?= Theme::rssUrl() ?>" rel="nofollow">
            <img src="<?= DOMAIN_THEME . 'img/rss.svg' ?>" width="28" height="28" alt="RSS"/>
          </a>
        <?php endif; ?>

        <?php if (pluginActivated('pluginSearch')): ?>
          <div class="navbar-item">
            <div class="field">
              <div class="field">
                <div class="control ">
                  <input
                      class="input"
                      id="search-input"
                      type="text"
                      placeholder="Blog durchsuchen"
                      aria-label="Suche"
                      onsubmit="searchNow()"
                      style="width: 200px">
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</nav>