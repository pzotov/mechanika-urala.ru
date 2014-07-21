<?php
/*
  $Id: currencies.php,v 1.1.1.1 2004/03/04 23:42:25 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
 	
 	Last Modified by $Author$
 	Last Modifed on : $Date$
 	Latest Revision : $Revision: 1165 $

  Released under the GNU General Public License
*/

  if (isset($currencies) && is_object($currencies)) {
?>
<!-- currencies //-->

<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>       
	      <tr>
            <td><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef5">
<?php
    $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_CURRENCIES . '</font><br><br style="line-height:8px;">');
    //new info2BoxHeading($info_box_contents, false, false);
echo '<font color="' . $font_color . '">' . BOX_HEADING_CURRENCIES . '</font><br><br style="line-height:8px;">';
    reset($currencies->currencies);
    $currencies_array = array();
    while (list($key, $value) = each($currencies->currencies)) {
      $currencies_array[] = array('id' => $key, 'text' => $value['title']);
    }

    $hidden_get_variables = '';
    reset($HTTP_GET_VARS);
    while (list($key, $value) = each($HTTP_GET_VARS)) {
      if ( ($key != 'currency') && ($key != tep_session_name()) && ($key != 'x') && ($key != 'y') ) {
        $hidden_get_variables .= tep_draw_hidden_field($key, $value);
      }
    }

    $info_box_contents = array();
    $info_box_contents[] = array('form' => tep_draw_form('currencies', tep_href_link(basename($PHP_SELF), '', $request_type, false), 'get'),
                                 'align' => 'center',
                                 'text' => tep_draw_pull_down_menu('currency', $currencies_array, $currency, 'onChange="this.form.submit();" class="f2"') . $hidden_get_variables . tep_hide_session_id());


 new info2Box($info_box_contents);

$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
// new WhatboxFooter($info_box_contents, true, true);

?>
            </td></tr></table></td>
			
		<td class="tab_liney"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>	
          </tr>
		  
		  <tr>
								<td style="width:100%;"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/e1.jpg"></td>
										<td class="e1"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="13"></td>
										<td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/e2.jpg"></td>
									</tr>
								</table></td>
							</tr>
		  
		  
<!-- currencies_eof //-->
<?php
  }
?>
