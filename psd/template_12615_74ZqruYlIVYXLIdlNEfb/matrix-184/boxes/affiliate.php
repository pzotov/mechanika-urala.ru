<?php
/*
  $Id: affiliate.php,v 1.1.1.1 2004/03/04 23:42:13 ccwjr Exp $
  OSC-Affiliate
  Contribution based on:
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 - 2003 osCommerce
   
   CRE Loaded , Open Source E-Commerce Solutions
   http://www.creloaded.com
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
 	
 	Last Modified by $Author$
 	Last Modifed on : $Date$
 	Latest Revision : $Revision: 1075 $

  Released under the GNU General Public License
*/
?>          
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_AFFILIATE ?> </font><br><br style="line-height:5px;"></div>
<?php
  $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_AFFILIATE . '</font>');

//  new info2BoxHeading($info_box_contents, false, false);

  if (tep_session_is_registered('affiliate_id')) {
    $info_box_contents = array();
    $info_box_contents[] = array('text' => '<a href="' . tep_href_link(FILENAME_AFFILIATE_SUMMARY, '', 'SSL') . '">' . BOX_AFFILIATE_SUMMARY . '</a><br>' .
                                           '<a href="' . tep_href_link(FILENAME_AFFILIATE_ACCOUNT, '', 'SSL'). '">' . BOX_AFFILIATE_ACCOUNT . '</a><br>' .
                                           '<a href="' . tep_href_link(FILENAME_AFFILIATE_PAYMENT, '', 'SSL'). '">' . BOX_AFFILIATE_PAYMENT . '</a><br>' .
                                           '<a href="' . tep_href_link(FILENAME_AFFILIATE_CLICKS, '', 'SSL'). '">' . BOX_AFFILIATE_CLICKRATE . '</a><br>' .
                                           '<a href="' . tep_href_link(FILENAME_AFFILIATE_SALES, '', 'SSL'). '">' . BOX_AFFILIATE_SALES . '</a><br>' .
                                           '<a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS). '">' . BOX_AFFILIATE_BANNERS . '</a><br>' .
                                           '<a href="' . tep_href_link(FILENAME_AFFILIATE_CONTACT). '">' . BOX_AFFILIATE_CONTACT . '</a><br>' .
                                           '<a href="' . tep_href_link(FILENAME_AFFILIATE_FAQ). '">' . BOX_AFFILIATE_FAQ . '</a><br>' .
                                           '<a href="' . tep_href_link(FILENAME_AFFILIATE_LOGOUT). '">' . BOX_AFFILIATE_LOGOUT . '</a>');
  } else {
    $info_box_contents = array();
    $info_box_contents[] = array('text' => '<a href="' . tep_href_link(FILENAME_AFFILIATE_INFO). '">' . BOX_AFFILIATE_INFO . '</a><br>' .
                                           '<a href="' . tep_href_link(FILENAME_AFFILIATE, '', 'SSL') . '">' . BOX_AFFILIATE_LOGIN . '</a>');
  }

new info3Box($info_box_contents);
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
<!-- affiliate_system_eof //-->
