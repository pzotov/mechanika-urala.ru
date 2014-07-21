    <?php echo tep_draw_form('login', tep_href_link(FILENAME_LOGIN, 'action=process', 'SSL')); ?>
    <table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB; ?>">
<?php
  if ($messageStack->size('login') > 0) {
?>
      <tr>
        <td><?php echo $messageStack->output('login'); ?></td>
      </tr>
<?php
  }
  if ($cart->count_contents() > 0) {
?>
      <tr>
        <td class="smallText"><?php echo TEXT_VISITORS_CART; ?></td>
      </tr>
<?php
  }
?>
<?php
if (PWA_ON == 'false') {
require(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'. FILENAME_PWA_ACC_LOGIN);
} else {
require(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'. FILENAME_PWA_PWA_LOGIN);
}
/*old
if (PWA_ON == 'false') {
require(DIR_WS_INCLUDES . FILENAME_PWA_ACC_LOGIN);
} else {
require(DIR_WS_INCLUDES . FILENAME_PWA_PWA_LOGIN);
}
*/
?>
</table></form>

