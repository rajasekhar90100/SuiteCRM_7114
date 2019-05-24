<?php
/**
* File => candcurrent_address_state.php
* Created By => Sravanthi (Created On Oct-06-2017)
* Modified By => Sravanthi (Modify On Oct-06-2017)
* COMMENT => This file is created to create a field in Candidates module manually
*/
$dictionary['vedic_Candidates']['fields']['candcurrent_address_state'] = array (
	'name' => 'candcurrent_address_state',
	'vname' => 'Candidate Current State',
	'type' => 'enum',
	'options' => 'state_list',
	'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,  
);

?>
