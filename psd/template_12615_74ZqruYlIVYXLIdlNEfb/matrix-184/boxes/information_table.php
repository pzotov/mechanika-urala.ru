<?php
/*
  $Id: information.php,v 1.1.1.1 2003/09/18 19:05:51 wilt Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2001 osCommerce

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

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_INFORMATION_TABLE ?> </font><br><br style="line-height:5px;"></div>
<?php
require(DIR_WS_LANGUAGES . $language . '/informationbox.php');

  $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_INFORMATION_TABLE . '</font>');
//  new info2BoxHeading($info_box_contents, false, false);

  // Retrieve information from Info table
   $informationString = "";

 // joles
   $sql_query = tep_db_query("SELECT information_id, languages_id, info_title FROM " . TABLE_INFORMATION . " WHERE visible= '1' and languages_id ='" . (int)$languages_id . "' ORDER BY v_order");
   while ($row = tep_db_fetch_array($sql_query)){
   $informationString .= '<a href="' . tep_href_link(FILENAME_INFORMATION,  'info_id=' . $row['information_id'] ) . '">' . $row['info_title'] . '</a><br>';
   }

   $info_box_contents = array();

if (tep_session_is_registered('customer_id')) {
   $info_box_contents[] = array('text' =>  $informationString .
                                          '<a href="' . tep_href_link(FILENAME_GV_FAQ, '', 'NONSSL') . '">' . BOX_INFORMATION_GV . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_LINKS) . '"> ' . BOX_INFORMATION_LINKS . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'NONSSL') . '">' . BOX_INFORMATION_CONTACT . '</a>');

 } else if ((tep_session_is_registered('customer_id')) && (MODULE_ORDER_TOTAL_GV_STATUS == 'true')) {
   $info_box_contents[] = array('text' =>  $informationString .
                                          '<a href="' . tep_href_link(FILENAME_GV_FAQ, '', 'NONSSL') . '">' . BOX_INFORMATION_GV . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_LINKS) . '"> ' . BOX_INFORMATION_LINKS . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'NONSSL') . '">' . BOX_INFORMATION_CONTACT . '</a>');
} else {
   $info_box_contents[] = array('text' =>  $informationString .
                                          '<a href="' . tep_href_link(FILENAME_GV_FAQ, '', 'NONSSL') . '">' . BOX_INFORMATION_GV . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_LINKS) . '"> ' . BOX_INFORMATION_LINKS . '</a><br>' .
                                          '<a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'NONSSL') . '">' . BOX_INFORMATION_CONTACT . '</a>');
}

  new info3box($info_box_contents);
    $info_box_contents = array();
	$info_box_contents[] = array('align' => 'left',
	                             'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
	                              );
//	 new WhatboxFooter($info_box_contents, true, true);

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
<!-- information_eof //-->
