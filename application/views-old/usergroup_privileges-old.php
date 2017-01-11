<?php
include('header_main.php');
include('sidebar.php');
?>
<div id="main" role="main">
	<!-- RIBBON -->
	<div id="ribbon">
		<span class="ribbon-button-alignment"> 
			<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
				<i class="fa fa-refresh"></i>
			</span> 
		</span>
		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<li>Home></li><li>User Administration</li><li>User Group & Privileges</li>
		</ol>
	</div>
	<!-- END RIBBON -->
	<!-- MAIN CONTENT -->
	<div id="content" >
		<div class="row">	
			<h2 class="row-seperator-header"><i class="fa fa-th-list"></i> User Group & Privileges </h2>	
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-6">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">	
					data-widget-colorbutton="false"
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true"
					data-widget-sortable="false"	
					-->
					<header>
						<span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
						<h2>User Group Listing </h2>	
					</header>	
					<!-- widget div-->
					<div>	
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->	
						</div>
						<!-- end widget edit box -->	
						<!-- widget content -->
						<div class="widget-body no-padding">	
							<div class="panel-group smart-accordion-default" id="accordion-2">
								<?php $user_group = $this->user_group_model->user_group_list();
								$u =1;
								foreach($user_group as $ug){
								?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<div style="float:right;">
										<a href="<?php echo site_url('usergroup_privileges/edit_usergroup_privileges/'.$ug->id);?>" title="Edit User" alt = "Edit User">
										<i class="fa fa-fw fa-edit text-muted hidden-md hidden-sm hidden-xs"></i></a></div>
										<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseTwo-<?php echo $u;?>" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i><?php echo $ug->user_group;?> </a>
										</h4>
										
									</div>
									<div id="collapseTwo-<?php echo $u;?>" class="panel-collapse collapse">
										<div class="panel-body">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
										</div>
									</div>
								</div>
								<?php
								$u++;
								}
								?>
							</div>	
						</div>
						<!-- end widget content -->	
					</div>
					<!-- end widget div -->	
				</div>
				<!-- end widget -->
			</article>
			<!-- WIDGET END -->
	
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-6">	
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
				<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
					
					data-widget-colorbutton="false"	
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true" 
					data-widget-sortable="false"
					
				-->
				<?php echo $this->uri->segment(2);?>
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>New User group Form</h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">						
						<form id="add_usergroup" name="add_usergroup" class="smart-form" action="usergroup_privileges/add_usergroup" method="post">
							<header>User group Form</header>
							<fieldset>
								<section>
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="user_group" id="user_group" placeholder="User Group Name">
										<b class="tooltip tooltip-bottom-right">Please enter user group name</b>
									</label>
								</section>									
 							    <section>
								<label class="label">Status</label>
								<div class="row">
									<div class="col col-4">
										<label class="radio state-success" ><input type="radio" name="user_group_status" value="1" checked><i></i>Enable</label>
									</div>
									<div class="col col-4">
										<label class="radio state-success"><input type="radio" name="user_group_status" value="0"><i></i>Disable</label>
									</div>
								</div>
								</section>								
							</fieldset>
							<footer>
								<button type="submit" class="btn btn-primary">Add User Group</button>
							</footer>
						</form>						
					</div>
					<!-- end widget content -->					
				</div>
				<!-- end widget div -->				
				</div>
				<!-- end widget -->	
			</article>
			<!-- WIDGET END -->
	
</div></div></div>
<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
	$(document).ready(function() {
		pageSetUp();
		var $registerForm = $("#add_usergroup").validate({
	
		// Rules for form validation
		rules : {
			user_group : {
				required : true
			}
		},

		// Messages for form validation
		messages : {
			user_group : {
				required : 'Please enter your user group'
			}
		},

		// Do not change code below
		errorPlacement : function(error, element) {
			error.insertAfter(element.parent());
		}
	});
});
</script>
<?php include('footer_main.php');?>		