<?php
class Produtos
{
    private $ID;
    private $COD_PRODUTO;
    private $NOME;
    private $DESCRICAO;
    private $VL_COMPRA;
    private $MARGEM_LUCRO;
    private $VL_VENDA;
    private $FABRICANTE;
    private $DATA_CADASTRO;
    private $EST_ATUAL;
    private $EST_MINIMO;
    private $UN;
    private $FOTO;
    private $DATA_ULTIMA_COMPRA;
    private $CST;
    private $ALIQUOTA_IPI;
    private $ALIQUOTA_ICMS;
    private $BASE_CALCULO;
    private $STATUS;
    private $CAT_ID;
//GETTERS
    function getID() 
    {
        return $this->ID;
    }
    function getCOD_PRODUTO() 
    {
        return $this->COD_PRODUTO;
    }
    function getNOME() 
    {
        return $this->NOME;
    }
    function getDESCRICAO() 
    {
        return $this->DESCRICAO;
    }
    function getVL_COMPRA() 
    {
        return $this->VL_COMPRA;
    }
    function getMARGEM_LUCRO() 
    {
        return $this->MARGEM_LUCRO;
    }
    function getVL_VENDA() 
    {
        return $this->VL_VENDA;
    }
    function getFABRICANTE() 
    {
        return $this->FABRICANTE;
    }
    function getDATA_CADASTRO() 
    {
        return $this->DATA_CADASTRO;
    }
    function getEST_ATUAL() 
    {
        return $this->EST_ATUAL;
    }
    function getEST_MINIMO() 
    {
        return $this->EST_MINIMO;
    }
    function getUN() 
    {
        return $this->UN;
    }
    function getFOTO() 
    {
        return $this->FOTO;
    }
    function getDATA_ULTIMA_COMPRA() 
    {
        return $this->DATA_ULTIMA_COMPRA;
    }
    function getCST() 
    {
        return $this->CST;
    }
    function getALIQUOTA_IPI() 
    {
        return $this->ALIQUOTA_IPI;
    }
    function getALIQUOTA_ICMS() 
    {
        return $this->ALIQUOTA_ICMS;
    }
    function getBASE_CALCULO() 
    {
        return $this->BASE_CALCULO;
    }
    function getSTATUS() 
    {
        return $this->STATUS;
    }
    function getCAT_ID() 
    {
        return $this->CAT_ID;
    }
    
//SETTERS
    function setID($ID) 
    {
        $this->ID = $ID;
    }

    function setCOD_PRODUTO($COD_PRODUTO) 
    {
        $this->COD_PRODUTO = $COD_PRODUTO;
    }
    function setNOME($NOME) 
    {
        $this->NOME = $NOME;
    }
    function setDESCRICAO($DESCRICAO) 
    {
        $this->DESCRICAO = $DESCRICAO;
    }
    function setVL_COMPRA($VL_COMPRA) 
    {
        $this->VL_COMPRA = $VL_COMPRA;
    }
    function setMARGEM_LUCRO($MARGEM_LUCRO) 
    {
        $this->MARGEM_LUCRO = $MARGEM_LUCRO;
    }
    function setVL_VENDA($VL_VENDA) 
    {
        $this->VL_VENDA = $VL_VENDA;
    }
    function setFABRICANTE($FABRICANTE) 
    {
        $this->FABRICANTE = $FABRICANTE;
    }
    function setDATA_CADASTRO($DATA_CADASTRO) 
    {
        $this->DATA_CADASTRO = $DATA_CADASTRO;
    }
    function setEST_ATUAL($EST_ATUAL) 
    {
        $this->EST_ATUAL = $EST_ATUAL;
    }
    function setEST_MINIMO($EST_MINIMO) 
    {
        $this->EST_MINIMO = $EST_MINIMO;
    }
    function setUN($UN) 
    {
        $this->UN = $UN;
    }
    function setFOTO($FOTO) 
    {
        $this->FOTO = $FOTO;
    }
    function setDATA_ULTIMA_COMPRA($DATA_ULTIMA_COMPRA) 
    {
        $this->DATA_ULTIMA_COMPRA = $DATA_ULTIMA_COMPRA;
    }
    function setCST($CST) {
        $this->CST = $CST;
    }
    function setALIQUOTA_IPI($ALIQUOTA_IPI) 
    {
        $this->ALIQUOTA_IPI = $ALIQUOTA_IPI;
    }
    function setALIQUOTA_ICMS($ALIQUOTA_ICMS) 
    {
        $this->ALIQUOTA_ICMS = $ALIQUOTA_ICMS;
    }
    function setBASE_CALCULO($BASE_CALCULO) 
    {
        $this->BASE_CALCULO = $BASE_CALCULO;
    }
    function setSTATUS($STATUS) 
    {
        $this->STATUS = $STATUS;
    }
    function setCAT_ID($CAT_ID) 
    {
        $this->CAT_ID = $CAT_ID;
    }    
    
    function loadById($id)
    {
        $sql = new Sql();
        $consulta = $sql->select('SELECT TOP (5)[ID], [COD_PRODUTO], [NOME], [VL_VENDA] FROM PRODUTOS WHERE ID = :ID', array(
            ':ID'=> $id
        ));
        
      if (count($consulta)>0)
      {
          $row = $consulta[0];
          $this->setID($row['ID']);
          $this->setCOD_PRODUTO($row['COD_PRODUTO']);
          $this->setNOME($row['NOME']);          
          $this->setVL_VENDA($row['VL_VENDA']);
      }
    }

    static function listaProdutos()
    {
        $pesquisa = new Sql();
        return $pesquisa->select('SELECT * FROM PRODUTOS');
    }

    public function __toString() 
    {
        return json_encode(array(
            'ID'=> $this->getId(),
            'COD_PRODUTO'=> $this->getCOD_PRODUTO(),
            'NOME'=> $this->getNOME(),
            'VL_VENDA'=> $this->getVL_VENDA()
        ));
    }    
}
?>
