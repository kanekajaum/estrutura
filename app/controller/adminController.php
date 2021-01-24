<?php 

	class adminController{

		public function index(){

			$loader = new \Twig\Loader\FilesystemLoader('app/view');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('admin.html');

			$objPostagens = postagem::selectAll();

			$parametros = array();
			$parametros['postagens'] = $objPostagens;


			$conteudo = $template->render($parametros);
			echo $conteudo;
			
		}

		public function create(){
			$loader = new \Twig\Loader\FilesystemLoader('app/view');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('create.html');


			$parametros = array();
			

			$conteudo = $template->render($parametros);
			echo $conteudo;
		}

		public function insert(){
			try {
				postagem::insert($_POST);
				
				echo '<script type="text/javascript">alert("Publicação inserda com sucesso!!!");</script>';
				echo '<script>location.href="http://localhost/desenvolvimento/estrutura/?pagina=admin&metodo=index";</script>';
			} catch (Exception $e) {
				echo '<script type="text/javascript">alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="http://localhost/desenvolvimento/estrutura/?pagina=admin&metodo=create";</script>';
			}
		}

		public function delete($idDelete){

			// postagem::delete($_POST);

			var_dump($_GET);
		}
	}
