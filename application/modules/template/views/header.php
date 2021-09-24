<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state  navbar-fixed-top">
	<div class="navbar-container ace-save-state container" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="<?= base_url();?>" class="navbar-brand">
				<small>
					<i class="fa fa-headphones"></i>
					AU<span style="color: black">XI</span>CALL
				</small>
			</a>

			<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
				<span class="sr-only">Toggle user menu</span>

				<img src="<?= base_url()?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
			</button>

			<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>
		</div>
		 

		<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
			<ul class="nav ace-nav">
				<li class="green">
					<a href="#">
						Card Number :
					</a>
				</li>

				<li class="light-blue dropdown-modal user-min">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="<?= base_url()?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
						<span class="user-info">
							<small>Welcome,</small>
							<?php
                               	  echo $this->session->userdata('username');
                            ?>
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

						<li>
							<a href="<?php echo base_url().'auth/account';?>">
								<i class="ace-icon fa fa-user"></i>
								Profile
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="<?php echo base_url().'auth/logout';?>">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
				<li class="green dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<i class="ace-icon fa fa-cog "></i>
					</a>
					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?=base_url()?>settings/billings/invoices">
								<i class="ace-icon fa fa-barcode"></i>
								Billings
							</a>
						</li>
						<li>
							<a href="#">
								<i class="ace-icon fa fa-users"></i>
								Supports
							</a>
						</li>
						<li>
							<a href="#">
								<i class="ace-icon fa fa-bell-o"></i>
								Notifications
							</a>
						</li>
						<li>
							<a href="#">
								<i class="ace-icon fa fa-envelope-o"></i>
								Messages
							</a>
						</li>
						<li>
							<a href="#">
								<i class="ace-icon fa fa-credit-card"></i>
								Credits
							</a>
						</li>
						<li>
							<a href="#">
								<i class="ace-icon fa fa-cogs"></i>
								Services
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>


		<?= $menu;?>

 			<!--  -->
	</div><!-- /.navbar-container -->
</div>