<?php
/**
 * Created by PhpStorm.
 * User: debasish.panda
 * Date: 23-12-2018
 * Time: 12:22
 */
/*
* Mysql database class - only one connection allowed
 * Single Ton pattern is implemented
*/
class DBConnection
{
    /**
     * $_connection string
     */
    private $_connection;
    /**
     * $_database string
     */
    private static $_instance; //The single instance
    /**
     * $_database string
     */
    private $_host = "127.0.0.1";
    /**
     * $_database string
     */
    private $_username = "root";
    /**
     * $_database string
     */
    private $_password = "";
    /**
     * $_database string
     */
    private $_database = "homelane";


    private function __construct() {
        $this->_connection = mysqli_connect($this->_host, $this->_username,
            $this->_password, $this->_database);

        // Error handling
        if (!$this->_connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    /**
     * @return DBConnection
     */
    public static function getInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }



    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }

    // Get mysqli connection

    /**
     * @return mysqli
     */
    public function getConnection() {
        return $this->_connection;
    }

    public function closeConnection(){
        mysqli_close($this->_connection);
    }
}

