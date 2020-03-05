<?php

class Banco{
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha = '';
    private static $dbNome = 'db_cadastro';

    private static $cont=null;

    public function __construct()
    {
        die('A função init não é permitida!!');
    }

    public static function connectar()
    {
        if (null == self::$cont) 
        {
            try
            {
                self::$cont = new PDO("mysql::host=".self::$dbHost.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha);
            }
            catch(PDOException $exception)
            {
                die ($exception->getMessage());
            }
        }
        
        return self::$cont;
    }

    public static function desconectar()
    {
        self::$cont = null;
    }

}

?>