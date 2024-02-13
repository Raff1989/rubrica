<?php
class ErrorMessage 
{
    private $code;
    private $message;

    public function __construct($code, $message)
	{
        $this->code = $code;
        $this->message = $message;
    }
	
	public function render_andExit()
	{
		$msg = new StdClass();
		$msg->error 	= true;
		$msg->code 		= $this->code;
		$msg->message 	= $this->message;
		
		echo json_encode($msg);
		exit();
	}
}

class SuccessMessage 
{
    public function __construct()
	{
		
    }
	
	public function render_andExit()
	{
		$msg = new StdClass();
		$msg->success 	= true;
		
		echo json_encode($msg);
	}
}