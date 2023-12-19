<?php
class bebida extends Productos
{
    protected $conAlcohol;

    public function __construct()
    {
        parent::__construct();
        $this->conAlcohol = 0; // Valor predeterminado, sin alcohol
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

    // Sobrescribe el método getImgProducto para agregar el badge si tiene alcohol
    public function getImgProducto()
    {
        $imgProducto = parent::getImgProducto();

        if ($this->conAlcohol) {
            // Agregar el badge a la imagen si tiene alcohol
            $imgProducto .= ' <span class="badge">Con Alcohol</span>';
        }

        return $imgProducto;
    }
}
