<aside id="left-panel">
<!-- User info -->
		<div class="login-info">
			<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
				<?php 
				//$userid = $this->session->userdata('biller_id');
				//$userdt = $this->biller_model->biller_detail($userid);
				?>
				<a href="javascript:void(0);" >
					<img src="<?php echo site_url('../uploads/user_img/'.$userdt[0]->user_img);?>" alt="me" class="online" /> 
					<span><?php echo $userdt[0]->name;?></span>
				</a> 
			</span>
		</div>
		<!-- end user info -->
		<!-- NAVIGATION : This navigation is also responsive-->
		<nav>
			<ul>
				<li class="<?php if($menu == 'dashboard'){echo 'active';}else{echo '';}?>">
					<a href="<?php echo site_url('dashboard');?>" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
				</li>
				<li class="<?php if($menu == 'tickets'){echo 'active';}else{echo '';}?>">
					<a href="#"><i class="fa fa-lg fa-fw fa-comment-o"><!--<em class="bg-color-pink flash animated">!</em>--></i> <span class="menu-item-parent">Support Center</span></a>
					<ul>	
                        <li class="<?php if($sub_menu == 'new_tickets'){echo 'active';}else{echo '';}?>">
                            <a href="<?php echo site_url('tickets/new_tickets');?>">New Tickets</a>
                        </li>
                        <li class="<?php if($sub_menu == 'tickets'){echo 'active';}else{echo '';}?>">
                            <a href="<?php echo site_url('tickets');?>">My Tickets</a>
                        </li>
                        <li class="<?php if($sub_menu == 'closed_tickets'){echo 'active';}else{echo '';}?>">
                            <a href="<?php echo site_url('tickets/closed_tickets');?>">Closed Tickets</a>
                        </li>
					</ul>	
				</li>
				<li class="<?php if($menu == 'reports'){echo 'active';}else{echo '';}?>">
					<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Reports & Analytics</span></a>
					<ul>
						<li class="<?php if($menu == 'reports' && $sub_menu == 'index'){echo 'active';}else{echo '';}?>">
							<a href="<?php echo site_url('reports');?>">Generate Biller Reports</a>
						</li>
						<li class="<?php if($sub_menu == 'analysis'){echo 'active';}else{echo '';}?>">
							<a href="<?php echo site_url('reports/analysis');?>">Graphical Analytics</a>
						</li>
					</ul>
				</li>                    
				<li class="<?php if($menu == 'biller_subuser' || $menu == 'registration'){echo 'active';}else{echo '';}?>">
					<a href="#"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">User Administration</span></a>
					<ul>
						<li class="<?php if($menu == 'registration'){echo 'active';}else{echo '';}?>">
							<a href="<?php echo site_url('registration');?>">Create New User</a>
						</li>
						<li class="<?php if($menu == 'biller_subuser'){echo 'active';}else{echo '';}?>">
							<a href="<?php echo site_url('biller');?>">Users Account</a>
						</li>
					</ul>
				</li>                    
				<li class="<?php if($menu == 'profile_management'){echo 'active';}else{echo '';}?>">
					<a href="<?php echo site_url('profile_management');?>"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Profile Management</span></a>
				</li>					
				</ul>
			</nav>
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>
		</aside>
