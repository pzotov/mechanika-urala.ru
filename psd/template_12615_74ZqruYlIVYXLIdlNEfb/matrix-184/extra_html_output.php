<?php

////
// The HTML form submit button wrapper function
// Outputs a button in the selected language
  function tep_template_image_submit($image, $alt = '', $parameters = '') {
    global $language;

    $image_submit = '<input type="image" src="' . tep_output_string(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/buttons/' . $language . '/' .  $image) . '" border="0" alt="' . tep_output_string($alt) . '"';

    if (tep_not_null($alt)) $image_submit .= ' title=" ' . tep_output_string($alt) . ' "';

    if (tep_not_null($parameters)) $image_submit .= ' ' . $parameters;

    $image_submit .= '>';

    return $image_submit;
  }

////
// Output a function button in the selected language
  function tep_template_image_button($image, $alt = '', $parameters = '') {
    global $language;

    return tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/buttons/' . $language . '/' .  $image, $alt, '', '', $parameters);
  }


  function table_image_border_top($left, $right,$header){
if (MAIN_TABLE_BORDER == 'yes'){
?>
      <!--Lango Added for Template MOD: BOF-->
        <tr>

         <td>
<?PHP
$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left', 'text' => $header );
//new infoBoxHeading($info_box_contents, $left, $right);
?>
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td>
              <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
                  <table border="0" cellspacing="0" cellpadding="0" align="right" width="100%" style="border-collapse: collapse" >
                    <tr>
                      <td>
      <!--Lango Added for Template MOD: EOF-->
<?php
}
}



  function table_image_border_top2($left, $right,$header){
if (MAIN_TABLE_BORDER == 'yes'){
?>
      <!--Lango Added for Template MOD: BOF-->
        <tr>
          <td>
<?PHP
$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left', 'text' => $header );
  new infoBoxHeading($info_box_contents, $left, $right);
?>
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td>
              <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
                  <table border="0" cellspacing="0" cellpadding="0" align="right" width="100%">
                    <tr>
                      <td>
      <!--Lango Added for Template MOD: EOF-->
<?php
}
}


 function table_image_border_bottom(){
if (MAIN_TABLE_BORDER == 'yes'){
?>
         </td>
                    </tr>
                    <!--Lango Added for Template MOD: BOF-->
                  </table>
                  </td>
                </tr>
              </table>
              </td>
            </tr>
          </table>
<?PHP
$info_box_contents = array();
?>
     </td></tr>
      <!--Lango Added for Template MOD: EOF-->
<?php
}
}


 function table_image_border_bottom2(){
if (MAIN_TABLE_BORDER == 'yes'){
?>
         </td>
                    </tr>
                    <!--Lango Added for Template MOD: BOF-->
                  </table>
                  </td>
                </tr>
              </table>
<?PHP
$info_box_contents = array();
?>
     </td></tr>
      <!--Lango Added for Template MOD: EOF-->
<?php
}
}


?>
