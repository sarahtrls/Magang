<?php
function template($a=''){
    return base_url('assets/template/dashboard'.$a);
}
function templates($b=''){
    return base_url('assets/bootstrap/'.$b);
}
function img($c=''){
    return base_url('assets/images/'.$c);
}
function content_open($title=''){
    return '<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>'.$title.'</h3>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12  ">
			<div class="x_panel">
				<div class="x_title">
					<h2>'.$title.'</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">';
}
function content_close(){
    return '</div>
    </div>
</div>
</div>
</div>';
}
function assets($file=''){
	return base_url ('assets/'.$file);

}
function upload($name='file',$types="images"){
	if($types=='images'){
	  $allowed_types='gif|jpg|png';
	//   $config['max_width']    = 600;
	//   $config['max_height']   = 600;
	  $config['max_size']     = 10024;
	  $config['upload_path']  = './assets/unggah/foto';
	}
	elseif($types=='geojson'){
	  $allowed_types='geojson';
	  $config['upload_path']  = './assets/unggah/geojson';
	}
	else{
		$allowed_types='pdf';
		// $config['max_size']     = 10024;
		$config['upload_path']  = './assets/unggah/pdf';
	}


	$CI =& get_instance();
	$config['allowed_types']        = $allowed_types;
	$config['max_size']             = 128000;
	$CI->load->library('upload', $config);
	if ( ! $CI->upload->do_upload($name))
	{
		$response['info']=false;
		$response['message']= $CI->upload->display_errors();
	}
	else
	{
		$response['info']=true;
		$response['message']= "Sukses di unggah";
		$response['upload_data']= $CI->upload->data();
	}
	return $response;
}
  