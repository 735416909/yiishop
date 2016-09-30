<?php 

	$key = 'myapp' ;

	$method = $_REQUEST ['METHOD_NAME'] ; 

	if ( 'POST' !== strtoupper($method)) {
		exit('NO ACCESS DENY ');
	}


	$post = json_decode ( $_POST ) ;

	if(empty($post ['config'])) {
		exit('NO ACCESS DENY ');
	}

	$git_key = $post ['config'] ['secret'] ; 

	if($git_key != $key){
		exit('NO ACCESS DENY ');
	}

	if(function_exists('exec')){
		exec('cd /home/wwwroot/a.zhangmj.com/yiishop/ && git pull') ;  
	}