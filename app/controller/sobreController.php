<?php 

	class sobreController{

		public function index(){

			$loader = new \Twig\Loader\FilesystemLoader('app/view');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('sobre.html');

			$parametros = array();

			$conteudo = $template->render($parametros);
			echo $conteudo;
			
		}
	}