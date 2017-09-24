<?php
class Usuarios
{
    private $ID;
    private $USUARIO;
    private $NOME;
    private $SENHA;
    private $NIVEL;
    private $ID_PERFIL;
    private $DATA_CAD;
    private $DATA_ALT;
            
    //GETTERS
    function getID(){return $this->ID;}
    function getUsuario(){return $this->USUARIO;}
    function getNome(){return $this->NOME;}
    function getSenha(){return $this->SENHA;}
    function getNivel(){return $this->NIVEL;}
    function getID_Perfil(){return $this->ID_PERFIL;}
    function getData_Cad(){return $this->DATA_CAD;}
    function getData_Alt(){return $this->DATA_ALT;}
    
//SETTERS
    function setID($id) 
    {
        $this->ID = $id;        
    }
    function setUsuario($usuario)
    {
        $this->USUARIO = $usuario;        
    }
    function setNome($nome)
    {
        $this->NOME = $nome;        
    }
    function setSsenha($senha)
    {
        $this->SENHA = $senha;        
    }
    function setNivel($nivel)
    {
        $this->NIVEL = $nivel;        
    }
    function setId_Perfil($id_perfil)
    {
       $this->ID_PERFIL = $id_perfil;       
    }
    function setData_Cad($data_cad)
    {
        $this->DATA_CAD = $data_cad;        
    }
    function setDATA_ALT($DATA_ALT)
    {
        $this->DATA_ALT = $DATA_ALT;        
    }
    
    public function loadById($id) //Retorna um usuário pelo ID
    {
        $sql = new Sql();
        $results = $sql->select('SELECT * FROM USUARIOS WHERE ID = :ID', array(
            ':ID'=>$id
        ));
        
        if (count($results)>0)
        {
            $row = $results[0];
            $this->setID($row['ID']);
            $this->setUsuario($row['USUARIO']);
            $this->setNome($row['NOME']);
            $this->setSsenha($row['SENHA']);
            $this->setNivel($row['NIVEL']);
            $this->setId_Perfil($row['ID_PERFIL']);
            $this->setData_Cad(new DateTime($row['DATA_CAD']));
            $this->setDATA_ALT(new DateTime($row['DATA_ALT']));
        }
    }
    
    static function search($usuario)
    {
        $consulta = new Sql();
        return $consulta->select('SELECT * FROM USUARIOS WHERE USUARIO LIKE :USUARIO', array(
            ':USUARIO'=> '%'. $usuario .'%'
        ));
    }
    
    function estaLogado($usuario, $senha)
    {
        $sql = new Sql();
        $consulta = $sql->select('SELECT * FROM USUARIOS WHERE USUARIO = :USUARIO AND SENHA = :SENHA', array(
           ':USUARIO'=> $usuario,
           ':SENHA'=> $senha            
        ));
        if (count($consulta)>0)
        {
            $row = $consulta[0];
            $this->setID($row['ID']);
            $this->setUsuario($row['USUARIO']);
            $this->setNome($row['NOME']);
            $this->setSsenha($row['SENHA']);
            $this->setNivel($row['NIVEL']);
            $this->setId_Perfil($row['ID_PERFIL']);
            $this->setData_Cad(new DateTime($row['DATA_CAD']));
            $this->setDATA_ALT(new DateTime($row['DATA_ALT']));
        }
        else
            throw new Exception('Usuário e/ou senha inválido');
    
    }

    static function listaUsuarios() //Traz uma lista de usuarios
    {
        $consulta = new Sql();
        return $consulta->select('SELECT * FROM USUARIOS ORDER BY NOME');
    }

        public function __toString() 
    {
        return json_encode(array(
            'ID'=> $this->getID(),
            'USUARIO'=> $this->getUsuario(),
            'NOME'=> $this->getNome(),
            'SENHA'=> $this->getSenha(),
            'NIVEL'=> $this->getNivel(),
            'ID_PERFIL'=> $this->getID_Perfil(),
            'DATA_CAD'=> $this->getData_Cad()->format('d/m/Y H:i:s'),
            'DATA_ALT'=> $this->getData_Alt()->format('d/m/Y H:i:s')
        ))  ;
    }
}
