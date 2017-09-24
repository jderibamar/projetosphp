<?php
class Sql extends PDO
{
    private $connBD;
    public function __construct()
    {
       $this->connBD = new PDO('odbc:ConexaoBD', '', '');               
    }
    
    private function setParams($statement, $parameters = array())
    {
        foreach ($parameters as $key => $value) 
        {
            $this->setParam($statement, $key, $value);
        }
    }
    private function setParam($statement, $key, $value)
    {
        $statement->bindParam($key, $value);
    }
    
    public function query($rawQuery, $params = array())
    {
        $stmt = $this->connBD->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }
    
    public function select($rawQuery, $params = array()):array //Informando que a função retorna um array
    {
        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//FETCH_ASSOC: para não trazer os índices, mas apenas os dados
    }
}

