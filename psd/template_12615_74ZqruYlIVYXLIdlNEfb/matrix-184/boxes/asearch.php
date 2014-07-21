<?php
/*
  $Id: asearch.php
  searches articles using article_manager
  by AlDaffodil (aldaffodil@hotmail.com

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2001 osCommerce
   CRE Loaded , Open Source E-Commerce Solutions
   http://www.creloaded.com
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
 	
 	Last Modified by $Author$
 	Last Modifed on : $Date$
 	Latest Revision : $Revision:$

  Released under the GNU General Public License
*/
?>
<!-- article search //-->
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?=  BOX_HEADING_ASEARCH ?> </font><br><br style="line-height:5px;"></div>
<?php
 //if (ALLOW_QUICK_SEARCH_DESCRIPTION == 'true') {
  //  $param = '<input type="hidden" name="search_in_description" value="1">';
 //  } else {
      $param = '';
// }
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_ASEARCH . '</font>');
                              
    // new info2BoxHeading($info_box_contents, false, false);

  $hide = tep_hide_session_id();
  $info_box_contents = array();
  $info_box_contents[] = array('form'  => '<form name="quick_find" method="get" action="' . tep_href_link(FILENAME_ARTICLE_SEARCH, '', 'NONSSL', false) . '">',
                               'align' => 'center',
                               'text'  => $hide . $param . '<input type="text" name="akeywords" size="20" maxlength="30" value="' . htmlspecialchars(StripSlashes(@$HTTP_GET_VARS["akeywords"])) . '"><br/>' . tep_image_submit('button_search.gif', BOX_HEADING_SEARCH) . '<br><input type="checkbox" name="description">Search Article Text<hr>' . BOX_ASEARCH_TEXT . '<br>');
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
<!-- article_search //-->
