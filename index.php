<?php include("files/common.php") ?>
<!-- $Id$ -->
  <html>
    <head>
      <title>
        Gtk-Gnutella - The Graphical Unix Gnutella Client 
      </title>
      <link rel="stylesheet" type="text/css" href="default.css">
    </head>
    <body>
      <table border=0 cellpadding=0 cellspacing=10 width=100%>
        <tr>
          <td valign=middle>
            <table width=100% border=0 cellpadding=2 cellspacing=0>
              <tr bgcolor=black>
                <td>
                  <table width=100% border=0 cellpadding=5 cellspacing=0>
                    <tr bgcolor=white>
                      <td class=nav align=center>
                        <a href="<?php echo BASEURL ?>?page=index">
                          <img src="images/gtk-gnutella.gif" width=408 height=44 alt="" border=0></a><br>
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
      <table border=0 cellpadding=0 cellspacing=10 width=100%>
        <tr>
          <td width=140 align=center valign=top>
            <table width=100% border=0 cellpadding=2 cellspacing=0>
              <tr bgcolor=black>
                <td>
                  <table width=100% border=0 cellpadding=5 cellspacing=0>
                    <tr bgcolor=white>
                      <td>
                        <?php iceinclude("sidenav", 0) ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table><br>
            <table width=100% border=0 cellpadding=2 cellspacing=0>
              <tr bgcolor=black>
                <td>
                  <table width=100% border=0 cellpadding=5 cellspacing=0>
                    <tr bgcolor=white>
                      <td>
                        Gtk-Gnutella &copy;&nbsp;2000-02 by Yann Grossel, Raphael Manfredi
                        and Various Contributors.
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table><br>
              <table width=100% border=0 cellpadding=2 cellspacing=0>
                <tr bgcolor=black>
                  <td>
                    <table width=100% border=0 cellpadding=5 cellspacing=0>
                      <tr bgcolor=white>
                        <td>
                          Gtk-Gnutella development hosted&nbsp;by
                          <a href="http://sourceforge.net/">
                            <img src="http://sourceforge.net/sflogo.php?group_id=4467&type=1" alt="SourceForge" border=0></a>
                          <br><br>
                              User interface designed with
                              <a href="http://glade.gnome.org/">
                                <img src="images/glade-banner.gif" alt="Glade" border="0" width="100" height="45"></a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
          </td>
          <td rowspan=2 valign=top width=100%>
            <!-- end header -->
            <?php maincontent() ?>
            <!-- footer -->
          </td>
        </tr>
      </table>
    </body>
  </html>
