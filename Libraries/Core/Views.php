<?php

class Views
{
	function getView($controller, $view, $data = "", $role = "")
	{
		$controller = get_class($controller);
		$basePath = "Views/";

		// if ($controller == "Home") {
		// 	$view = "Views/" . $view . ".php";
		// } else {
		// 	$view = "Views/" . $controller . "/" . $view . ".php";
		// }
		// require_once ($view);
		

		if ($role == "admin") {
            $basePath .= "admin/";
        } elseif ($role == "user") {
            $basePath .= "Client/";
        }

        if ($controller == "Home") {
            $viewPath = $basePath . $view . ".php";
        } else {
            $viewPath = $basePath . $controller . "/" .  $view . ".php";
        }

        if (file_exists($viewPath)) {
            require_once($viewPath);
        } else {
            // Si no se encuentra en admin/ ni en user/, cargar desde Views/
            $defaultPath = "Views/" . $controller . "/" . $view . ".php";
            if (file_exists($defaultPath)) {
                require_once($defaultPath);
            } else {
                echo "View not found: " . $viewPath;
            }
        }
	}
}

?>