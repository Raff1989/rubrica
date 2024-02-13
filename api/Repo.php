<?php
class Repo 
{	
	private $tname;
	
    public function __construct($tname)
	{
		$this->tname = $tname;
    }
	
	/* L - List */
	public function listElements() 
	{
		global $pdo;
		
		try 
		{
			$query = "SELECT * FROM {$this->tname}";
			$stmt = $pdo->prepare($query);
			$stmt->execute();
			
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $result;
		}
		catch (PDOException $e) 
		{
			$msg = new ErrorMessage(10000002, "MySQL query KO");
			$msg->render_andExit();
		}
	}

	/* C - Create */
	public function createElement($createObject) 
	{
		global $pdo;

		try 
		{
			$createArray = array();

			foreach ($createObject as $key => $value) 
			{
				$createArray[] = "$key = :$key";
			}

			$createString = implode(", ", $createArray);

			$query = "INSERT {$this->tname} SET $createString";
			$stmt = $pdo->prepare($query);

			foreach ($createObject as $key => $value) 
			{
				$stmt->bindValue(":$key", $value);
			}

			$stmt->execute();

			if ($stmt->rowCount() > 0) 
			{
				return $pdo->lastInsertId();
			} 
			else 
			{
				return false;
			}
		} 
		catch (PDOException $e) 
		{
			$msg = new ErrorMessage(10000002, "MySQL query KO". $e->getMessage());
			$msg->render_andExit();
		}
	}

	/* R - Read */
	public function readElement($id) 
	{
		global $pdo;
		
		try 
		{
			$query = "SELECT * FROM {$this->tname} WHERE id = :id";
			$stmt = $pdo->prepare($query);
			
			$stmt->bindValue("id", $id);
			$stmt->execute();

			if ($stmt->rowCount() > 0) 
			{
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				return $result;
			} 
			else 
			{
				return false;
			}
		} 
		catch (PDOException $e) 
		{
			$msg = new ErrorMessage(10000002, "MySQL query KO");
			$msg->render_andExit();
		}
	}

	/* U - Update */
	public function updateElement($id, $updateObject) 
	{
		global $pdo;

		try 
		{
			$updateArray = array();

			foreach ($updateObject as $key => $value) 
			{
				$updateArray[] = "$key = :$key";
			}

			$updateString = implode(", ", $updateArray);

			$query = "UPDATE {$this->tname} SET $updateString WHERE id = :id";
			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);

			foreach ($updateObject as $key => $value) 
			{
				$stmt->bindValue(":$key", $value, PDO::PARAM_STR);
			}

			$stmt->execute();

			if ($stmt->rowCount() > 0) 
			{
				return true;
			} 
			else 
			{
				return false;
			}
		} 
		catch (PDOException $e) 
		{
			$msg = new ErrorMessage(10000002, "MySQL query KO" . $e->getMessage());
			$msg->render_andExit();
		}
	}

	/* D - Delete */
	function deleteElement($id) 
	{
		global $pdo;

		try {
			$query = "DELETE FROM {$this->tname} WHERE id = :id";
			$stmt = $pdo->prepare($query);
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);

			$stmt->execute();

			if ($stmt->rowCount() > 0) 
			{
				return true;
			} 
			else 
			{
				return false;
			}
		} 
		catch (PDOException $e) 
		{
			$msg = new ErrorMessage(10000002, "MySQL query KO");
			$msg->render_andExit();
		}
	}
}