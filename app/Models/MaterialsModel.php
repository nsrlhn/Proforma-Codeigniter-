<?php namespace App\Models;

class MaterialsModel{
    public $name = "";
    public $unit = "";

    public $quantity = 0;

    public $tax = 0;
    public $unitprice = 0;
    public $subtotal = 0;

    function __construct($material_id){
        $this->id = $material_id;
    }
}
