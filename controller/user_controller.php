<?php 

	class User_controller {
		public function getUser($params) {
			if(!empty($params)) {
				echo 'username huoxinlei '. $params['id'];
			}else{
				echo 'id not found';
			}
		}
		public function addUser($data) {
			echo 'ok';
			echo '<br/>';
			var_dump($data);
		}
	}

 ?>