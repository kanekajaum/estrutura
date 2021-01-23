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
	}