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
				<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-puzzle-piece"></i> Tickets <span>>
					Ticket Detail</span></h1>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
		<!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="well">
					<table class="table table-striped table-forum">
						<tbody>							
							<!-- Post -->
							<tr>
								<td class="">Created By - </td>
								<td><strong><?php echo $tcktdt[0]->first_name.' '.$tcktdt[0]->last_name;?></strong> on <em><?php echo $tcktdt[0]->creation_date;?></em></td>
							</tr>
							<tr>
								<td colspan="2">
								<p><strong><?php echo $tcktdt[0]->issue_title;?></strong>
								</p>
								<p><?php echo $tcktdt[0]->issue_detail;?></p>
								</td>
							</tr>
							<?php
							if($tktrply!=''){
							foreach($tktrply as $reply){
							?>
							<tr>
								<td colspan="2">								
								<p><?php echo $reply->issue_details;?><br/>
								--- by
								<?php if($reply->replied_by =='1'){
									$udt = $this->user_model->user_detail($tcktdt[0]->user_id);
									echo $udt[0]->first_name.' '.$udt[0]->last_name;
								}else{
									$udt = $this->biller_model->biller_detail($tcktdt[0]->biller_id);
									echo $udt[0]->name;
								}
								?>
								on <?php echo $reply->date_added;?>
								</p>								
								</td>
							</tr>
							<?php
							}
							}
							?>
							<!-- end Post -->
							<form name="ticket_reply" method="post" action="<?php echo site_url("tickets/reply");?>">
							<tr>
								<td colspan="2" >
								<input type="hidden" name="tktid" value="<?php echo $tcktdt[0]->id;?>">
								<input type="hidden" name="userid" value="<?php echo $this->session->userdata('user_id');?>">
								<textarea cols="150" rows="5" class="custom-scroll" name="tckt_dt"></textarea></td>
							</tr>							
							<tr>
								<td colspan="2" align="middle">
								<input type="submit" name="tkt_reply" value="Reply">
								<input type="submit" name="tkt_close" value="Close">
								</td>
							</tr>
							</form>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end row -->		
	</div>
	<!-- end widget div -->			
</div>

<?php include('footer_main.php');?>		