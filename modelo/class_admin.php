<?php

class admin
{
    private $id_admin;
    private $usuario;
    private $pswd;
    private $tipo;

    /**
     * noticias constructor.
     * @param $id_admin
     * @param $usuario
     * @param $pswd
     * @param $imagenNoticia
     */
    public function __construct($id_admin=NULL, $usuario=NULL, $pswd=NULL, $tipo=NULL)
    {
        $this->id_admin = $id_admin;
        $this->usuario = $usuario;
        $this->pswd = $pswd;
        
    }

    /**
     * @return null
     */
    public function getIdAdmin()
    {
        return $this->id_admin;
    }

    /**
     * @param null $id_admin
     */
    public function setIdAdim($id_admin)
    {
        $this->id_admin = $id_admin;
    }

    /**
     * @return null
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param null $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return null
     */
    public function getPasword()
    {
        return $this->pswd;
    }

    /**
     * @param null $pswd
     */
    public function setPasword($pswd)
    {
        $this->pswd = $pswd;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
}