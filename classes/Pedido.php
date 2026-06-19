<?php
require_once "Conexion.php";
require_once "Producto.php";

class Pedido
{
    public static function registrar_compra(int $usuario_id, array $carrito): void
    {
        $conexion = Conexion::getConexion();
        
        $cantidades = [];
        foreach ($carrito as $id_producto) {
            if (!isset($cantidades[$id_producto])) {
                $cantidades[$id_producto] = 1;
            } else {
                $cantidades[$id_producto]++;
            }
        }

        $total = 0;
        foreach ($cantidades as $id => $cantidad) {
            $robot = Producto::producto_x_id($id);
            $total += $robot->getPrecio() * $cantidad;
        }

        $query_pedido = "INSERT INTO pedidos (usuario_id, total_pagado) VALUES (:usuario_id, :total_pagado)";
        $PDOStatement_pedido = $conexion->prepare($query_pedido);
        $PDOStatement_pedido->execute([
            'usuario_id' => $usuario_id,
            'total_pagado' => $total
        ]);

        $pedido_id = $conexion->lastInsertId();

        $query_detalle = "INSERT INTO detalle_pedidos (pedido_id, producto_id, cantidad, precio_unitario) 
                          VALUES (:pedido_id, :producto_id, :cantidad, :precio_unitario)";
        $PDOStatement_detalle = $conexion->prepare($query_detalle);

        foreach ($cantidades as $id => $cantidad) {
            $robot = Producto::producto_x_id($id);
            $PDOStatement_detalle->execute([
                'pedido_id' => $pedido_id,
                'producto_id' => $id,
                'cantidad' => $cantidad,
                'precio_unitario' => $robot->getPrecio()
            ]);
        }
    }
}