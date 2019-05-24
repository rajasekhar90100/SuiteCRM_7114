<?php
/**
* File => sugarfield_candcurrent_address_country.php
* Created By => Sravanthi (Created On Oct-06-2017)
* Modified By => Sravanthi (Modify On Oct-06-2017)
* COMMENT => This file is created to create a field in Candidates module manually
*/
$dictionary['vedic_Candidates']['fields']['candcurrent_address_country'] = array (
	'name' => 'candcurrent_address_country',
	'vname' => 'Candidate Current Country',
	'options' => 'country_list',
	'type' => 'enum',
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
