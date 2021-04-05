<?php 

class QueryBuilder {

	public function select($table_name, $columns) {


		if (is_array($columns)) {

			foreach($columns as $column) {				
				
				$str .= ', ' . $column; 				
				
			}

			$columns = ltrim( $str , ", ");
			
		} else if($columns === '*') {
			$columns  = '*';
		}

		$query = "SELECT ${columns} FROM ${table_name}";
		
		return $query;
	}


	public function insert($table_name, $params) {

		$columns = array_keys($params);
		$values = array_values($params);

		foreach($columns as $column) {
			$str_columns .= ', ' . $column; 

			
		}
		
		$columns = ltrim($str_columns, ", ");

		foreach($values as $value) {
			
			$str_values .= ', ' . ':'.$value; 
			
		}
		
		$values = ltrim($str_values, ", ");


		$query = "INSERT INTO ${table_name} (${columns}) VALUES (${values})";
		
		return $query;
	}

	public function update($table_name, $columns, $condition) {

		foreach($columns as $column) {

			$str .= ', ' . $column . '=:' . $column;			
		}

		$columns = ltrim($str, ", ");
		
		foreach($condition as $item) {
			$str_condition .= $item . ' ';
		}

		$condition = trim($str_condition);


		$query = "UPDATE ${table_name} SET ${columns} WHERE ${condition}";		
		
		return $query;
	}

	public function delete($table_name, $condition) {

		foreach($condition as $item) {
			$str_condition .= $item . ' ';
		}

		$condition = trim($str_condition);

		$query = "DELETE FROM ${table_name} WHERE ${condition}";		
		
		return $query;
	}

}

?>