<?php 

	class Core{
		public function start($urlGet){

			if (isset($urlGet['metodo'])) {
				
				$acao = $urlGet['metodo'];
			
			}else{
				
				$acao = 'index';

			}
			
			if(isset($urlGet['pagina'])){
				$controller = $urlGet['pagina'].'Controller';
			}else{
				$controller = 'homeController';
			}
			
			
			

			if(!class_exists($controller)){
				$controller = 'erroController';
			}

			if (isset($urlGet['id']) && $urlGet['id'] != null) {
				$id = $urlGet['id'];
			}else{
				$id = null;
			}
			call_user_func_array(array(new $controller, $acao), array('id' => $id));

			// echo $controller;
		}
	}
