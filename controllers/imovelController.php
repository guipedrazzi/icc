<?php
// A ideia é que façamos todos as operações de imoveis aqui, tanto pro usuario quanto para a área admin

class imovelController extends controller
{
    // INDEX do IMOVEL PORÉM SERÁ A LISTA JÁ DOS IMOVEIS PRO VISITANTE
    public function index() 
    {
        $data = array();
        // $this->templateViewAdmin('404notfound', $data) ;
        $this->templateView('imovel_home', $data) ;
    }
  
   public function detalhes() 
    {
        $data = array();
    
        $this->templateView('imovel_detalhes', $data);

    }

    public function pesquisa() 
    {
        $data = array();
    
        $this->templateView('imovel_pesquisa', $data);

    }
}

