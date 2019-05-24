<?php
/**  
  * FileName =>Benchsalesreport.php
  * Created By => Maneesha (Created On Nov-15-2017)
  * Modified By => Maneesha (Modified On Sep-10-2018)
  * COMMENT => Channel Sales Report with inline editing option,Enable the server side ,Added the filters for stage,status,project start date,project end date
  * COMMENT => Modified the stage and status filters as Multiselect type field
  * COMMENT => To make projectstart and end date fields to be editable.
  */
include('include/javascript/table_sort/javascript/jquery_datatables');
session_start();
?>
<html>
<link rel="stylesheet" type="text/css" href="custom/include/javascript/DataTables/Editor-2017-11-21-1.6.5/css/editor.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="custom/include/javascript/DataTables/DataTables-1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="custom/include/javascript/DataTables/Buttons-1.4.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="custom/include/javascript/DataTables/Select-1.2.3/css/select.dataTables.min.css">
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
<script src="custom/include/javascript/DataTables/KeyTable-2.3.2/js/dataTables.keyTable.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
<script src="custom/vats/vedic_Common/select2/select2.js"></script>
<link rel="stylesheet" type="text/css" href="custom/vats/vedic_Common/select2/select2.css">
<script type="text/javascript">
	var editor;
	$(document).ready(function(){
		editor = new $.fn.dataTable.Editor( {
			ajax: "index.php?entryPoint=Benchsalesreport",
			table: "#example",
			fields: [ 
				{
					label: "Stage Flag:",
					name: "vedic_profiles.stage_flag"
				},{
					label      : "H1B:",
					name       : "vedic_profiles_cstm.h1b_stage_c",
					type       : "select",
					ipOpts     : h1b() 
				},{
					label      : "Phase:",
					name       : "vedic_profiles_cstm.phase_c",
					type       : "select",
					ipOpts     : phase() 
				},{
					label      : "Status:",
					name       : "vedic_profiles_cstm.status_c",
					type       : "select",
					ipOpts     : status()  
				},{
					label      : "Stage:",
					name       : "vedic_profiles_cstm.stage_c",
					type       : "select",
					ipOpts     : stage()  
				},{
					label      : "W2CTC:",
					name       : "vedic_profiles_cstm.employee_type_c",
					type       : "select",
					ipOpts     : employee()  
				},{
					label      : "Primary Marketer:",
					name       : "primary_marketer_c",
					type       : "select",
					ipOpts     : marketer() 
				},{
					label      : "Secondary Marketer:",
					name       : "secondary_marketer_c",
					type       : "select",
					ipOpts     : marketer()  
				},{
					label      : "Technology:",
					name       : "vedic_profiles_cstm.technology_c",
					type       : "select",
					ipOpts     : key() 
				// },{
					// label      : "Channel Client:",
					// name       : "vedic_profiles_cstm.channel_client_c",
					// type       : "select",
					// ipOpts     : account()
				},{
					label      : "End Client:",
					name       : "vedic_profiles_cstm.end_client_c",
					type       : "select",
					ipOpts     : acc()  
				},{
					label      : "Role:",
					name       : "vedic_profiles_cstm.role_c",
					type       : "select",
					ipOpts     : role()  
				},{
					label      : "Interviews:",
					name       : "vedic_profiles_cstm.interviews_c"
				},{
					label      : "Sales:",
					name       : "sales_c",
					type       : "select",
					ipOpts     : user()  
				},{
					label      : "Hirer-1:",
					name       : "hirer_1_c",
					type       : "select",
					ipOpts     : user()  
				},{
					label      : "Slead:",
					name       : "vedic_profiles_cstm.slead_c"
				},{
					label      : "M-Start:",
					name       : "vedic_profiles_cstm.m_start_c",
					type       : 'date',
					def        : function () { return new Date(); },
					attr       : { "data-date-format": "mm/dd/yyyy" }
				},{
					label      : "M-End:",	
					name       : "vedic_profiles_cstm.m_end_c",
					type       : 'date',
					def        :  function () { return new Date(); },
					attr       : { "data-date-format": "mm/dd/yyyy" }
				},{
					label      : "Mobile Phone:",
					name       : "vedic_profiles.phone_mobile",
				},{
					label      : "Relocation:",
					name       : "vedic_profiles_cstm.relocation_c"
				},{
					label      : "Sell Rate/hr:",
					name       : "vedic_profiles_cstm.sell_rate_hr_c"
				},{
					label      : "Work City:",
					name       : "vedic_profiles.alt_address_city"
				},{
					label      : "Department:",
					name       : "vedic_candidates.department"
				},{
					label      : "ACL:",
					name       : "vedic_profiles_cstm.acl_c"
				},{
					label      : "Recruiter:",
					name       : "recruiter_c",
					type       : "select",
					ipOpts     : user()  
				},{
					label      : "RL:",
					name       : "rl_c",
					type       : "select",
					ipOpts     : user()  
				},{
					label      : "Hirer-2:",
					name       : "hirer_2_c",
					type       : "select",
					ipOpts     : user()  
				},{
					label      : "ML-1:",
					name       : "ml_1_c",
					type       : "select",
					ipOpts     : marketer()
				},{
					label      : "ML-2:",
					name       : "ml_2_c",
					type       : "select",
					ipOpts     : marketer()
				},{
					label      : "Client Industry:",
					name       : "vedic_profiles_cstm.client_industry_c",
					type       : "select",
					ipOpts     : clIndus()  
				},{
					label      : "Bill Rate/Hr:",
					name       : "vedic_profiles_cstm.bill_rate_hr_c",
				},{
					label      : "Total/Hr:",
					name       : "vedic_profiles_cstm.total_hr_c",
				},{
					label      : "Payrate:",
					name       : "vedic_profiles_cstm.payrate_c",
				},{
					label      : "Auto/Hr:",
					name       : "vedic_profiles_cstm.auto_hr_c",
				},{
					label      : "BD/Hr:",
					name       : "vedic_profiles_cstm.bd_hr_c",
				},{
					label      : "Consulate:",
					name       : "vedic_profiles_cstm.consulate_c",
				},{
					label      : "Interview Date:",
					name       : "vedic_profiles_cstm.interview_date_c",
					type       : 'date',
					def        : function () { return new Date(); },
					attr       : {"data-date-format": "mm/dd/yyyy" }
				},{
					label      : "Project Start Date:",
					name       : "vedic_profiles_cstm.project_start_date_c",
					type       : 'date',
					def        : function () { return new Date(); },
					attr       : {"data-date-format": "mm/dd/yyyy" }
				},{
					label      : "Project End Date:",
					name       : "vedic_profiles_cstm.project_end_date_c",
					type       : 'date',
					def        : function () { return new Date(); },
					attr       : {"data-date-format": "mm/dd/yyyy" }
				},{
					label      : "Interviwed By:",
					name       : "vedic_profiles_cstm.interviwed_by_c"
				},{
					label      : "Notes - Auto:",
					name       : "vedic_profiles_cstm.notes_auto_c",
					type       : "textarea",
				},{
					label      : "Notes - Bench:",
					name       : "vedic_profiles_cstm.notes_bench_c",
					type       : "textarea",
				},{
					label      : "Notes - Employee:",
					name       : "vedic_profiles_cstm.notes_employee_c",
					type       : "textarea",
				},{
					label      : "Notes - Payroll:",
					name       : "vedic_profiles_cstm.notes_payroll_c",
					type       : "textarea",
				},{
					label      : "Notes - Sales:",
					name       : "vedic_profiles_cstm.notes_sales_c",
					type       : "textarea",
				},{
					label      : "OT/hr:",
					name       : "vedic_profiles_cstm.ot_hr_c"
				},{
					label      : "Pay/Year:",
					name       : "vedic_profiles_cstm.pay_year_c"
				},{
					label      : "State-Payroll:",
					name       : "vedic_profiles_cstm.state_payroll_c"
				},{
					label      : "Willing to Train:",
					name       : "vedic_profiles_cstm.willing_to_train_c",
					type       : "select",
					separator  : "|",
					options    : [
						{ label   : "", value : "" },
						{ label   : "Yes", value : "1" },
						{ label   : "No",  value : "0" },
					]
				},{
					label      : "PO Status:",
					name       : "vedic_profiles_cstm.po_status_c",
					type       : 'select',
					ipOpts     : postatus()
				},{
					label      : "POEndDate:",
					name       : "vedic_profiles_cstm.po_end_date_c",
					type       : 'date',
					def        : function () { return new Date(); },
					attr       : { "data-date-format": "mm/dd/yyyy" }
				}
			]
		});
		/* Code Added By Maneesha : Sep-05-2018 */
		$('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
			var pre_value;
			editor.on( 'open', function ( e, type ) {
				pre_value = editor.get();
				
			} )
			var rowData = table.row(this.parentNode).data();
			if((rowData.vedic_profiles_cstm.project_start_date_c)!=null ){
				editor.inline( this ,{ 
					buttons: { label : '<i class="fa fa-floppy-o fa-lg" title="Save" aria-hidden="true"></i>', fn: function () { 
						this.submit(function() {
							var rowID = Object.keys(this.s.editFields)[0];
							var fieldID = this.s.includeFields[0];
							var post_value = editor.get();
							var v = rowID.split('_');
							rowID = v[1];
							$.ajax({
								url:"index.php?entryPoint=auditBenchMaster",
								type       : "POST",
								data:{rowID:rowID,fieldID:fieldID,pre_value:pre_value,post_value:post_value},
								success: function(data){
									docvalues = data;	
								},
								error: function(){},        
							});
						});
					}}
				});
			}
			if((rowData.vedic_profiles_cstm.project_end_date_c)!=null  ){
				editor.inline( this ,{ 
					buttons: { label : '<i class="fa fa-floppy-o fa-lg" title="Save" aria-hidden="true"></i>', fn: function () { 
						this.submit(function() {
							var rowID = Object.keys(this.s.editFields)[0];
							var fieldID = this.s.includeFields[0];
							var post_value = editor.get();
							var v = rowID.split('_');
							rowID = v[1];
							$.ajax({
								url:"index.php?entryPoint=auditBenchMaster",
								type       : "POST",
								data:{rowID:rowID,fieldID:fieldID,pre_value:pre_value,post_value:post_value},
								success: function(data){
									docvalues = data;	
								},
								error: function(){},        
							});
						});
					}}
				});
			}
			editor.on( 'preSubmit', function ( e, o, action ) {
				if ( action !== 'remove' ) {
					var fieldID = this.s.includeFields[0];
					var stage = editor.field('vedic_profiles_cstm.stage_c').get();
					var status = editor.field('vedic_profiles_cstm.status_c').get();
					var startDate = editor.field('vedic_profiles_cstm.project_start_date_c').get();
					var endDate = editor.field('vedic_profiles_cstm.project_end_date_c').get();
					var stageflag = editor.field('vedic_profiles.stage_flag').get();
					
					if(fieldID == 'vedic_profiles_cstm.project_end_date_c'){
						if(Date.parse(startDate) > Date.parse(endDate)){
							this.field(fieldID).error( 'Project end date should be greater than project start date ' );
							return false;
						}
						if(!startDate && endDate){
							this.field(fieldID).error( 'Project start date should be entered first' );
							return false;
						}
					}
					if(fieldID == 'vedic_profiles_cstm.project_start_date_c'){
						if(Date.parse(endDate) < Date.parse(startDate)){
							this.field(fieldID).error( 'Project start date should not be greater than project end date ' );
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
		
		});
		/* End of Maneesha's code -Sep-05-2018 */
		$('#example').on( 'click', 'tbody td.editable', function (e) {
			var pre_value;
			editor.on( 'open', function ( e, type ) {
				pre_value = editor.get();
			} )
			editor.inline( this,{
				buttons: { label      : '<i class="fa fa-floppy-o fa-lg" title="Save" aria-hidden="true"></i>', fn: function () { 
					this.submit(); 
					var rowID = Object.keys(this.s.editFields)[0];
					var fieldID = this.s.includeFields[0];
					var post_value = editor.get();
					var v = rowID.split('_');
					rowID = v[1];
					$.ajax({
						url:"index.php?entryPoint=auditBenchMaster",
						type       : "POST",
						data:{rowID:rowID,fieldID:fieldID,pre_value:pre_value,post_value:post_value},
						success: function(data){
							docvalues = data;	
						},
						error: function(){},        
					});
				}}
			});
		});

		$('#example').DataTable( {
			retrieve: true,
			orderCellsTop: true,
			dom: "Blfrtip",
			keys: true,
			scrollY: 300,
			scrollX: true,
			"language": {
				"decimal": ".",
				"thousands": ","
			},
			"columnDefs": [
				{
					"targets": [ 78 ],
					"visible": false,
					"searchable": false
				}
			],
			"lengthMenu": [ [10, 25, 50,100, 1000], [10, 25, 50,100, 1000] ],
			ajax:{
				url:"index.php?entryPoint=Benchsalesreport",
				type: "POST",
				data: function (d) { 
					d.prsminDate = $('#prs_start_range_date').val(); 
					d.prsmaxDate = $('#prs_end_range_date').val(); 
					d.prsDate = $('#prs_range_date').val();
					d.prsValue = $('#pro_start_date_range').val();
					d.preminDate = $('#pre_start_range_date').val(); 
					d.premaxDate = $('#pre_end_range_date').val(); 
					d.preDate = $('#pre_range_date').val();
					d.preValue = $('#pro_end_date_range').val();
					d.stageRange = $('#stage_range').val();
					d.statusRange = $('#status_range').val();
					d.stageFilter = $('#Stage_filter').val();
					d.statusFilter = $('#Status_filter').val();
				},
			},
			serverSide: true,
			processing: true,
			// ajax: "index.php?entryPoint=Benchsalesreport",
			order: [[ 6, 'asc' ]],
			columns: [
				{ 
					data: "Name",
					render: function(data, type, row, meta){
						if(type === 'display'){
							data = '<a target="_blank" href="index.php?module=vedic_Profiles&action=DetailView&record=' + row.ID + '">' + data + '</a>';
						}
						return data;
					},
					orderable: false,
					className: "nonedit"
				} ,
				{ data: "vedic_profiles_cstm.h1b_stage_c",
					render: function ( data, type, row ) {
						if ( data == 'LNot Applicable' ) {
							return "Not Applicable";
						} else {
							return data;
						}
					},
					className: "editable" 
				},
				{ data: "vedic_profiles_cstm.phase_c",className: "editable" },
				{ data: "vedic_profiles_cstm.status_c",className: "editable" },
				{ data: "vedic_profiles_cstm.stage_c",className: "editable" },
				{ data: "vedic_profiles_cstm.employee_type_c", 
					render: function ( data, type, row ) {
						if ( data == 'w2' ) {
							return "W2";
						} else if(data == 'opt') {
							return "OPT";
						} else if(data == 'c2c') {
							return "C2C";
						} else if(data == 'referral') {
							return "Referral";
						} else if(data == 'offshore') {
							return "Offshore";
						} else {
							return data;
						}
					},className: "editable"
				},	
				{ data: "vedic_profiles.first_name",className: "nonedit" },
				{ data: "vedic_profiles.last_name",className: "nonedit" },
				{ data: "vedic_profiles_cstm.project_start_date_c",className: "nonedit"},
				{ data: "vedic_profiles_cstm.project_end_date_c",className: "nonedit"},
				// { data: "PMName", editField: "primary_marketer_c",className: "editable" },
				{ 
				data : "PMFName",
					render: function ( data, type, row ) {
						if(row.PMFName === null){
							row.PMFName = '';
						}
						if(row.PMLName === null){
							row.PMLName = '';
						}
						return row.PMFName+" "+row.PMLName;  
					},className: "editable",
					editField: "primary_marketer_c"
				},
				// { data: "SMName" , editField: "secondary_marketer_c",className: "editable" },
				{ 
				data : "SMFName",
					render: function ( data, type, row ) {
						if(row.SMFName === null){
							row.SMFName = '';
						}
						if(row.SMLName === null){
							row.SMLName = '';
						}
						return row.SMFName+" "+row.SMLName;  
					},className: "editable",
					editField: "secondary_marketer_c"
				},
				{ data: "vedic_profiles_cstm.technology_c" ,className: "editable"},
				{ data: "ChannelClient",editField: "vedic_profiles_cstm.channel_client_c",className: "nonedit"  },
				{ data: "EndClient",editField: "vedic_profiles_cstm.end_client_c",className: "editable" },
				{ data: "vedic_profiles_cstm.role_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.interviews_c",className: "editable"  },
				// { data: "SalesName",editField: "sales_c",className: "editable"  },
				{ data : "SalesFName",
					render: function ( data, type, row ) {
						if(row.SalesFName === null){
							row.SalesFName = '';
						}
						if(row.SalesLName === null){
							row.SalesLName = '';
						}
						return row.SalesFName+" "+row.SalesLName;  
					},className: "editable",
					editField: "sales_c"
				},
				// { data: "Hirer1Name", editField: "hirer_1_c",className: "editable"  },
				{ 
				data : "Hirer1FName",
					render: function ( data, type, row ) {
						if(row.Hirer1FName === null){
							row.Hirer1FName = '';
						}
						if(row.Hirer1LName === null){
							row.Hirer1LName = '';
						}
						return row.Hirer1FName+" "+row.Hirer1LName;  
					},className: "editable",
					editField: "hirer_1_c"
				},
				{ data: "vedic_profiles_cstm.slead_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.m_start_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.m_end_c",className: "editable"  },
				{ data: "vedic_profiles.phone_mobile",className: "nonedit"  },
				{ data: "vedic_profiles_cstm.email_c",
					render: function(data, type, row){
						if(data){
							data = '<a target="_blank" href="index.php?module=vedic_Candidates&&action=EditView&record='+row.VCID+'">' + data + '</a>';
						}
						return data;
					},
					className: "nonedit"  },
				{ data: "vedic_profiles_cstm.relocation_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.sell_rate_hr_c", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ),className: "editable"  },
				{ data: "vedic_profiles.alt_address_city",className: "editable"  },
				{ data: "vedic_candidates.department",className: "nonedit"  },
				{ data: "vedic_profiles_cstm.acl_c",className: "editable"  },
				// { data: "Recruiter" , editField:  "recruiter_c", className: "editable"},
				{ 
				data : "RecruiterFName",
					render: function ( data, type, row ) {
						if(row.RecruiterFName === null){
							row.RecruiterFName = '';
						}
						if(row.RecruiterLName === null){
							row.RecruiterLName = '';
						}
						return row.RecruiterFName+" "+row.RecruiterLName;  
					},className: "editable",
					editField: "recruiter_c"
				},
				// { data: "RLName", editField: "rl_c" , className: "editable"},
				{ 
				data : "RLFName",
					render: function ( data, type, row ) {
						if(row.RLFName === null){
							row.RLFName = '';
						}
						if(row.RLLName === null){
							row.RLLName = '';
						}
						return row.RLFName+" "+row.RLLName;  
					},className: "editable",
					editField: "rl_c"
				},
				// { data: "Hirer2Name", editField: "hirer_2_c" ,className: "editable"},
				{ 
				data : "Hirer2FName",
					render: function ( data, type, row ) {
						if(row.Hirer2FName === null){
							row.Hirer2FName = '';
						}
						if(row.Hirer2LName === null){
							row.Hirer2LName = '';
						}
						return row.Hirer2FName+" "+row.Hirer2LName;  
					},className: "editable",
					editField: "hirer_2_c"
				},
				// { data: "ML1Name", editField: "ml_1_c" ,className: "editable"},
				{ 
				data : "ML1FName",
					render: function ( data, type, row ) {
						if(row.ML1FName === null){
							row.ML1FName = '';
						}
						if(row.ML1LName === null){
							row.ML1LName = '';
						}
						return row.ML1FName+" "+row.ML1LName;  
					},className: "editable",
					editField: "ml_1_c"
				},
				// { data: "ML2Name", editField: "ml_2_c" ,className: "editable"},
				{ 
				data : "ML2FName",
					render: function ( data, type, row ) {
						if(row.ML2FName === null){
							row.ML2FName = '';
						}
						if(row.ML2LName === null){
							row.ML2LName = '';
						}
						return row.ML2FName+" "+row.ML2LName;  
					},className: "editable",
					editField: "ml_2_c"
				},
				{ data: "vedic_profiles_cstm.client_industry_c",className: "editable"  },
				// { data: "EmpName",editField: "vedic_candidates_cstm.vedic_employees_id_c",className: "nonedit"},
				{ 
				data : "EmpFName",
					render: function ( data, type, row ) {
						if(row.EmpFName === null){
							row.EmpFName = '';
						}
						if(row.EmpLName === null){
							row.EmpLName = '';
						}
						return row.EmpFName+" "+row.EmpLName;  
					},className: "nonedit",
					editField: "vedic_candidates_cstm.vedic_employees_id_c"
				},
				{ data: "vedic_candidates.phone_work",className: "nonedit"  },
				{ data: "vedic_candidates.dob",className: "nonedit"  },
				{ data: "vedic_profiles_cstm.bill_rate_hr_c", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ),className: "editable"  },
				{ data: "vedic_profiles_cstm.total_hr_c" , render: $.fn.dataTable.render.number( ',', '.', 0, '$' ),className: "editable"  },
				{ data: "vedic_profiles_cstm.payrate_c" , render: $.fn.dataTable.render.number( ',', '.', 0, '$' ),className: "editable"  },
				{ data: "vedic_profiles_cstm.auto_hr_c" , render: $.fn.dataTable.render.number( ',', '.', 0, '$' ),className: "editable"  },
				{ data: "vedic_profiles_cstm.bd_hr_c" , render: $.fn.dataTable.render.number( ',', '.', 0, '$' ),className: "editable"  },
				{ data: "vedic_candidates_cstm.childrens_names_c" ,className: "nonedit" },
				{ data: "vedic_profiles_cstm.consulate_c",className: "editable"  },
				{ data: "vedic_candidates.primary_address_country",
					render: function ( data, type, row ) {
						if ( data == 'US_USA' ) {
							return "USA";
						} else if(data == 'IN_India') {
							return "India";
						} else if(data == 'CN_Canada') {
							return "Canada";
						} else {
							return data;
						}
					},
					className: "nonedit" 
				},
				{ data: "vedic_candidates_cstm.email_vedic_c",className: "nonedit"  },
				{ data: "vedic_candidates_cstm.extension_c",className: "nonedit"  },
				{ data: "vedic_candidates.primary_address_street",className: "nonedit"  },
				{ data: "vedic_candidates.primary_address_city",className: "nonedit"  },
				{ data: "vedic_candidates.phone_home",className: "nonedit"  },
				{ data: "vedic_candidates.primary_address_state",
					render: function ( data, type, row ) {
						if ( data == 'US_AL' ) { return 'Alabama';
						}else if(data =='US_AK'){return 'Alaska';
						}else if(data =='US_AZ'){return 'Arizona';
						}else if(data =='US_AR'){return 'Arkansas';
						}else if(data =='US_CA'){return 'California';
						}else if(data =='US_CO'){return 'Colorado';
						}else if(data =='US_CT'){return 'Connecticut';
						}else if(data =='US_DE'){return 'Dist. Columbia';
						}else if(data =='US_DC'){return 'Delaware';
						}else if(data =='US_FL'){return 'Florida';
						}else if(data =='US_GA'){return 'Georgia';
						}else if(data =='US_HI'){return 'Hawaii';
						}else if(data =='US_ID'){return 'Idaho';
						}else if(data =='US_IL'){return 'Illinois';
						}else if(data =='US_IN'){return 'Indiana';
						}else if(data =='US_IA'){return 'Iowa';
						}else if(data =='US_KS'){return 'Kansas';
						}else if(data =='US_KY'){return 'Kentucky';
						}else if(data =='US_LA'){return 'Louisiana';
						}else if(data =='US_ME'){return 'Maine';
						}else if(data =='US_MD'){return 'Maryland';
						}else if(data =='US_MA'){return 'Massachusetts';
						}else if(data =='US_MI'){return 'Michigan';
						}else if(data =='US_MN'){return 'Minnesota';
						}else if(data =='US_MS'){return 'Mississippi';
						}else if(data =='US_MO'){return 'Missouri';
						}else if(data =='US_MT'){return 'Montana';
						}else if(data =='US_NE'){return 'Nebraska';
						}else if(data =='US_NV'){return 'Nevada';
						}else if(data =='US_NH'){return 'New Hampshire';
						}else if(data =='US_NJ'){return 'New Jersey';
						}else if(data =='US_NM'){return 'New Mexico';
						}else if(data =='US_NY'){return 'New York';
						}else if(data =='US_NC'){return 'North Carolina';
						}else if(data =='US_ND'){return 'North Dakota';
						}else if(data =='US_OH'){return 'Ohio';
						}else if(data =='US_OK'){return 'Oklahoma';
						}else if(data =='US_OR'){return 'Oregon';
						}else if(data =='US_PA'){return 'Pennsylvania';
						}else if(data =='US_RI'){return 'Rhode Island';
						}else if(data =='US_SC'){return 'South Carolina';
						}else if(data =='US_SD'){return 'South Dakota';
						}else if(data =='US_TN'){return 'Tennessee';
						}else if(data =='US_TX'){return 'Texas';
						}else if(data =='US_UT'){return 'Utah';
						}else if(data =='US_VT'){return 'Vermont';
						}else if(data =='US_VA'){return 'Virginia';
						}else if(data =='US_WA'){return 'Washington';
						}else if(data =='US_WV'){return 'West Virginia';
						}else if(data =='US_WI'){return 'Wisconsin';
						}else if(data =='US_WY'){return 'Wyoming';
						}else if(data =='CN_AB'){return 'Alberta';
						}else if(data =='CN_BC'){return 'British Columbia';
						}else if(data =='CN_MB'){return 'Manitoba';
						}else if(data =='CN_NB'){return 'New Brunswick';
						}else if(data =='CN_NF'){return 'Newfoundland and Labrador';
						}else if(data =='CN_NW'){return 'North West Terr.';
						}else if(data =='CN_NS'){return 'Nova Scotia';
						}else if(data =='CN_NU'){return 'Nunavut';
						}else if(data =='CN_ON'){return 'Ontario';
						}else if(data =='CN_PE'){return 'Prince Edward Is.';
						}else if(data =='CN_QC'){return 'Quebec';
						}else if(data =='CN_SK'){return 'Saskatchewen';
						}else if(data =='CN_YU'){return 'Yukon';
						}else if(data =='IN_AN'){return 'Andaman and Nicobar';
						}else if(data =='IN_AP'){return 'Andhra Pradesh';
						}else if(data =='IN_AR'){return 'Arunachal Pradesh';
						}else if(data =='IN_AS'){return 'Assam';
						}else if(data =='IN_BR'){return 'Bihar';
						}else if(data =='IN_CH'){return 'Chandigarh';
						}else if(data =='IN_CT'){return 'Chhattisgarh';
						}else if(data =='IN_DN'){return 'Dadar and Nagar Haveli';
						}else if(data =='IN_DD'){return 'Daman and Diu';
						}else if(data =='IN_DL'){return 'Delhi';
						}else if(data =='IN_GA'){return 'Goa';
						}else if(data =='IN_GJ'){return 'Gujarat';
						}else if(data =='IN_HR'){return 'Haryana';
						}else if(data =='IN_HP'){return 'Himachal Pradesh';
						}else if(data =='IN_JK'){return 'Jammu and Kashmir';
						}else if(data =='IN_JH'){return 'Jharkhand';
						}else if(data =='IN_KA'){return 'Karnataka';
						}else if(data =='IN_KL'){return 'Kerala';
						}else if(data =='IN_LD'){return 'Lakshadweep';
						}else if(data =='IN_MP'){return 'Madhya Pradesh';
						}else if(data =='IN_MH'){return 'Maharashtra';
						}else if(data =='IN_MN'){return 'Manipur';
						}else if(data =='IN_ML'){return 'Meghalaya';
						}else if(data =='IN_MZ'){return 'Mizoram';
						}else if(data =='IN_NL'){return 'Nagaland';
						}else if(data =='IN_OR'){return 'Odisha';
						}else if(data =='IN_PY'){return 'Puducherry';
						}else if(data =='IN_PB'){return 'Punjab';
						}else if(data =='IN_RJ'){return 'Rajasthan';
						}else if(data =='IN_SK'){return 'Sikkim';
						}else if(data =='IN_TN'){return 'Tamil Nadu';
						}else if(data =='IN_TG'){return 'Telangana';
						}else if(data =='IN_TR'){return 'Tripura';
						}else if(data =='IN_UP'){return 'Uttar Pradesh';
						}else if(data =='IN_UT'){return 'Uttarakhand';
						}else if(data =='IN_WB'){return 'West Bengal';
						}else{return data;
						}
					},
				    className: "nonedit"  },
				{ data: "vedic_candidates_cstm.insurance_c",className: "nonedit"  },
				{ data: "vedic_profiles_cstm.interview_date_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.interviwed_by_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.notes_auto_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.notes_bench_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.notes_employee_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.notes_payroll_c",className: "editable"  },
				{ data: "vedic_profiles_cstm.notes_sales_c",className: "editable"  },
				{ data: "vedic_candidates_cstm.offer_c" ,className: "nonedit" },
				{ data: "vedic_profiles_cstm.ot_hr_c" , render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) ,className: "editable" },
				{ data: "vedic_profiles_cstm.pay_year_c" , render: $.fn.dataTable.render.number( ',', '.', 0, '$' ),className: "editable"  },
				{ data: "vedic_profiles_cstm.state_payroll_c",className: "editable"  },
				{ data: "vedic_candidates_cstm.percentage_c",className: "nonedit"  },
				{ data: "vedic_profiles_cstm.po_status_c",
					render: function ( data, type, row ) {
						if ( data == 'In_progress' ) {
							return "In Progress";
						} else {
							return data;
						}
					},	className: "editable" 
				},
				{ data: "vedic_profiles_cstm.po_end_date_c",className: "editable"  },
				{ data: "vedic_candidates_cstm.priority_date_c",className: "nonedit"  },
				{ data: "vedic_candidates_cstm.revision_date_c",className: "nonedit"  },
				{ data: "vedic_candidates_cstm.service_center_c" ,className: "nonedit" },
				{ data: "vedic_candidates_cstm.spouse_c",className: "nonedit"  },
				{ data: "vedic_candidates_cstm.ssn_c" ,className: "nonedit" },
				{ data: "vedic_candidates_cstm.vedic_job_title_c",className: "nonedit"  },
				{ data: "vedic_candidates_cstm.wedding_date_c",className: "nonedit"  },
				{ data: "vedic_candidates.primary_address_postalcode" ,className: "nonedit" },
				{ data: "vedic_profiles_cstm.willing_to_train_c" ,
					render: function ( data, type, row ) {
						if ( data == 1 ) {
							return "Yes";
						} else if(data == 0) {
							return "No";
						} else {
							return data;
						}
					},className: "editable"
				},
				{ data: "Name",
					render: function(data, type, row){
						if(type === 'display'){
							data = '<a class="button buttons-collection" target="_blank" href="index.php?module=vedic_Profiles&action=Activitylog&record=' + row.ID + '"><span<i class="fa fa-history" aria-hidden="true" style = "font-size: larger;"></i> History </span> </a>';
						}
						return data;
					},
					className:"history"
				},
				{ data: "Name",
					render: function(data, type, row){
						if(type === 'display'){
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
				selector: 'td.select-checkbox'
			},
			/**		
			  * Events: buttons 		
			  * Modified By => Maneesha (Modified On Aug-02-2018)		
			  * Comments => Export the data based on filters added with pagination.		
			  */
			buttons: [
				{
					extend  : 'collection',
					text    : '<i class="fa fa-download" aria-hidden="true"></i>  Export',
					buttons: [
						{	
							extend      : 'csvHtml5',
							text : '<i class="fa fa-files-o"></i>  CSV',
							/** Code Added by Maneesha(Aug-01-2018) */		
							action: function (e, dt,button, config)		
							{		
								config.title = 'Channel Sales Report- All Items';		
								dt.one('preXhr', function (e, s, data)		
								{		
									data.length = -1;		
											
								}).one('draw', function (e, settings, json, xhr)		
								{		
									var csvButtonConfig = $.fn.DataTable.ext.buttons.csvHtml5;		
									var addOptions = { exportOptions: { 'page': ': current'},filename:'Channel Sales Report- All Items'};		
									$.extend(true, csvButtonConfig, addOptions);		
									csvButtonConfig.action(e, dt, button, csvButtonConfig);		
								}).draw();		
							},
						},
						{
							extend      : 'pdfHtml5',
							text : '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>	 PDF',
							/** Code Added by Maneesha(Aug-01-2018) */
							action: function (e, dt,button, config)
							{
								dt.one('preXhr', function (e, s, data)
								{
									data.length = -1;
									
								}).one('draw', function (e, settings, json, xhr)
								{
									var pdfButtonConfig = $.fn.DataTable.ext.buttons.pdfHtml5;
									var addOptions = { 
														exportOptions: { 'page': ': current'},
													    title : 'Channel Sales Report- All Items',
													    filename: 'Channel Sales Report- All Items',
													    orientation : 'landscape',
													    pageSize    : 'A0',
							
													};
									$.extend(true, pdfButtonConfig, addOptions);
									pdfButtonConfig.action(e, dt, button, pdfButtonConfig);
								}).draw();
							}	
						},
						{
							extend      : 'excelHtml5',
							text : '<i class="fa fa-file-excel-o" aria-hidden="true"></i>  Excel',
							/** Code Added by Maneesha(Aug-01-2018) */
							action: function (e, dt,button, config)
							{
								dt.one('preXhr', function (e, s, data)
								{
									data.length = -1;
									
								}).one('draw', function (e, settings, json, xhr)
								{
									var excelButtonConfig = $.fn.DataTable.ext.buttons.excelHtml5;
									var addOptions ={ 
														exportOptions: { 'page': ': current'},
														filename    :'Channel Sales Report- All Items',
														title       :'Channel Sales Report- All Items',
														sheetName   :'Channel Sales Report- All Items'
													};
									$.extend(true, excelButtonConfig, addOptions);
									excelButtonConfig.action(e, dt, button, excelButtonConfig);
								}).draw();
							},
						}
					],
				},
			]
		});
		function role(){      
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getrole',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		function status(){      
			var status= new Array({"label" : "a", "value" : "a"});
			status.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getstatus',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						status.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return status;
		}
		function clIndus(){      
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getcltindustry',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		function stage(){      
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getstage',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		function employee(){      
			var employee= new Array({"label" : "a", "value" : "a"});
			employee.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getemployee',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						employee.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return employee;
		}
		function phase(){      
			var phase= new Array({"label" : "a", "value" : "a"});
			phase.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getphase',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						phase.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return phase;
		}
		function h1b(){      
			var h1b= new Array({"label" : "a", "value" : "a"});
			h1b.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=h1b',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						h1b.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return h1b;
		}
		function user(){      
			var get_user= new Array({"label" : "a", "value" : "a"});
			get_user.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getUser',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						get_user.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return get_user;
		}
		function acc(){      
			var get_account= new Array({"label" : "a", "value" : "a"});
			get_account.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getAcc',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						get_account.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return get_account;
		}
		function marketer(){      
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getmarketer',
				async: false,    
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		function account(){
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getAccount',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
		}
		function key(){
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getkeyskill',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
						obj= { "label" : json[a][0], "value" : json[a][1]};
						stage.push(obj);			
					}
				},
				error : function( jqXHR, textStatus, errorThrown ){ console.log( jqXHR, textStatus, errorThrown ); }
			});
			return stage;
			
		}
		function postatus(){      
			var stage= new Array({"label" : "a", "value" : "a"});
			stage.splice(0,1);
			$.ajax({
				url: 'index.php?entryPoint=getpostatus',
				async: false,
				dataType: 'json',
				success: function (json) {
					for(var a=0;a < json.length;a++){
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
					$(this).html('<select id="pro_start_date_range" name="pro_start_date_range" class="dateRangeFilter selectFilter"><option label="Equals" value="=" selected="selected">Equals</option><option label="Not On" value="!=">Not On</option><option label="After" value=">">After</option><option label="Before" value="<">Before</option><option label="Is Between" value="between">Is Between</option></select><div id="prs_single_range" style = "margin: 3px 0px 3px 0px;"><input autocomplete="off" type="text" name="prs_range_date" id="prs_range_date" value="" title="" size="11" class="dateRangeInput" style="width: 100%; padding: 3px;  box-sizing: content-box;"></div><div id="prs_is_between_range" style="display:none; margin: 3px 0px 3px 0px;"><input autocomplete="off" type="text" name="prs_start_range_date" id="prs_start_range_date" value="" title="" tabindex="" size="11" class="dateRangeInput" style="width: 100%; padding: 3px;  box-sizing: content-box;"><br/> AND <br/><input autocomplete="off" type="text" name="prs_end_range_date" id="prs_end_range_date" value="" title="" tabindex="" size="11" class="dateRangeInput" maxlength="10" style="width: 100%; padding: 3px;  box-sizing: content-box;"></div>');
				}
				else{
					$(this).html('<select id="pro_end_date_range" name="pro_end_date_range" class="dateRangeFilter selectFilter"><option label="Equals" value="=" selected="selected">Equals</option><option label="Not On" value="!=">Not On</option><option label="After" value=">">After</option><option label="Before" value="<">Before</option><option label="Is Between" value="between">Is Between</option></select><div id="pre_single_range" style = "margin: 3px 0px 3px 0px;"><input autocomplete="off" type="text" name="pre_range_date" id="pre_range_date" value="" title="" size="11" class="dateRangeInput" style="width: 100%; padding: 3px;  box-sizing: content-box;"></div><div id="pre_is_between_range" style="display:none; margin: 3px 0px 3px 0px;"><input autocomplete="off" type="text" name="pre_start_range_date" id="pre_start_range_date" value="" title="" tabindex="" size="11" class="dateRangeInput" style="width: 100%; padding: 3px;  box-sizing: content-box;"><br/> AND <br/><input autocomplete="off" type="text" name="pre_end_range_date" id="pre_end_range_date" value="" title="" tabindex="" size="11" class="dateRangeInput" maxlength="10" style="width: 100%; padding: 3px;  box-sizing: content-box;"></div>');
				}
			}
			//Drop-down filters for stage and status fields
			else {
				var obj;
				if(title =='Status') {
					$(this).html('<select id="status_range" name="status_range" class="rangeFilter selectFilter"><option label="Equals" value="IN" selected="selected">Equals</option><option label="Not Equals" value="NOT IN">Not On</option></select><div style="margin: 3px 0px 3px 0px;"><select id="Status_filter" name="Status_filter" class="selectInput selectFilter" multiple="multiple"></select></div>');
					obj = status();					
				}
				else {
					$(this).html('<select id="stage_range" name="stage_range" class="rangeFilter selectFilter"><option label="Equals" value="IN" selected="selected">Equals</option><option label="Not Equals" value="NOT IN">Not On</option></select><div style="margin: 3px 0px 3px 0px;"><select id="Stage_filter" name="Stage_filter" class="selectInput selectFilter" multiple="multiple"></select></div>');
					obj = stage();
				}
				$.each( obj, function( key, value ) {
					$.each( obj[key], function( key, value ) {
						if(value!=''){
							$("#"+title+"_filter").append(
								$('<option label="'+value+'" value="'+value+'"/>').text(value)
							);
						}
					});
				});
				var map = {};
				$("#"+title+"_filter option").each(function () {
					if (map[this.value]) {
						$(this).remove()
					}
					map[this.value] = true;
				})
			}
		});
		//Code to show/hide the date fields on change of date filter
		$("#pro_start_date_range").change(function(){
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
		$("#pro_end_date_range").change(function(){
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
				$("#pre_start_range_date").val('');
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
		// DataTable
		var table = $('#example').DataTable();

		// Apply the search
		$.each($('.input-filter', table.table().header()), function () {
			var column = table.column($(this).index());
			$( 'input', this).on( 'keyup change', function () {
				$(".search").css('width','100%');
				$(this).css('max-width','-webkit-fill-available');
				$(this).css('max-width','-moz-available');
				$(this).closest('td').css('width','');
				if ( column.search() !== this.value ) {
					column
						.search( this.value )
						.draw();
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
			$('.selectInput').val('');
			$('#Stage_filter').val(null).trigger('change');
			$('#Status_filter').val(null).trigger('change');
			// $('select option[value=""]').prop('selected',true);
			table
			 .search( '' )
			 .columns().search( '' )
			 .draw();
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
				if(header.includes(" ")){
					header = header.replace(/\ /g, '-');
				}
				if(header.includes("/")){
					header = header.replace(/\//g, '-');
				}
				// $("#"+header).css('width','');
				$("#"+header).closest('th').css('width','');
			});
			$('.select2').css('width','-webkit-fill-available');
			$('.select2').css('width','-moz-available');
			$('.select2').css('width','fill-available');
		}, 300);
		// Event listener to the two range filtering inputs to redraw on input
		$('.dateRangeInput').change(function () {
			table.draw();
		});
		$('.selectInput').change(function () {
			table.draw();
		});
		$('.rangeFilter').change(function () {
			if($(this).next().children().val() != '') {
				table.draw();
			}
		});
		$('.dateRangeFilter').change(function () {
			if($(this).next().children().val() != '') {
				table.draw();
			}
		});
		//code to make the Stage,Status filters as multiselect filter
		$('#Status_filter').select2();
		$('#Stage_filter').select2();
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
	div.dt-buttons{
	   float:right;
	   position:relative;
	   margin-left: 0.5em;
	} 
	.button{
		padding: 0 15px 0 15px;
	}
	.table{
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
	div#dialog2 {
		display:none;
	}
	div#dialog{
		display:none;
	}
	div#copyrightbuttons{
		display:none;
	}
	div.footer_right{
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
	}
	div.dataTables_processing {
		z-index: 1;
	}
	.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th{
	    max-width: 10em;
		max-height: 2.5em;
		white-space: nowrap;
		overflow: hidden;
	}	
	.table-bordered>tbody>tr>td:not(.history):hover {
		overflow-x:auto; 
		white-space: nowrap; 
		width: auto;
    }
	.date-filter:hover {
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
	.datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-bottom{
		background-color: #0066a4 !important;
	}	
	.datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-right.datepicker-orient-top{
		background-color: #0066a4 !important;
	}	
	.datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-right.datepicker-orient-bottom{
		background-color: #0066a4 !important;
	}
	.datepicker table tr td.day:hover, .datepicker table tr td.focused{
		background: #f7971b !important;
	}
	div::-webkit-scrollbar {
		width: 12px;
		height: 15px;
	}
	div::-webkit-scrollbar-thumb {
		background: #c1c1c1;
	}
	.selectFilter,.select2 {
		width : -webkit-fill-available;
		width : -moz-available;
		width : fill-available;
	}
	.datepicker table tr td, .datepicker table tr th {
		text-align: center;
		width: 23px;
		height: 23px;
		border-radius: 4px;
		border: none;
		font-size:9pt !important;
	}
</style>
<?php
	echo $js = <<<EOT
		<script>
			$(document).ready(function(){
				$("#example_length").change(function(){
					var example = $("#example_length").children().children().val();
					$.cookie("channelsalesreport", example);
					
					$("#Search").trigger('click');
				});
			});
		</script>    
EOT;
	$page= $_COOKIE['channelsalesreport'];
	setcookie("channelsalesreport", "", time() - 3600);
	global $current_user;
	$user_preferences = new UserPreference($current_user);  
	$preferences = $user_preferences->getPreference('channelsalesreport','ChannelsalesReport'); //get setting by name
	if(!$preferences || $page) {
		if(!$page){
			$page = 10;
		}
		$user_preferences->setPreference('channelsalesreport',$page,'ChannelsalesReport'); //set some settings to SESSION 
		$user_preferences->savePreferencesToDB(); //set some settings from SESSION to DB  
		$preferences = $user_preferences->getPreference('channelsalesreport','ChannelsalesReport'); //get setting by name
	}
	echo $js = <<<EOT
		<script>
			$(document).ready(function(){
				$("#example").DataTable().page.len($preferences).draw();
			});
		</script>
EOT;
?>
	<h2 style="text-align:center;font-size: 20px;"><b>Channel Sales Report- All Items</b></h2>
	<table id="example" class="display compact table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Profile Name</th>
				<th>H1B Stage</th>
				<th>Phase</th>
				<th>Status</th>
				<th>Stage</th>
				<th>W2CTC</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Project Start Date</th>
				<th>Project End Date</th>
				<th>Marketer-1</th>
				<th>Marketer-2</th>
				<th>Technology</th>
				<th>Channel Client</th>
				<th>End Client</th>
				<th>Role</th>
				<th>Interviews</th>
				<th>Sales</th>
				<th>Hirer-1</th>
				<th>SLead</th>
				<th>M-Start</th>
				<th>M-End</th>
				<th>Mobile Phone</th>
				<th>Email Home1</th>
				<th>Relocation</th>
				<th>Sell Rate/hr</th>
				<th>Work City</th>
				<th>Department</th>
				<th>ACL</th>
				<th>Recruiter</th>
				<th>RL</th>
				<th>Hirer-2</th>
				<th>ML-1</th>
				<th>ML-2</th>
				<th>Client Industry</th>
				<th>Referred By</th>
				<th>Business Phone</th>
				<th>DOB</th>
				<th>Bill Rate/hr</th>
				<th>Total/Hr</th>
				<th>Payrate</th>
				<th>Auto/hr</th>
				<th>BD/hr</th>
				<th>Children's Names</th>
				<th>Consulate</th>
				<th>Country</th>
				<th>Email Vedic</th>
				<th>Extension</th>
				<th>Home Address</th>
				<th>Home City</th>
				<th>Home Phone</th>
				<th>State-Home</th>
				<th>Insurance</th>
				<th>Interview Date</th>
				<th>Interviwed By</th>
				<th>Notes - Auto</th>
				<th>Notes-Bench</th>
				<th>Notes-Employee</th>
				<th>Notes-Payroll</th>
				<th>Notes-Sales</th>
				<th>Offer</th>
				<th>OT/hr</th>
				<th>Pay/Year</th>
				<th>State-Payroll</th>
				<th>Percentage</th>
				<th>PO Status</th>
				<th>PO End Date</th>
				<th>Priority Date</th>
				<th>Revision Date</th>
				<th>Service Center</th>
				<th>Spouse</th>
				<th>SSN</th>
				<th>Vedic Job Title</th>
				<th>Wedding Date</th>
				<th>ZIP Code</th>
				<th>Willing to Train</th>
				<th>Profile History</th>
				<th>Create Profile</th>
				<th>Stage Flag</th>
			</tr>
			<tr class="head">
				<th class="input-filter">Profile Name</th>
				<th class="input-filter">H1B Stage</th>
				<th class="input-filter">Phase</th>
				<th class="select-filter">Status</th>
				<th class="select-filter">Stage</th>
				<th class="input-filter">W2CTC</th>
				<th class="input-filter">First Name</th>
				<th class="input-filter">Last Name</th>
				<th class="date-filter">Project Start Date</th>
				<th class="date-filter">Project End Date</th>
				<th class="input-filter">Marketer-1</th>
				<th class="input-filter">Marketer-2</th>
				<th class="input-filter">Technology</th>
				<th class="input-filter">Channel Client</th>
				<th class="input-filter">End Client</th>
				<th class="input-filter">Role</th>
				<th class="input-filter">Interviews</th>
				<th class="input-filter">Sales</th>
				<th class="input-filter">Hirer-1</th>
				<th class="input-filter">SLead</th>
				<th class="input-filter">M-Start</th>
				<th class="input-filter">M-End</th>
				<th class="input-filter">Mobile Phone</th>
				<th class="input-filter">Email Home1</th>
				<th class="input-filter">Relocation</th>
				<th class="input-filter">Sell Rate/hr</th>
				<th class="input-filter">Work City</th>
				<th class="input-filter">Department</th>
				<th class="input-filter">ACL</th>
				<th class="input-filter">Recruiter</th>
				<th class="input-filter">RL</th>
				<th class="input-filter">Hirer-2</th>
				<th class="input-filter">ML-1</th>
				<th class="input-filter">ML-2</th>
				<th class="input-filter">Client Industry</th>
				<th class="input-filter">Referred By</th>
				<th class="input-filter">Business Phone</th>
				<th class="input-filter">DOB</th>
				<th class="input-filter">Bill Rate/hr</th>
				<th class="input-filter">Total/Hr</th>
				<th class="input-filter">Payrate</th>
				<th class="input-filter">Auto/hr</th>
				<th class="input-filter">BD/hr</th>
				<th class="input-filter">Children's Names</th>
				<th class="input-filter">Consulate</th>
				<th class="input-filter">Country</th>
				<th class="input-filter">Email Vedic</th>
				<th class="input-filter">Extension</th>
				<th class="input-filter">Home Address</th>
				<th class="input-filter">Home City</th>
				<th class="input-filter">Home Phone</th>
				<th class="input-filter">State-Home</th>
				<th class="input-filter">Insurance</th>
				<th class="input-filter">Interview Date</th>
				<th class="input-filter">Interviwed By</th>
				<th class="input-filter">Notes - Auto</th>
				<th class="input-filter">Notes-Bench</th>
				<th class="input-filter">Notes-Employee</th>
				<th class="input-filter">Notes-Payroll</th>
				<th class="input-filter">Notes-Sales</th>
				<th class="input-filter">Offer</th>
				<th class="input-filter">OT/hr</th>
				<th class="input-filter">Pay/Year</th>
				<th class="input-filter">State-Payroll</th>
				<th class="input-filter">Percentage</th>
				<th class="input-filter">PO Status</th>
				<th class="input-filter">PO End Date</th>
				<th class="input-filter">Priority Date</th>
				<th class="input-filter">Revision Date</th>
				<th class="input-filter">Service Center</th>
				<th class="input-filter">Spouse</th>
				<th class="input-filter">SSN</th>
				<th class="input-filter">Vedic Job Title</th>
				<th class="input-filter">Wedding Date</th>
				<th class="input-filter">ZIP Code</th>
				<th class="input-filter">Willing to Train</th>
				<td></td>
				<td></td>
			</tr>
		</thead>
	</table>
</html>