<?php
include("config.php");
include("Messages.php");
include("InputManager.php");
include("Repo.php");
$inputManager = new InputManager();

try 
{
    $pdo = new PDO("mysql:host={$config->db->host};dbname={$config->db->dbname}", $config->db->username, $config->db->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
	$msg = new ErrorMessage(10000001, "MySQL connection KO");
    $msg->render_andExit();
}

$repos = new StdClass();
$repos->contatti = new Repo("contatti");

$action = $inputManager->getParameter("GET", "action");

$tname = $inputManager->getParameter("GET", "tname");
switch($tname)
{
	case "contatti":
	case "info":
		break;
		
	default:
		$msg = new ErrorMessage(10000002, "tname non riconosciuto");
		$msg->render_andExit();
}

switch ($action) {
    case "list":
        $res = $repos->{$tname}->listElements();
        
		if($res === false)
		{
			$msg = new ErrorMessage(20000002, "Errore lista");
			$msg->render_andExit();
		}
		else
		{
			$output = $res;
			echo json_encode($output);
		}
        break;

    case "read":
        $id = $inputManager->getParameter("GET", "id");
        $res = $repos->{$tname}->readElement($id);
        
		if($res === false)
		{
			$msg = new ErrorMessage(20000002, "Errore lettura");
			$msg->render_andExit();
		}
		else
		{
			$output = $res;
			echo json_encode($output);
		}
        break;
    
    case 'create':
        $createObject = new StdClass();

        foreach ($_POST as $key => $value) 
		{
            $createObject->{$key} = $value;
        }

        $res = $repos->{$tname}->createElement($createObject);
        
		if($res === false)
		{
			$msg = new ErrorMessage(20000002, "Errore salvataggio");
			$msg->render_andExit();
		}
		else
		{
			$output = new StdClass();
			$output->id = $res;
			echo json_encode($output);
		}
        break;

    case 'update':
        $id = $inputManager->getParameter("GET", "id");

        $updateObject = new StdClass();

        foreach ($_POST as $key => $value) 
		{
            $updateObject->{$key} = $value;
        }

        $res = $repos->{$tname}->updateElement($id, $updateObject);
        
		if($res === false)
		{
			$msg = new ErrorMessage(20000002, "Errore");
			$msg->render_andExit();
		}
		else
		{
			$output = new StdClass();
			$output->success = true;
			echo json_encode($output);
		}
        break;

    case 'delete':
        $id = $inputManager->getParameter("GET", "id");
        $res = $repos->{$tname}->deleteElement($id);
        
		if($res === false)
		{
			$msg = new ErrorMessage(20000002, "Errore");
			$msg->render_andExit();
		}
		else
		{
			$output = new StdClass();
			$output->success = true;
			echo json_encode($output);
		}
        break;
        
    default: 
        echo "Running tests ...";
}