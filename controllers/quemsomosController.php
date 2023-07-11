<?php

class quemsomosController extends controller
{
    public function index() 
    {
        $dados = array();
    
       // print_r($dados['tempo']);
        $this->templateView('quemsomos',$dados);

    }
}

?>
 