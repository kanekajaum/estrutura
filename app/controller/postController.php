<?php 

	class postController{

		public function index($params){

			try {

				$post = postagem::selecionarporId($params);

				


				$loader = new \Twig\Loader\FilesystemLoader('app/view');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('single.html');

				$parametros = array();
				$parametros['titulo'] = $post->titulo;
				$parametros['conteudo'] = $post->conteudo;
				$parametros['comentarios'] = $post->comentarios;



				$conteudo = $template->render($parametros);
				echo $conteudo;


			} catch (Exception $e) {
				$e->getMessage();
			}
			
		}
	}