<?php
class bebida extends Productos
{
    protected $conAlcohol;

    public function __construct()
    {
        parent::__construct();
        
    }

    public function getConAlcohol()
    {
        return $this->conAlcohol;
    }

    public function setConAlcohol($conAlcohol)
    {
        $this->conAlcohol = $conAlcohol;

        return $this;
    }

}
