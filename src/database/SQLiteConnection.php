<?php
   
   	class SQLiteConnection {

	    private $pdo;

		public function connect() {
			if ($this->pdo == null) {
				$this->pdo = new PDO("sqlite:" .__DIR__ . "/olsports.db");
			}
			return $this->pdo;
		}
	
	}

?>