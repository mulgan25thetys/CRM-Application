<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* This Application Must Be Used With BootStrap 4 *  */
$config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
$config['full_tag_close'] 	= '</ul></nav></div>';
$config['num_tag_open'] 	= '<li class="page-item">';
$config['num_tag_close'] 	= '</li>';
$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
$config['next_tag_open'] 	= '<li class="page-item">';
$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></li>';
$config['prev_tag_open'] 	= '<li class="page-item">';
$config['prev_tagl_close'] 	= '</li>';
$config['first_tag_open'] 	= '<li class="page-item">';
$config['first_tagl_close'] = '</li>';
$config['last_tag_open'] 	= '<li class="page-item">';
$config['last_tagl_close'] 	= '</li>';

$config['attributes'] = array('class' => 'page-link');

// end of file Pagination.php 
// Location config/pagination.php 
// <ul class="pagination pull-right no-margin">
// 	<li class="prev disabled">
// 		<a href="#">
// 			<i class="ace-icon fa fa-angle-double-left"></i>
// 		</a>
// 	</li>

// 	<li class="active">
// 		<a href="#">1</a>
// 	</li>

// 	<li>
// 		<a href="#">2</a>
// 	</li>

// 	<li>
// 		<a href="#">3</a>
// 	</li>

// 	<li class="next">
// 		<a href="#">
// 			<i class="ace-icon fa fa-angle-double-right"></i>
// 		</a>
// 	</li>
// </ul>