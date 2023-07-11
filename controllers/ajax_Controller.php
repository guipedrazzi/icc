<?php

class ajax_Controller extends controller
{

	public function pesquisarCidadePorEstado()
	{
		$selects = new Selects();

		echo $selects->selectCidadePorEstado($_POST['uf']); 

	}
	
}

?>
