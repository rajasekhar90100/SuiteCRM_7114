<?php
foreach ($module_menu as $key => $val){
 if($val[1] == $mod_strings['LNK_NEW_RECORD'])
 unset($module_menu[$key]);
}
foreach ($module_menu as $key => $val){
 if($val[1] == $mod_strings['LNK_IMPORT_VCARD'])
 unset($module_menu[$key]); 
}
?>