<?php
/*
  $Id: faq.php,v 1.1 2004/03/05 01:39:14 ccwjr Exp $

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

$faq_categories_query = tep_db_query("select ic.categories_id, icd.categories_name from " . TABLE_FAQ_CATEGORIES . " ic, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " icd where icd.categories_id = ic.categories_id and icd.language_id = '" . (int)$languages_id . "' and ic.categories_status = '1' order by ic.categories_sort_order, icd.categories_name ");

// faq outside categories
$faq_query = tep_db_query("select ip.faq_id, ip.question from " . TABLE_FAQ . " ip left join " . TABLE_FAQ_TO_CATEGORIES . " ip2c on ip2c.faq_id = ip.faq_id where ip2c.categories_id = '0' and ip.language = '" . (int)$languages_id . "' and ip.visible = '1' order by ip.v_order, ip.question ");

if ((tep_db_num_rows($faq_categories_query) > 0) || (tep_db_num_rows($faq_query) > 0)) {
?>
          <tr>
            <td>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('text'  => '
							<div><font color="' . $font_color . '">' . BOX_HEADING_FAQ . '</font></div>');

 $r=0;
 // new info2BoxHeading2($info_box_contents, false, false);
 
 echo '<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/tab1x.jpg"></td>
										<td class="hed_right"><div><font color="' . $font_color . '">' . BOX_HEADING_FAQ . '</font></div> </td>
										<td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/tab3x.jpg"></td>
									</tr>
								</table><table border="0" cellpadding="0" cellspacing="0" style="width:100%; ">
									<tr>
										<td class="tab_liney"><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="1"></td>
										<td class="rig1">'; 
$faq_start = '
												';
$faq_end = '</div><br clear="all">
											';
  $faq_string.='';


  while ($faq_categories = tep_db_fetch_array($faq_categories_query)) {
    $id_string = 'cID=' . $faq_categories['categories_id'];

    if($r!=0)	
    { 
     $faq_string.='<div><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/dot_right.jpg" class="dot_left"></div>';
    }
    $r++;

    $faq_string.=' <div><div class="lef2"><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/ch_rig.jpg" class="list_left"></div> <a href="' . tep_href_link(FILENAME_FAQ, $id_string) . '">' . $faq_categories['categories_name'] . '</a>';

  }


  $info_box_contents = array();
  $info_box_contents[] = array('text'  => $faq_start.$faq_string.$faq_end);

new info3Box($info_box_contents);

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
//  new FAQboxFooter($info_box_contents, true, true);

?>
 </td>
 <td class="tab_liney"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME ?>/images/spacer.gif" width="1" height="1"></td>
 </tr></table>
 </td>
          </tr><tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME ?>/images/spacer.gif" width="1" height="1"></td></tr>

           
<?php
}
?>
