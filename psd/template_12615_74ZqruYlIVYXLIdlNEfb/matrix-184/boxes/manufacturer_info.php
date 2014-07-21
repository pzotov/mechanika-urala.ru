<?php
/*
  $Id: manufacturer_info.php,v 1.1.1.1 2004/03/04 23:42:26 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

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
<!-- manufacturer_info //-->
<?php
  if (isset($HTTP_GET_VARS['products_id'])) {
    $manufacturer_query = tep_db_query("select p.products_id, p.manufacturers_id, m.manufacturers_id as manf_id, m.manufacturers_name, m.manufacturers_image, mi.manufacturers_url from  " . TABLE_PRODUCTS . " p, " . TABLE_MANUFACTURERS . " m, " . TABLE_MANUFACTURERS_INFO . " mi where p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and m.manufacturers_id = p.manufacturers_id and mi.manufacturers_id = m.manufacturers_id and mi.languages_id = '" . (int)$languages_id . "'");
//    $manufacturer_query = tep_db_query("select p.products_id, p.manufacturers_id from  " . TABLE_PRODUCTS . " p where p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");

   while ($manufacturer = tep_db_fetch_array($manufacturer_query)) {;
?>
<!-- manufacturer_info //-->
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_MANUFACTURER_INFO ?> </font><br><br style="line-height:5px;"></div>
          
<?php
// echo 'prod-id' . (int)$HTTP_GET_VARS['products_id'] . 'manid' . $manufacturer['manufacturers_id'];
      $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_MANUFACTURER_INFO . '</font>');
      new info2BoxHeading($info_box_contents, false, false);

      $manufacturer_info_string = '<table border="0" width="100%" cellspacing="0" cellpadding="0">';
      if (tep_not_null($manufacturer['manufacturers_image'])) $manufacturer_info_string .= '<tr><td align="center" class="infoBoxContents" colspan="2">' . tep_image(DIR_WS_IMAGES . $manufacturer['manufacturers_image'], $manufacturer['manufacturers_name']) . '</td></tr>';
      if (tep_not_null($manufacturer['manufacturers_url'])) $manufacturer_info_string .= '<tr><td valign="top" class="infoBoxContents">-&nbsp;</td><td valign="top" class="infoBoxContents"><a href="' . tep_href_link(FILENAME_REDIRECT, 'action=manufacturer&manufacturers_id=' . $manufacturer['manufacturers_id']) . '" target="_blank">' . sprintf(BOX_MANUFACTURER_INFO_HOMEPAGE, $manufacturer['manufacturers_name']) . '</a></td></tr>';
      $manufacturer_info_string .= '<tr><td valign="top" class="infoBoxContents">-&nbsp;</td><td valign="top" class="infoBoxContents"><a href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $manufacturer['manf_id']) . '">' . BOX_MANUFACTURER_INFO_OTHER_PRODUCTS . ' ' . $manufacturer['manufacturers_name'] . '</a></td></tr>' .
                                   '</table>';

      $info_box_contents = array();
      $info_box_contents[] = array('text' => $manufacturer_info_string);

      new info2Box($info_box_contents);
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
<!-- manufacturer_info_eof //-->
          <?php
	     }
	    }
?>
<!-- manufacturer_info_eof //-->
