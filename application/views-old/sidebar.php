<aside id="left-panel">
<!-- User info -->
		<div class="login-info">
			<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
				<a href="javascript:void(0);" >
					<img src="<?php echo base_url('assets/img/avatars/sunny.png');?>" alt="me" class="online" /> 
					<span>
						<?php 
						$userid = $this->session->userdata('biller_id');
						$userdt = $this->biller_model->biller_detail($userid);
						echo $userdt[0]->name;
						?>
					</span>
				</a> 
			</span>
		</div>
		<!-- end user info -->
		<!-- NAVIGATION : This navigation is also responsive-->
		<nav>
			<ul>
				<li class="active">
					<a href="<?php echo site_url('dashboard');?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
				</li>
				<li class="top-menu-invisible">
					<a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Transaction Mgmnt</span></a>
					<ul>
						<li class="">
							<a href="#" title="View and Filter Transactions"> <span class="menu-item-parent">View and Filter Transactions</span></a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-comment-o"><!--<em class="bg-color-pink flash animated">!</em>--></i> <span class="menu-item-parent">Support Center</span></a>
					<ul>							
						<li>
							<a href="#">Support Messaging</a>
							<ul>
								<li>
									<a href="#">New Tickets</a>
								</li>
								<li>
									<a href="#">My Tickets</a>
								</li>
								<li>
									<a href="#">Closed Tickets</a>
								</li>
							</ul>
						</li>
					</ul>	
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Reports & Analytics</span></a>
					<ul>
						<li>
							<a href="#">Generate Biller Reports</a>
						</li>
						<li>
							<a href="#">Graphical Analytics</a>
						</li>
					</ul>
				</li>                    
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">User Administration</span></a>
					<ul>
						<li>
							<a href="<?php echo site_url('registration');?>">Create New User</a>
						</li>
						<li>
							<a href="<?php echo site_url('biller');?>">Users Account</a>
						</li>
					</ul>
				</li>                    
				<li>
					<a href="<?php echo site_url('profile_management');?>"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Profile Management</span></a>
				</li>					
				</ul>
			</nav>
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>
		</aside>
