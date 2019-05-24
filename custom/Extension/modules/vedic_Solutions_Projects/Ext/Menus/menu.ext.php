<?php
/**  
  * FileName => menu.ext.php
  * Added By => Rajasekhar (Modified On Jun-14-2018)
  * Modified By => Lakshmi (Modified On Feb-26-2019)
  * COMMENT => Added the Timesheet Report only for Solutions Team,Consultant Report for Operations Team
  * COMMENT => Added the Consultant's Pending Timesheet Report.
  */
global $current_user;
if(ACLController::checkAccess('vedic_Solutions_Projects', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Projects&action=SolutionsProjectReport",'Solutions Timesheet Report',"Report", 'Solutions Timesheet Report');
if(ACLController::checkAccess('vedic_Solutions_Projects', 'edit', true))$module_menu[] =Array("index.php?module=vedic_Solutions_Projects&action=OpenBillingProjects",'Open Billing Projects',"Report", 'Open Billing Projects');
?>