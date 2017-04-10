<?php 
	$method = $_SERVER['REQUEST_METHOD'];
	if(isset($_GET['c'])) $controller = $_GET['c'];
	if(isset($_GET['a'])) $action = $_GET['a'];

	$controllerStr = $controller.'_controller';
	$controllerPath = './controller/'.$controllerStr.'.php';
	require_once("$controllerPath");
	$c = new $controllerStr;
	if($method == 'GET'){
		$queryString = $_SERVER['QUERY_STRING'];
		if(!empty($queryString)){
			$params = parseToParams($queryString);
			//print_r($params);
			$c->$action($params);
		}else{
			echo '404 not found!';
		}
	}else if($method == 'POST'){
		$data = array();
		if(!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				# code...
				$data[$key] = $value;
			}
			$c->$action($data);
		}
	}
//解析querystring,返回params数组
function parseToParams($qs) {
	$qs_arr = explode('&',$qs);
	$qs_arr = array_slice($qs_arr, 2);
	$params = array();
	for($i=0;$i<count($qs_arr);$i++){
		$tmp_params = explode('=', $qs_arr[$i]);
		$params[$tmp_params[0]] = $tmp_params[1];
	}
	return $params;	
}

