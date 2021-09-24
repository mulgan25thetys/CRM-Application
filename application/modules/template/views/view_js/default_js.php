		<script src="<?= base_url()?>assets/js/jquery-2.1.4.min.js"></script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url()?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<!-----Select 2------>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
		<!-- toaastr -->
   
	    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

		<!-- ace scripts -->
		<script src="<?= base_url()?>assets/js/ace-elements.min.js"></script>
		<script src="<?= base_url()?>assets/js/ace.min.js"></script>
		
		<script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
		<script src="<?= base_url()?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url()?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?= base_url()?>assets/js/dataTables.buttons.min.js"></script>
		<script src="<?= base_url()?>assets/js/buttons.flash.min.js"></script>
		<script src="<?= base_url()?>assets/js/buttons.html5.min.js"></script>
		<script src="<?= base_url()?>assets/js/buttons.print.min.js"></script>
		<script src="<?= base_url()?>assets/js/buttons.colVis.min.js"></script>
		<script src="<?= base_url()?>assets/js/dataTables.select.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="<?= base_url()?>assets/js/jquery-ui.min.js"></script>
		<script src="<?= base_url()?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?= base_url()?>assets/js/moment.min.js"></script>
		<script src="<?= base_url()?>assets/js/daterangepicker.min.js"></script>
		<script src="<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?= base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
		
	    <!-- sweetalert -->
	    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(document).ready(function(){

		        //permet de relancer la session apres expiration de celle ci
		        setInterval(function () {
		            location.href = '<?=base_url() ?>auth/logout';
		        }, 7200000);
		    });

			$(".multiple-select").select2();

			/***************/
			$(document).on('click','.show-details-btn', function(e) {
				e.preventDefault();
				$(this).closest('tr').next().toggleClass('open');
				$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
			});
			/***************/

			if(!ace.vars['old_ie']) $('.date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});

		</script>


		<script type="text/javascript">

			jQuery(function($) {
			 var $sidebar = $('.sidebar').eq(0);
			 if( !$sidebar.hasClass('h-sidebar') ) return;
			
			 $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
				if( event_name !== 'sidebar_fixed' ) return;
			
				var sidebar = $sidebar.get(0);
				var $window = $(window);
			
				//return if sidebar is not fixed or in mobile view mode
				var sidebar_vars = $sidebar.ace_sidebar('vars');
				if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
					$sidebar.removeClass('lower-highlight');
					//restore original, default marginTop
					sidebar.style.marginTop = '';
			
					$window.off('scroll.ace.top_menu')
					return;
				}
			
			
				 var done = false;
				 $window.on('scroll.ace.top_menu', function(e) {
			
					var scroll = $window.scrollTop();
					scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
					if (scroll > 17) scroll = 17;
			
			
					if (scroll > 16) {			
						if(!done) {
							$sidebar.addClass('lower-highlight');
							done = true;
						}
					}
					else {
						if(done) {
							$sidebar.removeClass('lower-highlight');
							done = false;
						}
					}
			
					sidebar.style['marginTop'] = (17-scroll)+'px';
				 }).triggerHandler('scroll.ace.top_menu');
			
			 }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			
			 $(window).on('resize.ace.top_menu', function() {
				$(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			 });
			
			
			});
		</script>

		<script type="text/javascript">
			jQuery(function($) {

				
				// var defaultColvisAction = myTable.button(0).action();
				// myTable.button(0).action(function (e, dt, button, config) {
					
				// 	defaultColvisAction(e, dt, button, config);
					
					
				// 	if($('.dt-button-collection > .dropdown-menu').length == 0) {
				// 		$('.dt-button-collection')
				// 		.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
				// 		.find('a').attr('href', '#').wrap("<li />")
				// 	}
				// 	$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				// });
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
			})
		</script>

		<script type="text/javascript">
			jQuery(function($) {
			 var $sidebar = $('.sidebar').eq(0);
			 if( !$sidebar.hasClass('h-sidebar') ) return;
			
			 $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
				if( event_name !== 'sidebar_fixed' ) return;
			
				var sidebar = $sidebar.get(0);
				var $window = $(window);
			
				//return if sidebar is not fixed or in mobile view mode
				var sidebar_vars = $sidebar.ace_sidebar('vars');
				if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
					$sidebar.removeClass('lower-highlight');
					//restore original, default marginTop
					sidebar.style.marginTop = '';
			
					$window.off('scroll.ace.top_menu')
					return;
				}
			
			
				 var done = false;
				 $window.on('scroll.ace.top_menu', function(e) {
			
					var scroll = $window.scrollTop();
					scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
					if (scroll > 17) scroll = 17;
			
			
					if (scroll > 16) {			
						if(!done) {
							$sidebar.addClass('lower-highlight');
							done = true;
						}
					}
					else {
						if(done) {
							$sidebar.removeClass('lower-highlight');
							done = false;
						}
					}
			
					sidebar.style['marginTop'] = (17-scroll)+'px';
				 }).triggerHandler('scroll.ace.top_menu');
			
			 }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			
			 $(window).on('resize.ace.top_menu', function() {
				$(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			 });
			
			
			});
		</script>
