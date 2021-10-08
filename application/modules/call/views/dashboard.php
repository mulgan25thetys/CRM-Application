<div class="col-sm-6 infobox-container">
<?php 
if (isset($datapage['table_analytic'])) {
	for ($i=0; $i < count($datapage['table_analytic']); $i++) { 
		?>
		
		<div class="infobox infobox-green">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-tags"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number <?=$datapage['table_analytic'][$i]?>-nbr">0</span>
				<div class="infobox-content infobox-<?=$datapage['table_analytic'][$i]?>">Table name</div>
			</div>

			<div class="stat stat-success increase-<?=$datapage['table_analytic'][$i]?>">0%</div>
		</div>
	<?php
	}
}
?>
	<div class="space-6"></div>

		<div class="infobox infobox-green infobox-small infobox-dark">
			<div class="infobox-progress">
				<div class="easy-pie-chart percentage" data-percent="61" data-size="39">
					<span class="percent">61</span>%
				</div>
			</div>

			<div class="infobox-data">
				<div class="infobox-content">Task</div>
				<div class="infobox-content">Completion</div>
			</div>
		</div>

		<div class="infobox infobox-blue infobox-small infobox-dark">
			<div class="infobox-chart">
				<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
			</div>

			<div class="infobox-data">
				<div class="infobox-content">Earnings</div>
				<div class="infobox-content">$32,000</div>
			</div>
		</div>
</div>

<div class="col-sm-6">
	<div class="widget-box">
		<div class="widget-header widget-header-flat widget-header-small">
			<h5 class="widget-title">
				<i class="ace-icon fa fa-signal"></i>
				Traffic Sources
			</h5>

			<div class="widget-toolbar no-border">
				<div class="inline dropdown-hover">
					<button class="btn btn-minier btn-primary">
						This Week
						<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
					</button>

					<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
						<li class="active">
							<a href="#" class="blue">
								<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
								This Week
							</a>
						</li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
								Last Week
							</a>
						</li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
								This Month
							</a>
						</li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
								Last Month
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div id="piechart-placeholder"></div>

				<div class="hr hr8 hr-double"></div>

				<div class="clearfix">
					<div class="grid3">
						<span class="grey">
							<i class="ace-icon glyphicon glyphicon-headphones"></i>
							Inbound call 
						</span>
						<h4 class="bigger pull-right">1,255</h4>
					</div>

					<div class="grid3">
						<span class="grey">
							<i class="ace-icon glyphicon glyphicon-headphones"></i>
							Outbound Call
						</span>
						<h4 class="bigger pull-right">941</h4>
					</div>

					<div class="grid3">
						<span class="grey">
							<i class="ace-icon glyphicon glyphicon-headphones"></i>
							Both
						</span>
						<h4 class="bigger pull-right">1,050</h4>
					</div>
				</div>
			</div><!-- /.widget-main -->
		</div><!-- /.widget-body -->
	</div><!-- /.widget-box -->
</div><!-- /.col -->
<div class="col-sm-6">
	<div class="widget-box transparent" id="recent-box">
		<div class="widget-header">
			<h4 class="widget-title lighter smaller">
				<i class="ace-icon fa fa-rss green"></i>RECENT
			</h4>

			<div class="widget-toolbar no-border">
				<ul class="nav nav-tabs" id="recent-tab">
					<li class="active">
						<a data-toggle="tab" href="#task-tab">Tasks</a>
					</li>

					<li>
						<a data-toggle="tab" href="#member-tab">Agents</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="widget-body">
			<div class="widget-main padding-4">
				<div class="tab-content padding-8">
					<div id="task-tab" class="tab-pane active">
						<h4 class="smaller lighter green">
							<i class="ace-icon fa fa-list"></i>
							Sortable Lists
						</h4>

						<ul id="tasks" class="item-list">
							<li class="item-orange clearfix">
								<label class="inline">
									<input type="checkbox" class="ace" />
									<span class="lbl"> Answering customer questions</span>
								</label>

								<div class="pull-right easy-pie-chart percentage" data-size="30" data-color="#ECCB71" data-percent="42">
									<span class="percent">42</span>%
								</div>
							</li>

							<li class="item-red clearfix">
								<label class="inline">
									<input type="checkbox" class="ace" />
									<span class="lbl"> Fixing bugs</span>
								</label>

								<div class="pull-right action-buttons">
									<a href="#" class="blue">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<span class="vbar"></span>

									<a href="#" class="red">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>

									<span class="vbar"></span>

									<a href="#" class="green">
										<i class="ace-icon fa fa-flag bigger-130"></i>
									</a>
								</div>
							</li>

							<li class="item-default clearfix">
								<label class="inline">
									<input type="checkbox" class="ace" />
									<span class="lbl"> Adding new features</span>
								</label>

								<div class="pull-right pos-rel dropdown-hover">
									<button class="btn btn-minier bigger btn-primary">
										<i class="ace-icon fa fa-cog icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-caret dropdown-close dropdown-menu-right">
										<li>
											<a href="#" class="tooltip-success" data-rel="tooltip" title="Mark&nbsp;as&nbsp;done">
												<span class="green">
													<i class="ace-icon fa fa-check bigger-110"></i>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-110"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="item-blue clearfix">
								<label class="inline">
									<input type="checkbox" class="ace" />
									<span class="lbl"> Upgrading scripts used in template</span>
								</label>
							</li>
						</ul>
					</div>

					<div id="member-tab" class="tab-pane">
						<div class="clearfix">
							<div class="itemdiv memberdiv">
								<div class="user">
									<img alt="Bob Doe's avatar" src="<?=base_url()?>assets/images/avatars/user.jpg" />
								</div>

								<div class="body">
									<div class="name">
										<a href="#">Bob Doe</a>
									</div>

									<div class="time">
										<i class="ace-icon fa fa-clock-o"></i>
										<span class="green">20 min</span>
									</div>

									<div>
										<span class="label label-warning label-sm">pending</span>

										<div class="inline position-relative">
											<button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
														<span class="green">
															<i class="ace-icon fa fa-check bigger-110"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
														<span class="orange">
															<i class="ace-icon fa fa-times bigger-110"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-110"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="itemdiv memberdiv">
								<div class="user">
									<img alt="Joe Doe's avatar" src="<?=base_url()?>assets/images/avatars/avatar2.png" />
								</div>

								<div class="body">
									<div class="name">
										<a href="#">Joe Doe</a>
									</div>

									<div class="time">
										<i class="ace-icon fa fa-clock-o"></i>
										<span class="green">1 hour</span>
									</div>

									<div>
										<span class="label label-warning label-sm">pending</span>

										<div class="inline position-relative">
											<button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
														<span class="green">
															<i class="ace-icon fa fa-check bigger-110"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
														<span class="orange">
															<i class="ace-icon fa fa-times bigger-110"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-110"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="itemdiv memberdiv">
								<div class="user">
									<img alt="Jim Doe's avatar" src="<?=base_url()?>assets/images/avatars/avatar.png" />
								</div>

								<div class="body">
									<div class="name">
										<a href="#">Jim Doe</a>
									</div>

									<div class="time">
										<i class="ace-icon fa fa-clock-o"></i>
										<span class="green">2 hour</span>
									</div>

									<div>
										<span class="label label-warning label-sm">pending</span>

										<div class="inline position-relative">
											<button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
														<span class="green">
															<i class="ace-icon fa fa-check bigger-110"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
														<span class="orange">
															<i class="ace-icon fa fa-times bigger-110"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-110"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="itemdiv memberdiv">
								<div class="user">
									<img alt="Alex Doe's avatar" src="<?=base_url()?>assets/images/avatars/avatar5.png" />
								</div>

								<div class="body">
									<div class="name">
										<a href="#">Alex Doe</a>
									</div>

									<div class="time">
										<i class="ace-icon fa fa-clock-o"></i>
										<span class="green">3 hour</span>
									</div>

									<div>
										<span class="label label-danger label-sm">blocked</span>
									</div>
								</div>
							</div>
						</div>

						<div class="space-4"></div>

						<div class="center">
							<i class="ace-icon fa fa-users fa-2x green middle"></i>

							&nbsp;
							<a href="<?=base_url() ?>call/agents" class="btn btn-sm btn-white btn-info">
								See all <?php if ($this->session->userdata('role') != 3): ?>
									members
								<?php else: ?>
									agents
								<?php endif ?>  &nbsp;
								<i class="ace-icon fa fa-arrow-right"></i>
							</a>
						</div>

						<div class="hr hr-double hr8"></div>
					</div><!-- /.#member-tab -->

				</div>
			</div><!-- /.widget-main -->
		</div><!-- /.widget-body -->
	</div><!-- /.widget-box -->
</div><!-- /.col -->