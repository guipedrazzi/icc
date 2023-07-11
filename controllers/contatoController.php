<?php

class contatoController extends controller
{
    public function index() 
    {
        $dados = array();
    
       // print_r($dados['tempo']);
        $this->templateView('contato',$dados);

    }
}

?>
