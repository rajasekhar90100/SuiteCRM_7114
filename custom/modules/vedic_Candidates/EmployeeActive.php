<?php
/**  
  * FileName =>Employee Active Report.php
  * Created By => LakshmiGayathri (Created On Nov-14-2017)
  * Modified By => LakshmiGayathri (Modified On Jan-08-2019)
  * COMMENT => Employee Active Report with inline editing option,added the stage/status dropdown values,added date.parse function to date filters
  */
include('include/javascript/table_sort/javascript/jquery_datatables');
session_start();
global $current_user;
$currentUser = $current_user->user_name;
?>
<html>
<link rel="stylesheet" type="text/css" href="custom/include/javascript/DataTables/Editor-2017-11-21-1.6.5/css/editor.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="custom/include/javascript/DataTables/DataTables-1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="custom/include/javascript/DataTables/Buttons-1.4.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href=
"custom/include/javascript/DataTables/Select-1.2.3/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="custom/include/javascript/DataTables/KeyTable-2.3.2/css/keyTable.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="custom/vats/vedic_Common/font/css/font-awesome.min.css">
<script type="text/javascript" language="javascript" src="custom/include/javascript/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script src="custom/include/javascript/DataTables/Editor-2017-11-21-1.6.5/js/dataTables.editor.js"></script>
<script src="custom/include/javascript/DataTables/Select-1.2.3/js/dataTables.select.min.js"></script>
<script src="custom/include/javascript/DataTables/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
<script src="custom/include/javascript/DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script src="custom/include/javascript/DataTables/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="custom/include/javascript/DataTables/pdfmake-0.1.32/vfs_fonts.js"></script>
<script src="custom/include/javascript/DataTables/Buttons-1.4.2/js/buttons.html5.min.js"></script>
<script src="custom/include/javascript/DataTables/Buttons-1.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="custom/include/javascript/DataTables/KeyTable-2.3.2/js/dataTables.keyTable.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
<script type="text/javascript">
	var editor;
	var currentUser = '<?php echo $currentUser;?>';
	var Users = ["praveen.thumma", "wajid.mohammed", "udaykiran.myana"];
	$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
			var min = $('#pro_start_date_range').val();
			if(typeof(min) != 'undefined') {
				var cnd = $('#prs_range_date').val();
				var betStart = $('#prs_start_range_date').val();
				var betEnd = $('#prs_end_range_date').val();
				var startDate = data[11];
				if(cnd == '' && betEnd == '' && betStart == '') {
				   return true;
				}
				if(min == '=') {
					if(Date.parse(startDate) == Date.parse(cnd)) {
						return true;
					}
				} 
				if(min == '!=') {
					if(Date.parse(startDate) != Date.parse(cnd)) {
						return true;
					}
				}
				if(min == '>') {
					if(Date.parse(startDate) > Date.parse(cnd)) {
						return true;
					}
				}
				if(min == '<') {
					if(Date.parse(startDate) < Date.parse(cnd)) {
						return true;
					}
				}
				if(min == 'between') {
					if(Date.parse(startDate) >= Date.parse(betStart) && Date.parse(startDate) <= Date.parse(betEnd)) {
						return true;
					}
				}
				return	false;
			}
			else {
				return true;
			}
		}
	);
	$.fn.dataTable.ext.search.push(
		function (settings, data, dataIndex) {
			var max = $('#pro_end_date_range').val();
			if(typeof(max) != 'undefined') {
				var cndt = $('#pre_range_date').val();
				var betPstart = $('#pre_start_range_date').val();
				var betPend = $('#pre_end_range_date').val();
				var endDate = data[12];
				if(cndt == '' && betPend == '' && betPstart == '') {
				   return true;
				}
				if(max == '=') {
					if(Date.parse(endDate) == Date.parse(cndt)) {
						return true;
					}
				} 
				if(max == '!=') {
					if(Date.parse(endDate) != Date.parse(cndt)) {
						return true;
					}
				}
				if(max == '>') {
					if(Date.parse(endDate) > Date.parse(cndt)) {
						return true;
					}
				}
				if(max == '<') {
					if(Date.parse(endDate) < Date.parse(cndt)) {
						return true;
					}
				}
				if(max == 'between'){
					 if(Date.parse(endDate) >= Date.parse(betPstart) && Date.parse(endDate) <= Date.parse(betPend)){
						return true;
					}
				}
				return	false;
			}
			else {
				return true;
			}
		}
	);
	/**
	  * FunctionName =>ready
	  * Modified By => Maneesha (Modified On Dec-18-2018)
	  * COMMENT => Added secondary marketer field in the report.
	  */
	$(document).ready(function(){		
		editor = new $.fn.dataTable.Editor( {
			ajax: "index.php?entryPoint=EmployeeActive",
			table: "#example",
			fields: [ 
				{
					label: "Stage Flag:",
					name: "vedic_profiles.stage_flag"
				},{
					label: "Phase:",
					name: "vedic_profiles_cstm.phase_c",
					type: "select",
					options: [
						{ label: "", value: "" },
						{ label: "CAP", value: "CAP" },
						{ label: "CAP 2015",  value: 'CAP 2015' },
						{ label: "Existing",  value: 'Existing' },
						{ label: "New Hire",  value: 'New Hire' }
					],
					
				},{
					label: "Status:",
					name: "vedic_profiles_cstm.status_c",
					type: "select",
					options: [
						{ label: "Active", value: "Active" },
						{ label: "Active/Project2", value: "Active/Project2"},
						{ label: "Complete", value: "Complete"},
						{ label: "Fired", value: "Fired"},
						{ label: "Fulltime", value: "Fulltime"},
						{ label: "Hold", value: "Hold"},
						{ label: "No-Show" , value: "No-Show"},
						{ label: "Pool", value: "Pool"},
						{ label: "Prospect", value: "Prospect"},
						{ label: "Rejected", value: "Rejected"},
						{ label: "Resigned", value: "Resigned"},
						{ label: "Rolloff" , value: "Rolloff"},
						{ label: "Start", value: "Start"},
						{ label: "Vacation", value: "Vacation"},
						{ label: "Temp", value: "Temp"}
					],
				},{
					label: "Stage:",
					name: "vedic_profiles_cstm.stage_c",
					type: "select",
					options: [
						{ label: "Billing", value:"Billing"},
						{ label: "Hiring", value:"Hiring"},
						{ label: "Marketing", value:"Marketing"},
						{ label: "Pre-Marketing", value:"Premarketing"}
					],
				},{
					label: "First name:",
					name: "vedic_candidates.first_name"
				},{
					label: "Last name:",
					name: "vedic_candidates.last_name"
				},{
					label: "Channel Client:",
					name:   "vedic_profiles_cstm.channel_client_c",
					type:    'datalist',
					ipOpts:account()
				},{
				    label: "End Client:",
					name: "vedic_profiles_cstm.end_client_c",
					type: "datalist",
					ipOpts:acc() ,
				},{
					// label: "State-Work:",
					// name: "vedic_profiles.alt_address_state",
					// type: "select",
				   // ipOpts:get_states() 
				// },{
					label: "Mobile Phone:",
					name: "vedic_profiles.phone_mobile",
				},{
					label: "W2CTC:",
					name: "vedic_profiles_cstm.employee_type_c",
					type: "select",
					ipOpts:employee()
				},{
					label: "Project Start Date:",
					name: "vedic_profiles_cstm.project_start_date_c",
					type:    'date',
					def:   function () { return new Date(); },
					attr   : $.fn.dataTable.moment('MM/DD/YYYY'),
				},{
					label: "Project End Date:",
					name: "vedic_profiles_cstm.project_end_date_c",
					type:       'date',
					def: function () { return new Date(); },
					attr   : $.fn.dataTable.moment('MM/DD/YYYY'),
				},{
					// label: "RollOff Date:",
					// name: "vedic_profiles.rolloff_date",
					// type:       'date',
					// def: function () { return new Date(); },
					// attr: {
						// "data-date-format": "mm/dd/yyyy"
					// }
				// },{
					label: "PO Status:",
					name:   "vedic_profiles_cstm.po_status_c",
					type:    'select',
					ipOpts:postatus()
				},{
					label: "POEndDate:",
					name: "vedic_profiles_cstm.po_end_date_c",
					type:       'date',
					def:        function () { return new Date(); },
					attr   : $.fn.dataTable.moment('MM/DD/YYYY'),
				},{
					label: "Recruiter:",
					name:   "recruiter_c",
					type:    'select',
					ipOpts:user()
				},{
					label: "RL:",
					name: "rl_c",
					type:    'select',
					ipOpts:user()
				},{
					label: "ML-1:",
					name:   "ml_1_c",
					type:    'select',
					ipOpts:marketer()
				},{
					label: "Marketer-2:",
					name:   "secondary_marketer_c",
					type:    'select',
					ipOpts:marketer()	
				},{
					label: "Marketer-1:",
					name:   "primary_marketer_c",
					type:    'select',
					ipOpts:marketer()
				},{
					label: "H1B Stage:",
					name: "vedic_profiles_cstm.h1b_stage_c",
					type: "select",
					options: [
						{ label: "", value: "" },
						{ label: "H1B - Mailed out", value: "H1B - Mailed out" },
						{ label: "H1B Approved", value: "H1B Approved" },
						{ label: "RFE - Received", value: "RFE - Received" },
						{ label: "RFE - Cleared", value: "RFE - Cleared" },
						{ label: "H1B Denial", value: "H1B Denial" },
						{ label: "H1B - Under Review", value: "H1B - Under Review" },
						{ label: "H1B - Receipt # Received", value: "H1B - Receipt # Received" },
						{ label: "LCA Filed", value: "LCA Filed" },
						{ label: "H1B Check List Sent", value: "H1B Check List Sent" },
						{ label: "LCA Certified", value: "LCA Certified" },
						{ label: "RFE - Receipt Received", value: "RFE - Receipt Received" },
						{ label: "H1B Pending-Documents", value: "H1B Pending-Documents" },
						{ label: "H1B Withdrawn", value: "H1B Withdrawn" },
						{ label: "Not Applicable", value: "LNot Applicable" }
					],
				},{
					label: "Work City:",
					name: "vedic_profiles.alt_address_city",
				},{
					label: "ACL:",
					name: "vedic_profiles_cstm.acl_c",
				},{
					label: "Sales:",
					name:   "sales_c",
					type:    'select',
					ipOpts:user()
				// },{
					// label: "Supplier:",
					// name: "vedic_candidates_cstm.supplier_c",
				},{
					label: "Business Phone:",
					name: "vedic_candidates.phone_work",
				// },{
					// label: "Email Work:",
					// name: "email_addresses[].em2",
				},{
					label: "Email Home1:",
					name: "vedic_profiles_cstm.email_c",
				},{
					label: "ZIP Code:",
					name: "vedic_profiles.alt_address_postalcode",
				},{
					label: "Notes-Employee:",
					name: "vedic_profiles_cstm.notes_employee_c",
					type: "textarea",
				},{
					label: "HL:",
					name: "hl_c",
					type: "select",
					ipOpts:user()
				}
			]
		});
		$('#example').on( 'click', 'tbody td.editable', function (e) {
			var pre_value;
			editor.on( 'open', function ( e, type ) {
				pre_value = editor.get();
				var stage = editor.field('vedic_profiles_cstm.stage_c').get();
				var status = editor.field('vedic_profiles_cstm.status_c').get();
				if(stage == 'Marketing') {
					$("#DTE_Field_vedic_profiles_cstm-status_c option[value='Active']").show();
					$("#DTE_Field_vedic_profiles_cstm-status_c option[value='Active/Project2']").hide();
				}
				if(stage == 'Billing') {
					var rowID = Object.keys(this.s.editFields)[0];
					var v = rowID.split('_');
					rowID = v[1];
					$.ajax({
						url:"index.php?entryPoint=checkBillingProfile",
						type: "POST",
						data:{rowID:rowID},
						success: function(data){
							if((data>0)&&(status!='Active')) {
								$("#DTE_Field_vedic_profiles_cstm-status_c option[value='Active/Project2']").show();
								$("#DTE_Field_vedic_profiles_cstm-status_c option[value='Active']").hide();
							}
							else {
								$("#DTE_Field_vedic_profiles_cstm-status_c option[value='Active/Project2']").hide();
								$("#DTE_Field_vedic_profiles_cstm-status_c option[value='Active']").show();
							}
						},
						error: function(){},
					});	
				}
			})
			editor.on( 'preSubmit', function ( e, o, action ) {
				if ( action !== 'remove' ) {
					var fieldID = this.s.includeFields[0];
					var stage = editor.field('vedic_profiles_cstm.stage_c').get();
					var status = editor.field('vedic_profiles_cstm.status_c').get();
					var startdate = editor.field('vedic_profiles_cstm.project_start_date_c').get();
					var enddate = editor.field('vedic_profiles_cstm.project_end_date_c').get();
					var podate = editor.field('vedic_profiles_cstm.po_end_date_c').get();
					var email = editor.field('vedic_profiles_cstm.email_c').get();
					var mobile = editor.field('vedic_profiles.phone_mobile').get();
					var stageflag = editor.field('vedic_profiles.stage_flag').get();
					if(fieldID == 'vedic_profiles_cstm.channel_client_c') {
						if(!startdate && !enddate) {
							this.field(fieldID).error( 'With out Project should not create/select the Channel Client' );
							return false;
						}
					}
					if(stage == 'Billing') {
						if(fieldID == 'vedic_profiles_cstm.project_end_date_c') {
							if(Date.parse(startdate) > Date.parse(enddate)) {
								this.field(fieldID).error( 'Project end date should be greater than project start date ' );
								return false;
							}
							if(!startdate && enddate) {
								this.field(fieldID).error( 'Project start date should be entered first' );
								return false;
							}
						}
						if(fieldID == 'vedic_profiles_cstm.po_end_date_c') {
							if(!startdate) {
								this.field(fieldID).error( 'Project start date should be entered first' );
								return false;
							}
						}
					}
					if(stage == 'Marketing') {
						if(fieldID == 'vedic_profiles_cstm.po_end_date_c') {
							this.field(fieldID).error( 'POEnddate should not enterted for marketing profiles!!' );
							return false;
						}
					    if(fieldID == 'vedic_profiles_cstm.project_start_date_c') {
						      this.field(fieldID).error( 'Project start date should not be entered for marketing profiles' );
							return false;
						}
					}
					if(fieldID == 'vedic_profiles_cstm.project_start_date_c') {
						if(Date.parse(enddate) < Date.parse(startdate)) {
							this.field(fieldID).error( 'Project start date should not be greater than project end date ' );
							return false;
						}
					}
					if(fieldID == 'vedic_profiles.phone_mobile') {
						var phoneNo = /^((\+)?[1-9]{1,2})?([\s])(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
						if(mobile != '') {
							if((mobile.match(phoneNo))||(mobile == '')) {
								// this.field(fieldID).error( 'Project end date should be greater than project start date ' );
								return true;
							}
							else {
								this.field(fieldID).error( 'Enter a valid Mobile Number!!' );
								return false;
							}
						}
					}
					if(fieldID == 'vedic_profiles_cstm.email_c') {
						var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
						if((filter.test(email))||(email == '')) {
							return true;
						}
						else {
							this.field(fieldID).error( 'Enter a valid Email Address!!' );
							return false;
						}
					}
					if(stage == 'Billing' && status == 'Active') {
						var rowID = Object.keys(this.s.editFields)[0];
						var v = rowID.split('_');
						rowID = v[1];
						$.ajax({
							url:"index.php?entryPoint=updateBillingFlag",
							type: "POST",
							data:{rowID:rowID},
							success: function(data){},
							error: function(){},
						});
					}
					if(stageflag == '1') {
						if(fieldID == 'vedic_profiles_cstm.stage_c'){
							this.field(fieldID).error( 'Stage can not be changed for billing profiles.' );
							return false;
						}
					}
				}
			})
			editor.inline( this,{
				buttons: { label: '<i class="fa fa-floppy-o fa-lg" title="Save" aria-hidden="true"></i>', fn: function () { 
					var fieldID = this.s.includeFields[0];
					// if(fieldID == 'vedic_profiles_cstm.project_end_date_c'){
						// var enddate = editor.field('vedic_profiles_cstm.project_end_date_c').get();
						// var rolloff_date = editor.field('vedic_profiles.rolloff_date').get();
						// if(rolloff_date==''){
						    // editor.field( 'vedic_profiles.rolloff_date').set(enddate);
						// }
					// }
					if(fieldID == 'vedic_profiles_cstm.end_client_c' || fieldID == 'vedic_profiles_cstm.channel_client_c' ) {
						var fieldID = this.s.includeFields[0];
						var endClientArr = editor.field( fieldID ).s.opts.ipOpts;
						var flag = 0;
						var endClient = editor.field(fieldID).get();
						var rowID = Object.keys(this.s.editFields)[0];
						var count = editor.field( fieldID ).s.opts.ipOpts.length;
						for(var i=0;i<count;i++) {
							if(endClientArr[i].label == endClient) {
								editor.set( fieldID, endClientArr[i].value).submit();
								flag = 1;
							}
						}
						var post_value = editor.get();
						var v = rowID.split('_');
						rowID = v[1];
						$.ajax({
							url:"index.php?entryPoint=EmpActiveAcc",
							type: "POST",
							data:{rowID:rowID,fieldID:fieldID,pre_value:pre_value,post_value:post_value},
							success: function(data){
								docvalues = $.trim(data);
								if(docvalues!='') {
									editor.set( fieldID,docvalues).submit();
								}
							},
							error: function(){},
						});
					}
					else {
						this.submit(function(){
							var rowID = Object.keys(this.s.editFields)[0];
							var post_value = editor.get();
							var v = rowID.split('_');
							rowID = v[1];
							$.ajax({
								url:"index.php?entryPoint=auditEmpActive",
								type: "POST",
								data:{rowID:rowID,fieldID:fieldID,pre_value:pre_value,post_value:post_value},
								success: function(data){
									docvalues = data;
								},
								error: function(){},
							});
						}); 
					}
				}}
			});
		});
		if(jQuery.inArray( currentUser, Users )!='-1' ) {
			var mobile = { data: "vedic_profiles.phone_mobile",className: "editable"  };
			var email = { data: "vedic_profiles_cstm.email_c",className: "editable"  };
		}
		else {
			var mobile = { data: "vedic_profiles.phone_mobile",className: "nonedit"  };
			var email = { data: "vedic_profiles_cstm.email_c",className: "nonedit"  };
		}
		$('#example').DataTable({
			retrieve: true,
			orderCellsTop: true,
			dom: "Blfrtip",
			keys: true,
			scrollY: 300,
			scrollX: true,
			processing: true,
			"language": {
				"decimal": ",",
				"thousands": "."
			},
			"columnDefs": [
				{
					"targets": [ 30 ],
					"visible": false,
					"searchable": false
				}
			],
			ajax: "index.php?entryPoint=EmployeeActive",
			"deferRender": true,
			order: [[ 0, 'asc' ]],
			columns: [
				{
					data: "Name",
					render: function(data, type, row, meta){
						if(type === 'display'){
							data = '<a target="_blank" href="index.php?module=vedic_Profiles&action=DetailView&record=' + row.ID + '">' + data + '</a>';
						}
						return data;
					},
					className: "nonedit",
				} ,
				{ data: "vedic_profiles_cstm.phase_c",className: "editable" },
				{ data: "vedic_profiles_cstm.status_c", className: "editable" },
				{ data: "vedic_profiles_cstm.stage_c", className: "editable"},
				{ data: "vedic_profiles.first_name", className: "nonedit" },
				{ data: "vedic_profiles.last_name" , className: "nonedit"},
				{ data: "CName", editField: "vedic_profiles_cstm.channel_client_c", className: "editable" },
				{ data: "endCName", editField: "vedic_profiles_cstm.end_client_c",className: "editable" },
				// { data: "vedic_profiles.alt_address_state", className: "editable" },
				mobile,
				{ data: "vedic_profiles_cstm.employee_type_c", 
					render: function ( data, type, row ) {
						if ( data == 'w2' ) {
							return "W2";
						}
						else if(data == 'opt') {
							return "OPT";
						}
						else if(data == 'c2c') {
							return "C2C";
						}
						else if(data == 'referral') {
							return "Referral";
						}
						else if(data == 'offshore') {
							return "Offshore";
						}
						else {
							return data;
						}
					},className: "editable"
				},
				//{ data: "pro.estimated_start_date", className: "nonedit"},
				//{ data: "pro.estimated_end_date" ,className: "nonedit"},
				{data:   "vedic_profiles_cstm.project_start_date_c",className: "editable"},
				{data:   "vedic_profiles_cstm.project_end_date_c",className: "editable"},
				//{data:   "vedic_profiles.rolloff_date",className: "editable"},
				{ data: "vedic_profiles_cstm.po_status_c",
					render: function ( data, type, row ) {
						if ( data == 'In_progress' ) {
							return "In Progress";
						}
						else {
							return data;
						}
					},	className: "editable" 
				},
				{ data: "vedic_profiles_cstm.po_end_date_c", className: "editable" },
				{ data: "Recruiter" , editField:  "recruiter_c", className: "editable"},
				{ data: "RLName", editField:  "rl_c" , className: "editable"},
				{ data: "ML1" , editField:  "ml_1_c", className: "editable"},
				{ data: "Marketer1", editField:  "primary_marketer_c", className: "editable"},
				{ data: "Marketer2", editField:  "secondary_marketer_c", className: "editable"},
				{ data: "vedic_profiles_cstm.h1b_stage_c",
					render: function ( data, type, row ) {
						if ( data == 'LNot Applicable' ) {
							return "Not Applicable";
						}
						else {
							return data;
						}
					},
					className: "editable" },
				{ data: "vedic_profiles.alt_address_city", className: "editable" },
				{ data: "vedic_profiles_cstm.acl_c", className: "editable" },
				{ data: "Sales", editField:  "sales_c", className: "editable"},
				// { data: "vedic_candidates_cstm.supplier_c" , className: "editable"},
				{ data: "vedic_candidates.phone_work", className: "nonedit" },
				// { data: "email_addresses[].em2", className: "nonedit" },
				email,
				{ data: "vedic_profiles.alt_address_postalcode", className: "editable" },
				{ data: "vedic_profiles_cstm.notes_employee_c", className: "editable" },
				{ data: "HLName", editField: "hl_c", className: "editable" },
				{ 
					data: "Name",
					render: function(data, type, row, meta){
						if(type === 'display') {
							data = '<a class="button buttons-collection" target="_blank" href="index.php?module=vedic_Profiles&action=Activitylog&record=' + row.ID + '"><span<i class="fa fa-history" aria-hidden="true" style = "font-size: larger; text-transform: capitalize;"></i> HISTORY </span> </a>';
						}
						return data;
					},
					className:"history"
				},
				{ 
					data: "Name",
					render: function(data, type, row, meta){
						if(type === 'display') {
							data = '<a class="button buttons-collection" target="_blank" href="index.php?module=vedic_Profiles&action=EditView&query=true&vedic_candidates_vedic_profiles_1_name='+  row.VCName + '&vedic_candidates_vedic_profiles_1vedic_candidates_ida='+row.VCID+'"><span<i class="fa" aria-hidden="true" style = "font-size: larger; text-transform: capitalize;"></i> Create Profile</span></a>';
						}
						return data;
					},
					className:"history"
				},
				{ data: "vedic_profiles.stage_flag",className: "nonedit" }
			],
			keys: {
				editor: editor,
			},
			select: {
				style:    'os',
				selector: 'td.select-checkbox',
			},
			buttons: [
				{
					extend: 'collection',
					text: '<i class="fa fa-download" aria-hidden="true"></i>  Export',
					buttons: [
						{
							extend: 'csvHtml5',
							text : '<i class="fa fa-files-o"></i>  CSV',
							filename:'Employee Active Report',
						},{
							extend: 'pdfHtml5',
							text : '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>	 PDF',
							orientation: 'landscape',
							pageSize: 'A1',
							filename:'Employee Active Report',
							title:'Employee Active Report'
						},{
							extend: 'excelHtml5',
							text : '<i class="fa fa-file-excel-o" aria-hidden="true"></i>  Excel',
							filename:'Employee Active Report',
							title:'Employee Active Report',
							sheetName:'Employee Active Report'
						}
					],
				},
				'colvis',
			]
		});
		function get_states()
		{
			var get_states= new Array({"label" : "a", "value" : "a"});
			get_states.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=get_states',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++) {
						obj= { "label" : json[a][0], "value" : json[a][1]};
						get_states.push(obj);
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return get_states;
		}
		function employee()
		{
			var employee= new Array({"label" : "a", "value" : "a"});
			employee.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getemployee',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++) {
						obj= { "label" : json[a][0], "value" : json[a][1]};
						employee.push(obj);
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return employee;
		}
		function user()
		{
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getUser',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++) {
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		function acc()
		{
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getAcc',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++) {
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		function marketer()
		{
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getmarketer',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++) {
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		function account()
		{
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getAccount',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++) {
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		function postatus()
		{
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getpostatus',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++) {
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		 // Setup - add a text input to each header next cell
		$('.head th').each( function () {
			var title = $(this).text();
			var className = $(this)[0].className;
			if(title.includes(" ")) {
				title = title.replace(/\ /g, '-');
			}
			if(title.includes("/")) {
				title = title.replace(/\//g, '-');
			}
			if(className.includes('input-filter')) {
				$(this).html( '<input type="text"  class="search" id="'+title+'" style=" width: 100%; padding: 3px;box-sizing: content-box;" placeholder="Search '+title+'" />' );
			}
			//Date filters for project start date,project end date
			else if(className.includes('date-filter')) {
				if(title =='Project-Start-Date') {
					$(this).html('<select id="pro_start_date_range" name="pro_start_date_range" class="selectFilter"><option label="Equals" value="=" selected="selected">Equals</option><option label="Not On" value="!=">Not On</option><option label="After" value=">">After</option><option label="Before" value="<">Before</option><option label="Is Between" value="between">Is Between</option></select><div id="prs_single_range" style = "margin: 3px 0px 3px 0px;"><input autocomplete="off" type="text" name="prs_range_date" id="prs_range_date" value="" title="" size="11" class="dateRangeInput" style="width: 100%; padding: 3px;  box-sizing: content-box;"></div><div id="prs_is_between_range" style="display:none; margin: 3px 0px 3px 0px;"><input autocomplete="off" type="text" name="prs_start_range_date" id="prs_start_range_date" value="" title="" tabindex="" size="11" class="dateRangeInput" style="width: 100%; padding: 3px;  box-sizing: content-box;"><br> AND <br><input autocomplete="off" type="text" name="prs_end_range_date" id="prs_end_range_date" value="" title="" tabindex="" size="11" class="dateRangeInput" maxlength="10" style="width: 100%; padding: 3px;  box-sizing: content-box;"></div>');
				}
				else {
					$(this).html('<select id="pro_end_date_range" name="pro_end_date_range" class="selectFilter"><option label="Equals" value="=" selected="selected">Equals</option><option label="Not On" value="!=">Not On</option><option label="After" value=">">After</option><option label="Before" value="<">Before</option><option label="Is Between" value="between">Is Between</option></select><div id="pre_single_range" style = "margin: 3px 0px 3px 0px;"><input autocomplete="off" type="text" name="pre_range_date" id="pre_range_date" value="" title="" size="11" class="dateRangeInput" style="width: 100%; padding: 3px;  box-sizing: content-box;"></div><div id="pre_is_between_range" style="display:none; margin: 3px 0px 3px 0px;"><input autocomplete="off" type="text" name="pre_start_range_date" id="pre_start_range_date" value="" title="" tabindex="" size="11" class="dateRangeInput" style="width: 100%; padding: 3px;  box-sizing: content-box;"><br> AND <br><input autocomplete="off" type="text" name="pre_end_range_date" id="pre_end_range_date" value="" title="" tabindex="" size="11" class="dateRangeInput" maxlength="10" style="width: 100%; padding: 3px;  box-sizing: content-box;"></div>');
				}
			}
			else {
				if(title == 'Phase') {
					var opt = '<option value="CAP">CAP</option><option value="CAP 2015">CAP 2015</option><option value="Existing">Existing</option><option value="New Hire">New Hire</option>';
				}
				else if(title == 'Stage') {
					var opt = '<option value="Billing">Billing</option><option value="Marketing">Marketing</option>';
				}
				else if(title == 'Status') {
					var opt = '<option value="Active">Active</option><option value="Active/Project2">Active/Project2</option><option value="Rolloff">Rolloff</option><option value="Start">Start</option>';
				}
				else {
					var opt = '';
				}
				$(this).html('<select id="'+title+'" style="margin: 5px; height: 32px;"><option value="" selected>-Select '+title+'- </option>'+opt+'</select>');
			}
		});
 
		// DataTable
		//Code to show/hide the date fields on change of date filter
		$("#pro_start_date_range").change(function() {
			var val = $("#pro_start_date_range").val();
			if(val == 'between') {
				$("#prs_range_date").val('');
				$("#prs_single_range").css('display','none');
				$("#prs_is_between_range").css('display','');
			}
			else if (val == '=' || val == '!=' || val == '>' || val == '<') {
				if((/^\[.*\]$/).test($("#prs_range_date").val())) {
					$("#prs_range_date").val('');
				}
				$("#prs_start_range_date").val('');
				$("#prs_end_range_date").val('');
				$("#prs_single_range").css('display','');
				$("#prs_is_between_range").css('display','none');
			}
			else {
				$("#prs_range_date").val('[' + val + ']');
				$("#prs_start_range_date").val('');
				$("#prs_end_range_date").val('');
				$("#prs_single_range").css('display','none');
				$("#prs_is_between_range").css('display','none');
			}
		});	
		$("#pro_end_date_range").change(function() {
			var val = $("#pro_end_date_range").val();
			if(val == 'between') {
				$("#pre_range_date").val('');
				$("#pre_single_range").css('display','none');
				$("#pre_is_between_range").css('display','');
			}
			else if (val == '=' || val == '!=' || val == '>' || val == '<') {
				if((/^\[.*\]$/).test($("#pre_range_date").val())) {
					$("#pre_range_date").val('');
				}
				$("#pre_end_range_date").val('');
				$("#pre_single_range").css('display','');
				$("#pre_is_between_range").css('display','none');
			}
			else {
				$("#pre_range_date").val('[' + val + ']');
				$("#pre_start_range_date").val('');
				$("#pre_end_range_date").val('');
				$("#pre_single_range").css('display','none');
				$("#pre_is_between_range").css('display','none');
			}
		});
		//Code to add the date pickers for date fields in filters
		$(".dateRangeInput").datepicker({onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
		var table = $('#example').DataTable();
		$('.selectFilter').change(function ()  {
			if($(this).next().children().val() != '') {
				table.draw();
			}
		});
		$('.dateRangeInput').change(function ()  {
			table.draw();
		});
		
		// Apply the search
		$.each($('.input-filter', table.table().header()), function () {
			var column = table.column($(this).index());
			$( 'input', this).on( 'keyup change', function () {
				$(".search").css('width','100%');
				$(this).css('max-width','-webkit-fill-available');
				$(this).css('max-width','-moz-available');
				$(this).closest('td').css('width','');
				if ( column.search() !== this.value ) {
					column.search( this.value ).draw();
				}
			});
		});
		// Apply the search
		$.each($('.select-filter', table.table().header()), function () {
			var column = table.column($(this).index());
			$( 'select', this).on( 'change', function () {
				if ( column.search() !== this.value ) {
					column.search( this.value ).draw();
				}
				else if ( column.search() !== "" ) {
					column.draw();
				}
			});
		});
		
		$( 'input', this).on( 'click', function () {
			$(".search").css('width','100%');
			$(this).css('width','');
		});
		$('.dt-buttons').append('<a class="dt-button" tabindex="0" id ="clear" aria-controls="example" href="#">Clear Search</a>');
		$('#clear').on( 'click',function () {
			$('input[type=search]').val('');
			$('.search').val('');
			$('.dateRangeInput').val('');
			$('select option[value=""]').prop('selected',true);
			table.search( '' ).columns().search( '' ).draw();
		});
		table.keys.enable( 'navigation-only' );
		setTimeout(function(){ 
			$('#example ').on('click', 'tbody td.editable', function () {
				var th = $('.main th').eq($(this).index());
				$(".search").css('width','100%');
				$(this).css('max-width','-webkit-fill-available');
				$(this).css('max-width','-moz-available');
				$(this).find('input').css('width','auto');
				
				var header = th.text();
				if(header.includes(" ")) {
					header = header.replace(/\ /g, '-');
				}
				if(header.includes("/")) {
					header = header.replace(/\//g, '-');
				}
				// $("#"+header).css('width','');
				$("#"+header).closest('th').css('width','');
			});
		}, 300);
	});
</script>
<style>
    div.DTE_Body div.DTE_Body_Content div.DTE_Field {
		float: center;
		width: 10%;
		padding: 5px 20px;
		clear: none;
		box-sizing: border-box;
	}
	div.dt-buttons {
	   float:right;
	   position:relative;
	   margin-left: 0.5em;
	} 
	.button {
		padding: 0 15px 0 15px;
	}
	.table {
		padding-right: 5px;
	}
	div.DTE_Body div.DTE_Form_Content:after {
		content: ' ';
		display: block;
		clear: both;
	}
	select {
		font-weight: normal;
		width: auto;
		line-height: 20px;
		height: 25px;
		color: #0066a4;
	}
	input[type="dList"] {
		font-weight: normal;
		color: #0066a4;
	}
	div#dialog2 {
		display:none;
	}
	div#dialog {
		display:none;
	}
	div#copyrightbuttons {
		display:none;
	}
	div.footer_right {
		display:none;
	}
	table.dataTable td > i {
		margin-left: 0.5em;
		opacity: 0.3;
	}
	td.nonedit {
        font-weight: bold;
    }
	.dataTables_wrapper .dataTables_paginate {
		float: left;
		text-align: right;
		padding-top: 0.25em;
		// padding-left: em;
	}
	.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
	    max-width: 10em;
		max-height: 2.5em;
		/* text-overflow: ellipsis; */
		white-space: nowrap;
		overflow: hidden;
	}	
	.table-bordered>tbody>tr>td:not(.history):hover {
		overflow-x:auto;
		white-space: nowrap;
		width: auto;
    }
	.table-bordered>tbody>tr>td input {
		height:1.8em;
	}
	.datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-top {
		background-color: #0066a4 !important;
	}
	.datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-bottom {
		background-color: #0066a4 !important;
	}	
	.datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-right.datepicker-orient-top {
		background-color: #0066a4 !important;
	}	
	.datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-right.datepicker-orient-bottom {
		background-color: #0066a4 !important;
	}
	.datepicker table tr td.day:hover, .datepicker table tr td.focused {
		background: #f7971b !important;
	}
	div::-webkit-scrollbar {
		width: 12px;
		height: 15px;
	}
	div::-webkit-scrollbar-thumb {
		background: #c1c1c1;
	}
	.date-filter:hover {
		overflow-x:auto;
		white-space: nowrap;
		width: auto;
    }
	.datepicker table tr td, .datepicker table tr th {
		text-align: center;
		width: 23px;
		height: 20px;
		border-radius: 4px;
		border: none;
		font-size:9pt !important;
	}
</style>
	<?php
		/** 
		  * Function Name => Onchange
		  * Created By=> LakshmiGayathri(Created On Nov-14-2017)
		  * Modified By => LakshmiGayathri(Modified on Nov-14-2017)
		  * COMMENT => Onchange of Show entries should be set as per user preference
		  */
		echo $js = <<<EOT
		<script>
			$(document).ready(function(){
				$("#example_length").change(function(){
					var example = $("#example_length").children().children().val();
					$.cookie("employeeactivereport", example);
					location.reload(true);
				});
			});
		</script>
EOT;
		$page= $_COOKIE['employeeactivereport'];
		setcookie("employeeactivereport", "", time() - 3600);
		global $current_user;
		$user_preferences = new UserPreference($current_user);
		$preferences = $user_preferences->getPreference('employeeactivereport','eaReport'); //get setting by name
		if(!$preferences || $page) {
			if(!$page) {
				$page = 10;
			}
			$user_preferences->setPreference('employeeactivereport',$page,'eaReport'); //set some settings to SESSION 
			$user_preferences->savePreferencesToDB(); //set some settings from SESSION to DB
			$preferences = $user_preferences->getPreference('employeeactivereport','eaReport'); //get setting by name
		}
		echo $js = <<<EOT
			<script>
				$(document).ready(function(){
					$("#example").DataTable().page.len($preferences).draw();
				});
			</script>
EOT;
?>
	<h2 style="text-align:center;font-size: 20px;"><b>Employee Active Report</b></h2>
	<table id="example" class="display compact table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%">
		<thead>
			<tr class ="main">
				<th>Profile Name</th>
				<th>Phase</th>
				<th>Status</th>
				<th>Stage</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Channel Client</th>
				<th>End Client</th>
				<!--<th>State-Work</th>-->
				<th>Mobile Phone</th>
				<th>W2CTC</th>
				<th>Project Start Date</th>
				<th>Project End Date</th>
				<!--<th>Rolloff Date</th>-->
				<th>PO Status</th>
				<th>PO EndDate</th>
				<th>Recruiter</th>
				<th>RL</th>
				<th>ML-1</th>
				<th>Marketer-1</th>
				<th>Marketer-2</th>
				<th>H1B Stage</th>
				<th>Work City</th>
				<th>ACL</th>
				<th>Sales</th>
				<!--<th>Supplier</th>-->
				<th>Business Phone</th>
				<!--<th>Email Work</th>-->
				<th>Email Home1</th>
				<th>ZIP Code</th>
				<th>Notes-Employee</th>
				<th>HL</th>
				<th>Profile History</th>
				<th>Create Profile</th>
				<th>Stage Flag</th>
			</tr>
			<tr class="head">
				<th class="input-filter">Profile Name</th>
				<th class="select-filter">Phase</th>
				<th class="select-filter">Status</th>
				<th class="select-filter">Stage</th>
				<th class="input-filter">First Name</th>
				<th class="input-filter">Last Name</th>
				<th class="input-filter">Channel Client</th>
				<th class="input-filter">End Client</th>
				<!--<th class="input-filter">State-Work</th>-->
				<th class="input-filter">Mobile Phone</th>
				<th class="input-filter">W2CTC</th>
				<th class="date-filter">Project Start Date</th>
				<th class="date-filter">Project End Date</th>
				<!--<th class="input-filter">Rolloff Date</th>-->
				<th class="input-filter">PO Status</th>
				<th class="input-filter">PO EndDate</th>
				<th class="input-filter">Recruiter</th>
				<th class="input-filter">RL</th>
				<th class="input-filter">ML-1</th>
				<th class="input-filter">Marketer-1</th>
				<th class="input-filter">Marketer-2</th>
				<th class="input-filter">H1B Stage</th>
				<th class="input-filter">Work City</th>
				<th class="input-filter">ACL</th>
				<th class="input-filter">Sales</th>
				<!--<th class="input-filter">Supplier</th>-->
				<th class="input-filter">Business Phone</th>
				<!--<th class="input-filter">Email Work</th>-->
				<th class="input-filter">Email Home1</th>
				<th class="input-filter">ZIP Code</th>
				<th class="input-filter">Notes-Employee</th>
				<th class="input-filter">HL</th>
				<td></td>
				<td></td>
			</tr>
		</thead>
	</table>
</html>