<?php 
 //WARNING: The contents of this file are auto-generated



if(ACLController::checkAccess('vedic_GC', 'edit', true))$module_menu[] = Array("index.php?module=vedic_GC&action=GcReport&return_module=vedic_GC", "GC Master Report","vedic_GC");
if(ACLController::checkAccess('vedic_GC', 'edit', true))$module_menu[] = Array("index.php?module=vedic_GC&action=AdsList&return_module=vedic_GC", "Ads List","vedic_GC");

foreach ($module_menu as $key => $val){
 if($val[1] == $mod_strings['LNK_NEW_RECORD'])
 unset($module_menu[$key]);
}
// foreach ($module_menu as $key => $val){
 // if($val[2] == $mod_strings['LNK_IMPORT_VCARD'])
 // unset($module_menu[$key]); 
// }

?>