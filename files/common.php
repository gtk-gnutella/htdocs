<?php
/* 
 * $Id$ 
 */

/*
 *
 * general configuration variables are in here
 *
 */

if (!defined(BASEDIR)) {
  define(BASEDIR, "/home/groups/g/gt/gtk-gnutella/htdocs/files/");
}
define(NEWSMIN, 16);
define(NEWSMAX, 25);

define(BASEURL, "$PHP_SELF");
define(GENDIR,  "general/");
define(LANG,    getlang());

include(BASEDIR . "VERSION");

$pages = array(
  "gwebcache",
  "donate",
  "shots", 
  "shots090", 
  "devel", 
  "mailing", 
  "links", 
  "docs",
  "faq",
  "features",
  "filtering_howto",
  "searching_by_hash",
  "developers_howto"
);

/* ** hack ** fscking damn php won't use LANG in header() ** hack ** */
$ru = $CHARSET[ru] = 'koi8-r';
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
  global $page; /* so the included files know about it */
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
  } else {
    iceinclude("news", 0);
  }
}
