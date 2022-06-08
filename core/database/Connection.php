<?php

class Connection
{
    public static function make($config)
    {
        try {
            return  new PDO(
                $config["host"].";dbname=".$config["dbname"],
                $config["name"],
                $config["password"],
                $config["options"]
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
