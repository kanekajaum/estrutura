<?php 

	class homeController{

		public function index(){
			// echo "Home";
			try {

				$colecPoststagens = postagem::selectAll();

				$loader = new \Twig\Loader\FilesystemLoader('app/view');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('home.html');

				$parametros = array();
				$parametros['postagens'] = $colecPoststagens;


				$conteudo = $template->render($parametros);
				echo $conteudo;


			} catch (Exception $e) {
				$e->getMessage();
			}
			
		}
	}