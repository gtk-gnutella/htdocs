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
/* error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); */

if (!defined(BASEDIR)) {
  define(BASEDIR, "/home/groups/g/gt/gtk-gnutella/htdocs/files/");
}

/* NEWSNUM is the number of news items that appear on the front page. */
define("NEWSNUM", 7);
define("BASEURL", "$PHP_SELF");
define("GENDIR",  "general/");
define("LANG",    getlang());

include(BASEDIR . "VERSION");

$pages = array(
  "gwebcache",
  "donate",
  "shots",
  "shots090",
  "shots092",
  "devel",
  "mailing",
  "links",
  "docs",
  "faq",
  "features",
  "filtering_howto",
  "searching_by_hash",
  "developers_howto",
  "bugreport_howto",
  "release_history",
  "news_header",
  "news_bridge",
  "news_old_header",
  "code101",
  "code101a",
  "banners"
);

/* ** hack ** fscking damn php won't use LANG in header() ** hack ** */
$ru = $CHARSET["ru"] = 'koi8-r';
if (isset($CHARSET[LANG]))
  header("Content-Type: text/html; charset=$ru");

/* getlang sub - check which language the visitor wants */
function getlang() {
  global $cooklang, $lang, $HTTP_ACCEPT_LANGUAGE;
  $accept = $HTTP_ACCEPT_LANGUAGE;

  if (!isset ($lang)) {			/* no language selection in http request */
    if (isset ($cooklang)) {	/* but a cookie is set */
      $lang = $cooklang;
    } else {					/* not even a cookie. Choose from http_accept_language */
      while ((empty($lang)) && (ereg("([a-z][a-z](-[A-Z][A-Z])?)",$accept,$res))) {
        $lang = $res[1];
        $accept = ereg_replace("$lang","",$accept);
      }
      if (!isset($lang)) {		/* still no lang selected? take english */
        $lang = "en";
      }
    }
  }
  setcookie("cooklang", $lang, time()+31536000);
  return $lang;
}

/*
 * icecontent:
 *
 * include the content files including pre and post files
 */
function icecontent($content) {
  global $page; /* so the included files know about it */
  iceinclude($content, 1);
}

/*
 * iceinclude:
 *
 * checks whether a file is available in the desired language
 */
function iceinclude($file, $box) {
  global $page, $news_items; /* so the included files know about it */
  $incfile = BASEDIR . LANG . "/$file";
  if (!file_exists($incfile)) {
    $incfile = BASEDIR . "en/$file";
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
  global $page, $pages; /* so the included files know about it */
  if (
    in_array($page, $pages) && (
      file_exists(BASEDIR . LANG . "/$page") ||
      file_exists(BASEDIR . "en/$page")
    )
  ) {
    icecontent("$page");
  } 
	elseif($page == "news_old") {
		iceinclude("news_old", 0);
	}
	else {
    iceinclude("news", 0);
  }
}

/*
 * sf_bug:
 *
 * create a link for gtk-gnutella bug with given number.
 */
 function sf_bug($number) {
   print("<a href=\"http://sourceforge.net/tracker/index.php?func=detail&amp;aid=$number&amp;group_id=4467&amp;atid=104467\">#$number</a>");
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
	$handle = opendir(BASEDIR . "en");
	while (false !== ($file = readdir($handle))) {
		if (ereg("news_([0-9]{1,3})", $file)) {
			$news_items[] = $file;
		}
	}
	closedir($handle);
	usort($news_items, "strnatcmp");
	$news_items = array_reverse($news_items);
}

