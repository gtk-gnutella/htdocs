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

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/html4/loose.dtd">
  <html>
    <head>
      <title>
        Gtk-Gnutella - The Graphical Unix Gnutella Client 
      </title>
      <link rel="stylesheet" type="text/css" href="default.css">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
      <table border="0" cellpadding="0" cellspacing="10" width="100%">
        <tr>
          <td valign="middle">
            <table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr bgcolor="black">
                <td>
                  <table width="100%" border="0" cellpadding="5" cellspacing="0">
                    <tr bgcolor="white">
                      <td class="nav" align="center">
                        <a href="<?php echo BASEURL ?>?page=index">
                          <img src="images/gtk-gnutella.png" width="408" height="44" alt="GTK-GNUTELLA" border="0"></a><br>
                          Current version: <?php echo VERSION ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
			<!-- CONTENT starts here -->
<table width="99%"><tr><td width="8%">&nbsp;</td><td><h1>gtk-gnutella project endangered by software patents</h1>
<p>
This page has been set up to demonstrate that the gtk-gnutella team strongly
opposes the legalization of so-called &quot;software patents&quot;.
</p>

<h2>What is all that about?</h2>
<p>
The European Parliament will debate and probably decide on a proposal
for a software patent directive on September 1st. If this directive is
passed, things like algorithms and business methods such as Amazon
One Click Shopping will become patentable in the European Union just
like they already are in the United States.
</p>
<p>
Read more about the issue here: 
<a href="http://swpat.ffii.org/index.en.html">http://swpat.ffii.org/index.en.html</a>

</p>

<h2>How does this affect the gtk-gnutella project?</h2>
<p>
Patents such as those on 
<a href="http://news.com.com/2100-1027_3-1013851.html">urns/hashes</a>, 
<a href="http://wiki.ael.be/index.php/EnglishSWPatentExamples">tabbed windows 
and progress bars</a> already exist and one could imagine patents being 
granted on such silliness as double clicking on a search result which would 
start a download, or download queues, or the purge button.  The gtk-gnutella 
developers all live in EU territory so this could dramatically hinder 
development of gtk-gnutella.
</p>

<h2>What does this page mean?</h2>
<p>
With this text you read we are participating in an online demonstration
following a call from the <a 
href="http://www.ffii.org/index.en.html">FFII</a>. <a 
href="http://wiki.ael.be/index.php/OnlineDemoPartnersWebsites">Numerous 
websites</a> will be shut down or redirected on August 27th just like 
this one. We think this is a good way to make people more aware of the 
problem.  The regular gtk-gnutella website will return after the EU 
parliament vote on Sept.1.

</p>

<h2>What can I do to help?</h2>
<p>
If you sympathise with our opinion we invite you to sign the
<a href="http://petition.eurolinux.org/">Petition against software 
patents</a>. Other things you could do can be found here: 
<a href="http://swpat.ffii.org/girzu/todo/index.en.html">http://swpat.ffii.org/girzu/todo/index.en.html</a>
</p>
<p>
... now go ahead and enter the
<a href="index.php?page=news">gtk-gnutella website</a>
</p></td><td width="8%">&nbsp;</td></tr></table>
<!-- CONTENT ends here -->

    </body>
  </html>
