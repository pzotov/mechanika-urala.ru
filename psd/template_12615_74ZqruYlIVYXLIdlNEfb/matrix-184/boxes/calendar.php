<?php
/*
$ID
  ~ events_calendar v2.00 2003/06/16 18:09:20 ip chilipepper.it 
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2003 osCommerce
  Released under the GNU General Public License

   CRE Loaded , Open Source E-Commerce Solutions
   http://www.creloaded.com
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
 	
 	Last Modified by $Author$
 	Last Modifed on : $Date$
 	Latest Revision : $Revision: 1075 $

*/


?>
<!-- events_calendar //-->
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4_1">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_CALENDAR ?> </font><br><br style="line-height:5px;"></div>
<?php
    $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_CALENDER . '</font>');
//    new info2boxHeading($info_box_contents, false, false,tep_href_link(FILENAME_EVENTS_CALENDER));

   $info_box_contents = array();
   $info_box_contents[] = array('align' => 'center',
                                'text' => '<iframe name="calendar" id="calendar" align="center" valign="top" marginwidth="0" marginheight="0" ' .
                                          'src='  . FILENAME_EVENTS_CALENDAR_CONTENT . '?_month=' . $_month .'&_year='. $_year .' frameborder=0 height=220 width=162 scrolling=no> ' .
                                          'Sorry, you browser does not support iframes.</iframe> ');
   
 
    new info3Box($info_box_contents);
    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left', 'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                                  );
//      new WhatboxFooter($info_box_contents, true, true);

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
<!-- events_calendar //-->
