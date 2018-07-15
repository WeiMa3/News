<?php
	require_once 'db.php';
//get path param info
	$param = $_GET['param'];

	header("Access-Control-Allow-Origin: *");//允许所有IP访问API
	header("Content-Type: application/json; charset=UTF-8");//返回数据类型

//./news/add
//./news/delete/id
//./news/update/id
//./news/get/id
//./news/			-->get all
//./read/id         -->read+1

	$paramsplit=explode('/', $param);


	if (!file_exists($paramsplit[0].'.php')){
		echo "Sorry, wrong route.";
		exit;
	}
	
	require_once $paramsplit[0].'.php';//news.php

	$class_obj= new $paramsplit[0]();//在class:$paramsplit[0](news or read）里新建obj: $class_obj

	if(array_key_exists(1, $paramsplit)){
	//array_key_exists($key,$array)
		$func=$paramsplit[1]."News";
	}else{
		$func="defaultNews";
	}

	if(array_key_exists(2, $paramsplit)){
		$class_obj->$func($paramsplit[2]);
	}else{
		$class_obj->$func();
	}
	
	
//运行该obj所在class的function


?>