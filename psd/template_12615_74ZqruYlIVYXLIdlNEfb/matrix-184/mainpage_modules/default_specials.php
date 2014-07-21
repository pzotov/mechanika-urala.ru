<?php
/*
  $Id: default_specials.php,v 2.0 2003/06/13

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- default_specials //-->

      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
<?php
$info_box_contents = array();
$info_box_contents[] = array('align' => 'left', 'text' => sprintf(TABLE_HEADING_DEFAULT_SPECIALS, strftime('%B')));

new infoBoxHeading($info_box_contents, false, false);
echo ' <table cellspacing=0 cellpadding=0 width=100%>
        <tr><td>
         <table cellspacing=0 cellpadding=0 border=0>
          <tr><td></td></tr><tr>';


 $new = tep_db_query("select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and s.products_id = p.products_id and p.products_id = pd.products_id and pd.language_id = '" . $languages_id . "' and s.status = '1' order by s.specials_date_added DESC limit " . MAX_DISPLAY_SPECIAL_PRODUCTS);

 $info_box_contents = array();
  $row = 0;
  $col = 0;
  $rows=0;
  $colum=0;
  while ($default_specials = tep_db_fetch_array($new)) {
    $default_specials['products_name'] = tep_get_products_name($default_specials['products_id']);


    $default_specials_query_description = tep_db_query("select products_description  from " . TABLE_PRODUCTS_DESCRIPTION . " where products_id = '" . (int)$default_specials['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

    $default_specials_description = tep_db_fetch_array($default_specials_query_description);




echo '

         <td width=203 valign=top>
          <table cellspacing=0 cellpadding=0>
           <tr><td height=20></td></tr>
           <tr><td width=95 align=center valign=top><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $default_specials["products_id"]) . '">' . tep_image(DIR_WS_IMAGES . $default_specials['products_image'], $default_specials['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></td>
           <td width=95 valign=top>
            <table cellspacing=0 cellpadding=0>
             <tr><td height=50 valign=top><a class=ml3 href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $default_specials['products_id']) . '"><u>' . preg_replace('/\s\S*$/i', '', substr($default_specials['products_name'],0,25)) . '</u></a></td></tr>  
             <tr><td class=ch20><s>'.$currencies->display_price($default_specials['products_price'], tep_get_tax_rate($default_specials['products_tax_class_id'])).'</s></td></tr>
             <tr><td height=5></td></tr>
             <tr><td class=ch6>'.$currencies->display_price($default_specials['specials_new_products_price'], tep_get_tax_rate($default_specials['products_tax_class_id'])).'</td></tr>
             <tr><td height=8></td></tr>
             <tr><td><a href="' . tep_href_link('product_info.php','products_id=' . $default_specials["products_id"]) . '">' . tep_image_button('small_view.gif') . '</a></td></tr>
             <tr><td height=2></td></tr>
             <tr><td><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $default_specials["products_id"]) . '">' .tep_image_button('button_in_cart.gif').'</a></td></tr>
            </table> 
           </td></tr>
           <tr><td height=30></td></tr>
          </table> 
         </td>
';

      $colum++;
    if ($colum > 1) {
      $colum = 0;
       if($rows<1)
       {
        echo '
         </tr> 
         <tr><td colspan=3 height=1 align=center>
          <table cellspacing=0 cellpadding=0 align=center>  
           <tr><td height=1></td></tr>
           <tr><td width=199 height=1 background='.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/m26.gif></td>
           <td><img src='.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/m25.gif width=5 height=1></td>
           <td width=199 height=1 background='.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/m26.gif></td></tr>
           <tr><td height=1></td></tr>
          </table>
         </td></tr>
         <tr>';
       $rows++;
       }

    } else echo '<td width=1 background='.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/m24.gif></td>';








    $col ++;
    if ($col > 2) {
      $col = 0;
      $row ++;
    }
  }

if (MAIN_TABLE_BORDER == 'yes'){
$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
}

?>

       </tr>
       <tr><td height=10></td></tr>
      </table>
     </td></tr>
     <tr><td height=2></td></tr>
    </table>


<!-- default_specials_eof //-->
