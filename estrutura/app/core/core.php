<?php 

	class Core{
		public function start($urlGet){

			$acao = 'index';
			
			if(isset($urlGet['pagina'])){
				$controller = $urlGet['pagina'].'Controller';
			}else{
				$controller = 'homeController';
			}
			
			
			

			if(!class_exists($controller)){
				$controller = 'erroController';
			}

			call_user_func_array(array(new $controller, $acao), array());

			// echo $controller;
		}
	}
