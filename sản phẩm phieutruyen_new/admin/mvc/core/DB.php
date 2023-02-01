<?php

/**
 * Class DB
 */
class DB
{
    public $con;

    protected $servername = "localhost";

    protected $username = "root";

    protected $password = "";

    protected $dbname = "comic_online";
    //protected $dbname = "webtruyen";

    protected $tableName = '';

    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }

    /**
     * Get table name.
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }
}
