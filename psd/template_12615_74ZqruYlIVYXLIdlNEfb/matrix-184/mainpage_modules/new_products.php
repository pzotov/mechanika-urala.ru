<?php
/*
  $Id: new_products.php,v 1.1.1.1 2004/03/04 23:41:14 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- mainpages_modules.new_products.php//-->
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('text' => sprintf(TABLE_HEADING_NEW_PRODUCTS, strftime('%B')));

  new infoBoxHeading($info_box_contents, false, false);
echo ' <table cellspacing=0 cellpadding=0 width=100%>
        <tr><td></td></tr>
        <tr><td>
         <table cellspacing=0 cellpadding=0 border=0>
          <tr>';



  if ( (!isset($new_products_category_id)) || ($new_products_category_id == '0') ) {
    $new_products_query = tep_db_query("select products_id, products_image, products_tax_class_id, products_price from " . TABLE_PRODUCTS . " where DATE_SUB(CURDATE(),INTERVAL " .NEW_PRODUCT_INTERVAL ." DAY) <= products_date_added and products_status = '1' order by products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
  } else {
    $new_products_query = tep_db_query("select distinct p.products_id, p.products_image, p.products_tax_class_id, p.products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where DATE_SUB(CURDATE(),INTERVAL " .NEW_PRODUCT_INTERVAL ." DAY) <= p.products_date_added and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.parent_id = '" . $new_products_category_id . "' and p.products_status = '1' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
  }

  $row = 0;
  $col = 0;
  $colum=0;
  $info_box_contents = array();

  while ($new_products = tep_db_fetch_array($new_products_query)) {
    $special_price = tep_get_products_special_price($new_products['products_id']);
    if ($special_price) {
      $products_price = '<s>' .  $currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id'])) . '</s>&nbsp;&nbsp;<span class="productSpecialPrice">' . $currencies->display_price($special_price, tep_get_tax_rate($new_products['products_tax_class_id'])) . '</span>';
    } else {
      $products_price = $currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id']));
    }

    $new_products['products_name'] = tep_get_products_name($new_products['products_id']);

    $new_products_query_description = tep_db_query("select products_description  from " . TABLE_PRODUCTS_DESCRIPTION . " where products_id = '" . (int)$new_products['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

    $new_products_description = tep_db_fetch_array($new_products_query_description);




echo '

         <td width=203 valign=top>
          <table cellspacing=0 cellpadding=0>
           <tr><td height=20></td></tr>
           <tr><td width=95 align=center valign=top><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $new_products['products_image'], $new_products['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></td>
           <td width=95 valign=top>
            <table cellspacing=0 cellpadding=0>
             <tr><td height=50 valign=top><a class=ml3 href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) . '"><u>' . $new_products['products_name'] . '</u></a></td></tr>  
             <tr><td class=ch6>'.$products_price.'</td></tr>
             <tr><td height=8></td></tr>
             <tr><td><a href="' . tep_href_link('product_info.php','products_id=' . $new_products['products_id']) . '">' . tep_image_button('small_view.gif') . '</a></td></tr>
             <tr><td height=2></td></tr>
             <tr><td><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $new_products['products_id']) . '">' .tep_image_button('button_in_cart.gif').'</a></td></tr>
            </table> 
           </td></tr>
           <tr><td height=30></td></tr>
          </table> 
         </td>
';

      $colum++;
    if ($colum > 1) {
      $colum = 0;
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

    } else echo '<td width=1 background='.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/m24.gif></td>';







    $col ++;
    if ($col > 2) {
      $col = 0;
      $row ++;
    }





  }
  

  echo '
       </tr>
       <tr><td height=10></td></tr>
      </table>
     </td></tr>
      <tr>
       <td height=6></td>
      </tr>
    </table>';


?>
<!-- new_products_eof //-->
