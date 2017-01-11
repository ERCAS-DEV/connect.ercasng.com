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
			<li>Home</li><li>Support Center</li><li>Support Messaging</li>
		</ol>
	</div>
	<!-- END RIBBON -->
			<!-- widget div-->
	<div id="content">
		<!-- row -->
		<div class="row">
			<!-- col -->
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-pencil-square-o"></i>Support Message
					<span>> New Ticket</span>
				</h1>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
		<!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="well">
					<table class="table table-striped table-forum">
						<thead>
							<tr>
								<th>Title</th>
								<th class="text-center hidden-xs hidden-sm">Accepted By</th>
								<th class="hidden-xs hidden-sm">Created On</th>
								<th class="hidden-xs hidden-sm">Last Replied On</th>
								<th class="hidden-xs hidden-sm">Status</th>
							</tr>
						</thead>
						<tbody>							
							<!-- TR -->
							<?php foreach($tcktlist as $tlist){ ?>
							<tr>
								<td>
									<h4><a href="<?php echo site_url('tickets/ticket_detail/'.$tlist->id);?>"><?php echo ucwords($tlist->issue_title);?></a></h4>
								</td>
								
								<td class="text-center hidden-xs hidden-sm">
									<?php $billerdt = $this->user_model->user_detail($tlist->user_id);
									echo $billerdt[0]->first_name.' '.$billerdt[0]->last_name;
									?>
								</td>
								<td class="hidden-xs hidden-sm"><?php echo $tlist->creation_date;?>
								</td>
								<td class="hidden-xs hidden-sm"><?php echo $tlist->resolving_date;?>
								</td>
								
								<td class="hidden-xs hidden-sm"><?php echo $tlist->status;?>
								</td>
							</tr>
							<?php }?>
							<!-- end TR -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end row -->
		<!-- row -->
		<div class="row">
			<!-- a blank row to get started -->
		</div>
		<!-- end row -->
	</div>
	<!-- end widget div -->			
</div>

<?php include('footer_main.php');?>		