<?php
/*
  $Id: pages.php,v 1.1 2004/03/05 01:39:14 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
 	
 	Last Modified by $Author$
 	Last Modifed on : $Date$
 	Latest Revision : $Revision:$


  Released under the GNU General Public License
*/

$pages_categories_query = tep_db_query("select ic.categories_id, icd.categories_name from " . TABLE_PAGES_CATEGORIES . " ic, " . TABLE_PAGES_CATEGORIES_DESCRIPTION . " icd where icd.categories_id = ic.categories_id and icd.language_id = '" . (int)$languages_id . "' and ic.categories_status = '1' order by ic.categories_sort_order, icd.categories_name");

// pages outside categories
$pages_query = tep_db_query("select ip.pages_id, ipd.pages_title from " . TABLE_PAGES . " ip, " . TABLE_PAGES_DESCRIPTION . " ipd left join " . TABLE_PAGES_TO_CATEGORIES . " ip2c on ip2c.pages_id = ip.pages_id where ipd.pages_id = ip.pages_id and ip2c.categories_id = '0' and ipd.language_id = '" . (int)$languages_id . "' and ip.pages_status = '1' order by ip.pages_sort_order, ipd.pages_title");

if ((tep_db_num_rows($pages_categories_query) > 0) || (tep_db_num_rows($pages_query) > 0)) {
?>
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_PAGES ?> </font><br><br style="line-height:5px;"></div>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_PAGES . '</font>');

//  new infoBoxHeading($info_box_contents, false, false);

  $pages_string = '';
  while ($pages_categories = tep_db_fetch_array($pages_categories_query)) {
    $id_string = 'cID=' . $pages_categories['categories_id'];
    $pages_string .= '<a href="' . tep_href_link(FILENAME_PAGES, $id_string) . '">' . $pages_categories['categories_name'] . '</a><br>';
  }

  while ($pages = tep_db_fetch_array($pages_query)) {
    $id_string = 'pID=' . $pages['pages_id'];
    $pages_string .= '<a href="' . tep_href_link(FILENAME_PAGES, $id_string) . '">' . $pages['pages_title'] . '</a><br>';
  }

  $info_box_contents = array();
  $info_box_contents[] = array('text'  => $pages_string);

  new infoBox($info_box_contents);
$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
  new infoboxFooter($info_box_contents, true, true);

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
}
?>
