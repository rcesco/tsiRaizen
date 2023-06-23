<?php

class model extends db
{
   private static $query;

   private static function prepExec($prep, $params)
   {
      try {
         model::$query = model::getConn()->prepare($prep);

         $query = model::$query->execute($params);

         if (!model::$query) {
				echo model::$query->queryString;
            throw new PDOException;
            return false;
         } else {
            //print_r($this->$query);
            return true;
         }
      } catch (PDOException $e) {
          http_response_code(400);
         if($e->getCode() == 23000){
         	echo model::$query->queryString;
         	print_r($params);
            echo "Há Algo Associado a esta informação impedindo a execução da ação solicitada!: ".$e->getMessage();

         }else{
            echo $e->getMessage();
				echo model::$query->queryString;
            print_r($params);
         }
			echo model::$query->queryString;
         throw new PDOException ;
         return false;
      }

   }

   public static function insert($table, $statement, $params)
   {
      try {
         $prep = "INSERT INTO " . $table . " SET " . $statement . " ";

         //var_dump($prep);
         //var_dump($params);
         //exit();

         model::gerarLog($table, "insert", $statement, $params);


         return model::prepExec($prep, $params);

      } catch (PDOException $e) {
         throw new PDOException();
         echo $e->getMessage();
      }

   }

   public static function setPtBRDate()
   {
      $prep = " SET lc_time_names = 'pt_BR' ";
      //var_dump($prep);
      //var_dump($params);
      model::$query = model::getConn()->prepare($prep);

      $query = model::$query->execute();
   }

   public static function select($fields, $table, $statement, $params)
   {
     ini_set('memory_limit', '-1');

      $prep = "SELECT " . $fields . " FROM " . $table . " " . $statement . " ";
      //var_dump($prep);
      //var_dump($params);
      model::prepExec($prep, $params);

      //exit();

      return model::$query;
   }

   public static function lastId($table, $params = null)
   {
      $prep = "SELECT MAX( ID ) as ID FROM " . $table;
      //var_dump($prep);
      //var_dump($params);
      model::prepExec($prep, $params);

      //exit();

      while ($row = model::$query->fetch(PDO::FETCH_ASSOC)) {
         $id = $row['ID'];
      }

      return $id;
   }

   public static function countId($table, $stament, $alias = '', $params = null)
   {
      $prep = "SELECT COUNT( " . $alias . "id ) as qtd FROM " . $table . " " . $stament;
      //var_dump($prep);
      //var_dump($params);
      model::prepExec($prep, $params);

      //exit();

      $query = model::$query;

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
         $qtd = $row['qtd'];
      }

      return $qtd;
   }

   public static function countField($table, $stament, $alias, $field, $params = null)
   {
      $prep = "SELECT COUNT( " . $alias . $field." ) as qtd FROM " . $table . " " . $stament;
      //var_dump($prep);
      //var_dump($params);
      model::prepExec($prep, $params);

      //exit();

      $query = model::$query;

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
         $qtd = $row['qtd'];
      }

      return $qtd;
   }

   public static function countIdPessoa($table, $statement, $alias = '', $params = null)
   {
      $prep = "SELECT COUNT( " . $alias . "idPessoa ) as qtd FROM " . $table . " " . $statement;
      //var_dump($prep);
      //var_dump($params);
      model::prepExec($prep, $params);

      //exit();

      $query = model::$query;

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
         $qtd = $row['qtd'];
      }

      return $qtd;
   }

   public static function update($table, $statement, $params, $where)
   {
      $prep = "UPDATE " . $table . " SET " . $statement . " " . $where;

      //var_dump($prep);
      //var_dump($params);

      //exit();
      model::gerarLog($table, "update", $statement, $params);
      return model::prepExec($prep, $params);
   }

   public static function delete($table, $statement, $params)
   {
      $prep = "DELETE FROM " . $table . " " . $statement . " ";

      //var_dump($prep);
      //var_dump($params);
      //exit;
      model::gerarLog($table, "delete", $statement, $params);
      return model::prepExec($prep, $params);
   }

   public static function gerarLog($table, $action, $statement, $params){

      $tables = "logSistema";
      $query = "idUsuario = ?, data = CURRENT_TIMESTAMP, tabela = ?, acao = ?, statement = ?, params = ?";

      $idUsuario = !isset($_SESSION['idUser']) ? 17 : $_SESSION['idUser'];

      //$statement = model::interpolateQuery($statement, $params);

      $parameters = [ $idUsuario,$table, $action, $statement, implode(',', $params) ];

      $prep = "INSERT INTO " . $tables . " SET " . $query . " ";

      model::prepExec($prep, $parameters);
   }

   public static function gerarAviso($text, $resum, $users, $creator){
		try {
			$table = "avisos";
			$statement = "texto = ?, resumido = ?";
			$params = [$text, $resum];
			if($creator != null){
				$statement .= ", idCriacao = ?";
				array_push($params, $creator);
			}

			$query = model::insert($table, $statement, $params);

			$id = model::lastId('avisos');
			foreach($users as $val){
				if($val != null){
					try {
						$table = "avisosUsuario";
						$statement = "idUsuario = ?, idAviso = ?";
						$params = [$val, $id];

						$query = model::insert($table, $statement, $params);

					} catch (Exception $e) {
						echo $e->getCode() . " " . $e->getMessage();
						return false;
					}
				}
			}

		} catch (Exception $e) {
			echo $e->getCode() . " " . $e->getMessage();
			return false;
		}
	}

   public static function interpolateQuery($query, $params){
      $keys = array();

      foreach ($params as $key => $value) {
         if (is_string($key)) {
            $keys[] = '/:'.$key.'/';
         } else {
            $keys[] = '/[?]/';
         }
      }

      $query = preg_replace($keys, $params, $query);

      return $query;
   }

   public static function paginacao($pag, $fields, $table, $statement, $params, $limite)
   {
      //$limite = 5;

      $pg = $pag > 0 ? $pag : 1;
      $init = ($pg * $limite) - $limite;
      $prep = "SELECT " . $fields . " FROM " . $table . " " . $statement . " LIMIT " . $init . "," . $limite;
      model::prepExec($prep, $params);

      return model::$query;
   }

   public static function quantidadePag($fields, $table, $statement, $params)
   {
      $prep = "SELECT " . $fields . " FROM " . $table . " " . $statement;
      model::prepExec($prep, $params);

      return ceil(model::$query->rowCount(PDO::FETCH_ASSOC) / 5);
   }

   public static function executeProcedure($sql, $params)
   {
      $prep = $sql;
      //var_dump($prep);
      //var_dump($params);
      //exit();
      model::prepExec($prep, $params);

      return model::$query;
   }

   public static function buscaQuinzena($data)
   {
      $tmp = explode('-', $data);
      $ano = $tmp[0];
      if (strtotime($data) < strtotime("$ano-01-16")) {
         $quinzena = '1Q Jan ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-01-31")) {
         $quinzena = '2Q Jan ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-02-16")) {
         $quinzena = '1Q Fev ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-02-29")) {
         $quinzena = '2Q Fev ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-03-16")) {
         $quinzena = '1Q Mar ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-03-31")) {
         $quinzena = '2Q Mar ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-04-16")) {
         $quinzena = '1Q Abr ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-04-30")) {
         $quinzena = '2Q Abr ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-05-16")) {
         $quinzena = '1Q Mai ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-05-31")) {
         $quinzena = '2Q Mai ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-06-16")) {
         $quinzena = '1Q Jun ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-06-30")) {
         $quinzena = '2Q Jun ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-07-16")) {
         $quinzena = '1Q Jul ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-07-31")) {
         $quinzena = '2Q Jul ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-08-16")) {
         $quinzena = '1Q Ago ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-08-31")) {
         $quinzena = '2Q Ago ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-09-16")) {
         $quinzena = '1Q Set ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-09-30")) {
         $quinzena = '2Q Set ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-10-16")) {
         $quinzena = '1Q Out ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-10-31")) {
         $quinzena = '2Q Out ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-11-16")) {
         $quinzena = '1Q Nov ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-11-30")) {
         $quinzena = '2Q Nov ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-12-16")) {
         $quinzena = '1Q Dez ' . $ano;
      } else if (strtotime($data) < strtotime("$ano-12-31")) {
         $quinzena = '2Q Dez ' . $ano;
      }

      return $quinzena;
   }

   public static function startTransaction()
   {
      model::getConn()->beginTransaction();
   }

   public static function commitTransaction()
   {
      model::getConn()->commit();
   }

   public static function rollbackTransaction()
   {
      model::getConn()->rollBack();
   }

   public static function quinzenaToSort($data)
   {
      $tmp = explode(' ', $data);
      $ano = $tmp[2];
      $quinzena = $tmp[0] . $tmp[1];

      if ($quinzena == '1QJan') {
         $sort = $ano . '01';
      } else if ($quinzena == '2QJan') {
         $sort = $ano . '02';
      } else if ($quinzena == '1QFev') {
         $sort = $ano . '03';
      } else if ($quinzena == '2QFev') {
         $sort = $ano . '04';
      } else if ($quinzena == '1QMar') {
         $sort = $ano . '05';
      } else if ($quinzena == '2QMar') {
         $sort = $ano . '06';
      } else if ($quinzena == '1QAbr') {
         $sort = $ano . '07';
      } else if ($quinzena == '2QAbr') {
         $sort = $ano . '08';
      } else if ($quinzena == '1QMai') {
         $sort = $ano . '09';
      } else if ($quinzena == '2QMai') {
         $sort = $ano . '10';
      } else if ($quinzena == '1QJun') {
         $sort = $ano . '11';
      } else if ($quinzena == '2QJun') {
         $sort = $ano . '12';
      } else if ($quinzena == '1QJul') {
         $sort = $ano . '13';
      } else if ($quinzena == '2QJul') {
         $sort = $ano . '14';
      } else if ($quinzena == '1QAgo') {
         $sort = $ano . '15';
      } else if ($quinzena == '2QAgo') {
         $sort = $ano . '16';
      } else if ($quinzena == '1QSet') {
         $sort = $ano . '17';
      } else if ($quinzena == '2QSet') {
         $sort = $ano . '18';
      } else if ($quinzena == '1QOut') {
         $sort = $ano . '19';
      } else if ($quinzena == '2QOut') {
         $sort = $ano . '20';
      } else if ($quinzena == '1QNov') {
         $sort = $ano . '21';
      } else if ($quinzena == '2QNov') {
         $sort = $ano . '22';
      } else if ($quinzena == '1QDez') {
         $sort = $ano . '23';
      } else if ($quinzena == '2QDez') {
         $sort = $ano . '24';
      }

      return $sort;
   }

   public static function gerarCores()
   {
      $color = 'rgba(' . rand(100, 255) . ',' . rand(155, 255) . ',' . rand(78, 255) . ', 0.9' . ')';
      return $color;
   }

   public static function mask($val, $mask)
   {
      $maskared = '';
      $k = 0;
      for ($i = 0; $i <= strlen($mask) - 1; $i++) {
         if ($mask[$i] == '#') {
            if (isset($val[$k]))
               $maskared .= $val[$k++];
         } else {
            if (isset($mask[$i]))
               $maskared .= $mask[$i];
         }
      }
      return $maskared;
   }

   public static function setForeignKeyCheckOn(){
      model::getConn()->query("set foreign_key_checks=1");
   }

   public static function setForeignKeyCheckOff(){
      model::getConn()->query("set foreign_key_checks=0");
   }

}
