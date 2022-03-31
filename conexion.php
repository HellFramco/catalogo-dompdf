<?php

class Conexion extends PDO
{
    private $tipo_de_base = 'mysql';
    private $host = '116.202.221.35';
    private $nombre_de_base = 'drabbaje_app_ventas';
    private $usuario = 'drabbaje_drabbajeans';
    private $contrasena = 'accederSistema';

    // private $tipo_de_base = 'mysql';
    // private $host = '192.168.20.28';
    // private $nombre_de_base = 'drabbaje_app_ventas';
    // private $usuario = 'root';
    // private $contrasena = '';

    public function __construct()
    {
        try {
            parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }
}
