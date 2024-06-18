<?php 
	class TCitas extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			getPermisos(MDPAGINAS);
		}

		public function tcitas()
		{
			// $pageContent = getPageRout('citas');
			// if(empty($pageContent)){
			// 	header("Location: ".base_url());
			// }else{
				$data['page_tag'] = NOMBRE_EMPESA;
				$data['page_title'] = NOMBRE_EMPESA." - ";
				$data['page_name'] = "asda";
				$data['page'] = "asda";
				$this->views->getView($this,"tcitas",$data,"user");  
			// }

		}

	}
 ?>
