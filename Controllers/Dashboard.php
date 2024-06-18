<?php 

	class Dashboard extends Controllers{
		public function __construct()
		{
			
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'login');
				die();
			}
			getPermisos(MDASHBOARD);
		}
	
		public function dashboard()
		{
			$data['page_id'] = 3;
			$data['page_tag'] = "Dashboard";
			$data['page_title'] = "Página de Dashboard";
			$data['page_name'] = "Dashboard";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$this->views->getView($this,"dashboard",$data,"admin");
		}
	}
 ?>