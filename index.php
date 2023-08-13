<?php

//DEBUG while WORK IN PROGRESS
if (!isset ($_GET['debug'])) header (Location: 'index_wip.php');

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

/* DEBUG!!!
if (!isset($dir) || 0 != strcmp(LANG, $dir)) {
  if (!isset($dir)) {
    $dir = 'en';
  }
  header('Location: /' . LANG . '/?page=' . PAGE);
  exit;
}
*/

?>
<!DOCTYPE HTML>
<html lang="<?php echo LANG ?>">
  <head>
    <meta charset="UTF-8" />
	 <meta name="viewport" content="width=device-width, initial-scale=1" />
	 <meta name="google-site-verification" content="eYBryyAZmOqaY7NhN4poQepTcY8bmvaBrv6do9TM6P4" />

    <?php iceinclude("title", 0) ?>

    <link rel="icon" href="/images/favicon.png" type="image/png" />
    <link rel="start" href="/" />
    <link rel="copyright" href="https://sourceforge.net/projects/gtk-gnutella" />
    <link rel="alternate"
          type="text/html"
          href="/en/?page=<?php echo PAGE ?>"
          hreflang="en"
          title="English version" />
    <link rel="alternate"
          href="/de/?page=<?php echo PAGE ?>"
          hreflang="de"
          title="Deutsche &Uuml;bersetzung" />
    <link rel="alternate"
          href="/el/?page=<?php echo PAGE ?>"
          hreflang="el"
          title="Ελληνικά" />
    <link rel="alternate"
          href="/fr/?page=<?php echo PAGE ?>"
          hreflang="fr"
          title="Traduction fran&ccedil;aise" />
    <link rel="alternate"
          href="/it/?page=<?php echo PAGE ?>"
          hreflang="it"
          title="Traduction fran&ccedil;aise" />
    <link rel="alternate"
          href="/ja/?page=<?php echo PAGE ?>"
          hreflang="ja"
          title="日本語版" />
    <link rel="alternate"
          href="/nl/?page=<?php echo PAGE ?>"
          hreflang="nl"
          title="Nederlandse vertaling" />
    <link rel="alternate"
          href="/uk/?page=<?php echo PAGE ?>"
          hreflang="uk"
          title="Ukrainian version" />
    <link rel="alternate"
          href="/zh/?page=<?php echo PAGE ?>"
          hreflang="zh"
          title="中文" />

    <?php iceinclude("sections", 0) ?>

<style>
@media all {

a:link    { color: #4444BB; }
a:visited { color: #BB4444; }
a:active  { color: #4444BB; }

body,th,td,h3,h4,h5,p,ul {
	font-family: helvetica, sans-serif;
	color: #000000;
	margin: 0px 0px 0px 0px;
}

p,pre,ul {
	margin: 1em 2em;
}

body {
	background-color: #AAAAEE;
}

h1 {
	text-align: center;
}

h1.attention {
	margin: 0 0;
	border-style: solid;
	border-color: red;
	background: red;
	color: white;
	text-align: center;
}

h3,h4,h5 {
	font-size: medium;
}

h5 { 	
	font-size: 0.83em;
}

code {
	font-family: monospace;
}

.nav {
	font-weight: bold
}

a.navlink:link,a.navlink:visited {
	text-decoration: none
}

a.navlink:active,a.navlink:hover {
	text-decoration: underline
}

div.sidebar {
/*
	width: 14em;
	float: left;
*/
}

div.content {
	margin-left: 0em;
}

div.boxed {
	border-style: solid;
	border-width: 2px;
	border-color: #42a;
	background-color: white;
	margin-top: 10px;
	margin-bottom: 10px;
	margin-right: 1%;
	margin-left: 1%;
	padding: 1em;
}

div.indent {
	margin-left: 1em;
}

div.warning {
	background-color: #FFCCCC;
	text-align: center;
	border-style: outset;
	border-color: red;
	margin: 1em;
	padding: 0.5em;
	font-weight: bold;
}

div.scroll {
	overflow: auto;
	max-height: 10em;
}

div.sb_section {
	margin-top: 0.5em;
	margin-bottom: 0.5em;
	padding: 0.3em;
	border-left: solid 2px #D3D3D3;
	border-top: solid 2px #D3D3D3;
	font-size: large;
	font-weight: bold;
	line-height: 1.5em;
}

a.rss {
	font-size: large;
	font-weight: bold;
	color: white;
	background: #e60;
	border: solid 2pt #f70;
   text-decoration: none;
}

div.sb_section_content {
	margin-left: 1em;
}

div.glossary_capital {
	color: red;
	font-size: 32px;
	font-weight: bold;
	margin-bottom: 0.5em;
}

div.glossary_term {
	font-weight: bold;
	font-size: larger;
}

.hidden {
	visibility: hidden;
	width: 0;
	height: 0;
	font-size: 0pt;
}

img {
	border: 0;
}

.image,.title_image {
	text-align: center
}

.image img {
	margin: 0.5em;
}

}

@media handheld, only screen and (max-width: 440px) {

.title_image {
	width: 100%;
}

div.sb_section {
	line-height: 2em;
}

div.boxed {
	padding: 0.5em;
}

pre {
	white-space: pre-wrap;
}

}
</style>


    <?php //iceinclude("sponsors_css", 0) ?> <!-- Sponsors' CSS currently unused, disabling to enhance page speed -->

  </head>

  <body>
    <div class="boxed" style="text-align: center">
      <div>
        <a href="/?page=index">
          <img class="title_image" src="/images/gtk-gnutella.png" alt="gtk-gnutella logo"></a>
      </div>
      <div>
        <?php iceinclude("current_version", 0); echo VERSION ?>
      </div>
    </div>

    <hr class="hidden">

    <div class="sidebar">
      <div class="boxed">
        <form action="/" method="GET">

          <?php iceinclude("sidenav", 0) ?>

	  <div>
          <select name="lang" tabindex=1 onchange="submit();">
            <option
		<?php if ('en' === LANG) echo 'selected' ?>
		value="en">English</option>
	    <option
		<?php if ('de' === LANG) echo 'selected' ?>
		value="de">Deutsch</option>
            <option
		<?php if ('el' === LANG) echo 'selected' ?>
		value="el">Ελληνικά</option>
            <option
		<?php if ('fr' === LANG) echo 'selected' ?>
		value="fr">Fran&ccedil;ais</option>
            <option
		<?php if ('it' === LANG) echo 'selected' ?>
		value="it">Italiano</option>
            <option
		<?php if ('ja' === LANG) echo 'selected' ?>
		value="ja">日本語</option>
            <option
		<?php if ('nl' === LANG) echo 'selected' ?>
		value="nl">Nederlands</option>
            <option
		<?php if ('uk' === LANG) echo 'selected' ?>
		value="uk">Українська</option>
            <option
		<?php if ('zh' === LANG) echo 'selected' ?>
		value="zh">中文</option>
          </select>&nbsp;<input type="submit" value="Go"
                                accesskey="G" tabindex="2">
          <input type="hidden" name="page" value="<?php echo PAGE ?>">
	  </div>
        </form>

      </div>

    </div>

    <hr class="hidden">

    <div class="content">
      <?php maincontent() ?>
    </div>

<hr class="hidden" />

<div class="boxed" style="text-align: center">

    <a class="image" href="https://sourceforge.net/projects/gtk-gnutella/">
      <img src="https://sourceforge.net/cdn/syndication/badge_img/4467/oss-users-love-us-white"
      alt="Users Love Us" width="125" /></a>

    <a class="image" href="https://sourceforge.net/projects/gtk-gnutella/">
      <img src="https://sourceforge.net/cdn/syndication/badge_img/4467/oss-community-choice-white"
      alt="Community Choice" width="125" /></a>

    <a class="image" href="https://sourceforge.net/projects/gtk-gnutella/">
      <img src="https://sourceforge.net/cdn/syndication/badge_img/4467/oss-sf-favorite-white"
      alt="SF Favourite" width="125" /></a>

    <a class="image" href="https://sourceforge.net/projects/gtk-gnutella/">
      <img src="https://sourceforge.net/cdn/syndication/badge_img/4467/oss-community-leader-white"
      alt="Community Leader" width="125" /></a>

    <a class="image" href="https://sourceforge.net/projects/gtk-gnutella/">
      <img src="https://sourceforge.net/cdn/syndication/badge_img/4467/oss-open-source-excellence-white"
      alt="Open Source Excellence" width="125" /></a>

    <a class="image" href="https://sourceforge.net">
      <img src="https://sourceforge.net/sflogo.php?group_id=4467&amp;type=1"
      alt="SourceForge.net Logo" width="88" height="31" /></a>

    <a class="image" href="https://glade.gnome.org/">
      <img src="/images/glade-banner.png" alt="Glade" width="100" height="45" /></a>

	<a class="image"
		href="http://sourceforge.net/export/rss2_projfiles.php?group_id=4467"><img
		src="/images/feed-icon-28x28.png"
		alt="RSS Feed Available"
		title="RSS Feed Available" /></a>

	<a class="image"
		href="https://www.openhub.net/p/gtk-gnutella"><img
		src=""
		width="" height=""
		alt="Open Hub"
		title="Open Hub metrics" /></a>

	<a class="image"
		href="https://scan.coverity.com/projects/2178"><img
		alt="Coverity Scan Build Status"
	  	width="95" height="18"
		src="https://scan.coverity.com/projects/2178/badge.svg" /></a>

	<a class="image"
		href="https://github.com/gtk-gnutella/gtk-gnutella"><img
		alt="gtk-gnutella at GitHub"
	  	width="32" height="32"
		src="/images/GitHub-Mark-32px.png" /></a>

   <div style="text-align: center;">
	<?php iceinclude("sidenav_copyright", 0) ?>
	</div>

</div>

  </body>
</html>

