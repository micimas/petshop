<?php 
	// require_once("Models/TCategoria.php");
	// require_once("Models/TProducto.php");
	class Home extends Controllers{
		// use TCategoria, TProducto;
		public function __construct()
		{
			parent::__construct();
			session_start();
		}

		public function home()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Home";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$this->views->getView($this,"home",$data);
		}

		// public function home()
		// {
		// 	$pageContent = getPageRout('inicio');
		// 	$data['page_tag'] = NOMBRE_EMPESA;
		// 	$data['page_title'] = NOMBRE_EMPESA;
		// 	$data['page_name'] = "tienda_virtual";
		// 	$data['page'] = $pageContent;
		// 	$data['slider'] = $this->getCategoriasT(CAT_SLIDER);
		// 	$data['banner'] = $this->getCategoriasT(CAT_BANNER);
		// 	$data['productos'] = $this->getProductosT();
		// 	$this->views->getView($this,"home",$data); 
		// }

	}
 ?>
