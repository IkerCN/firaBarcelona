<?php

    Class CalculadoraPrecios{

        public static function CalculadoraPrecioPedido($pedidos){
            $precioTotal = 0;
            foreach($pedidos as $pedido){
                $precioTotal += $pedido->precioTotal();
            }
            return $precioTotal;
        }

        public static function CalculadoraPrecioSinIva($precioTotal){
            $porcentajeIva = 16;
	    $precioSinIva = $precioTotal / (1 + ($porcentajeIva / 100));
            return $precioSinIva;
        }

        public static function CalculadoraPrecioIva($precioTotal, $precioSinIva){
	    $precioIva = $precioTotal - $precioSinIva;
            return $precioIva;
        }
    }