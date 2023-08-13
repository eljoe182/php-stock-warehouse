<?php

namespace Order\Domain\Class;

use Order\Domain\Interfaces\IOrder;

class Order implements IOrder
{
  public $data;

  public function __construct($data)
  {
    $this->data = $data;
  }

  private function formatItem($rows)
  {
    $items = [];

    foreach($rows as $item) {
      $items[] = [
        'RengNum' => $item->rowNumber, // must be defined
        'TipoDoc' => '',
        'RengDoc' => '0',
        'NumDoc' => '0',
        'CoArt' => $item->productId, // must be defined
        'CoAlma' => $item->warehouseId, // must be defined
        'TotalArt' => $item->quantity,
        'Pendiente' => $item->quantity,
        'UniVenta' => $item->measurementUnit, // must be defined
        'PrecVta' => $item->price,
        'PorcDesc' => '',
        'TipoImp' => $item->taxId, // must be defined
        'RengNeto' => $item->price * $item->quantity,
        'DesArt' => '',
        'Comentario' => '',
        'NroLote' => '',
        'FecLote' => $item->dateCommitment,
        'TipoDoc2' => '',
        'RengDoc2' => 0,
        'Serialp' => '',
        'CoAlma2' => '',
        'DisCen' => '',
        'Aux02' => '',
      ];
    }

    return $items;
  }

  public function formatTo2k8()
  {
    $format = [
      'CoCli' => $this->data->clientId, // must be defined
      'CoTran' => $this->data->deliveryTypeId, // must be defined
      'CoVen' => $this->data->sellerId, // must be defined
      'FormaPag' => $this->data->paymentId, // must be defined
      'CoSucu' => $this->data->branchOfficeId, // must be defined
      'Nombre' => ' ',
      'Rif' => ' ',
      'Nit' => ' ',
      'Status' => '0',
      'Descrip' => $this->data->description,
      'DirEnt' => ' ',
      'PorcGdesc' => '0',
      'PorcReca' => '0',
      'CtaContab' => ' ',
      'Campo1' => ' ',
      'Campo2' => ' ',
      'Campo3' => ' ',
      'Campo4' => ' ',
      'Campo5' => ' ',
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
      'FeUsEl' => $this->data->dateCommitment,
      'CoUsIn' => '999',
      'FeUsIn' => $this->data->dateCommitment,
      'CoUsMo' => '999',
      'FeUsMo' => $this->data->dateCommitment,
      'FecEmis' => $this->data->dateCommitment,
      'FecVenc' => $this->data->dateCommitment,
      'Feccom' => $this->data->dateCommitment,
      'Comentario' => $this->data->comment,
      'Moneda' => $this->data->currencyId, // must be defined
      'Tasa' => '1', // must be defined
      'Contrib' => true,
      'Saldo' => $this->data->totalAmount,
      'TotBruto' => $this->data->totalAmount,
      'TotNeto' => $this->data->totalNet,
      'Iva' => $this->data->tax,
      'Items' => $this->formatItem($this->data->items),
    ];
    return $format;
  }
}
