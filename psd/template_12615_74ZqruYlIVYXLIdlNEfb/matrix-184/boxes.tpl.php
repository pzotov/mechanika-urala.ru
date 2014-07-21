<?php
/*
  $Id: boxes.tpl.php,v 1.1.1.1 2004/03/04 23:42:35 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  class tableBox {
    var $table_border = '0';
    var $table_width = '100%';
    var $table_cellspacing = '0';
    var $table_cellpadding = '2';
    var $table_parameters = '';
    var $table_row_parameters = '';
    var $table_data_parameters = '';

// class constructor
    function tableBox($contents, $direct_output = false) {
      $tableBox_string = '<table border="' . tep_output_string($this->table_border) . '" width="' . tep_output_string($this->table_width) . '" cellspacing="' . tep_output_string($this->table_cellspacing) . '" cellpadding="' . tep_output_string($this->table_cellpadding) . '"';
      if (tep_not_null($this->table_parameters)) $tableBox_string .= ' ' . $this->table_parameters;
      $tableBox_string .= '>' . "\n";

      for ($i=0, $n=sizeof($contents); $i<$n; $i++) {
        if (isset($contents[$i]['form']) && tep_not_null($contents[$i]['form'])) $tableBox_string .= $contents[$i]['form'] . "\n";
        $tableBox_string .= '  <tr';
        if (tep_not_null($this->table_row_parameters)) $tableBox_string .= ' ' . $this->table_row_parameters;
        if (isset($contents[$i]['params']) && tep_not_null($contents[$i]['params'])) $tableBox_string .= ' ' . $contents[$i]['params'];
        $tableBox_string .= '>' . "\n";

        if (isset($contents[$i][0]) && is_array($contents[$i][0])) {
          for ($x=0, $n2=sizeof($contents[$i]); $x<$n2; $x++) {
            if (isset($contents[$i][$x]['text']) && tep_not_null($contents[$i][$x]['text'])) {
              $tableBox_string .= '    <td';
              if (isset($contents[$i][$x]['align']) && tep_not_null($contents[$i][$x]['align'])) $tableBox_string .= ' align="' . tep_output_string($contents[$i][$x]['align']) . '"';
              if (isset($contents[$i][$x]['params']) && tep_not_null($contents[$i][$x]['params'])) {
                $tableBox_string .= ' ' . $contents[$i][$x]['params'];
              } elseif (tep_not_null($this->table_data_parameters)) {
                $tableBox_string .= ' ' . $this->table_data_parameters;
              }
              $tableBox_string .= '>';
              if (isset($contents[$i][$x]['form']) && tep_not_null($contents[$i][$x]['form'])) $tableBox_string .= $contents[$i][$x]['form'];
              $tableBox_string .= $contents[$i][$x]['text'];
              if (isset($contents[$i][$x]['form']) && tep_not_null($contents[$i][$x]['form'])) $tableBox_string .= '</form>';
              $tableBox_string .= '</td>' . "\n";
            }
          }
        } else {
          $tableBox_string .= '<td ';
          if (isset($contents[$i]['align']) && tep_not_null($contents[$i]['align'])) $tableBox_string .= ' align="' . tep_output_string($contents[$i]['align']) . '"';
          if (isset($contents[$i]['params']) && tep_not_null($contents[$i]['params'])) {
            $tableBox_string .= ' ' . $contents[$i]['params'];
          } elseif (tep_not_null($this->table_data_parameters)) {
            $tableBox_string .= ' ' . $this->table_data_parameters;
          }
          $tableBox_string .= '>' . $contents[$i]['text'] . '</td>' . "\n"; 
        }

        $tableBox_string .= '  </tr>' . "\n";
        if (isset($contents[$i]['form']) && tep_not_null($contents[$i]['form'])) $tableBox_string .= '</form>' . "\n";
      }

      $tableBox_string .= '</table>' . "\n";

      if ($direct_output == true) echo $tableBox_string;

      return $tableBox_string;
    }
  }


    class infoBox extends tableBox {
    function infoBox($contents) {
      $info_box_contents = array();
      $info_box_contents[] = array('text' => $this->infoBoxContents($contents));
      $this->table_cellpadding = '0';
      $this->table_parameters = 'class="templateinfoBox"';
      $this->tableBox($info_box_contents, true);
    }

    function infoBoxContents($contents) {
      $this->table_cellpadding = '0';
      $this->table_parameters = 'style="padding-left: 10px; padding-right: 10px;"';
      $info_box_contents = array();
      $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      for ($i=0, $n=sizeof($contents); $i<$n; $i++) {
        $info_box_contents[] = array(array('align' => (isset($contents[$i]['align']) ? $contents[$i]['align'] : ''),
                                           'form' => (isset($contents[$i]['form']) ? $contents[$i]['form'] : ''),
                                           'params' => 'class="boxText"',
                                           'text' => (isset($contents[$i]['text']) ? $contents[$i]['text'] : '')));
      }
      $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      return $this->tableBox($info_box_contents);
    }
   }
class infoBox2 extends tableBox {
    function infoBox2($contents) {
      $info_box_contents = array();
      $info_box_contents[] = array('text' => $this->infoBoxContents($contents));
      $this->table_cellpadding = '0';
      $this->table_parameters = 'class="templateinfoBox" style="vertical-align:top" ';
      $this->tableBox($info_box_contents, true);
    }

    function infoBoxContents($contents) {
      $this->table_cellpadding = '0';
      $this->table_parameters = '';
      $info_box_contents = array();
      for ($i=0, $n=sizeof($contents); $i<$n; $i++) {
        $info_box_contents[] = array(array('align' => (isset($contents[$i]['align']) ? $contents[$i]['align'] : ''),
                                           'form' => (isset($contents[$i]['form']) ? $contents[$i]['form'] : ''),
                                           'params' => 'class="boxText"',
                                           'text' => (isset($contents[$i]['text']) ? $contents[$i]['text'] : '')));
      }
      return $this->tableBox($info_box_contents);
    }
   }

    class info_Box extends tableBox {

    function infoBox($contents) {
      $info_box_contents = array();
      $info_box_contents[] = array('text' => $this->infoBoxContents($contents));
      $this->table_cellpadding = '0';
      $this->table_parameters = 'class="templateinfoBox"';
      $this->tableBox($info_box_contents, true);
    }


  function infoBox_Contents($contents) {
      $this->table_cellpadding = '0';
      $this->table_parameters = ' ';
      $info_box_contents = array();
      $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      for ($i=0, $n=sizeof($contents); $i<$n; $i++) {
        $info_box_contents[] = array(array('align' => (isset($contents[$i]['align']) ? $contents[$i]['align'] : ''),
                                           'form' => (isset($contents[$i]['form']) ? $contents[$i]['form'] : ''),
                                           'params' => 'class="boxText"',
                                           'text' => (isset($contents[$i]['text']) ? $contents[$i]['text'] : '')));
      }
      $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      return $this->tableBox($info_box_contents);
    }
  }

  class infoBoxHeading extends tableBox {
    function infoBoxHeading($contents, $left_corner = true, $right_corner = true, $right_arrow = false) {
      $this->table_cellpadding = '0';
      $info_box_contents = array();
      $info_box_contents[] = array(array('params' => 'height="39"',
                                         'text' => ''),
                                   array('params' => ' valign=top', 'text' =>' <table width="100%">
								   
								   
								   <tr>
												<td width="100%" height="23" valign="top" class="top_top"><strong>
			    '. $contents[0]['text']. ' <br><br style="line-height:15px;"></strong>
												</td>
											  </tr>
								   </table>'),
                                   array('params' => 'height="39" nowrap',
                                         'text' => ''));
      $this->tableBox($info_box_contents, true);
    }
  }

  class contentBoxHeading extends tableBox {
    function contentBoxHeading($contents, $left_corner = true, $right_corner = true, $right_arrow = false) {
      $this->table_cellpadding = '0';
      $info_box_contents = array();
      $info_box_contents[] = array(array('params' => 'height="39"',
                                         'text' => ''),
                                   array('params' => 'bgcolor=#FC9C3E height=39 style="padding-left: 30px" class=ch3', 'text' => $contents[0]['text']),
                                   array('params' => 'height="39" nowrap',
                                         'text' => ''));
      $this->tableBox($info_box_contents, true);
    }
  }

  class contentBox extends tableBox {
    function contentBox($contents) {
      $info_box_contents = array();
      $info_box_contents[] = array('text' => $this->contentBoxContents($contents));
      $this->table_cellpadding = '0';
      $this->table_parameters = 'class="templateinfoBox"';
      $this->tableBox($info_box_contents, true);
    }

    function contentBoxContents($contents) {
      $this->table_cellpadding = '0';
      $this->table_parameters = 'class="infoBoxContents"';
      return $this->tableBox($contents);
    }
  }

  class errorBox extends tableBoxMessagestack {
    function errorBox($contents) {
      $this->table_data_parameters = 'class="errorBox"';
      $this->tableBoxmessagestack($contents, true);
    }
  }

  class productListingBox extends tableBox {
    function productListingBox($contents) {
      $this->table_parameters = 'class="productListing"';
      $this->tableBox($contents, true);
    }
  }


  class infoboxFooter extends tableBox {
    function infoBoxFooter($contents, $left_corner = true, $right_corner = true, $right_arrow = false) {

    }
  }

  class info2BoxHeading extends tableBox {
    function info2BoxHeading($contents, $left_corner = true, $right_corner = true, $right_arrow = false) {
      $this->table_cellpadding = '0';

      $info_box_contents = array();
      $info_box_contents[] = array(array('params' => 'height="39"',
                                         'text' => ''),
                                   array('params' => '', 'text' =>'
								   
								 
								   
								   '.$contents[0]['text'].'</td>
 '),
                                   array('params' => 'height="39" nowrap',
                                         'text' => ''));
      $this->tableBox($info_box_contents, true);
    }
  }
  
class info2BoxHeading2 extends tableBox {
    function info2BoxHeading2($contents, $left_corner = true, $right_corner = true, $right_arrow = false) {
      $this->table_cellpadding = '0';

      $info_box_contents = array();
      $info_box_contents[] = array(array('params' => 'height="39"',
                                         'text' => ''),
                                   array('params' => 'class="lef_2" valign=top', 'text' => 
								   
							'<table width="100%" border="0" cellspacing="0" cellpadding="0" class="rt1">
  <tr>
    <td width="28"><img src="'.DIR_WS_TEMPLATES . TEMPLATE_NAME.'/images/rt2.gif" /></td>
    <td class="rh">
								   
								   '  
								   
								   .$contents[0]['text'].
								   
								    '</tr>
</table>'
								   
								   
								   ),
                                   array('params' => 'height="39" nowrap',
                                         'text' => ''));
      $this->tableBox($info_box_contents, true);
    }
  }


  class info2Box extends tableBox {
    function info2Box($contents) {
      $info_box_contents = array();
      $info_box_contents[] = array('text' => $this->info2BoxContents($contents));
      $this->table_cellpadding = '0';
      $this->table_parameters = '';
      $this->tableBox($info_box_contents, true);
    }

    function info2BoxContents($contents) {
      $this->table_cellpadding = '0';
      $this->table_parameters = 'class=bg1';
      $info_box_contents = array();
//      $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      for ($i=0, $n=sizeof($contents); $i<$n; $i++) {
        $info_box_contents[] = array(array('align' => (isset($contents[$i]['align']) ? $contents[$i]['align'] : ''),
                                           'form' => (isset($contents[$i]['form']) ? $contents[$i]['form'] : ''),
                                           'params' => 'class="boxText"',
                                           'text' => (isset($contents[$i]['text']) ? $contents[$i]['text'] : '')));
      }
  //  $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      return $this->tableBox($info_box_contents);
    }
  }


  class info3Box extends tableBox {
    function info3Box($contents) {
      $info_box_contents = array();
      $info_box_contents[] = array('text' => $this->info3BoxContents($contents));
      $this->table_cellpadding = '0';
      $this->table_parameters = 'class="m2"';
      $this->tableBox($info_box_contents, true);
    }

    function info3BoxContents($contents) {
      $this->table_cellpadding = '0';
      $this->table_parameters = '';
      $info_box_contents = array();
//      $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      for ($i=0, $n=sizeof($contents); $i<$n; $i++) {
        $info_box_contents[] = array(array('align' => (isset($contents[$i]['align']) ? $contents[$i]['align'] : ''),
                                           'form' => (isset($contents[$i]['form']) ? $contents[$i]['form'] : ''),
                                           'params' => 'class="boxText"',
                                           'text' => (isset($contents[$i]['text']) ? $contents[$i]['text'] : '')));
      }
  //  $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      return $this->tableBox($info_box_contents);
    }
  }

  class info4Box extends tableBox {
    function info4Box($contents) {
      $info_box_contents = array();
      $info_box_contents[] = array('text' => $this->info4BoxContents($contents));
      $this->table_cellpadding = '0';
      $this->table_parameters = 'class="bg_r2"';
      $this->tableBox($info_box_contents, true);
    }

    function info4BoxContents($contents) {
      $this->table_cellpadding = '0';
      $this->table_parameters = 'class=bg3';
      $info_box_contents = array();
//      $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      for ($i=0, $n=sizeof($contents); $i<$n; $i++) {
        $info_box_contents[] = array(array('align' => (isset($contents[$i]['align']) ? $contents[$i]['align'] : ''),
                                           'form' => (isset($contents[$i]['form']) ? $contents[$i]['form'] : ''),
                                           'params' => 'class="boxText"',
                                           'text' => (isset($contents[$i]['text']) ? $contents[$i]['text'] : '')));
      }
  //  $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '100%', '1')));
      return $this->tableBox($info_box_contents);
    }
  }




  class PLtableBox {
    var $table_border = '0';
    var $table_width = '100%';
    var $table_cellspacing = '0';
    var $table_cellpadding = '0';
    var $table_parameters = '';
    var $table_row_parameters = '';
    var $table_data_parameters = '';

// class constructor
    function PLtableBox($contents, $direct_output = false) {
      $tableBox_string = '<table border="' . tep_output_string($this->table_border) . '" width="' . tep_output_string($this->table_width) . '" cellspacing="' . tep_output_string($this->table_cellspacing) . '" cellpadding="' . tep_output_string($this->table_cellpadding) . '"';
      if (tep_not_null($this->table_parameters)) $tableBox_string .= ' ' . $this->table_parameters;
      $tableBox_string .= '>' . "\n";
      $k=0;

      for ($i=0, $n=sizeof($contents); $i<$n; $i++) {
        if (isset($contents[$i]['form']) && tep_not_null($contents[$i]['form'])) $tableBox_string .= $contents[$i]['form'] . "\n";

         if($k==0)
         { $tableBox_string .= '<tr';}
         else{
          $tableBox_string .= '<tr';
         }
         $k++;

        if (tep_not_null($this->table_row_parameters)) $tableBox_string .= ' ' . $this->table_row_parameters;
        if (isset($contents[$i]['params']) && tep_not_null($contents[$i]['params'])) $tableBox_string .= ' ' . $contents[$i]['params'];
        $tableBox_string .= '>' . "\n";

        if (isset($contents[$i][0]) && is_array($contents[$i][0])) {
          $colum=0;
          for ($x=0, $n2=sizeof($contents[$i]); $x<$n2; $x++) {
            if (isset($contents[$i][$x]['text']) && tep_not_null($contents[$i][$x]['text'])) {

              if($colum!=0)
               {
               $tableBox_string .= '<td style="padding:0px" ></td><td class="bg-v"';
               }
               else{
               $tableBox_string .= ' <td width=1 height=100% valign=top></td><td ';
                }
                $colum++;

             if (isset($contents[$i][$x]['align']) && tep_not_null($contents[$i][$x]['align'])) $tableBox_string .= ' align="' . tep_output_string($contents[$i][$x]['align']) . '"';
              if (isset($contents[$i][$x]['params']) && tep_not_null($contents[$i][$x]['params'])) {
                $tableBox_string .= ' ' . $contents[$i][$x]['params'];
              } elseif (tep_not_null($this->table_data_parameters)) {
                $tableBox_string .= ' ' . $this->table_data_parameters;
              }
              $tableBox_string .= '>';
              if (isset($contents[$i][$x]['form']) && tep_not_null($contents[$i][$x]['form'])) $tableBox_string .= $contents[$i][$x]['form'];
              $tableBox_string .= $contents[$i][$x]['text'];
              if (isset($contents[$i][$x]['form']) && tep_not_null($contents[$i][$x]['form'])) $tableBox_string .= '</form>';
              $tableBox_string .= '</td>' . "\n";
            }
          }
        } else {
          $tableBox_string .= '<td ';
          if (isset($contents[$i]['align']) && tep_not_null($contents[$i]['align'])) $tableBox_string .= ' align="' . tep_output_string($contents[$i]['align']) . '"';
          if (isset($contents[$i]['params']) && tep_not_null($contents[$i]['params'])) {
            $tableBox_string .= ' ' . $contents[$i]['params'];
          } elseif (tep_not_null($this->table_data_parameters)) {
            $tableBox_string .= ' ' . $this->table_data_parameters;
          }
          $tableBox_string .= '>' . $contents[$i]['text'] . '</td>' . "\n"; 
        }

        $tableBox_string .= '  </tr>
		
		
		<td colspan=8 ></td></tr>' . "\n";
        if (isset($contents[$i]['form']) && tep_not_null($contents[$i]['form'])) $tableBox_string .= '</form>' . "\n";
      }

      $tableBox_string .= '</table>' . "\n";

      if ($direct_output == true) echo $tableBox_string;

      return $tableBox_string;
    }
  }

  class PLBox extends PLtableBox {
    function PLBox($contents) {
      $this->table_parameters = ' align=center';
      $this->PLtableBox($contents, true);
    }
  }






?>