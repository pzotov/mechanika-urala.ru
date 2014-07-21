<?php
/*
  $Id: links.php,v 1.1 2004/03/05 01:39:14 ccwjr Exp $

  Contribution by Meltus
  http://www.highbarn-consulting.com

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


// check for link categoris to determine if there is anything to display
  $link_categories_query = tep_db_query("select lc.link_categories_id, lcd.link_categories_name from " . TABLE_LINK_CATEGORIES . " lc, " . TABLE_LINK_CATEGORIES_DESCRIPTION . " lcd where lc.link_categories_id = lcd.link_categories_id and lc.link_categories_status = '1' and lcd.language_id = '" . (int)$languages_id . "' order by lcd.link_categories_name");
  $number_of_categories = tep_db_num_rows($link_categories_query);

  if ($number_of_categories > 0) {
?>
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_LINKS ?> </font><br><br style="line-height:5px;"></div>
<?php
    $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_LINKS . '</font>');
  //  new info2BoxHeading($info_box_contents, false, false);

    $informationString = '';
    while($row = tep_db_fetch_array($link_categories_query)) {
      $lPath_new = 'lPath=' . $row['link_categories_id'];
      $informationString .= '<a href="' . tep_href_link(FILENAME_LINKS, $lPath_new) . '">' . $row['link_categories_name'] . '</a><br>';
    }
    $info_box_contents = array();
   	$info_box_contents[] = array('align' => 'left',
                                 'text'  => $informationString
                                );
    new info3Box($info_box_contents);
    $info_box_contents = array();
	$info_box_contents[] = array('align' => 'left',
	                             'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
	                              );
// new WhatboxFooter($info_box_contents, true, true);

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
<?
  }
?>
