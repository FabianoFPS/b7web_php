<?php
class Categorias extends Model {

	public function getLista() {
		$array = array();
		$pdo = $this->comexao;

		$sql = $pdo->query("SELECT * FROM categorias");
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

}
?>