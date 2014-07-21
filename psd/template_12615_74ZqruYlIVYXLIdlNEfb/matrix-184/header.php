	<?php
// WebMakers.com Added: Down for Maintenance
// Hide header if not to show
if (DOWN_FOR_MAINTENANCE_HEADER_OFF =='false') {
if (SITE_WIDTH!='100%') {
?>
<table border="0" cellpadding="0" cellspacing="0" align="center" width="<?=SITE_WIDTH?>" >
<!--
	<tr>
		<td class="white"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="2" height="1"></td>
		<td style="width:100%;" class="white">
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%;">
		<tr><td class="top1"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m1.jpg', 'Home') . '</a><a href="' . tep_href_link(FILENAME_PRODUCTS_NEW) . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m2.jpg', 'New producs') . '</a><a href="'. tep_href_link(FILENAME_SPECIALS, '', 'SSL').'">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m3.jpg', 'Specials') . '</a><a href="'. tep_href_link(FILENAME_ACCOUNT, '', 'SSL').'">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m4.jpg', 'My account') . '</a><a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m5.jpg', 'Checkout') . '</a>';?></td></tr>
			<tr><td><img alt=""  src="images/spacer.gif" width="1" height="2"></td></tr>
			<tr><td><a href="#"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/x1.jpg" width="444" height="161" border="0"></a><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="2" height="1"><a href="#"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/x2.jpg" width="316" height="161" border="0"></a></td></tr>
			<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="2"></td></tr>
			<tr>
				<td style="width:100%;"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
						<td class="top2" width="180"><? // CURRENCIES

    echo tep_draw_form('currencies', tep_href_link(basename($PHP_SELF), '', $request_type, false), 'get');

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

    echo tep_draw_pull_down_menu('currency', $currencies_array, $currency, 'onChange="this.form.submit();" class=f1') . $hidden_get_variables . tep_hide_session_id();
    echo '</form>';
    
?></td>
						<td width="2"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="2" height="1"></td>
						<td class="top2" width="262" align="center" style="text-align:center; vertical-align:middle"><?
											//LANGUAGE
											
											  if (!isset($lng) || (isset($lng) && !is_object($lng))) {
												include(DIR_WS_CLASSES . 'language.php');
												$lng = new language;
											  }
											
											  $languages_string = '';
											  reset($lng->catalog_languages);
											  $flag=0;
											  while (list($key, $value) = each($lng->catalog_languages)) {
											
												if($flag!=0)
												{$languages_string.='<img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/rr.gif" style="margin:0 10 0 10px;">'; }
												$languages_string .= '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '" style="margin:0 0 0 4px;">' . tep_image(DIR_WS_LANGUAGES .  $value['directory'] . '/images/' . $value['image'], $value['name']) . '</a>';
												$flag++;
											  }
											
											  echo $languages_string;
											?></td>
						<td width="2"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="2" height="1"></td>
						<td class="top2 top3"><? // SEARCH ?>
										<?=tep_draw_form('quick_find', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get')?>
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
											<td style="width:52px;" class="top4">search:</td>
												<td><?=tep_draw_input_field('keywords', '', ' maxlength="50"    onclick="this.value=\'\'" value="keyword" class="f2"') . '' . tep_hide_session_id()?></td>
												<td><input type="image" src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/kn_go.jpg" style="margin:2px 0 0 3px;"></td>
											</tr>
										</table></form></td>
					</tr>
				</table></td>
			</tr>
			<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="2"></td></tr>
  <!-- <tr>
		<td style="width:100%; height:259px;"><table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%;">
			<tr>
				<td style="width:100%; height:184px;"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
						<td class="top_bgr"><a href="<?=tep_href_link(FILENAME_DEFAULT)?>"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/logo.jpg" style="margin:43px 0 0 213px;"></a></td>
						<td><table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td class="top_bg"><table border="0" cellpadding="0" cellspacing="0">
									<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="13"></td></tr>
									<tr>
										<td class="top">Choose your language:</td>
										<td></td>
									</tr>
								</table></td>
							</tr>
							<tr><td class="top_bgr1"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="218" height="1"></td></tr>
						</table></td>
					</tr>
				</table></td>
			</tr>
			<tr><td style="width:100%; height:9px;" class="top1"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/a3.jpg"></td></tr>
			<tr>
				<td style="width:100%; height:66px;"><table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/a4.jpg"></td>
						<td><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m1.jpg', 'Home') . '</a><a href="' . tep_href_link(FILENAME_PRODUCTS_NEW) . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m2.jpg', 'New producs') . '</a><a href="'. tep_href_link(FILENAME_SPECIALS, '', 'SSL').'">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m3.jpg', 'Specials') . '</a><a href="'. tep_href_link(FILENAME_ACCOUNT, '', 'SSL').'">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m4.jpg', 'My account') . '</a><a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m5.jpg', 'Checkout') . '</a>';?></td>
					</tr>
				</table></td>
			</tr>
		</table></td>
	</tr>
<td style="width:100%;"><table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%;">
			<tr>
				<td><table border="0" cellpadding="0" cellspacing="0">
					<tr><td><a href="<?=tep_href_link(FILENAME_DEFAULT)?>"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/logo.jpg" style="margin:15px 154px 1px 24px;"></a></td></tr>
					<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/x2.jpg" width="380" height="201" border="0"></td></tr>
				</table></td>
				<td class="top"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
						<td><table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="3" height="1"></td>
								<td class="top2"><table border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td><table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="top4">Your language:</td>
												<td><img alt=""  src="images/spacer.gif" border="0" width="10" height="1"><?
											//LANGUAGE
											
											  if (!isset($lng) || (isset($lng) && !is_object($lng))) {
												include(DIR_WS_CLASSES . 'language.php');
												$lng = new language;
											  }
											
											  $languages_string = '';
											  reset($lng->catalog_languages);
											  $flag=0;
											  while (list($key, $value) = each($lng->catalog_languages)) {
											
												if($flag!=0)
												{$languages_string.=''; }
												$languages_string .= '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '" style="margin:0 0 0 4px;">' . tep_image(DIR_WS_LANGUAGES .  $value['directory'] . '/images/' . $value['image'], $value['name']) . '</a>';
												$flag++;
											  }
											
											  echo $languages_string;
											?></td>
											</tr>
										</table></td>
									</tr>
									<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="15"></td></tr>
									<tr>
										<td><? // SEARCH ?>
										<?=tep_draw_form('quick_find', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get')?>
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td><?=tep_draw_input_field('keywords', '', ' maxlength="50"    onclick="this.value=\'\'" value="keyword" class="f1"') . '' . tep_hide_session_id()?></td>
												<td><input type="image" src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/kn_1.gif" style="margin-left:3px;"></td>
											</tr>
										</table></form></td>
									</tr>
								</table></td>
								<td class="top3"><table border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td><table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td class="top6">Currencies:</td>
												<td><? // CURRENCIES

    echo tep_draw_form('currencies', tep_href_link(basename($PHP_SELF), '', $request_type, false), 'get');

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

    echo tep_draw_pull_down_menu('currency', $currencies_array, $currency, 'onChange="this.form.submit();" class=f2') . $hidden_get_variables . tep_hide_session_id();
    echo '</form>';
    
?></td>
											</tr>
										</table></td>
									</tr>
									<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="11"></td></tr>
									<tr><td class="top5"><a href="<?=tep_href_link(FILENAME_SHOPPING_CART)?>"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/img2.gif" width="33" height="23" border="0" style="margin-right:10px; float:left;"></a><strong>Shopping cart</strong><br><?
							  //SHOPPING CART
				/*			
							  if ($cart->count_contents() > 0) {
								$products = $cart->get_products();
								$cart_contents_string .= $cart->count_contents().' items';
							  }
							   else {
								$cart_contents_string .= '0 items';
							  }
							*/
							?>
									  in your cart <a href="<?=tep_href_link(FILENAME_SHOPPING_CART)?>"><?=$cart_contents_string?></a></td></tr>
								</table></td>
							</tr>
						</table></td>
					</tr>
					<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="10"></td></tr>
					<tr>
						<td><table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td class="top1"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m1.jpg', 'Home') . '</a><br>
									<br style="line-height:18px;"><a href="' . tep_href_link(FILENAME_PRODUCTS_NEW) . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m2.jpg', 'New producs') . '</a><br>
									<br style="line-height:18px;"><a href="'. tep_href_link(FILENAME_SPECIALS, '', 'SSL').'">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m3.jpg', 'Specials') . '</a><br>
									<br style="line-height:18px;"><a href="'. tep_href_link(FILENAME_ACCOUNT, '', 'SSL').'">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m4.jpg', 'My account') . '</a><br>
									<br style="line-height:18px;"><a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m5.jpg', 'Checkout') . '</a>';?>						  </td>
								<td><a href="<?=tep_href_link(FILENAME_SPECIALS, '', 'SSL')?>"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/x1.jpg" width="180" height="175" border="0"></a></td>
							</tr>
						</table></td>
					</tr>
				</table></td>
			</tr>
		</table></td>
	</tr>
	<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="10"></td>-->
	
	
	
	
	<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="14"></td></tr>
	<tr>
		<td style="width:100%;"><table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%;">
			<tr>
				<td class="top1"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="14" height="111"></td>
				<td class="top21"><a href="<?=tep_href_link(FILENAME_DEFAULT)?>"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/logo.jpg" style="margin:36px 4px 19px 8px;"></a></td>
				<td class="top2"></td>
				<td class="top3"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="14" height="1"></td>
				<td class="top4"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/aa1.jpg"></td>
				<td class="top6"><table border="0" cellpadding="0" cellspacing="0" class="top61">
					<tr>
						<td><table border="0" cellpadding="0" cellspacing="0" class="top7">
							<tr>
								<td><table border="0" cellpadding="0" cellspacing="0">
									<tr><td class="c1"><strong>Language:</strong></td></tr>
									<tr><td>
									
					
					<?
											//LANGUAGE
											
											  if (!isset($lng) || (isset($lng) && !is_object($lng))) {
												include(DIR_WS_CLASSES . 'language.php');
												$lng = new language;
											  }
											
											  $languages_string = '';
											  reset($lng->catalog_languages);
											  $flag=0;
											  while (list($key, $value) = each($lng->catalog_languages)) {
											
												if($flag!=0)
												{$languages_string.=''; }
												$languages_string .= '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '" style="margin:0 0 0 4px;">' . tep_image(DIR_WS_LANGUAGES .  $value['directory'] . '/images/' . $value['image'], $value['name']) . '</a>';
												$flag++;
											  }
											
											  echo $languages_string;
											?>
					
					
									
									
									</td></tr>
								</table></td>
								<td class="b_bgr"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
								<td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="31" height="1"></td>
								<td class="c2"><table border="0" cellpadding="0" cellspacing="0">
									<tr>
							<td>			
										
										<?php
  $info_box_contents = array();
  $info_box_contents[] = array('form' => tep_draw_form('quick_find', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get'),
                               'align' => 'right',   
                               'text' => '<table border="0" cellpadding="0" cellspacing="0" ><tr><td >'.tep_draw_input_field('keywords', '', 'class="f1" maxlength="25"  ') .''. tep_hide_session_id() .'</td>
										<td>'. tep_image_submit('button_search.gif', BOX_HEADING_SEARCH, '') . '</td></tr></table>');

 new infoBox2($info_box_contents);
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              ); 
//  new WhatboxFooter($info_box_contents, true, true);
?>
										
										
										
										</td>
										
										
										
									</tr>
									<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="10"></td></tr>
									<tr><td colspan="10"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/ch_top.jpg" style="margin:0 5px 1px 0;"><a href="<?=tep_href_link(FILENAME_ADVANCED_SEARCH, '', 'NONSSL', false)?>">Advanced search</a></td></tr>
								</table></td>
								<td class="b_bgr"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
								<td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="31" height="1"></td>
								<td class="c3"><table border="0" cellpadding="0" cellspacing="0">
									<tr><td><a href="<?=tep_href_link(FILENAME_SHOPPING_CART)?>"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/img_top.jpg" width="30" height="31" border="0" align="left" style="margin-right:8px; "></a><strong>Shopping<br/>  Cart</strong></td></tr>
									<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="3"></td></tr>
									<tr><td>now in your cart 
									
									
									
									<?
							  //SHOPPING CART
							
							  if ($cart->count_contents() > 0) {
								$products = $cart->get_products();
								$cart_contents_string .= $cart->count_contents().' items';
							  }
							   else {
								$cart_contents_string .= '0 items';
							  }
							
							?>
									
									
									
				<b><a href="<?=tep_href_link(FILENAME_SHOPPING_CART)?>">		<?=$cart_contents_string?>	</a></b>		
									
									
									</td></tr>
								</table></td>
							</tr>
						</table></td>
					</tr>
				</table></td>
				<td style="height:100%;" class="top5"><table border="0" cellpadding="0" cellspacing="0" style="height:100%;">
					<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/aa2.jpg" width="14" height="13"></td></tr>
				</table></td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td style="width:100%;"><table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%;">
			<tr>
				<td style="width:100%;" class="d1"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
						<td style="width:100%;"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
							<tr>
								<td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/b1.jpg"></td>
								<td class="b2"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="27"></td>
								<td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/b3.jpg"></td>
							</tr>
						</table></td>
					</tr>
					<tr>
						<td><table border="0" cellpadding="0" cellspacing="0" class="m1">
							
							<?php echo '<tr><td><a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m1.jpg', 'Home') . '</a></td></tr>
									<tr><td><a href="' . tep_href_link(FILENAME_PRODUCTS_NEW) . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m2.jpg', 'New producs') . '</a></td></tr>
									<tr><td><a href="'. tep_href_link(FILENAME_SPECIALS, '', 'SSL').'">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m3.jpg', 'Specials') . '</a></td></tr>
									<tr><td><a href="'. tep_href_link(FILENAME_ACCOUNT, '', 'SSL').'">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m4.jpg', 'My account') . '</a></td></tr>
									<tr><td><a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/navigation/'.$language.'/m5.jpg', 'Checkout') . '</a></td></tr>';?>
							
							
						</table></td>
					</tr>
				</table></td>
				<td><a href="product_info.php?products_id=69"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/x1.jpg" width="416" height="167" border="0"></a></td>
				<td><a href="index.php?cPath=30"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/x2.jpg" width="180" height="167" border="0" style="margin-left:4px;"></a></td>
			</tr>
		</table></td>
	</tr>
	<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="3"></td></tr>
	
	
	
	
	
	
	
	
	
	
	
   <tr><td >

<?
}}
?>

<!-- header_eof //-->
