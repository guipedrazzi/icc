<?php

class notfoundController extends controller
{
    
    public function index() 
    {
        $data = array();
        $this->loadView('404notfound', $data) ;
    }

}