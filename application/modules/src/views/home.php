<?php if ($this->session->flashdata('you_logged') != null) {?>
	<div class="alert alert-success">
	<button class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<i class="ace-icon fa fa-hand-o-right"></i><?php
	    echo $this->session->flashdata('you_logged');
	?>
</div>
<?php }?>