<?php
/* 
 * $Id$ 
 */

/*
 *
 * general configuration variables are in here
 *
 */

define(BASEDIR,	"/home/groups/g/gt/gtk-gnutella/htdocs/files/");
define(NEWSMIN, 6);
define(NEWSMAX, 19);

define(BASEURL, "$PHP_SELF");
define(GENDIR,  "general/");
define(LANG,    getlang());

include(BASEDIR . "VERSION");

$pages = array(
  "shots", 
  "shots090", 
  "devel", 
  "mailing", 
  "links", 
  "docs",
  "faq");

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
  $incfile = BASEDIR . LANG . "/$page";
  if (in_array($page, $pages) && file_exists($incfile)) {
    icecontent("$page");
  } else {
    iceinclude("news", 0);
  }
}
