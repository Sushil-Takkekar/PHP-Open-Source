<?php

	class Database
	{
		public $dbType;
		public $host;
		public $dbname;
		public $uname;
		public $pass;
		public $dbStr1;
		public $con;

		public function connectDb()
		{
			$this->dbType = "mysql";
			$this->host = "localhost";
			$this->dbname = "bank_db";
			$this->uname = "root";
			$this->pass = "";

			$this->dbStr1 = $this->dbType.":host=".$this->host.";dbname=".$this->dbname;

			try {
				$this->con = new PDO($this->dbStr1,$this->uname,$this->pass);
			}catch(Exception $e){
				die('Something wrong in Db connection !!!');
			}
			return $this->con;
		}
	}

/*
	$db = new Database();
	$handle = $db->connectDb();

	$sr = 6;
	$sql = "select * from bal_sheet_l where sr=?";
	//$res = $handle->query($sql);
	$res = $handle->prepare($sql);
	$res->execute(array($sr));

	while($r = $res->fetch(PDO::FETCH_OBJ))
	{
		echo $r->pre_yr_L.' | '.$r->title_L.' | '.$r->curr_yr_L;
	}
*/
?>