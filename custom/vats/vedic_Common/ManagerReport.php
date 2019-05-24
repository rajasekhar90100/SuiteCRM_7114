<?php
/**
	* FileName => ManagerReport.php
	* Created By => LakshmiGayathri(Created On Apr-20-2017)
	* Modified By =>LakshmiGayathri(Modify On May-16-2017)
	* COMMENT => Adding Reports in ManagerReports 
	*/

    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
    class ManagerReport
    {
		/**
			* FUNCTION => This is to make entry with in InsertReport Function
			* Created By => LakshmiGayathri (Created On Apr-20-2017)
			* Modified By =>LakshmiGayathri(Modify On May-16-2017)
			* COMMENT =>Used to display the multiplereports unders the reports for Suite7 and SuiteR
	     */  
	     
        function insertReport($event, $arguments)
        {
			if($_REQUEST['module'] != "ModuleBuilder" && $_REQUEST['module']!= "Import") {
				$objACLRole = new ACLRole();
				$roles = $objACLRole->getUserRoles($GLOBALS['current_user']->id);
				// $usertype = $GLOBALS['current_user']->is_admin;
				if(in_array("Leadership", $roles)) {
					global $db;
					$query="SELECT id FROM kreports WHERE name IN('New Candidates Report','Placements Status Report','Submissions Report','Submission Statistics','Recruiting Team - Candidate added during Current Week','Submissions Count by User','Submissions Count by Team','New Candidates Count by Team','New Candidates Count by User') AND deleted=0 ORDER BY name";
					$result = $db->query($query, true);
					$row_id =array();
					while (($row = $db->fetchByAssoc($result)) != null){
						$row_id[] = $row['id'];
					}
						echo <<<EOT
						<script>
							var rid="$row_id[0]";
							var rid1="$row_id[1]";
							var rid2="$row_id[2]";
							var rid3="$row_id[3]";
							var rid4="$row_id[4]";
							var rid5="$row_id[5]";
							var rid6="$row_id[6]";
							var rid7="$row_id[7]";
							var rid8="$row_id[8]";
							
						</script>
EOT;
					echo '<script>
						var template_suite7 = \'<li>\
							<span class="notCurrentTabLeft">&nbsp;</span><span class="notCurrentTab">\
								<a href="#" id="reportsDropdown">Reports</a>\
							</span>\
							<span class="notCurrentTabRight">&nbsp;</span>\
							<ul class="cssmenu">\
								<li>\
									<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid+\'" id="New_Candidates_Team" module="KReports">New Candidates Count by Team</a>\
								</li>\
								<li>\
									<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid1+\'" id="New_Candidates_User" module="KReports">New Candidates Count by User</a>\
								</li>\
								<li>\
									<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid2+\'" id="New_Candidates_Report" module="KReports">New Candidates Report</a>\
								</li>\
								<li>\
									<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid3+\'" id="Placements_Status_Report" module="KReports">Placements Status Report</a>\
								</li>\
								<li>\
									<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid4+\'" id="Recruiting_Team" module="KReports">Recruiting Team</a>\
								</li>\
								<li>\
									<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid5+\'" id="Submissions_Statistics" module="KReports">Submission Statistics</a>\
								</li>\
								<li>\
									<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid6+\'" id="Submissions_Team" module="KReports">Submissions Count by Team</a>\
								</li>\
								<li>\
									<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid7+\'" id="Submissions_User" module="KReports">Submissions Count by User</a>\
								</li>\
								<li>\
									<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid8+\'" id="Submissions_Report" module="KReports">Submissions Report</a>\
								</li>\
								<li>\
									<a href="index.php?module=Users&action=Loginreport&return_module=Users" id="UserLogin_Report" module="Users">User Login History</a>\
								</li>\
								<li>\
									<a href="index.php?module=Users&action=Lastlogin&return_module=Users" id="User_Last_Login" module="Users">User Last Login</a>\
								</li>\
								<li>\
									<a href="index.php?module=Users&action=UserActivity&return_module=Users" id="UserActivity" module="Users">User Activity</a>\
								</li>\
							</ul>\
						</li>\';
			
						var template_suiteR = \'<li class="topnav">\
							<span class="notCurrentTabLeft">&nbsp;</span>\
							<span class="notCurrentTab">\
								<a href="#" id="reportsDropdown"  class="dropdown-toggle" data-toggle="dropdown">Reports</a>\
								<span class="notCurrentTabRight">&nbsp;</span>\
								<ul class="dropdown-menu" role="menu">\
									<li>\
										<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid+\'" id="New_Candidates_Team" module="KReports">New Candidates Count by Team</a>\
									</li>\
									<li>\
										<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid1+\'" id="New_Candidates_User" module="KReports">New Candidates Count by User</a>\
									</li>\
									<li>\
										<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid2+\'" id="New_Candidates_Report" module="KReports">New Candidates Report</a>\
									</li>\
									<li>\
										<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid3+\'" id="Placements_Status_Report" module="KReports">Placements Status Report</a>\
									</li>\
									<li>\
										<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid4+\'" id="Recruiting_Team" module="KReports">Recruiting Team</a>\
									</li>\
									<li>\
										<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid5+\'" id="Submissions_Statistics" module="KReports">Submission Statistics</a>\
									</li>\
									<li>\
										<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid6+\'" id="Submissions_Team" module="KReports">Submissions Count by Team</a>\
									</li>\
									<li>\
										<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid7+\'" id="Submissions_User" module="KReports">Submissions Count by User</a>\
									</li>\
									<li>\
										<a href="index.php?module=KReports&return_module=KReports&action=DetailView&record=\'+rid8+\'" id="Submissions_Report" module="KReports">Submissions Report</a>\
									</li>\
									<li>\
										<a href="index.php?module=Users&action=Loginreport&return_module=Users" id="UserLogin_Report" module="Users">User Login History</a>\
									</li>\
									<li>\
										<a href="index.php?module=Users&action=Lastlogin&return_module=Users" id="User_Last_Login" module="Users">User Last Login</a>\
									</li>\
									<li>\
										<a href="index.php?module=Users&action=UserActivity&return_module=Users" id="UserActivity" module="Users">User Activity</a>\
									</li>\
								</ul>\
							</span>\
						</li>\';
						if(!$("#reportsDropdown")[0]) {
							$(template_suite7).insertBefore($("#moduleList").children().children().last());
							$(template_suiteR).insertBefore($(".topnav").last());
						}
					</script>';
				}
			}
        }
    }

?>