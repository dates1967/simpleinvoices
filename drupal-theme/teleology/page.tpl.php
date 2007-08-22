<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language ?>" xml:lang="<?php print $language ?>">
<head>
  <title><?php print $head_title ?></title>
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <?php print $head ?><?php print $styles ?>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1885246-1";
urchinTracker();
</script>

</head>

<body <?php print theme("onload_attribute"); ?>>
<div id="container">
  <div id="top">
    <div>
<!--
      <?php if ($logo) { ?><a id="logo" href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>"/></a><?php } ?>
-->
<br>
      <a id="logo" href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="http://www.simpleinvoices.org/blog/themes/teleology/logo.png" alt="Simple Invoices blog"/></a>
<br><br>	  
<!--
      <?php if ($site_name) { ?><h1><a class="site-name" href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a></h1><?php } ?>
      <?php if ($site_slogan) { ?><div class="site-slogan"><?php print $site_slogan ?></div><?php } ?>
	  -->
    </div>
<!--
    <div id="navigation">
      <?php if (isset($primary_links)) { ?><div id="primary"><?php print theme('links', $primary_links) ?></div><?php } ?>
      <?php if (isset($secondary_links)) { ?><div id="secondary"><?php print theme('links', $secondary_links) ?></div><?php } ?>
    </div>
-->
    <!-- <div> ?php print $search_box ? </div> -->
  </div>
<!--
  <?php if ($sidebar_left) { ?> <div id="leftnav"><?php print $sidebar_left ?></div> <?php } ?>

  <?php if ($sidebar_right) { ?> <div id="description"><?php print $sidebar_right ?></div> <?php } ?>
-->

<div id="description">
<div>
  <?php if ($sidebar_right) { ?> <?php print $sidebar_right ?> <?php } ?>
<a href="http://www.simpleinvoices.org/blog/node/2">faq</a><br><br>
<a href="http://www.simpleinvoices.org/blog/node/3">
<img
src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt=""
style="vertical-align:middle;border:0"/> subscribe: rss & email</a>
<br><br>
<a href="http://www.simpleinvoices.org/blog/user/register">create an account</a><br><br>
<a href="http://www.simpleinvoices.org/blog/user/">login</a><br><br>



</form>

</div>
</div>


  <div id="content">
    <!-- print $breadcrumb ?> -->
    <?php if ($header != ""): ?><div id="header"><?php print $header ?></div><?php endif; ?>
    <?php if ($title != ""): ?><h2 class="content-title"><?php print $title ?></h2><?php endif; ?>
    <?php if ($tabs != ""): ?><?php print $tabs ?><?php endif; ?>
    <?php if ($mission != ""): ?><div id="mission"><?php print $mission ?></div><?php endif; ?>
    <?php if ($help != ""): ?><p id="help"><?php print $help ?></p><?php endif; ?>
    <?php if ($messages != ""): ?><div id="message"><?php print $messages ?></div><?php endif; ?>
    <!-- start main content --><?php print($content) ?><!-- end main content -->
  </div>
</div>
<?php print $closure;?>
</body>
</html>
