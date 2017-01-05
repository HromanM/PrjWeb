<?php

class SimpleDBWrapper
{

    private static $dbConnection;

    private static $dbSettings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    public static function dbConnect($host, $user, $passw, $database)
    {
        if (!isset(self::$dbConnection))
        {
            self::$dbConnection = @new PDO(
                "mysql:host=$host;dbname=$database",
                $user,
                $passw,
                self::$dbSettings
            );
        }
        return self::$dbConnection;
    }

    public static function dbQuery($sql, $params = array())
    {
        $query = self::$dbConnection->prepare($sql);
        $query->execute($params);
        return $query;
    }
    
    // query one row
    public static function dbQueryOne($sql, $params = array())
    {
        $query = self::$dbConnection->prepare($sql);
        $query->execute($params);
        return $query->fetch();
    }
    
    // query all rows
    public static function dbQueryAll($sql, $params = array())
    {
        $query = self::$dbConnection->prepare($sql);
        $query->execute($params);
        return $query->fetchAll();
    }
    
    // query one column
    public static function dbQueryColumn($sql, $params = array())
    {
        $res = self::dbQueryOne($sql, $params);
        return $res[0];
    }
    
    // query rows count
    public static function dbQueryCount($sql, $params = array())
    {
        $query = self::$dbConnection->prepare($sql);
        $query->execute($params);
        return $query->rowCount();
    }

}

?>