<?php
/*
  $Id: footer.php,v 1.26 2003/02/10 22:30:54 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/



// WebMakers.com Added: Down for Maintenance
// Hide footer.php if not to show
if (DOWN_FOR_MAINTENANCE_FOOTER_OFF =='false') {
  require(DIR_WS_INCLUDES . 'counter.php');
?>

<!--
<tr>
		<td style="width:100%;" class="end2"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
			<tr>
				<td style="width:250px;"><table border="0" cellpadding="0" cellspacing="0">
					<tr><td class="end3">
						Customer Service:    +1 800 559 6580<br><br style="line-height:15px;">

						9870 St Vincent Place,<br><br style="line-height:2px;">
						Glasgow, DC 45 Fr 45.
					</td></tr>
				</table></td>
				<td style="width:550px;" class="end4"><table border="0" cellpadding="0" cellspacing="0">
					<tr><td class="end5">
					
					
					
					
					
					<?php
      if (!tep_session_is_registered('noaccount')){// DDB - PWA - 040622 - no display of logoff for PWA customers
         if (!tep_session_is_registered('customer_id')) {
		 		  echo ' <a href="' . tep_href_link(FILENAME_LOGIN, "", "SSL") . '" >' . HEADER_TITLE_LOGIN . '</a>';
                } else {
                  echo ' <a  href="' . tep_href_link(FILENAME_ACCOUNT, "", "SSL") . '">' . HEADER_TITLE_MY_ACCOUNT . ' </a>&nbsp; &nbsp;|&nbsp; &nbsp;';
                  echo ' <a href="' . tep_href_link(FILENAME_LOGOFF, "", "SSL") . '" ">' . HEADER_TITLE_LOGOFF . ' </a>';
                }
               }?>
					
					
					
					
					
					
					
					  &nbsp;  |  &nbsp;  <a href="<?=tep_href_link(FILENAME_SHOPPING_CART)?>"><?=HEADER_TITLE_CART_CONTENTS?></a> &nbsp;   | &nbsp;  <a href="<?=tep_href_link(FILENAME_CHECKOUT_CONFIRMATION)?>"><?= HEADER_TITLE_CHECKOUT?></a><br><br style="line-height:5px;"></td></tr>
					<tr><td class="end6">Copyright &copy; <?=date('Y')?> <?=STORE_NAME?> |  <a href="<?=tep_href_link('information.php','info_id=3')?>">Privacy Notice</a>  |   <a href="<?=tep_href_link('information.php','info_id=1')?>">Terms of Use</a></td></tr>
				</table></td>
			</tr>
		</table></td>
	</tr>

</table>
 <br />
-->


<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="3"></td></tr>
	<tr>
		<td style="width:100%" class="footer"><table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%">
			<tr>
				<td class="end1"><table border="0" cellpadding="0" cellspacing="0" style="height:100%;">
					<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/en1.jpg"></td></tr>
					<tr><td style="height:100%;"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
					<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/en2.jpg"></td></tr>
				</table></td>
				<td style="width:100%;"><table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%;">
					<tr><td class="end_line"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
					<tr>
						<td style="height:100%;"><table border="0" cellpadding="0" cellspacing="0" class="end3">
							<tr>
								<td><table border="0" cellpadding="0" cellspacing="0" style="height:100%;">
									<tr>
										<td><a href="#"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/img_end.jpg" style="margin:12px 20px 12px 0;" border="0"></a></td>
										<td class="end_line"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
										<td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="19" height="1"></td>
										<td><table border="0" cellpadding="0" cellspacing="0">
											<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="6"></td></tr>
											<tr><td class="end_txt1"><?php
      if (!tep_session_is_registered('noaccount')){// DDB - PWA - 040622 - no display of logoff for PWA customers
         if (!tep_session_is_registered('customer_id')) {
		 		  echo ' <a href="' . tep_href_link(FILENAME_LOGIN, "", "SSL") . '" >' . HEADER_TITLE_LOGIN . '</a>';
                } else {
                  echo ' <a  href="' . tep_href_link(FILENAME_ACCOUNT, "", "SSL") . '">' . HEADER_TITLE_MY_ACCOUNT . ' </a>&nbsp; &nbsp;|&nbsp; &nbsp;';
                  echo ' <a href="' . tep_href_link(FILENAME_LOGOFF, "", "SSL") . '" ">' . HEADER_TITLE_LOGOFF . ' </a>';
                }
               }?>   &nbsp; |  &nbsp;  <a href="<?=tep_href_link(FILENAME_SHOPPING_CART)?>"><?=HEADER_TITLE_CART_CONTENTS?></a> &nbsp;  | &nbsp; <a href="<?=tep_href_link(FILENAME_CHECKOUT_CONFIRMATION)?>"><?= HEADER_TITLE_CHECKOUT?></a><br><br style="line-height:5px;"></td></tr>
											<tr><td class="end_txt2">Copyright &copy; <?=date('Y')?> <?=STORE_NAME?>  &nbsp;  |  &nbsp; <a href="<?=tep_href_link('information.php','info_id=3')?>">Privacy Notice </a> &nbsp; |  &nbsp; <a href="<?=tep_href_link('information.php','info_id=1')?>">Terms of Use</a></td></tr>
										</table></td>
									</tr>
								</table></td>
							</tr>
						</table></td>
					</tr>
					<tr><td class="end_line"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
				</table></td>
				<td class="end2"><table border="0" cellpadding="0" cellspacing="0" style="height:100%;">
					<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/en3.jpg"></td></tr>
					<tr><td style="height:100%;"></td></tr>
					<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/en4.jpg"></td></tr>
				</table></td>
			</tr>
		</table></td>
	</tr>
</table>
 
 
 
 
  
<!-- footer_eof //-->
<?php } ?>