<?php
/*
  $Id: categories.php,v 1.1.1.1 2004/03/04 23:42:13 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
        
        Last Modified by $Author$
        Last Modifed on : $Date$
        Latest Revision : $Revision: 1075 $

  Released under the GNU General Public License

*/
$count=0;
 function tep_show_category($counter,$count) {
    global $foo, $categories_string, $id;
    if ($foo[$counter]['parent'] == 0) {
      $cPath_new = 'cPath=' . $counter;
	  $categories_string.='<div>
							<div class="lef2"><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/list_left.jpg" class="list_left"></div><div class="lef3" style="font-size:11px"><a href="'.tep_href_link(FILENAME_DEFAULT, $cPath_new).'">'.$foo[$counter]['name'].'</a>'.'</div>			</div><div><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/dot_left.jpg" class="dot_left"></div>';

    } else {
      $cPath_new = 'cPath=' . $foo[$counter]['path'];
	  $categories_string.='<div>
							<div class="lef2"><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/list_left.jpg" class="list_left"></div> <div class="lef3" style="font-size:11px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.tep_href_link(FILENAME_DEFAULT, $cPath_new).'">'.$foo[$counter]['name'].'</a>'.'</div>			</div><div><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/dot_left.jpg" class="dot_left"></div>';
    }

    if(empty($categories_string))
    { $cate='';}
      $categories_string.=$cate;



/*    if ( ($id) && (in_array($counter, $id)) ) {
    $categories_string .= ' background="' . DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/infobox//r' .$image.'.gif" name="' . $foo[$counter]['name'] . '" width="100%"  height="' .$HEIGHT . '" border="0" style="padding-left:39px;padding-right:5px;">';
    $categories_string .= '<a class="navBlue" href="';

}else{
    $categories_string .= ' background="' . DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/infobox/q' .$image.'.gif" name="' . $foo[$counter]['name'] . '" width="100%"  height="' .$HEIGHT . '" border="0" style="padding-left:39px;padding-right:5px;">';
if ($foo[$counter]['parent'] != 0) {
      $class="subnavBlue";
   } else {
        $class="navGrey";
} 

}
*/




    if ($foo[$counter]['next_id']) {
      tep_show_category($foo[$counter]['next_id'],$count);
    }

  }
?>
<!-- categories //-->
                  <tr>
                    <td >
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'right',
                                'text'  => '
							
							
							<font color="' . $font_color . '">' .BOX_HEADING_CATEGORIES . '</font>');
  //new info2BoxHeading($info_box_contents, false, false);
  echo '
  
  <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
									<tr>
										<td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/tab1.jpg" width="14" height="32"></td>
										<td class="hed_left">
										<font color="' . $font_color . '" >' .BOX_HEADING_CATEGORIES . '</font>
										</td>
										<td><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/tab3.jpg"></td>
									</tr>
								</table><table border="0" cellpadding="0" cellspacing="0" style="width:100%; height:100%;"><tr><td class="tab_liney"><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="1"></td><td>
  
  ';
  $categories_start = '<div  ><img alt=""  src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/spacer.gif" width="1" height="1"></div><div class="lef1"> ';
$categories_string = '';

  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '0' and c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' order by sort_order, cd.categories_name");
  while ($categories = tep_db_fetch_array($categories_query))  {
    $foo[$categories['categories_id']] = array(
                                        'name' => $categories['categories_name'],
                                        'parent' => $categories['parent_id'],
                                        'level' => 0,
                                        'path' => $categories['categories_id'],
                                        'next_id' => false
                                       );

    if (isset($prev_id)) {
      $foo[$prev_id]['next_id'] = $categories['categories_id'];
    }

    $prev_id = $categories['categories_id'];

    if (!isset($first_element)) {
      $first_element = $categories['categories_id'];
    }
  }

  //------------------------
  if ($cPath) {
    $id = split('_', $cPath);
    reset($id);
    while (list($key, $value) = each($id)) {
      $new_path .= $value;
      unset($prev_id);
      unset($first_id);
      $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $value . "' and c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' order by sort_order, cd.categories_name");
      $category_check = tep_db_num_rows($categories_query);
      while ($row = tep_db_fetch_array($categories_query)) {
        $foo[$row['categories_id']] = array(
                                            'name' => $row['categories_name'],
                                            'parent' => $row['parent_id'],
                                            'level' => $key+1,
                                            'path' => $new_path . '_' . $row['categories_id'],
                                            'next_id' => false
                                           );

        if (isset($prev_id)) {
          $foo[$prev_id]['next_id'] = $row['categories_id'];
        }

        $prev_id = $row['categories_id'];

        if (!isset($first_id)) {
          $first_id = $row['categories_id'];
        }

        $last_id = $row['categories_id'];
      }
      if ($category_check != 0) {
        $foo[$last_id]['next_id'] = $foo[$value]['next_id'];
        $foo[$value]['next_id'] = $first_id;
      }

          $new_path .= '_';
    }
  }


tep_show_category($first_element,$count);
$categories2="</div>";

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => $categories_start.$categories_string.$categories2);
new info2box($info_box_contents);
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
echo '<br><br style="line-height:8px;">';
//  new infoboxFooter($info_box_contents, true, true);
?>
                    </td>
					<td class="tab_liney"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>	
					
					
					</tr>
					
										
					</table>
					</td>
				   </tr>
				   		  <tr>
									
				 <td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td>
									</tr>
									<tr><td><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="180" height="2"></td></tr>
<!-- categories_eof //-->
