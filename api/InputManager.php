<?php
class InputManager 
{	
	public function getParameter($type, $parameterKey)
	{
		$error = false; 
		
		switch($type)
		{
			case "GET":
				if(isset($_GET[$parameterKey]))
				{
					$parameterVal = $_GET[$parameterKey];
				}
				else
				{
					$error = true;
				}
				break;
		}
		
		if($error === true)
		{
			$msg = new ErrorMessage(10000002, "Parameter not found: " . $parameterKey);
			$msg->render_andExit();
		}
		else
		{
			return $parameterVal;
		}
	}
}