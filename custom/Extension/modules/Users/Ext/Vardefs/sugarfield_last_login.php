<?php
/**
  * FileName => sugarfield_last_login.php
  * Created By => LakshmiGayathri (Created On May-25-2017)
  * Modified By =>LakshmiGayathri(Modify On Jun-06-2017)
  * COMMENT => To create the lastlogin field in users module
  */
$dictionary['User']['fields']['last_login']['name'] = 'last_login';
$dictionary['User']['fields']['last_login']['type'] = 'varchar';
$dictionary['User']['fields']['last_login']['vname'] = 'Last Login';
$dictionary['User']['fields']['last_login']['visible'] = 'studio';
$dictionary['User']['fields']['last_login']['len'] =  '255';
$dictionary['User']['fields']['last_login']['audit'] = true;
$dictionary['User']['fields']['last_login']['inline_edit'] = true;
$dictionary['User']['fields']['last_login']['sortable'] =true;
