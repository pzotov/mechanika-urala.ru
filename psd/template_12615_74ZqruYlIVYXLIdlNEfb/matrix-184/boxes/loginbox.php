<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
 	
 	Last Modified by $Author$
 	Last Modifed on : $Date$
 	Latest Revision : $Revision: 1075 $


  Released under the GNU General Public License

  IMPORTANT NOTE:

  This script is not part of the official osC distribution
  but an add-on contributed to the osC community. Please
  read the README and  INSTALL documents that are provided
  with this file for further information and installation notes.

  loginbox.php -   Version 1.0
  This puts a login request in a box with a login button.
  If already logged in, will not show anything.

  Modified to utilize SSL to bypass Security Alert
*/
 require(DIR_WS_LANGUAGES . $language . '/loginbox.php');

// WebMakers.com Added: Do not show if on login or create account
if ( (!strstr($_SERVER['PHP_SELF'],'login.php')) and (!strstr($_SERVER['PHP_SELF'],'create_account.php')) and !tep_session_is_registered('customer_id') )  {
?>
<!-- loginbox //-->
<?php

    if (!tep_session_is_registered('customer_id')) {
?>
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_LOGIN ?> </font><br><br style="line-height:5px;"></div>
<?php

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                 'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_LOGIN . '</font>');
    //new info2BoxHeading($info_box_contents, false, false);

    $loginboxcontent = "
            <table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
            <form name=\"login\" method=\"post\" action=\"" . tep_href_link(FILENAME_LOGIN, 'action=process', 'SSL') . "\">
              <tr>
                <td align=\"left\" class=\"infoboxContents\">
                  " . BOX_LOGINBOX_EMAIL . "
                </td>
              </tr>
              <tr>
                <td align=\"left\" class=\"infoboxContents\">
                  <input type=\"text\" name=\"email_address\" maxlength=\"96\" size=\"20\" value=\"\">
                </td>
              </tr>
              <tr>
                <td align=\"left\" class=\"infoboxContents\">
                  " . BOX_LOGINBOX_PASSWORD . "
                </td>
              </tr>
              <tr>
                <td align=\"left\" class=\"infoboxContents\">
                  <input type=\"password\" name=\"password\" maxlength=\"40\" size=\"20\" value=\"\">
                </td>
              </tr>
		    <tr>
        		<td align=\"center\">
			" . tep_draw_separator('pixel_trans.gif', '100%', '5') . "
			</td>
      	    </tr>
              <tr>
                <td class=\"infoboxContents\" align=\"center\">
                  " . tep_image_submit('button_login.gif', IMAGE_BUTTON_LOGIN, 'SSL') . "
                </td>
              </tr>
            </form>
            </table>
              ";
    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                                 'text'  => $loginboxcontent
                                );
new info3box($info_box_contents);


$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
//  new WhatboxFooter($info_box_contents, true, true);
?>
</div>
          </td>
		  <td class="tab_liney"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
									</tr>
									
									
								</table>

		    </td>
          </tr>
		  <tr>
									
				 <td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
									</tr>
									<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="2"></td></tr>
<?php
  } else {
  // If you want to display anything when the user IS logged in, put it
  // in here...  Possibly a "You are logged in as :" box or something.


  }
?>
<!-- loginbox_eof //-->
<?php
// WebMakers.com Added: My Account Info Box
} else {
  if (tep_session_is_registered('customer_id')) {
?>

<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_LOGIN_BOX_MY_ACCOUNT ?> </font><br><br style="line-height:5px;"></div>
<?php

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                 'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_LOGIN_BOX_MY_ACCOUNT . '</font>');
//    new FAQBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  =>
                                          '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . LOGIN_BOX_MY_ACCOUNT . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL') . '">' . LOGIN_BOX_ACCOUNT_EDIT . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">' . LOGIN_BOX_ACCOUNT_HISTORY . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '">' . LOGIN_BOX_ADDRESS_BOOK . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_ACCOUNT_NOTIFICATIONS, '', 'NONSSL') . '">' . LOGIN_BOX_PRODUCT_NOTIFICATIONS . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_LOGOFF, '', 'NONSSL') . '">' . LOGIN_BOX_LOGOFF . '</a>'
                              );
new info2box($info_box_contents);

$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                          'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
 new info2BoxHeading($info_box_contents, true, true);
?>
</div>
          </td>
		  <td class="tab_liney"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
									</tr>
									
									
								</table>

		    </td>
          </tr>
		  <tr>
									
				 <td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
									</tr>
									<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="2"></td></tr>
<!-- my_account_info_eof //-->

<?php
  }
}
?>
