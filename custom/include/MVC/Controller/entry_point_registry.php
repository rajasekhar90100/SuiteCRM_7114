<?php
$entry_point_registry['formLetter'] = array('file' => 'modules/AOS_PDF_Templates/formLetterPdf.php' , 'auth' => '1'); 
$entry_point_registry['generatePdf'] = array('file' => 'modules/AOS_PDF_Templates/generatePdf.php' , 'auth' => '1'); 
$entry_point_registry['Reschedule'] = array('file' => 'modules/Calls_Reschedule/Reschedule_popup.php' , 'auth' => '1'); 
$entry_point_registry['Reschedule2'] = array('file' => 'modules/Calls/Reschedule.php' , 'auth' => '1');
$entry_point_registry['social'] = array('file' => 'include/social/get_data.php' , 'auth' => '1');
$entry_point_registry['social_reader'] = array('file' => 'include/social/get_feed_data.php' , 'auth' => '1');
$entry_point_registry['add_dash_page'] = array('file' => 'modules/Home/AddDashboardPages.php' , 'auth' => '1');
$entry_point_registry['retrieve_dash_page'] = array('file' => 'include/MySugar/retrieve_dash_page.php' , 'auth' => '1');
$entry_point_registry['remove_dash_page'] = array('file' => 'modules/Home/RemoveDashboardPages.php' , 'auth' => '1');
$entry_point_registry['rename_dash_page'] = array('file' => 'modules/Home/RenameDashboardPages.php' , 'auth' => '1');
$entry_point_registry['custom_download'] = array('file' => 'custom/custom_download.php' , 'auth' => '1');
$entry_point_registry['UploadMFiles'] = array('file' => 'custom/vats/vedic_Common/uploadMultipleFiles.php' , 'auth' => '1');
$entry_point_registry['UploadMFile'] = array('file' => 'custom/vats/vedic_Common/uploadMFile.php' , 'auth' => '1');
$entry_point_registry['fetchCustomerDetails'] = array('file' => 'custom/vats/vedic_Common/fetchcustomerDetails.php' , 'auth' => '1');
$entry_point_registry['displayFileName'] = array('file' => 'custom/vats/vedic_Common/displayFileName.php' , 'auth' => '1');
$entry_point_registry['immigrationAudit'] = array('file' => 'custom/vats/vedic_Common/immigrationAudit.php' , 'auth' => '1');
$entry_point_registry['fetchSSN'] = array('file' => 'custom/vats/vedic_Common/fetchSSN.php' , 'auth' => '1');
$entry_point_registry['auditSSN'] = array('file' => 'custom/vats/vedic_Common/auditSSN.php' , 'auth' => '1');
#START :: ENTRY_POINT_REGISTRY FOR RESUME PARSING AND PREVIEW :: April-14-2017 :: BY PARIMAl
$entry_point_registry['parsing'] = array('file' => 'custom/vats/vedic_Common/defaultresume.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR RESUME PARSING AND PREVIEW :: April-14-2017 :: BY parimal
#START :: ENTRY_POINT_REGISTRY FOR pasting images in tinymce :: Jul-02-2017:: BY Udaykiran
$entry_point_registry['powerpaste'] = array('file' => 'custom/vats/vedic_Common/postAcceptor.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR pasting images in tinymce :: Jul-02-2017:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY organization chart :: Apr-18-2018:: BY Rajasekhar
 $entry_point_registry['vedicconnections'] = array('file' => 'custom/vats/vedic_Common/GetOrgChart/getorgchart-demos/mixed-hierarchy.html' , 'auth' => '1');
 #END :: ENTRY_POINT_REGISTRY organization chart :: Apr-18-2018:: BY Rajasekhar

 #START :: ENTRY_POINT_REGISTRY FOR get the users data from users :: Apr-18-2018:: BY Rajasekhar
$entry_point_registry['orgchart'] = array('file' => 'custom/vats/vedic_Common/GetOrgChart/getorgchart-demos/organizatiochart.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR get the users data from users :: Apr-18-2018:: BY Rajasekhar
 
#START :: ENTRY_POINT_REGISTRY downloading Finance report as CSV :: 02-Nov-2017:: BY Rajasekhar
 $entry_point_registry['financereportcsv'] = array('file' => 'custom/vats/vedic_Common/financereportcsv.php' , 'auth' => '1');
 #END :: ENTRY_POINT_REGISTRY downloading Finance report as CSV :: 02-Nov-2017:: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY FOR Multiple file Uploads :: Jul-03-2017:: BY Udaykiran
$entry_point_registry['uploadMulFiles'] = array('file' => 'custom/vats/vedic_Common/uploadMulFiles.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Multiple file Uploads :: Jul-03-2017:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY downloading LCA report as CSV :: Jul-02-2017:: BY Maneesha
$entry_point_registry['lcareportcsv'] = array('file' => 'custom/vats/vedic_Common/lcareportcsv.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY downloading LCA report as CSV :: Jul-02-2017:: BY Maneesha
#START :: ENTRY_POINT_REGISTRY FOR filters in Dashlets :: Jul-31-2017:: BY Udaykiran
$entry_point_registry['jobcreatedfilter'] = array('file' => 'custom/modules/Charts/Dashlets/JobsCreated/JobsCreatedQuery.php' , 'auth' => '1');
$entry_point_registry['submissioncreatedfilter'] = array('file' => 'custom/modules/Charts/Dashlets/SubmissionsStatistics/SubmissionsStatisticsQuery.php' , 'auth' => '1');
$entry_point_registry['candidatecreatedfilter'] = array('file' => 'custom/modules/Charts/Dashlets/CandidatebyTeam/CandidatebyTeamQuery.php' , 'auth' => '1');
$entry_point_registry['placementcreatedfilter'] = array('file' => 'custom/modules/Charts/Dashlets/PlacementStatusReport/PlacementStatusReportQuery.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR filters in Dashlets :: Jul-31-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR Restricting the candidates while creating the submissions :: Jul-31-2017:: BY Udaykiran
$entry_point_registry['onsavesubmission'] = array('file' => 'custom/modules/vedic_Submissions/RestrictedCandidatesAlert.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Restricting the candidates while creating the submissions :: Jul-31-2017:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY To check duplicate Candidates :: July-31-2017:: BY Maneesha
$entry_point_registry['checkduplicate'] = array('file' => 'custom/vats/vedic_Common/chkduplicate.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY To check duplicate Candidates :: July-31-2017:: BY Maneesha
#START :: ENTRY_POINT_REGISTRY FOR HR Documents :: Sep-13-2017:: BY Udaykiran
$entry_point_registry['HRMFile'] = array('file' => 'custom/modules/Documents/HRMFile.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR HR Documents :: Sep-13-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR Multiple Submissions :: Sep-23-2017:: BY Udaykiran
$entry_point_registry['submissionMFiles'] = array('file' => 'custom/modules/vedic_Submissions/uploadMultipleFiles.php' , 'auth' => '1');
$entry_point_registry['submissionMFile'] = array('file' => 'custom/modules/vedic_Submissions/uploadMFile.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Multiple Submissions :: Sep-23-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR filters in Project status Dashlet :: Sep-23-2017:: BY Udaykiran

$entry_point_registry['projectstatusfilter'] = array('file' => 'custom/modules/Charts/Dashlets/ProjectStatusReport/ProjectStatusQuery.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR filters in Project status Dashlet :: Sep-23-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR filters in Account status Dashlet :: Sep-23-2017:: BY Lakshmi
$entry_point_registry['Accountscreatedfilter'] = array('file' => 'custom/modules/Charts/Dashlets/AccountStatusReport/AccountStatusReportQuery.php' , 'auth' => '1');
 #END :: ENTRY_POINT_REGISTRY FOR filters in Account status Dashlet :: Sep-23-2017:: BY Lakshmi
  #START :: ENTRY_POINT_REGISTRY to verify Related documents with the  selected candidates while creating the submissions :: Nov-04-2017:: BY Udaykiran
$entry_point_registry['candidatedocumentverification'] = array('file' => 'custom/modules/vedic_Submissions/RelatedDocumentsAlert.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to verify Related documents with the  selected candidates while creating the submissions :: Nov-04-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR project duplicate check :: 04-Nov-2017:: BY Udaykiran

$entry_point_registry['projectduplicate'] = array('file' => 'custom/vats/vedic_Common/chkDuplicateProject.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR project duplicate check :: 04-Nov-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR Pop up candidate while creating the Submission from documents Subpanels:: Nov-04-2017:: BY Udaykiran
 $entry_point_registry['popupCandidate'] = array('file' => 'custom/modules/vedic_Submissions/popupCandidate.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Pop up candidate while creating the Submission from documents Subpanels:: Nov-04-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR visa status in projects :: Nov-04-2017:: BY Maneesha
  $entry_point_registry['visastatus'] = array('file' => 'custom/vats/vedic_Common/candidatevisastatus.php','auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR visa status in projects ::  Nov-04-2017:: BY Maneesha

#START :: ENTRY_POINT_REGISTRY FOR userprefarences in finance report :: Nov-04-2017:: BY Rajasekhar
$entry_point_registry['setuserpreferences'] = array('file' => 'custom/vats/vedic_Common/setuserpreferences.php','auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR userprefarences in finance report :: Nov-04-2017:: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY FOR Timesheet Schedule :: Nov-04-2017:: BY Udaykiran

$entry_point_registry['timesheetschedule'] = array('file' => 'custom/modules/Timesheet/timesheetSchedule.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Timesheet Schedule :: Nov-04-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR Timesheet type :: Nov-04-2017:: BY Udaykiran

$entry_point_registry['timesheetType'] = array('file' => 'custom/modules/Timesheet/get_timesheet_type.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Timesheet type :: Nov-04-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR Timesheet Unit values :: Nov-04-2017:: BY Udaykiran

$entry_point_registry['timesheetUnit'] = array('file' => 'custom/modules/Timesheet/get_timesheet_unit.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Timesheet Unit values :: Nov-04-2017:: BY Udaykiran
 #START :: ENTRY_POINT_REGISTRY FOR vacation  check :: 13-Nov-2017:: BY Maneesha
$entry_point_registry['checkvacation'] = array('file' => 'custom/vats/vedic_Common/checkvacation.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR vacation check :: 13-Nov-2017:: BY Maneesha

#START :: ENTRY_POINT_REGISTRY FOR vacation duplicate check :: 13-Nov-2017:: BY Maneesha
$entry_point_registry['checkduplicatevacation'] = array('file' => 'custom/vats/vedic_Common/checkduplicatevacation.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR vacation duplicate check :: 13-Nov-2017::BY Maneesha
 #START :: ENTRY_POINT_REGISTRY FOR filters in Candidates status Dashlet :: 14-Nov-2017:: BY Rajasekhar
 $entry_point_registry['candidatesstatusfilter'] = array('file' => 'custom/modules/Charts/Dashlets/CandidateStatusReport/CandidateStatusReportQuery.php' , 'auth' => '1');
 #END :: ENTRY_POINT_REGISTRY FOR filters in Candidates status Dashlet :: 14-Nov-2017:: BY Rajasekhar
 
#START :: ENTRY_POINT_REGISTRY FOR User Reports To Inline Editing Reports :: 30-Nov-2017:: BY Udaykiran
$entry_point_registry['updateuserReportsTo'] = array('file' => 'custom/modules/Users/updateUserReportsTo.php' , 'auth' => '1');
$entry_point_registry['userReportsTo'] = array('file' => 'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/userReportsTo.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR User Reports To Inline Editing Reports :: 30-Nov-2017:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR Inline Editing Reports :: 30-Nov-2017:: BY Udaykiran
$entry_point_registry['getUser'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_user.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Inline Editing Reports :: 30-Nov-2017:: BY Udaykiran


#START :: ENTRY_POINT_REGISTRY FOR Inline Editing Reports :: 26-Jan-2018:: BY Udaykiran
$entry_point_registry['getstatus'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_status.php' , 'auth' => '1');
$entry_point_registry['getstage'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_stage.php' , 'auth' => '1');
$entry_point_registry['getrole'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_role.php' , 'auth' => '1');
$entry_point_registry['getemployee'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_employee.php' , 'auth' => '1');
$entry_point_registry['getemployees'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_employees.php' , 'auth' => '1');
$entry_point_registry['getphase'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_phase.php' , 'auth' => '1');
$entry_point_registry['getcltindustry'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_client_industry.php' , 'auth' => '1');
$entry_point_registry['getAcc'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_account.php' , 'auth' => '1');
$entry_point_registry['getAccount'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_channelaccounts.php' , 
'auth' => '1');
$entry_point_registry['getkeyskill'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_keyskill.php' , 'auth' => '1');
$entry_point_registry['getpostatus'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_postatus.php' , 'auth' => '1');
$entry_point_registry['BenchMaster'] = array('file' => 'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/BenchMaster.php' , 'auth' => '1');
$entry_point_registry['auditBMReport'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/updateCandidate.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Inline Editing Reports :: 26-Jan-2018:: BY Udaykiran
#START :: ENTRY_POINT_REGISTRY FOR Inline Editing Reports :: 26-Jan-2018:: BY Lakshmi
$entry_point_registry['h1b'] = array('file' => 'custom/vats/vedic_Common/EmployeeActive/h1b.php' , 'auth' => '1');
$entry_point_registry['EmployeeActive'] = array('file' => 'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/staff1.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Inline Editing Reports :: 26-Jan-2018:: BY Lakshmi

#START :: ENTRY_POINT_REGISTRY FOR Audit logs of Employee Active Report ::26-Jan-2018:: BY Udaykiran
$entry_point_registry['auditEmpActive'] = array('file' => 'custom/vats/vedic_Common/EmployeeActive/updateCandidate.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Audit logs of Employee Active Report :: 26-Jan-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR Inline Editing Reports :: 26-Jan-2018:: BY Maneesha
$entry_point_registry['gc_stage'] = array('file' => 'custom/vats/vedic_Common/CandidateReport/gc_stage.php' , 'auth' => '1');
$entry_point_registry['get_states'] = array('file' => 'custom/vats/vedic_Common/CandidateReport/get_states.php' , 'auth' => '1');
$entry_point_registry['states_home'] = array('file' => 'custom/vats/vedic_Common/CandidateReport/states_home.php' , 'auth' => '1');
$entry_point_registry['training'] = array('file' => 'custom/vats/vedic_Common/CandidateReport/training.php' , 'auth' => '1');
$entry_point_registry['Benchsalesreport'] = array('file' => 'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/staff2.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Inline Editing Reports :: 26-Jan-2018:: BY Maneesha
#START :: ENTRY_POINT_REGISTRY FOR Audit logs of Bench Master Report :: 26-Jan-2018:: BY Maneesha
$entry_point_registry['auditBenchMaster'] = array('file' => 'custom/vats/vedic_Common/CandidateReport/auditCandidate.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Audit logs of Bench Master Report :: 26-Jan-2018:: BY Maneesha

#START :: ENTRY_POINT_REGISTRY FOR Revert back  to candidate from consultant:: 29-Jan-2018:: BY RajaSekhar
 $entry_point_registry['RevertbackToCandidate'] = array('file' => 'custom/vats/vedic_Common/RevertbackToCandidate.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Revert back  to candidate from consultant :: 29-Jan-2018:: BY RajaSekhar
#START :: ENTRY_POINT_REGISTRY FOR filters in Dashlets :: 30-Jan-2018:: BY Udaykiran
$entry_point_registry['useractivityfilter'] = array('file' => 'custom/modules/Charts/Dashlets/UserActivity/UserActivityQuery.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR filters in Dashlets :: 30-Jan-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY To export the UserActivity Report:: 22-Mar-2018 BY Maneesha
$entry_point_registry['UserAcivity'] = array('file' => 'custom/vats/vedic_Common/UserAcivity.php', 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY To export the UserActivity Report:: 22-Mar-2018 BY Maneesha

#START :: ENTRY_POINT_REGISTRY downloading User Last Login report as CSV :: Mar-22-2018:: BY Udaykiran
$entry_point_registry['lastlogincsv'] = array('file' => 'custom/vats/vedic_Common/lastlogincsv.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY downloading User Last Login report as CSV :: Mar-22-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY downloading User Login History report as CSV :: Mar-22-2018:: BY Udaykiran
$entry_point_registry['loginHistorycsv'] = array('file' => 'custom/vats/vedic_Common/loginHistorycsv.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY downloading User Login History report as CSV :: Mar-22-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY To check duplicate Profile in candidates :: 24-Apr-2018:: BY Maneesha
$entry_point_registry['checkduplicateprofile'] = array('file' => 'custom/vats/vedic_Common/checkduplicateprofile.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY To check duplicate Profile in candidates :: 24-Apr-2018:: BY Maneesha
#START :: ENTRY_POINT_REGISTRY To get the related profilename for a project :: 24-Apr-2018:: BY Maneesha
$entry_point_registry['projectprofilename'] = array('file' => 'custom/vats/vedic_Common/projectprofilename.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY To get the related profilename for a project :: 24-Apr-2018:: BY Maneesha
#START :: ENTRY_POINT_REGISTRY To get the related profilename for an Immigration :: 24-Apr-2018:: BY Maneesha
$entry_point_registry['immigrationprofilename'] = array('file' => 'custom/vats/vedic_Common/immigrationprofilename.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY To get the related profilename for an Immigration :: 24-Apr-2018:: BY Maneesha

#START :: ENTRY_POINT_REGISTRY FOR filters in Calls status Dashlet :: 24-Apr-2018:: BY Lakshmi
$entry_point_registry['callsstatusfilter'] = array('file'=> 'custom/modules/Charts/Dashlets/CallsStatusReport/CallsStatusQuery.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR filters in Calls status Dashlet :: 24-Apr-2018:: BY Lakshmi

#START :: ENTRY_POINT_REGISTRY FOR Get the project Start Date and end date :: 24-Apr-2018:: BY Udaykiran
$entry_point_registry['getProjectData'] = array('file'=> 'custom/modules/vedic_Profiles/getProjectData.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Get the project Start Date and end date :: 24-Apr-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR fetch all candidate emails :: 24-Apr-2018:: BY Rajasekhar
$entry_point_registry['Getcandidatemails'] = array('file' => 'custom/vats/vedic_Common/Getcandtemails.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR fetch all candidate emails :: 24-Apr-2018:: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY FOR get the emails from candidates :: 24-Apr-2018:: BY Lakshmi
$entry_point_registry['notesMFile'] = array('file' => 'custom/vats/vedic_Common/notesMFile.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR get the emails from candidates :: 24-Apr-2018:: BY Lakshmi


#START :: ENTRY_POINT_REGISTRY FOR filters in Dashlets :: 25-Apr-2018:: BY Maneesha
$entry_point_registry['billingfilter'] = array('file' => 'custom/modules/Charts/Dashlets/IdleProfileReport/IdleProfileReportQuery.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR filters in Dashlets :: 25-Apr-2018:: BY Maneesha

#START :: ENTRY_POINT_REGISTRY to create the Marketing Profiles from Profiles popup view  :: Apr-29-2018:: BY Udaykiran
$entry_point_registry['createMarketingProf'] = array('file' => 'custom/vats/vedic_Common/createMarketingprofile.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to create the Marketing Profiles from Profiles popup view :: Apr-29-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY to create the Accounts from EmployeeActive :: Apr-29-2018:: BY Udaykiran
$entry_point_registry['EmpActiveAcc'] = array('file' => 'custom/vats/vedic_Common/EmployeeActive/CreateAccount.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to create the Accounts from EmployeeActive :: Apr-29-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY to create the Accounts from BenchMaster ::Apr-29-2018:: BY Udaykiran
$entry_point_registry['BenchMasAcc'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/CreateAccount.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to create the Accounts from BenchMaster :: Apr-29-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY downloading BillingActiveCandidaes report as CSV :: Apr-29-2018:: BY Maneesha
$entry_point_registry['BillingActiveCandidates'] = array('file' => 'custom/vats/vedic_Common/BillingActiveCandidates.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY downloading BillingActiveCandidaes report as CSV :: Apr-29-2018:: BY Maneesha

#START :: ENTRY_POINT_REGISTRY For Marketing:: Apr-29-2018:: BY Lakshmi
$entry_point_registry['getmarketer'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/get_marketer.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY  For Marketing :: Apr-29-2018:: BY Lakshmi

#START :: ENTRY_POINT_REGISTRY to check whether the candidate is having the billing active Profile:: May-05-2018:: BY Udaykiran
$entry_point_registry['checkBillingProfile'] = array('file' => 'custom/vats/vedic_Common/checkBillingActiveProfile.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to check whether the candidate is having the billing active Profile:: May-05-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY to remove the flag when Bench Master is reloaded:: May-08-2018:: BY Udaykiran
$entry_point_registry['Removeflag'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/Removeflag.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to the flag when Bench Master is reloaded:: May-08-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR job status report for solution team:: July-14-2018:: BY Rajasekhar
$entry_point_registry['jobstatusreport'] = array('file' => 'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/jobstatusreport.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR job status report for solution team:: July-14-2018:: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY FOR to send the mails from jobs detail view:: July-14-2018:: BY Udaykiran
$entry_point_registry['SendEmails'] = array('file' => 'custom/modules/vedic_job/SendEmails.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR to send the mails from jobs detail view:: July-14-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR to display the keyskills based on type:: July-14-2018:: BY Udaykiran		
$entry_point_registry['keyskills_list'] = array('file' => 'custom/modules/vedic_Candidates/keyskills.php' , 'auth' => '1');		
#END :: ENTRY_POINT_REGISTRY FOR to display the keyskills based on type:: July-14-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR to display the keyskills based on type from Bench Master/Employee Active:: July-14-2018:: BY Udaykiran		
$entry_point_registry['UpdateKeySkill'] = array('file' => 'custom/vats/vedic_Common/BenchMaster/AppendKeySkill.php' , 'auth' => '1');		
#END :: ENTRY_POINT_REGISTRY FOR to display the keyskills based on type from Bench Master/Employee Active:: July-14-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR to send the mails from jobs detail view:: July-14-2018:: BY Rajasekhar
$entry_point_registry['updateComments'] = array('file' => 'custom/vats/vedic_Common/updateComments.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR to send the mails from jobs detail view:: July-14-2018:: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY FOR All Hires Report::  July-14-2018:: BY Udaykiran
$entry_point_registry['hiredcandidates'] = array('file' => 'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/HiredCandidates.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR All Report::  July-14-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR GC Master Editable Report:: June-11-2018:: Added BY RajaSekhar
$entry_point_registry['GcReportdata'] = array('file' =>'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/GcReportdata.php' , 'auth' => '1');
$entry_point_registry['getgcstage'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_gc_stage.php' , 'auth' => '1');
$entry_point_registry['permstatus'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_perm_status.php' , 'auth' => '1');
$entry_point_registry['geteb3'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_eb3.php' , 'auth' => '1');
$entry_point_registry['geteb2'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_eb2.php' , 'auth' => '1');
$entry_point_registry['getporting'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_porting.php' , 'auth' => '1');
$entry_point_registry['getgcattorney'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_gc_Attorney.php' , 'auth' => '1');
$entry_point_registry['get_i_140_rfe_recieved'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_i_140_rfe_recieved.php' , 'auth' => '1');
$entry_point_registry['get_status_gc'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_status_gc.php' , 'auth' => '1');
$entry_point_registry['getgcstatus'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_gc_status.php' , 'auth' => '1');
$entry_point_registry['get_I_140'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_i_140_status.php' , 'auth' => '1');
$entry_point_registry['get_job_preference'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/get_job_preference.php' , 'auth' => '1');
$entry_point_registry['auditGCMaster'] = array('file' => 'custom/vats/vedic_Common/GCMasterReport/auditGCMaster.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR GC Master Editable Report:: June-21-2018:: Modified BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR Ads List Editable Report:: July-31-2018:: Added BY RajaSekhar
$entry_point_registry['AdsListdata'] = array('file' =>'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/AdsListData.php' , 'auth' => '1');
$entry_point_registry['getadstype'] = array('file' => 'custom/vats/vedic_Common/AdsListReport/get_adslist.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY  FOR Ads List Editable Report:: July-31-2018:: Added BY RajaSekhar

#START :: ENTRY_POINT_REGISTRY FOR H1B CAP Immigration Inline edit Report :: 13-July-2018:: BY Lakshmi
$entry_point_registry['H1BCAPReport'] = array('file' => 'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/H1BCAPReport.php' , 'auth' => '1');
$entry_point_registry['getStatus'] = array('file' => 'custom/vats/vedic_Common/H1BCAPReport/getStatus.php' , 'auth' => '1');
$entry_point_registry['getStage'] = array('file' => 'custom/vats/vedic_Common/H1BCAPReport/getStage.php' , 'auth' => '1');
$entry_point_registry['getCurrentStatus'] = array('file' => 'custom/vats/vedic_Common/H1BCAPReport/getCurrentStatus.php' , 'auth' => '1');
$entry_point_registry['auditH1BCAP'] = array('file' => 'custom/vats/vedic_Common/H1BCAPReport/updateCAPImmigration.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR  H1B CAP Immigration Inline edit Report :: 13-July-2018:: BY Lakshmi

#START :: ENTRY_POINT_REGISTRY FOR to check duplicate Project rate information :: Aug-27-2018:: BY Lakshmi
$entry_point_registry['projectrateduplicate'] = array('file' => 'custom/vats/vedic_Common/projectrateduplicate.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR to check duplicate Project rate information :: Aug-27-2018:: BY Lakshmi

#START :: ENTRY_POINT_REGISTRY FOR Multiple Call Recordings :: 22-Oct-2018:: BY Udaykiran
$entry_point_registry['noteMFiles'] = array('file' => 'custom/modules/vedic_Profiles/uploadMultipleCalls.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Multiple Call Recordings :: 22-Oct-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR Downloading Notes :: 30-Oct-2018:: BY Vineet
$entry_point_registry['custom_note_download'] = array('file' => 'custom/custom_note_download.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Downloading Notes :: 30-Oct-2018:: BY Vineet

#START :: ENTRY_POINT_REGISTRY Tp Accept the Code of Conduct :: 01-Nov-2018:: BY Udaykiran
$entry_point_registry['updateAgreement'] = array('file' => 'custom/vats/vedic_Common/updateAgreement.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY To Accept the Code of Conduct :: 01-Nov-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY To get the related projectname for an project task :: 14-Nov-2018:: BY Lakshmi
$entry_point_registry['solutionprojectname'] = array('file' => 'custom/vats/vedic_Common/solutionprojectname.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY To get the related projectname for an project task :: 14-Nov-2018:: BY Lakshmi

#START :: ENTRY_POINT_REGISTRY FOR To check the duplicate Project Task :: 14-Nov-2018:: BY Maneesha
$entry_point_registry['projecttaskcheckduplicate'] = array('file' => 'custom/vats/vedic_Common/projecttaskcheckduplicate.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR To check the duplicate Project Task :: 14-Nov-2018:: BY Maneesha

#START :: ENTRY_POINT_REGISTRY FOR Solutions timesheet projects:: 26-Oct-2018:: BY Rajasekhar
$entry_point_registry['getsolutionsproject'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/SolutionProjects.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Solutions timesheet projects :: 26-Oct-2018:: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY FOR Solutions timesheet projects:: 26-Oct-2018:: BY Rajasekhar
$entry_point_registry['solutionsTimesheetComments'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/SolutionsTimesheetComments.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Solutions timesheet projects :: 26-Oct-2018:: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY FOR Duplicate Solution Timesheet :: 21-Nov-2018:: BY Maneesha
$entry_point_registry['checkduplicatesolutiontimesheet'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/checkduplicatesolutiontimesheet.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Duplicate Solution Timesheet :: 21-Nov-2018:: BY Maneesha

#START :: ENTRY_POINT_REGISTRY to send an Email when click on Report Errors by consultant :: 03-Dec-2018:: BY Maneesha
$entry_point_registry['sendErrormessage'] = array('file' => 'custom/vats/vedic_Common/Timesheet/sendErrormessage.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY send an Email when click on Report Errors by consultant :: 03-Dec-2018:: BY Maneesha

#START :: ENTRY_POINT_REGISTRY FOR Timesheet Documents PARSING AND PREVIEW :: 03-Dec-2018 :: BY Rajasekhar
$entry_point_registry['TimesheetDocumentsPreview'] = array('file' => 'custom/vats/vedic_Common/Timesheet/TimesheetDocumentsPreview.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Timesheet Documents PREVIEW :: 03-Dec-2018 :: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY to get the date format of the current user :: 05-Dec-2018 :: BY Udaykiran
$entry_point_registry['getUserPreferenceDate'] = array('file' => 'custom/vats/vedic_Common/getUserPreference.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to get the date format of the current user :: 05-Dec-2018 :: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR Duplicate Solution Timesheet :: 27-Nov-2018:: BY Lakshmi
$entry_point_registry['solutiontimesheetapproval'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/solutiontimesheetapproval.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Duplicate Solution Timesheet :: 27-Nov-2018:: BY Lakshmi

#START :: ENTRY_POINT_REGISTRY to send the notifications to the project managers when timsheet is submitted :: 21-Nov-2018:: BY Udaykiran
$entry_point_registry['SubmitTimesheet'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/SubmitTimesheet.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to send the notifications to the project managers when timsheet is submitted :: 21-Nov-2018:: BY Udaykiran

#START :: ENTRY_POINT_REGISTRY FOR Sales Dashboard Dashlet :: 14-Nov-2018:: BY Vineet
$entry_point_registry['newopportunities'] = array('file'=> 'custom/modules/Charts/Dashlets/NewOpportunities/NewOpportunitiesQuery.php' , 'auth' => '1');
$entry_point_registry['grosspipeline'] = array('file'=> 'custom/modules/Charts/Dashlets/GrossPipeline/GrossPipelineQuery.php' , 'auth' => '1');
$entry_point_registry['opportunityaging'] = array('file'=> 'custom/modules/Charts/Dashlets/OpportunityAging/OpportunityAgingQuery.php' , 'auth' => '1');
$entry_point_registry['pipelinebystageowner'] = array('file'=> 'custom/modules/Charts/Dashlets/PipelineByStageOwner/PipelineByStageOwnerQuery.php' , 'auth' => '1');
$entry_point_registry['wonsofar'] = array('file'=> 'custom/modules/Charts/Dashlets/WonSoFar/WonSoFarQuery.php' , 'auth' => '1');
$entry_point_registry['activemarketingcampaigns'] = array('file'=> 'custom/modules/Charts/Dashlets/ActiveMarketingCampaigns/ActiveMarketingCampaignsQuery.php' , 'auth' => '1');
$entry_point_registry['weeklyactivity'] = array('file'=> 'custom/modules/Charts/Dashlets/WeeklyActivity/WeeklyActivityQuery.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Sales Dashboard Dashlet :: 14-Nov-2018:: BY Vineet
#START :: ENTRY_POINT_REGISTRY FOR Solutions timesheet projects:: 18-Jan-2019:: BY Vineet
$entry_point_registry['solutionsTimesheetNotRequired'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/solutionsTimesheetNotRequired.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Solutions timesheet projects :: 18-Jan-2019:: BY Vineet
#START :: ENTRY_POINT_REGISTRY to get the data for the projectPOEnddate :: 24-Jan-2019 :: BY Lakshmi
$entry_point_registry['projectPOEnddate'] = array('file' => 'custom/vats/vedic_Common/projectPOEnddate.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to get the data for the projectPOEnddate :: 24-Jan-2019 :: BY Lakshmi

#START :: ENTRY_POINT_REGISTRY FOR Solutions timesheet projects:: 18-Jan-2019:: BY Vineet
$entry_point_registry['solutionsTimesheetNotRequired'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/solutionsTimesheetNotRequired.php' , 'auth' => '1');
$entry_point_registry['SolutionProjectPMSubmittedHoursQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionProjectPMSubmittedHours/SolutionProjectPMSubmittedHoursQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionProjectRMSubmittedHoursQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionProjectRMSubmittedHours/SolutionProjectRMSubmittedHoursQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionProjectPMApprovedHoursQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionProjectPMApprovedHours/SolutionProjectPMApprovedHoursQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionProjectRMApprovedHoursQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionProjectRMApprovedHours/SolutionProjectRMApprovedHoursQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionTimesheetPMStatusQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionTimesheetPMStatus/SolutionTimesheetPMStatusQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionTimesheetRMStatusQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionTimesheetRMStatus/SolutionTimesheetRMStatusQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionTimesheetPMStatusTableQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionTimesheetPMStatus/SolutionTimesheetPMStatusTableQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionTimesheetRMStatusTableQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionTimesheetRMStatus/SolutionTimesheetRMStatusTableQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionProjectOverallApprovedHoursQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionProjectOverallApprovedHours/SolutionProjectOverallApprovedHoursQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionTimesheetOverallStatusQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionTimesheetOverallStatus/SolutionTimesheetOverallStatusQuery.php' , 'auth' => '1');
$entry_point_registry['SolutionTimesheetOverallStatusTableQuery'] = array('file' => 'custom/modules/Charts/Dashlets/SolutionTimesheetOverallStatus/SolutionTimesheetOverallStatusTableQuery.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY FOR Solutions timesheet projects :: 18-Jan-2019:: BY Vineet

#START :: ENTRY_POINT_REGISTRY to send email notification through timesheet weekly report :: 30-Jan-2019 :: BY Rajasekhar
$entry_point_registry['solutionsTimesheetReminderMail'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/solutionsTimesheetReminderMail.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to send email notification through timesheet weekly report :: 30-Jan-2019 :: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY to get the data for the Immigration H1B Report :: 14-Feb-2019 :: BY Maneesha
$entry_point_registry['H1BReportnew'] = array('file' => 'custom/include/javascript/DataTables/Editor-PHP-1.6.5/examples/php/H1BReportnew.php' , 'auth' => '1');
$entry_point_registry['getVisaType'] = array('file' => 'custom/vats/vedic_Common/H1BReport/getVisaType.php' , 'auth' => '1');
$entry_point_registry['getTypeOfFiling'] = array('file' => 'custom/vats/vedic_Common/H1BReport/getTypeOfFiling.php' , 'auth' => '1');
$entry_point_registry['getImmgStatus'] = array('file' => 'custom/vats/vedic_Common/H1BReport/getImmgStatus.php' , 'auth' => '1');
$entry_point_registry['auditH1B'] = array('file' => 'custom/vats/vedic_Common/H1BReport/updateImmigration.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to get the data for the Immigration H1B Report :: 14-Feb-2019 :: BY Maneesha

#START :: ENTRY_POINT_REGISTRY to send email notification through timesheet weekly report :: 15-Feb-2019 :: BY Rajasekhar
$entry_point_registry['Projectmanagerslist'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/Projectmanagerslist.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to send email notification through timesheet weekly report :: 15-Feb-2019 :: BY Rajasekhar
#START :: ENTRY_POINT_REGISTRY to export Labour by project report:: Feb-21-2019:: BY Rajasekhar
$entry_point_registry['LabourbyprojectExport'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/LabourbyprojectExport.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to export Labour by project report:: Feb-21-2019:: BY Rajasekhar

#START :: ENTRY_POINT_REGISTRY to Export unbilled time report :: 22-Feb-2019 :: BY Udaykiran
$entry_point_registry['UnbilledReportExport'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/UnbilledReportExport.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to Export unbilled time report :: 22-Feb-2019 :: BY Udaykiran


#START :: ENTRY_POINT_REGISTRY organization chart :: Apr-08-2019:: BY Vineet
$entry_point_registry['orgconnections'] = array('file' => 'custom/vats/vedic_Common/OrgChart/OrgChart.html' , 'auth' => '1');
$entry_point_registry['orgchartdata'] = array('file' => 'custom/vats/vedic_Common/OrgChart/OrgChartData.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY organization chart :: Apr-08-2019:: BY Vineet

#START :: ENTRY_POINT_REGISTRY to unlock the Timesheet for Previous Week:: Apr-17-2019:: BY Lakshmi
$entry_point_registry['unlockTimesheet'] = array('file' => 'custom/vats/vedic_Common/SolutionsTimesheet/unlockTimesheet.php' , 'auth' => '1');
#END :: ENTRY_POINT_REGISTRY to to unlock the Timesheet for Previous Week:: Apr-17-2019:: BY Lakshmi


?>
