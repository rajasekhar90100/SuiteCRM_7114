<?php
$module_name = 'vedic_Solutions_Timesheet';
$listViewDefs [$module_name] = array (
	'NAME' => array (
		'width' => '32%',
		'label' => 'LBL_NAME',
		'default' => true,
		'link' => true,
	),
	'PM_APPROVAL_STATUS' => array (
		'type' => 'enum',
		'label' => 'LBL_PM_APPROVAL_STATUS',
		'width' => '10%',
		'default' => true,
	),
	'RM_APPROVAL_STATUS' => array (
		'type' => 'enum',
		'label' => 'LBL_RM_APPROVAL_STATUS',
		'width' => '10%',
		'default' => true,
	),
	'USERS_VEDIC_SOLUTIONS_TIMESHEET_1_NAME' => array (
		'type' => 'relate',
		'link' => true,
		'label' => 'LBL_USERS_VEDIC_SOLUTIONS_TIMESHEET_1_FROM_USERS_TITLE',
		'id' => 'USERS_VEDIC_SOLUTIONS_TIMESHEET_1USERS_IDA',
		'width' => '10%',
		'default' => true,
	),
	'DATE_ENTERED' => array (
		'type' => 'datetime',
		'label' => 'LBL_DATE_ENTERED',
		'width' => '10%',
		'default' => true,
	),
	'DATE_MODIFIED' => array (
		'type' => 'datetime',
		'label' => 'LBL_DATE_MODIFIED',
		'width' => '10%',
		'default' => true,
	),
);
;
?>
