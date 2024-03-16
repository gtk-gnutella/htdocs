<?php
/*
 * $Id$
 */

/*
 *
 * general configuration variables are in here
 *
 */
 
/* Uncomment this for debugging */
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);

if (!defined("BASEDIR")) {
  define("BASEDIR", ""); //Old BASEDIR was /home/groups/g/gt/gtk-gnutella/htdocs/ New should be /var/www/html/ but probably shall not be used!
}

$news_items = null;

$pages = array(
  "banners",
  "bootstrap",
  "bugreport_howto",
  "code101",
  "code101a",
  "current_version",
  "devel",
  "developers_howto",
  "docs",
  "donate",
  "download",
  "faq",
  "features",
  "filtering_howto",
  "git_guide",
  "git_quick_guide",
  "glossary",
  "headless_mode",
  "links",
  "mailing",
  "news_bridge",
  "news_header",
  "news_old",
  "news_old_header",
  "release_history",
  "searching_by_hash",
  "shots",
  "shots085",
  "shots090",
  "shots092",
  "shots096u"
);

/* NEWSNUM is the number of news items that appear on the front page. */
define("NEWSNUM", 3);
define("GENDIR",  "files/general/");
define("PAGE",    getpage());
define("LANG",    getlang());
define("BASEURL", $_SERVER['PHP_SELF']);

include(BASEDIR . "files/VERSION");

header("Content-Type: text/html; charset=utf-8");

function getpage() {
  global $pages; /* so the included files know about it */

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (in_array($page, $pages)) //not sure if the preg_match expression is correct TEMP REMOVED preg_match('^/[a-z][a-z]/^', $page)) && 
    return $page;
    }
  else
    return 'news';
}


/* getlang sub - check which language the visitor wants */
function getlang() {
  if (isset($_GET['lang'])) {
    $lang = substr($_GET['lang'], 0, 2); //first of all retrieve current language from the URL
  } else if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); //otherwise get the language from the browser preferences
  } else {
    $lang = 'en'; // if no browser preferred language is retrieved, fall back to English
  }

  if (!isset($lang) || !file_exists(BASEDIR . $lang . '/index.php')) {
    /* Use English as default if the selected language does not exist */
    $lang = 'en';
  }

  return $lang;
}

/*
 * icecontent:
 *
 * include the content files including pre and post files
 */
function icecontent($content) {
  iceinclude($content, 1);
}

/*
 * iceinclude:
 *
 * checks whether a file is available in the desired language
 */
function iceinclude($file, $box) {
  global $news_items; /* so the included files know about it */
  $incfile = BASEDIR . "files/" . LANG . "/$file"; //add slash / before files/ ?
  if (!file_exists($incfile)) {
    $incfile = BASEDIR . "files/en/$file"; //add slash / before files/ ?
    if (file_exists($incfile)) {
      if ($box) {
        include(BASEDIR . GENDIR . "/cheader");
      }
      include("$incfile");
      if ($box) {
        include(BASEDIR . GENDIR . "/cfooter");
      }
    }
  } else {
    if ($box) {
      include(BASEDIR . GENDIR . "/cheader");
    }
    include("$incfile");
    if ($box) {
      include(BASEDIR . GENDIR . "/cfooter");
    }
  }
}

/*
 * maincontent:
 *
 * include the content
 */
function maincontent() {
  global $pages; /* so the included files know about it */

  iceinclude("sponsors", 0);
  if (
    in_array(PAGE, $pages) && (
      file_exists(BASEDIR . 'files/' . LANG . '/' . PAGE) ||
      file_exists(BASEDIR . 'files/en/' . PAGE)
    )
  ) {
    icecontent(PAGE);
  } else {
    iceinclude("news", 0);
  }
}

/*
 * sf_bug:
 *
 * create a link for gtk-gnutella bug with given number.
 */
 function sf_bug($number) {
   print("<a href=\"http://sourceforge.net/p/gtk-gnutella/bugs/$number/\">#$number</a>");
 }
 
/*
 * newsfiles:
 *
 * Fill the array $news_items with the news_nn filenames,
 * sort them in natural order, and then reverse the order.
 * Then we can suck out however many we want.
 */
function newsfiles() {
	global $news_items;
	$news_items = array();
	$handle = opendir(BASEDIR . 'files/en');
	while (false !== ($file = readdir($handle))) {
		if (preg_match('^news_([0-9]{1,3})^', $file)) {
			$news_items[] = $file;
		}
	}
	closedir($handle);
	usort($news_items, "strnatcmp");
	$news_items = array_reverse($news_items);
}

