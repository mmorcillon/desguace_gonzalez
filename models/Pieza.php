<?php
class Pieza {
    private $conn;
    private $table = 'piezarecambio';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function search($query) {
        $sql = "SELECT nombre_pieza, categoria, estado_pieza, precio, estanteria, balda, seccion
                FROM " . $this->table . "
                WHERE bastidor LIKE :query OR nombre_pieza LIKE :query OR marca LIKE :query";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$query%";
        $stmt->bindParam(':query', $searchTerm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function getAll() {
    $query = "SELECT * FROM " . $this->table . " ORDER BY fecha_creacion DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function update($id, $nombre_pieza, $categoria, $estado_pieza, $precio, $estanteria, $balda, $seccion) {
    $query = "UPDATE " . $this->table . "
              SET nombre_pieza = :nombre_pieza, categoria = :categoria, estado_pieza = :estado_pieza, 
                  precio = :precio, estanteria = :estanteria, balda = :balda, seccion = :seccion, fecha_actualizacion = NOW()
              WHERE id_pieza = :id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre_pieza', $nombre_pieza);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':estado_pieza', $estado_pieza);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':estanteria', $estanteria);
    $stmt->bindParam(':balda', $balda);
    $stmt->bindParam(':seccion', $seccion);

    return $stmt->execute();
}

public function delete($id) {
    $query = "DELETE FROM " . $this->table . " WHERE id_pieza = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

public function create($bastidor, $nombre_pieza, $categoria, $estado_pieza, $precio, $estanteria, $balda, $seccion) {
    $query = "INSERT INTO " . $this->table . " 
              (bastidor, nombre_pieza, categoria, estado_pieza, precio, estanteria, balda, seccion, fecha_entrada, fecha_creacion, fecha_actualizacion)
              VALUES (:bastidor, :nombre_pieza, :categoria, :estado_pieza, :precio, :estanteria, :balda, :seccion, CURDATE(), NOW(), NOW())";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':bastidor', $bastidor);
    $stmt->bindParam(':nombre_pieza', $nombre_pieza);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':estado_pieza', $estado_pieza);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':estanteria', $estanteria);
    $stmt->bindParam(':balda', $balda);
    $stmt->bindParam(':seccion', $seccion);

    return $stmt->execute();
}

public function findById($id) {
    $query = "SELECT * FROM " . $this->table . " WHERE id_pieza = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


}
