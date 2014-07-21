<?php
/*
  $Id: whos_online.php, v 1.0 2001/12/05 by mattice@xs4all.nl


  Copyright (c) 2000,2001 The Exchange Project

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
 	
 	Last Modified by $Author$
 	Last Modifed on : $Date$
 	Latest Revision : $Revision: 1075 $


  Released under the GNU General Public License


  IMPORTANT NOTE:

  This script is not part of the official TEP distribution
  but an add-on contributed to the TEP community. Please
  read the README and  INSTALL documents that are provided
  with this file for further information and installation notes.

*/
 require(DIR_WS_LANGUAGES . $language . '/whos_onlinebox.php');
?>


<!-- whos_online //-->
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_WHOS_ONLINE ?> </font><br><br style="line-height:5px;"></div>
<?php

// Set expiration time, default is 900 secs (15 mins)
  $xx_mins_ago = (time() - 900);

  tep_db_query("delete from " . TABLE_WHOS_ONLINE . " where time_last_click < '" . $xx_mins_ago . "'");

  $whos_online_query = tep_db_query("select customer_id from " . TABLE_WHOS_ONLINE);
  while ($whos_online = tep_db_fetch_array($whos_online_query)) {
                        if (!$whos_online['customer_id'] == 0) $n_members++;
                        if ($whos_online['customer_id'] == 0) $n_guests++;

  $user_total = sprintf(tep_db_num_rows($whos_online_query));                                                                }

  if ($user_total == 1) {
    $there_is_are = BOX_WHOS_ONLINE_THEREIS . '&nbsp;';
  } else {
    $there_is_are = BOX_WHOS_ONLINE_THEREARE . '&nbsp;';
  }

  if ($n_guests == 1) {
    $word_guest = '&nbsp;' . BOX_WHOS_ONLINE_GUEST;
  }else{
    $word_guest = '&nbsp;' . BOX_WHOS_ONLINE_GUESTS;
  }

  if ($n_members == 1) {
    $word_member = '&nbsp;' . BOX_WHOS_ONLINE_MEMBER;
  }else{
    $word_member = '&nbsp;' . BOX_WHOS_ONLINE_MEMBERS;
  }


  if (($n_guests >= 1) && ($n_members >= 1)) $word_and = '&nbsp;' . BOX_WHOS_ONLINE_AND . '&nbsp;<br>';

      $textstring = $there_is_are;
        if ($n_guests >= 1) $textstring .= $n_guests . $word_guest;

      $textstring .= $word_and;
        if ($n_members >= 1) $textstring .= $n_members . $word_member;

      $textstring .= '&nbsp;online.';


  $info_box_contents = array();
$info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_WHOS_ONLINE . '</font>');
//  new info2BoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  =>  $textstring
                              );
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
<!-- whos_online_eof //-->
