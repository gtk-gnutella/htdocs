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
      <link rel="icon" href="images/favicon.png" type="image/png">
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
      <table border="0" cellpadding="0" cellspacing="10" width="100%">
        <tr>
          <td width="140" align="center" valign="top">
            <table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr bgcolor="black">
                <td>
                  <table width="100%" border="0" cellpadding="5" cellspacing="0">
                    <tr bgcolor="white">
                      <td>
                        <?php iceinclude("sidenav", 0) ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table><br>
            <table width="100%" border="0" cellpadding="2" cellspacing="0">
              <tr bgcolor="black">
                <td>
                  <table width="100%" border="0" cellpadding="5" cellspacing="0">
                    <tr bgcolor="white">
                      <td>
                        Gtk-Gnutella &copy;&nbsp;2000-03 by Yann Grossel, Raphael Manfredi
                        and Various Contributors.
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table><br>
              <table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr bgcolor="black">
                  <td>
                    <table width="100%" border="0" cellpadding="5" cellspacing="0">
                      <tr bgcolor="white">
                        <td>
                          Gtk-Gnutella development hosted&nbsp;by
                          <a href="http://sourceforge.net/">
                            <img src="http://sourceforge.net/sflogo.php?group_id=4467&amp;type=1" alt="SourceForge" border="0" width="88" height="31"></a>
                          <br><br>
                          User interface designed with
                          <a href="http://glade.gnome.org/">
                            <img src="images/glade-banner.png" alt="Glade" border="0" width="100" height="45"></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table><br>
              <table width="100%" border="0" cellpadding="2" cellspacing="0">
                <tr bgcolor="black">
                  <td>
                    <table width="100%" border="0" cellpadding="5" cellspacing="0">
                      <tr bgcolor="white">
                        <td>
                          This Webpage conforms to:
                          <br><br>
                          <a href="http://validator.w3.org/check/referer">
                            <img src="images/valid-html401.png" alt="Valid HTML 4.01!" border="0" width="88" height="31"></a>
                          <br><br>
                          <a href="http://jigsaw.w3.org/css-validator/">
                            <img src="images/valid-css.png" alt="Valid CSS!" border="0" width="88" height="31"></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>

          </td>
          <td rowspan="2" valign="top" width="100%">
            <!-- end header -->
            <?php maincontent() ?>
            <!-- footer -->
          </td>
        </tr>
      </table>
    </body>
  </html>
