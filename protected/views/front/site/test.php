<?php

//$client = Yii::createComponent(array(
//  'class' => 'ext.GWebService.GSoapClient',
//  'serviceUrl' => 'www.manifesto.no-ip.com/Licencia.php'
//));
// 
//// remote method parameters are passed as an array
//echo $client->call('hola')
//Yii::import('application.components.soap.nusoap_base');
$client = new nusoap_client('http://manifesto.no-ip.com/Licencias.php', false);

echo $client->call('checkAuthenticate', array('www.juliazoppi.com', '545648'));
echo $client->getError();
?>