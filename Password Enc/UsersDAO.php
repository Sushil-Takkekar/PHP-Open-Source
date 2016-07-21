<?php
	require 'Database.php';
	require 'Users.php';

	class UsersDAO
	{
		public function getPass($uname)
		{
			$db = new Database();
			$handle = $db->connectDb();
			$sql = "select * from users where username=?";
			$res = $handle->prepare($sql);
			$res->execute(array($uname));

			if($r = $res->fetch(PDO::FETCH_OBJ))
			{
				$u = new Users();
				$u->username = $r->username;
				$u->password = $r->password;
				$u->nickname = $r->nickname;
				return $u->password;
			}
			
		}	
	}
?>