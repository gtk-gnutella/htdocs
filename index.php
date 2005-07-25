<?php

/* $Id$ */
/*
 * For local testing for website maintainers
 * Define your personal BASEDIR in this file.
 *
 *		Markus Goetz <guruz@guruz.de>
 */
if (file_exists("files/maintainer_include.php")) {
  include("files/maintainer_include.php");
}

include("files/common.php");

$dir = getdirlang();
if (!isset($dir)) {
  $dir = 'en';
}

if (0 != strcmp(LANG, $dir)) {
  if (0 == strcmp(LANG, 'en'))
    $dir = '';
  else
    $dir = '/ ' . LANG . '';
  header('Location: ' $dir . '/?page=' . PAGE);
  exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="<?php echo LANG ?>">
  <head>
      <?php iceinclude("title", 0) ?>
    <link rel="stylesheet" type="text/css" href="default.css">
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link rel="start" href="/">
    <link rev="made" href="mailto:gtk-gnutella-devel@lists.sf.net">
    <link rel="copyright" href="http://sourceforge.net/projects/gtk-gnutella">
    <link rel="alternate"
          type="text/html"
          href="/?lang=en&amp;page=<?php echo PAGE ?>"
          hreflang="en"
          title="English version">
    <link rel="alternate"
          href="/?lang=de&amp;page=<?php echo PAGE ?>"
          hreflang="de"
          title="Deutsche &Uuml;bersetzung">
    <link rel="alternate"
          href="/?lang=fr&amp;page=<?php echo PAGE ?>"
          hreflang="fr"
          title="Traduction fran&ccedil;aise">
    <link rel="alternate"
          href="/?lang=ja&amp;page=<?php echo PAGE ?>"
          hreflang="ja"
          title="日本翻訳">
    <link rel="alternate"
          href="/?lang=nl&amp;page=<?php echo PAGE ?>"
          hreflang="nl"
          title="Nederlandse vertaling">
      <?php iceinclude("sections", 0) ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
  </head>
  <body>
    <div class="boxed" style="text-align:center">
      <div>
        <a href="<?php echo BASEURL ?>&amp;page=index">
          <img src="images/gtk-gnutella.png" 
            width="408" height="44" alt="Gtk-Gnutella" class="image"></a>
      </div>
      <div>
        <?php iceinclude("current_version", 0); echo VERSION ?>
      </div>
    </div>


    <div class="sidebar">
      <div class="boxed">
        <form action="/" method="GET">
        <p style="margin: 0;">Select your language:<br>
          <select name="lang" tabindex=1 onchange="submit();">
            <option
		<?php if ('en' === LANG) echo 'selected' ?>
		value="en">English</option>
            <option
		<?php if ('de' === LANG) echo 'selected' ?>
		value="de">Deutsch</option>
            <option
		<?php if ('fr' === LANG) echo 'selected' ?>
		value="fr">Fran&ccedil;ais</option>
            <option
		<?php if ('ja' === LANG) echo 'selected' ?>
		value="ja">日本語</option>
            <option
		<?php if ('nl' === LANG) echo 'selected' ?>
		value="nl">Nederlands</option>
          </select>&nbsp;<input type="submit" value="Go" accesskey="G" tabindex=2>
          <input type="hidden" name="page" value="<?php echo PAGE ?>">
        </p>
        </form>

      </div>

      <div class="boxed">
        <?php iceinclude("sidenav", 0) ?>
      </div>
      <div class="boxed">
        <?php iceinclude("sidenav_copyright", 0) ?>
      </div>
      <div class="boxed">
        <div>
          <?php iceinclude("sidenav_hosted", 0) ?>
        </div>
        <div>
          <a href="http://sourceforge.net">
            <img class="image"
              src="http://sourceforge.net/sflogo.php?group_id=4467&amp;type=1"
              alt="SourceForge.net Logo" width="88" height="31"></a>
        </div>
        <div>
          <?php iceinclude("sidenav_glade", 0) ?>
        </div>
        <div>
          <a href="http://glade.gnome.org/">
            <img class="image" src="images/glade-banner.png"
              alt="Glade" width="100" height="45"></a>
        </div>
      </div>
      <div class="boxed">
        <?php iceinclude("sidenav_conform", 0) ?>
        <div>
          <a href="http://validator.w3.org/check/referer">
            <img class="image" src="images/valid-html401.png"
              alt="Valid HTML 4.01" width="88" height="31"></a>
          <a href="http://jigsaw.w3.org/css-validator/">
            <img class="image" src="images/valid-css.png"
              alt="Valid CSS" width="88" height="31"></a>
        </div>
      </div>
    </div>

    <div class="content">
      <?php maincontent() ?>
    </div>
  </body>
</html>

