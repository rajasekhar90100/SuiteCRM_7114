<?php
/**  
  * FileName => Jobstatusreport.php
  * Created By => Rajasekhar (Created On July-14-2018)
  * Modified By => Udaykiran (Modified On July-14-2018)	
  * COMMENT => Job Status report with filters
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

<script type="text/javascript">
	var editor;
	$(document).ready(function(){
		$('#example').DataTable( {
			retrieve: true,
			orderCellsTop: top, 
			dom: "Blfrtip",	
			keys: true,
			processing: true,
				"language": {
				"decimal": ",",
				"thousands": "."
			},
       		ajax: "index.php?entryPoint=jobstatusreport",
			order: [[ 0, 'asc' ]],
			initComplete: function () {
				this.api().columns(2).every( function () {
					var column = this;
					var select = $('<select style="margin: 5px;height: 32px;"><option value="" selected >-Select Manager- </option></option></select>')
						.appendTo( '#manager' )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
							
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
				this.api().columns(3).every( function () {
					var column = this;
					var select = $('<select style="margin: 5px;height: 32px;"><option value="" selected>-Select Recruiter- </option></option></select>')
						.appendTo( '#recruiter' )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
							
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			},
			columns: [
				{ 
					data: "Name",
					render: function(data, type, row, meta){
						if(type === 'display'){
							data = '<a target="_blank" href="index.php?module=vedic_job&action=DetailView&record=' + row.JOBID + '">' + data + '</a>';
						}
						return data;
					},
					className: "nonedit"
				} ,
				{ data: "JobStatus",className: "editable"},
				{ data: "ManagerName",className: "editable"},
				{ data: "RecruiterName",className: "editable"}
			],
			keys: {
				editor: editor,
			},
			select: {
				style:    'os',
				selector: 'td.select-checkbox'
			},
			// select: true,
			buttons: [
				{
					extend: 'collection',
					text: '<i class="fa fa-download" aria-hidden="true"></i>  Export',
					buttons: [
						{	
							extend: 'csvHtml5',
							text : '<i class="fa fa-files-o"></i>  CSV',
							filename:'Job Status Report',
						},
						{
							extend: 'pdfHtml5',
							text : '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>	 PDF',
							orientation: 'landscape',
							pageSize: 'A4',
							filename:'Job Status Report',
							title:'Job Status Report'
						},
						{
							extend: 'excelHtml5',
							text : '<i class="fa fa-file-excel-o" aria-hidden="true"></i>  Excel',
							filename:'Job Status Report',
							title:'Job Status Report',
							sheetName:'Job Status Report'
						}							
					],				
				},
			]			
		});	
		// Setup - add a text input to each header next cell
		$('.head th').each( function () {
			var title = $(this).text();
			var className = $(this)[0].className;
			if(title.includes(" ")){
				title = title.replace(/\ /g, '-');
			}
			if(title.includes("/")){
				title = title.replace(/\//g, '-');
			}
			if(className.includes('input-filter')){
				$(this).html( '<input type="text"  class="search" id="'+title+'" style=" width: 100%; padding: 3px;box-sizing: content-box;" placeholder="Search '+title+'" />' );
			}
			else if(className.includes('select-filter')){
				if(title == 'Job-Status'){
				var opt = '<option label="Open" value="Open">Open</option><option label="Closed" value="Closed">Closed</option><option label="OnHold" value="OnHold">OnHold</option>';
				}
				$(this).html('<select id="'+title+'" style="margin: 5px; height: 32px;"><option value="" selected>-Select '+title+'- </option>'+opt+'</select>');
			}
		});
 
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
		// Apply the search
		$.each($('.select-filter', table.table().header()), function () {
			var column = table.column($(this).index());

			$( 'select', this).on( 'change', function () {
				if ( column.search() !== this.value ) {
					column
						.search( this.value )
						.draw();

				} else if ( column.search() !== "" ) {
					column
						.draw();
				}
			} );
		} ); 
		$('.dt-buttons').append('<a class="dt-button" tabindex="0" id ="clear" aria-controls="example" href="#">Clear Search</a>');
		$('#clear').on( 'click',function () {
			$('input[type=search]').val('');
			$('.search').val('');
			$('select option[value=""]').prop('selected',true);
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
	input[type="dList"]{
		font-weight: normal;
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
		// padding-left: em;
	}
	.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th{
	    max-width: 15em;
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
	div::-webkit-scrollbar {
		width: 12px;
		height: 15px;
	}	
	div::-webkit-scrollbar-thumb {
		background: #c1c1c1;
	}
	th>select{
		width: -webkit-fill-available;
		width: -moz-available;
	}
</style>
<?php
		/** 
		  * Function Name => Onchange
		  * Created By=> Rajasekhar(Created On Jun-15-2018)
		  * Modified By => Rajasekhar(Modified on Jun-15-2018)
		  * COMMENT => Onchange of Show entries should be set as per user preference
		  */
		echo $js = <<<EOT
			<script>
				$(document).ready(function(){
					$("#example_length").change(function(){
						var example = $("#example_length").children().children().val();
						$.cookie("JobStatusReport", example);
						location.reload(true);
					});
				});
			</script>    
EOT;
		$page= $_COOKIE['JobStatusReport'];
		setcookie("JobStatusReport", "", time() - 3600);
		global $current_user;
		$user_preferences = new UserPreference($current_user);  
		$preferences = $user_preferences->getPreference('JobStatusReport','jsReport'); //get setting by name
		if(!$preferences || $page) {
			if(!$page){
				$page = 10;
			}
			$user_preferences->setPreference('JobStatusReport',$page,'jsReport'); //set some settings to SESSION 
			$user_preferences->savePreferencesToDB(); //set some settings from SESSION to DB  
			$preferences = $user_preferences->getPreference('JobStatusReport','jsReport'); //get setting by name
		}
		echo $js = <<<EOT
			<script>
				$(document).ready(function(){
					$("#example").DataTable().page.len($preferences).draw();
				});
			</script>
EOT;
?>
	<h2 style="text-align:center;font-size: 20px;"><b>Job Status Report</b></h2>
	<table id="example" class="display compact table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%">
		<thead>
			<tr class="main">
				<th>Job Name</th>
				<th>Job Status</th>
				<th>Manager</th>
				<th>Recruiter</th>
			</tr>
			<tr class="head">
				<th class="input-filter">Job Name</th>				
				<th class="select-filter">Job Status</th>	
				<th id ="manager"></th>
				<th id="recruiter"></th>
			</tr>			
		</thead>
	</table>
</html>