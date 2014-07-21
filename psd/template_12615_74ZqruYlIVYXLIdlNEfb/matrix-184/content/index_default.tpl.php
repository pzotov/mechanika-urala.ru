<table border="0" width="100%" cellspacing="0" cellpadding="0" border=0>
<?php

// added for show/hide customer greeting

// added for show/hide customer greeting

if (file_exists(DIR_WS_TEMPLATES .TEMPLATE_NAME . '/mainpage_modules/' . $template_name)) {
$modules_folder = (DIR_WS_TEMPLATES .TEMPLATE_NAME . '/mainpage_modules/' . $template_name);
}else{
$modules_folder = DIR_WS_MODULES. '/mainpage_modules/';
}

if (tep_not_null(INCLUDE_MODULE_TWO)) {
echo '          <tr>
            <td>';
include($modules_folder . INCLUDE_MODULE_TWO);
echo '</td></tr>';
}

if (tep_not_null(INCLUDE_MODULE_ONE)) {
echo '<tr><td>';
include($modules_folder . INCLUDE_MODULE_ONE);
echo '</td></tr>';

?>
          
<?php
}
if (tep_not_null(INCLUDE_MODULE_THREE)) {
echo '<tr><td>';
include($modules_folder . INCLUDE_MODULE_THREE);
echo '</td></tr>';

?>
<?php
}
if (tep_not_null(INCLUDE_MODULE_FOUR)) {
echo '<tr><td>';
include($modules_folder . INCLUDE_MODULE_FOUR);
echo '</td></tr>';

?>
          <tr>
            <td height=6></td>
          </tr>
<?php
}
if (tep_not_null(INCLUDE_MODULE_FIVE)) {
echo '<tr><td>';

include($modules_folder . INCLUDE_MODULE_FIVE);
echo '</td></tr>';

?>
          <tr>
            <td height=6></td>
          </tr>
<?php
}
if (tep_not_null(INCLUDE_MODULE_SIX)) {
echo '<tr><td>';
include($modules_folder . INCLUDE_MODULE_SIX);
echo '</td></tr>';
}

?>
        </table>


