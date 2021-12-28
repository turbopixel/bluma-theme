<!DOCTYPE html>
<html lang="<?php echo Theme::lang() ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php echo Theme::metaTagTitle(); ?>
  <?php echo Theme::metaTagDescription(); ?>

  <?php echo Theme::favicon('img/favicon.png'); ?>
  <?php echo Theme::css('css/style.css'); ?>
  <?php Theme::plugins('siteHead'); ?>
</head>
<body style="background: #e9ecef">

<?php Theme::plugins('siteBodyBegin'); ?>

<!-- navbar -->
<?php include(THEME_DIR_PHP . 'navbar.php'); ?>
<!-- navbar / end -->

<!-- content section -->
<section class="section">
  <div class="container is-max-desktop">
    <?php
    // get the right content file
    if (isset($WHERE_AM_I) && $WHERE_AM_I == 'page') {
      include(THEME_DIR_PHP . 'page.php');
    } else if (isset($WHERE_AM_I) && $WHERE_AM_I == 'tag') {
      include(THEME_DIR_PHP . 'tag.php');
    } else {
      include(THEME_DIR_PHP . 'home.php');
    }
    ?>
  </div>
</section>
<!-- content section / end -->

<!-- footer -->
<?php include(THEME_DIR_PHP . 'footer.php'); ?>
<!-- footer / end -->

<?php echo Theme::jquery(); ?>

<?php Theme::plugins('siteBodyEnd'); ?>

<script type="text/javascript">
  $(document).ready(function () {
    $(".navbar-burger").click(function () {
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");
    });
  });

  <?php if (pluginActivated('pluginSearch')): ?>
  function searchNow() {
    var searchURL = "<?php echo Theme::siteUrl(); ?>search/";
    window.open(searchURL + document.getElementById("search-input").value, "_self");
  }

  document.getElementById("search-input").onkeypress = function (e) {
    if (!e) e = window.event;
    var keyCode = e.keyCode || e.which;
    if (keyCode == '13') {
      searchNow();
      return false;
    }
  }
  <?php endif ?>
</script>

</body>
</html>