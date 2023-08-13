<?php

require_once __DIR__ . '/../../../app/index.php';

use Shared\Application\Authentication;
use Order\Application\StoreOrder;

try {
  $auth = new Authentication();
  $token = $auth->getToken()->value;

  $dateCommitment = new DateTime();
  $dateFormat = $dateCommitment->format("Y-m-d");

  /// TODO: create array of items
  $items = [
    [
      'RengNum' => 1, // must be defined
      'TipoDoc' => '',
      'RengDoc' => '0',
      'NumDoc' => '0',
      'CoArt' => '0806', // must be defined
      'CoAlma' => '001', // must be defined
      'TotalArt' => 2,
      'Pendiente' => 2,
      'UniVenta' => 'DIS', // must be defined
      'PrecVta' => 200,
      'PorcDesc' => '',
      'TipoImp' => '1', // must be defined
      'RengNeto' => 200 * 2,
      'DesArt' => '',
      'Comentario' => '',
      'NroLote' => '',
      'FecLote' => $dateFormat,
      'TipoDoc2' => '',
      'RengDoc2' => 0,
      'Serialp' => '',
      'CoAlma2' => '',
      'DisCen' => '',
      'Aux02' => '',
    ]
  ];

  /// TODO: set header info
  $data = [
    'CoCli' => '000150788', // must be defined
    'CoTran' => '001', // must be defined
    'CoVen' => '006', // must be defined
    'FormaPag' => '001', // must be defined
    'CoSucu' => '001', // must be defined
    'Nombre' => ' ',
    'Rif' => ' ',
    'Nit' => ' ',
    'Status' => '0',
    'Descrip' => ' ',
    'DirEnt' => ' ',
    'PorcGdesc' => '0',
    'PorcReca' => '0',
    'CtaContab' => ' ',
    'Campo1' => ' ',
    'Campo2' => ' ',
    'Campo4' => ' ',
    'Campo6' => ' ',
    'Campo7' => ' ',
    'Campo8' => ' ',
    'Revisado' => ' ',
    'Trasnfe' => ' ',
    'Serialp' => ' ',
    'DisCen' => ' ',
    'Aux02' => ' ',
    'Salestax' => ' ',
    'Telefono' => ' ',
    'CoUsEl' => '999',
    'FeUsEl' => $dateFormat,
    'CoUsIn' => '999',
    'FeUsIn' => $dateFormat,
    'CoUsMo' => '999',
    'FeUsMo' => $dateFormat,
    'FecEmis' => $dateFormat,
    'FecVenc' => $dateFormat,
    'Feccom' => $dateFormat,
    'Comentario' => 'TEST',
    'Moneda' => 'BSD', // must be defined
    'Tasa' => '1',
    'Contrib' => true,
    'Saldo' => 464,
    'TotBruto' => 400,
    'TotNeto' => 464,
    'Iva' => 64,
    'Renglon' => $items,
  ];

  // Show product an a warehouse
  $useCase = new StoreOrder($token);
  $result = $useCase->execute($data);

  echo var_dump($result);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  die($e->getMessage());
}