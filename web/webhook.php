<?php 

	$key = 'myapp' ;

	$method = $_REQUEST ['METHOD_NAME'] ; 

	if ( 'POST' !== strtoupper($method)) {
		exit('NO ACCESS DENY 1');
	}


	$post = json_decode ( $_POST ) ;

	if(empty($post ['config'])) {
		exit('NO ACCESS DENY 2');
	}

	$git_key = $post ['config'] ['secret'] ; 

	file_put_contents('./1.txt', json_encode($post));

	if($git_key != $key){
		exit('NO ACCESS DENY 3');
	}

	if(function_exists('exec')){
		exec('cd /home/wwwroot/a.zhangmj.com/yiishop/ && git pull') ;  
	}