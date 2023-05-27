<?php

class Raca extends Connection
{
  private $table = 'tbraca';
  private $query = 'SELECT * FROM tbraca';
  
  public function getAll()
  {   
    $result = $this->connection->query($this->query);
    $lista = array();
    while ($record = $result->fetch_object()) {
      array_push($lista, $record);
    }
    $result->close();
    return $lista;		
  }

  public function getById($id)
  {
    return $this->connection->query($this->query . ' WHERE id = ' . $id)->fetch_assoc();
  }

  public function insert($raca)
  {
    $sql = "INSERT INTO " . $this->table . " (raca) VALUES ('" . $raca . "')";
    return $this->connection->query($sql);
  }

  public function update($id, $raca)
  {
    $sql = "UPDATE " . $this->table . " SET raca='" . $raca . "' WHERE id=" . $id;
    return $this->connection->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM  " . $this->table . " WHERE id=" . $id;
    return $this->connection->query($sql);
  }
}
