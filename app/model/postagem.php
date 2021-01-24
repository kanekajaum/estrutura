<?php 
	class postagem
	{
		public static function selectAll(){

			$con = Connection::getConn();

			$sql = "SELECT * FROM postagem ORDER BY id DESC";
			$sql = $con->prepare($sql);
			$sql->execute();

			$resultado = array();

			while($rows = $sql->fetchObject('postagem')){
				$resultado[] = $rows;
			}
			
			if (!$resultado) {
				throw new Exception("Nenhum registro encontrado!!!");
				
			}

			return $resultado;
		}

		public static function selecionarporId($idPost){

			$con = Connection::getConn();

			$sql = "SELECT * FROM postagem WHERE id = :id";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
			$sql->execute();

			$resultado = $sql->fetchObject('postagem');




			if(!$resultado){
				throw new Exception("Nenhum registro encontrado!!!");
			}else{

				$resultado->comentarios = comentario::selecionarComentarios($resultado->id);
			}

			return $resultado;
		}

		public static function insert($dadosPost){
			if (empty($dadosPost['titulo'] OR $dadosPost['conteudo'])) {
				throw new Exception("Por favor, Preencha todos os dados!!!");
				
				return false;	
			}

			$con = Connection::getConn();

			$sql = $con->prepare('INSERT INTO postagem (titulo, conteudo) VALUES (:tit, :cont)');
			$sql->bindValue(':tit', $dadosPost['titulo']);
			$sql->bindValue(':cont', $dadosPost['conteudo']);
			$res = $sql->execute();



			if ($res == 0) {
				throw new Exception("Falha ao inserir publicação");
				
				
			}

			return sql;
		}

		public static function delete($idDelete){
			$con = Connection::getConn();
			
		}
	}