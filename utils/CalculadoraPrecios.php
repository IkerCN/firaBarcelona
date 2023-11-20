<?php

    Class CalculadoraPrecios{

        public static function CalculadoraPrecioPedido($pedidos){
            $precioTotal = 0;
            foreach($pedidos as $pedido){
                $precioTotal += $pedido->precioTotal();
            }
            return $precioTotal;
        }

    }