<?php
/**
  * File Name    => Menu.php
  * Created By   => Maneesha  (Created On APR-26-2017)
  * Modified By => Udaykiran (Modified On Aug-20-2018)
  * COMMENT => To get an action as LCA action in Immigration
  */
// if(ACLController::checkAccess('vedic_Immigration', 'edit', true))$module_menu[] = Array("index.php?module=vedic_Immigration&action=Immigrationreport&return_module=vedic_Immigration", "LCA Report","Vedic_Immigration");

if(ACLController::checkAccess('vedic_Immigration', 'edit', true))
$module_menu[] = Array("index.php?module=vedic_Immigration&action=ImmigrationBillingreport&return_module=vedic_Immigration", "Billing Active Candidates","Vedic_Immigration");
if(ACLController::checkAccess('vedic_Immigration', 'edit', true))
$module_menu[] = Array("index.php?module=vedic_Immigration&action=H1BCAPReport&return_module=vedic_Immigration", "H1B CAP Report","Vedic_Immigration");
/* Added the new H1B report to the Menu tab -By Maneesha(Dec-02-2019) */
$module_menu[] = Array("index.php?module=vedic_Immigration&action=H1breportNew&return_module=vedic_Immigration", "H1B Employee Report","Vedic_Immigration");

?>

