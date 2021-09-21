<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('head')?>
	<body class="no-skin">
		<?php $this->load->view('header')?>

		<div class="main-container ace-save-state container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<?php $this->load->view('nav-liste')?>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<?php 
						if ($this->session->flashdata('page_active') != null) {
					?>
							<div class="page-header">
							<h1>
								<?php echo ucfirst($this->session->flashdata('page_active')) ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?=  $parent_page;?>
								</small>
							</h1>
						</div>
					<?php 
				        }
					?><!-- /.page-header -->

						<div class="row">
							<div class="col-sm-1">
							</div>
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php $this->load->view($module.'/'.$view_file);?>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
							<div class="col-sm-1">
							</div>
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php $this->load->view('footer')?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<?php $this->load->view('view_js/default_js')?>
		<?php 
			if (!in_array($view_file, array('home','dashboard','account'))){
			   $this->load->view('view_js/queryCrud_js');
			}else{
				$this->load->view('view_js/queryReq_js');
			}
		?>
	</body>
</html>
