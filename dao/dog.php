<?php

class Dog extends Connection
{
  private $table = 'tbdog';
  private $query = 'SELECT tbdog.id, tbdog.idraca, tbdog.porte, tbdog.nac, tbraca.raca  FROM tbdog INNER JOIN tbraca ON tbdog.idraca = tbraca.id';
  
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
    return $this->connection->query($this->query . ' WHERE tbdog.id = ' . $id)->fetch_assoc();
  }

  public function insert($idraca, $porte, $nac)
  {
    $sql = "INSERT INTO " . $this->table . " (idraca, porte, nac) VALUES (".$idraca.", '".$porte."','".$nac."')";
    return $this->connection->query($sql);
  }

  public function update($id, $raca, $porte, $nac)
  {
    $sql = "UPDATE " . $this->table . " SET idraca='" . $raca . "', porte='".$porte."', nac='".$nac."' WHERE id=" . $id;
    return $this->connection->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM  " . $this->table . " WHERE id=" . $id;
    return $this->connection->query($sql);
  }
}
