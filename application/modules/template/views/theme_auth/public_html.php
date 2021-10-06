<?php $this->load->view('head')?> 

	<body class="login-layout">
		<div id="swupd">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">CRM</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Auxicall</h4>
							</div>

							<div class="space-6"></div>

							    <?= $this->load->view('auth_view')?>
							    
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
		</div>
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?= base_url()?>assets/js/jquery-2.1.4.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script> 
		<script type="text/javascript">
			//const swup = new Swup(); // only this line when included with script tag*
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");

			// $("input").intlTelInput({
			//   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
			// });
		</script>

		
	</body>
</html>
