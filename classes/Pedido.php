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
    public static function listar_pedidos_completos(): array 
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT p.id AS pedido_id, p.total_pagado, u.nombre AS usuario,
                         pr.nombre AS producto, dp.cantidad
                  FROM pedidos p
                  JOIN usuarios u ON p.usuario_id = u.id
                  JOIN detalle_pedidos dp ON p.id = dp.pedido_id
                  JOIN productos pr ON dp.producto_id = pr.id
                  ORDER BY p.id DESC";
                  
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pedidos = [];
        foreach ($resultados as $row) {
            $id = $row['pedido_id'];
            if (!isset($pedidos[$id])) {
                $pedidos[$id] = [
                    'id' => $id,
                    'usuario' => $row['usuario'],
                    'total' => $row['total_pagado'],
                    'productos' => []
                ];
            }
            $pedidos[$id]['productos'][] = [
                'nombre' => $row['producto'],
                'cantidad' => $row['cantidad']
            ];
        }
        
        return $pedidos;
    }
}