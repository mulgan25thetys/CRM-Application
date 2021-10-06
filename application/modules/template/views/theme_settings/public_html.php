<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('head')?>
	<body class="no-skin" >
		<div id="swup">
		<?php $this->load->view('header')?>

		<div class="main-container ace-save-state container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				
				<div class="nav-wrap-up pos-rel">
					<div class="nav-wrap">
						<div style="position: relative; top: 0px; transition-property: top; transition-duration: 0.15s;">
							<?php $this->load->view('nav-liste'); ?>
						</div>
					</div>
				</div>
				
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-barcode"></i>
								<a href="#"><?=  ucfirst($parent_page);?></a>
							</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
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
							<div class="col-xs-12 transition-fade" id="n">
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

		<?php $this->load->view('view_js/default_js')?>

		<?php $this->load->view('view_js/queryReq_js');?>
		</div>

		<script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script> 
	</body>
</html>
