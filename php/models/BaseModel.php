<?php

/**
 * Class BaseModel
 */
class BaseModel
{
    /** @var mysqli */
    protected static $connection;

    /**
     * BaseModel constructor.
     */
    public function __construct()
    {
        if (self::$connection == null) {
            self::$connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
            if (self::$connection->connect_error) {
                throw new Exception('connection failed: ' . self::$connection->connect_error);
            }
        }
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

}