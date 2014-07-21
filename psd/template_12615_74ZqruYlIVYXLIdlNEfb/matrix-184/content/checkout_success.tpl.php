<?php

 echo tep_draw_form('order', tep_href_link(FILENAME_CHECKOUT_SUCCESS, 'action=update', 'SSL')); 

?>
 
 <table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB;?>" class="bg0">
  <tr><td><table width="100%" cellspacing="0" cellpadding="2">
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
$header_text = HEADING_TITLE;
table_image_border_top(false, false, HEADING_TITLE);
}
// EOF: Lango Added for template MOD
?>



   <tr>
            <td valign="top"><?php echo tep_image(DIR_WS_IMAGES . 'table_background_man_on_board.gif', $HEADING_TITLE); ?></td>
            <td valign="top" class="main"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?><div align="center" class="pageHeading"><?php echo $HEADING_TITLE; ?></div><br><?php echo $TEXT_SUCCESS; ?>
<?php
  if ($global['global_product_notifications'] != '1') {
    echo TEXT_NOTIFY_PRODUCTS . '<br><p class="productsNotifications">';

    $products_displayed = array();
    for ($i=0, $n=sizeof($products_array); $i<$n; $i++) {
      if (!in_array($products_array[$i]['id'], $products_displayed)) {
        echo tep_draw_checkbox_field('notify[]', $products_array[$i]['id']) . ' ' . $products_array[$i]['text'] . '<br>';
        $products_displayed[] = $products_array[$i]['id'];
      }
    }
   
    echo '</p>';
  } else {
    echo TEXT_SEE_ORDERS . '<br><br>' . TEXT_CONTACT_STORE_OWNER;
  }
?>
            <h3><?php echo TEXT_THANKS_FOR_SHOPPING; ?></h3></td>
          </tr>
        </table></td>
      </tr>

<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_bottom();
}
// EOF: Lango Added for template MOD
?>


<?php require('add_checkout_success.php'); //ICW CREDIT CLASS/GV SYSTEM ?>
      <tr>
              <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr><td>
       <table cellspacing=0 cecllpadding=0 width=100%>
        <tr>
         <td align="left" class="main"><?php echo '<a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_CATALOG . FILENAME_ORDERS_PRINTABLE) . '?' . (tep_get_all_get_params(array('order_id')) . 'order_id=' . $HTTP_GET_VARS['order_id']) . '\')">' . tep_template_image_button('button_printorder.gif', IMAGE_BUTTON_PRINT_ORDER) . '</a>'; ?></td>
         <td align="right" class="main"><?php echo tep_template_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
        </tr>
        </table>
      </td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td align="center"><table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right"><?php echo tep_draw_separator('pixel_silver.gif', '1', '5'); ?></td>
                <td width="100%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
              </tr>
            </table></td>
            <td width="25%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
            <td width="25%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
            <td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
                <td width="50%"><?php echo tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif'); ?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center" width="25%" class="checkoutBarFrom"><?php echo CHECKOUT_BAR_DELIVERY; ?></td>
            <td align="center" width="25%" class="checkoutBarFrom"><?php echo CHECKOUT_BAR_PAYMENT; ?></td>
            <td align="center" width="25%" class="checkoutBarFrom"><?php echo CHECKOUT_BAR_CONFIRMATION; ?></td>
            <td align="center" width="25%" class="checkoutBarCurrent"><?php echo CHECKOUT_BAR_FINISHED; ?></td>
          </tr>
        </table><br /></td>
      </tr>
<?php if (DOWNLOAD_ENABLED == 'true') include(DIR_WS_MODULES . 'downloads.php'); ?>
    </table></form>
