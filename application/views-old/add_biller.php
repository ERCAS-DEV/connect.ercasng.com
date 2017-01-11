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
			<li>Home></li><li>Biller Management</li><li>Create New Biller</li>
		</ol>
	</div>
	<!-- END RIBBON -->
	<div id="content">
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
				<h1 class="page-title txt-color-blueDark">					
					<!-- PAGE HEADER -->
					<i class="fa-fw fa fa-pencil-square-o"></i>Biller Registration
					<span>> Create New Biller</span>
				</h1>
			</div>
		</div>
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
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
				<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
				<h2>Biller Registration form </h2>				
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
					<form id="smart-form-register" class="smart-form" method="post" action ="<?php echo site_url('biller/add_biller');?>">
					<header>Registration form</header>						
						<?php if($this->session->flashdata('error')!=''){
							echo '<section><p style="color:red;">'.$this->session->flashdata('error').'</p></section>';
						}?>
						<input type="hidden" name="creatorId" value="<?php echo $this->session->userdata('biller_id');?>">
						<fieldset>
							<div class="row">
								<section class="col col-6">
								<label class="input"><i class="icon-append fa fa-building"></i>
										<input type="text" name="company_name" placeholder="Company Name"><b class="tooltip tooltip-bottom-right">Please enter your company name</b>
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="text" name="merchantId" placeholder="NIBSS Merchant ID" id="merchantId">
									<b class="tooltip tooltip-bottom-right">Don't forget your NIBSS Merchant ID</b> </label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"><i class="icon-append fa fa-file-text-o"></i>
										<input type="text" name="biller_acronymn" placeholder="Biller Acronymn"><b class="tooltip tooltip-bottom-right">Please enter your biller acronymn</b>
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="username" placeholder="Username">
									<b class="tooltip tooltip-bottom-right">Needed to enter the website</b>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password" placeholder="Password" id="password">
									<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="passwordConfirm" placeholder="Confirm password">
									<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"><i class="icon-append fa fa-user"></i>
										<input type="text" name="firstname" placeholder=" Prime Contact Name"><b class="tooltip tooltip-bottom-right">Please enter your First & Last name</b>
									</label>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
									<input type="email" name="email" placeholder="Prime Contact Email">
									<b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"><i class="icon-append fa fa-mobile"></i>
										<input type="text" name="mobile" placeholder="Prime Contact Phone Number"><b class="tooltip tooltip-bottom-right">Please enter your Prime Contact Phone Number</b>
									</label>
								</section>
								<section class="col col-6">
									<label class="input"><i class="icon-append fa fa-mobile"></i>
										<input type="text" name="alternative_mobile" placeholder="Alternative Phone No."><b class="tooltip tooltip-bottom-right">Please enter your alternative phone number</b>
									</label>
								</section>
							</div>					
							
							<div class="row">
								<section class="col col-6">
									<label class="input"><textarea rows="3" cols="72" name="billerAddress" placeholder="  Biller Address" id="billerAddress" class="custom-scroll"></textarea>
									<b class="tooltip tooltip-bottom-right">Don't forget your Biller Address</b> </label>
								</section>
								<section class="col col-6">
									<label class="input">
									<textarea rows="3" cols="72" name="billerDescription" placeholder="  Description" id="billerDescription" class="custom-scroll"></textarea>
									<b class="tooltip tooltip-bottom-right">Don't forget your Description</b> </label>
								</section>								
							</div>
							<div class="row">
								<section class="col col-6" >
									<label class="input">ERCAS Services Listing
									</label>
									<div class="col col-6" style="margin-top: 10px;">
									<label class="checkbox">
									<input type="checkbox" name="service_bank_ebills" value="1" checked>
									<i></i>Bank/Ebills</label>
									<label class="checkbox">
									<input type="checkbox" name="service_cashpoint" value="1" checked>
									<i></i>CashPoint</label>
									<label class="checkbox">
										<input type="checkbox" name="service_centralpay_ecommerce" value="1" checked>
										<i></i>CentralPay/E-Commerce
									</label>
								</div>	
							</section>
							</div>
						</fieldset>
						<footer>
							<button type="submit" class="btn btn-primary">
								Create Biller
							</button>
						</footer>
					</form>		
					
				</div>
				<!-- end widget content -->				
			</div>
			<!-- end widget div -->			
		</div>
		<!-- end widget -->
	</div>
</div>
<style>
.error{color:red;}
</style>
<script src="<?php echo base_url('assets/js/plugin/jquery-form/jquery-form.min.js');?>"></script>
<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
	$(document).ready(function() {
		pageSetUp();
		var $registerForm = $("#smart-form-register").validate({
	
		// Rules for form validation
		rules : {
			username : {
				required : true
			},
			email : {
				required : true,
				email : true
			},
			password : {
				required : true,
				minlength : 3,
				maxlength : 20
			},
			passwordConfirm : {
				required : true,
				minlength : 3,
				maxlength : 20,
				equalTo : '#password'
			},
			firstname : {
				required : true
			},
			mobile : {
				required : true
			},
			biller_acronymn : {
				required : true
			},
			billerAddress : {
				required : true
			},
			merchantId : {
				required : true	
			}
		},

		// Messages for form validation
		messages : {
			username : {
				required : 'Please enter your username'
			},
			email : {
				required : 'Please enter your email address',
				email : 'Please enter a VALID email address'
			},
			password : {
				required : 'Please enter your password'
			},
			passwordConfirm : {
				required : 'Please enter your password one more time',
				equalTo : 'Please enter the same password as above'
			},
			firstname : {
				required : 'Please select your first name'
			},
			mobile : {
				required : 'Please select your mobile no.'
			},
			biller_acronymn : {
				required : 'Please enter your Biller Acronymn.'
			},
			billerAddress : {
				required : 'please enter your Biller Address'
			},
			merchantId : {
				required : 'Please enter your NIBSS Merchant ID'
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