<?php
/*
  $Id: articles.php, v1.0 2003/12/04 12:00:00 ra Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce
   CRE Loaded , Open Source E-Commerce Solutions
   http://www.creloaded.com
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
        
        Last Modified by $Author$
        Last Modifed on : $Date$
        Latest Revision : $Revision:$

  Released under the GNU General Public License
*/

  function tep_show_topic($counter) {
    global $tree, $topics_string, $tPath_array;

    if(!$counter)
     return 0;

    for ($i=0; $i<$tree[$counter]['level']; $i++) {
      $topics_string .= "&nbsp;&nbsp;";
    }

    if(empty($topics_string)){
     $topics_string .='<div class="margin">';
    }
	$tab = '<div class="margin">';
    if (!empty($topics_string) && $topics_string != $tab)
	{
	 $topics_string .='';
	}



    if ($tree[$counter]['parent'] == 0) {
      $tPath_new = 'tPath=' . $counter;
    } else {
      $tPath_new = 'tPath=' . $tree[$counter]['path'];
    }

    $topics_string .= '<div style="width:75" class="lef_4" style="text-decoration:none"><strong>';

    if (isset($tPath_array) && in_array($counter, $tPath_array)) {
      $topics_string .= '';
    }

// display topic name


   $topics_string .= $tree[$counter]['name'].'</div>';

    if (isset($tPath_array) && in_array($counter, $tPath_array)) {
//      $topics_string .= '</b>';
    }

    if (tep_has_topic_subtopics($counter)) {
      $topics_string .= ' -&gt;';
    }

    $topics_string .= '</strong><br><a href="'.tep_href_link(FILENAME_ARTICLES, $tPath_new).'">'.preg_replace('/\s\S*$/i', '', substr($tree[$counter]['description'], 0, 60)).'</a>';

    if (SHOW_ARTICLE_COUNTS == 'true') {
      $articles_in_topic = tep_count_articles_in_topic($counter);
      if ($articles_in_topic > 0) {
        //$topics_string .= '&nbsp;(' . $articles_in_topic . ')';
      }
    }
    if ($tree[$counter]['next_id'] != false) {
      //tep_show_topic($tree[$counter]['next_id']);
    }
  }
?>
<!-- d-Articles //-->
<tr><td class="tab_linex"><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td></tr>
          <tr>

<td ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="tab_liney" ><img alt=""  src="<?=DIR_WS_TEMPLATES . TEMPLATE_NAME?>/images/spacer.gif" width="1" height="1"></td><td class="lef4">

<div><font color="<?= $font_color ?>"><?= BOX_HEADING_ARTICLES ?> </font><br><br style="line-height:5px;"></div>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('text' =>'
							<font color="' . $font_color . '">' . BOX_HEADING_ARTICLES . '</font></strong>');

//new info2BoxHeading($info_box_contents, false, false);
  $topics_string = '';
  $tree = array();

  $topics_query = tep_db_query("select t.topics_id, td.topics_name, td.topics_description, t.parent_id from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.parent_id = '0' and t.topics_id = td.topics_id and td.language_id = '" . (int)$languages_id . "' order by sort_order, td.topics_name");
  while ($topics = tep_db_fetch_array($topics_query))  {
    $tree[$topics['topics_id']] = array('name' => $topics['topics_name'],
                                        'description' => $topics['topics_description'],
                                        'parent' => $topics['parent_id'],
                                        'level' => 0,
                                        'path' => $topics['topics_id'],
                                        'next_id' => false);
										 
    if (isset($parent_id)) {
      $tree[$parent_id]['next_id'] = $topics['topics_id'];
    }

    $parent_id = $topics['topics_id'];

    if (!isset($first_topic_element)) {
      $first_topic_element = $topics['topics_id'];
    }
  }

  //------------------------
  if (tep_not_null($tPath)) {
    $new_path = '';
    reset($tPath_array);
    while (list($key, $value) = each($tPath_array)) {
      unset($parent_id);
      unset($first_id);
      $topics_query = tep_db_query("select t.topics_id, td.topics_name, t.parent_id from " . TABLE_TOPICS . " t, " . TABLE_TOPICS_DESCRIPTION . " td where t.parent_id = '" . (int)$value . "' and t.topics_id = td.topics_id and td.language_id = '" . (int)$languages_id . "' order by sort_order, td.topics_name");
      if (tep_db_num_rows($topics_query)) {
        $new_path .= $value;
        while ($row = tep_db_fetch_array($topics_query)) {
          $tree[$row['topics_id']] = array('name' => $row['topics_name'],
                                           'parent' => $row['parent_id'],
                                           'level' => $key+1,
                                           'path' => $new_path . '_' . $row['topics_id'],
                                           'next_id' => false);

          if (isset($parent_id)) {
            $tree[$parent_id]['next_id'] = $row['topics_id'];
          }

          $parent_id = $row['topics_id'];

          if (!isset($first_id)) {
            $first_id = $row['topics_id'];
          }

          $last_id = $row['topics_id'];
        }
        $tree[$last_id]['next_id'] = $tree[$value]['next_id'];
        $tree[$value]['next_id'] = $first_id;
        $new_path .= '_';
      } else {
        break;
      }
    }
  }
  tep_show_topic($first_topic_element);
  $topics_string .='</table>';


  $info_box_contents = array();
  $new_articles_string = '';
  $all_articles_string = '';

  $new_articles_string = '<table cellspacing=0 cellpadding=0>';

  $info_box_contents[] = array('text' => $new_articles_string . $all_articles_string . $topics_string);

new info2Box($info_box_contents);
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
//  new WhatboxFooter($info_box_contents, true, true);
?></div>
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
<!-- d-articles_eof //-->
