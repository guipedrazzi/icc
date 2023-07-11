<?php
require './ambient.php';
global $configr;

//pasta raiz do sistema
define('RAIZ', '/icc');

$configr = array();

if (ENVIRONMENT == 'development') 
{
    $configr['TIPO']        = 'mysql';
    $configr['BDSERVER']    = 'localhost';
    $configr['BDNOME']      = 'icc_db';
    $configr['USER']        = 'root';
    $configr['PASS']        = '';
}
else //caso não esteja no ambiente de desenvolvimento
{
    //setar esse ,vetor com os valores do servidor
    $configr['TIPO']        = CNFGR_DBTYPE;
    $configr['BDSERVER']    = CNFGR_DBHOST;
    $configr['BDNOME']      = CNFGR_DBNAME;
    $configr['USER']        = CNFGR_DBUSER;
    $configr['PASS']        = CNFGR_DBPASS;
}

?>