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

if (!defined(BASEDIR)) {
  define(BASEDIR, "/home/groups/g/gt/gtk-gnutella/htdocs/");
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
/*
 * XXX: Please, explain why russian users should be given koi8-r instead
 *      of utf-8 as encoding. Disabled for now. --cbiere, 2005-07-01
 */
/*** hack ** fscking damn php won't use LANG in header() ** hack **
$ru = $CHARSET["ru"] = 'koi8-r';
if (isset($CHARSET[LANG]))
  header("Content-Type: text/html; charset=$ru");
*/

function getpage() {
  global $pages; /* so the included files know about it */

  $page = $_GET['page'];
  if ((preg_match('^/[a-z][a-z]/', $page)) && (in_array($page, $pages)))
    return $page;
  else
    return 'news';
}

/* getdirlang sub - check the script path for a language hint */
function getdirlang() {
  $script = $_SERVER['PHP_SELF'];

  if (isset($script) && preg_match('^/[a-z][a-z]/', $script)) {
    $lang = substr($script, 1, 2);
    if (file_exists(BASEDIR . $lang . '/index.php'))
      return $lang;
  }

  /* Return "en" (English) by default just like getlang() */
  return null;
}

/* getlang sub - check which language the visitor wants */
function getlang() {
  $cooklang = $_COOKIE['cooklang'];
  $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
  $lang = $_GET['lang'];
  $dirlang = getdirlang();

  if (!isset ($lang)) {
    /* no language selection in http request */

    
    if (isset($dirlang)) {
      /* Language taken from path e.g., /fr/index.php -> fr */
      $lang = $dirlang;
    } else if (isset($cooklang)) {
      /* Language taken from cookie */
      $lang = $cooklang;
    } else {
      /* not even a cookie. Choose from http_accept_language --REWRITE this part!-- */
/*      while (
        empty($lang) &&
        preg_match('([a-z][a-z](-[A-Z][A-Z])?)', $accept, $res)
      ) {
        $lang = $res[1];
        $accept = ereg_replace("$lang", '', $accept);
      } */
    }
  }

  if (!isset($lang) || !file_exists(BASEDIR . $lang . '/index.php')) {
    /* Use English as default */
    $lang = 'en';
  }

  /* Set the cookie only for the default path / but not e.g., /fr/ */
  if (!isset($dirlang))
    setcookie('cooklang', $lang, time() + 31536000);

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
  $incfile = BASEDIR . "/files/" . LANG . "/$file";
  if (!file_exists($incfile)) {
    $incfile = BASEDIR . "/files/en/$file";
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
		if (preg_match('^news_([0-9]{1,3})$', $file)) {
			$news_items[] = $file;
		}
	}
	closedir($handle);
	usort($news_items, "strnatcmp");
	$news_items = array_reverse($news_items);
/*
	for ($i = 0; $i < count($news_items); $i++) {
		echo '<!-- ' . $news_items[$i] . ' -->';
	}
 */
}

