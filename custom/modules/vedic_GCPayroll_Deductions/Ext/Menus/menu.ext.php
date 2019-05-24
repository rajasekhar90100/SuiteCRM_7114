<?php 
 //WARNING: The contents of this file are auto-generated


/**
  * FileName => menu.ext.php
  * Created By =>Lakshmi Gayathri (Created On June-19-2018)
  * Modified By =>Lakshmi Gayathri(Modified On June-19-2018)
  * COMMENT => Disabled the direct creation of Gc Payroll Deductions
  */
foreach ($module_menu as $key => $val){
	if($val[1] == $mod_strings['LNK_NEW_RECORD'])
	unset($module_menu[$key]);
}


?>