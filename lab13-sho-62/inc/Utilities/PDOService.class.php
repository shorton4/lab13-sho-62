<?php

class PDOService {

    //Pull db info
    private $_host = DB_HOST;
    private $_user = DB_USER;
    private $_dbname = DB_NAME;
    private $_pass = DB_PASS;

    //Store the PDO Object
    private $_dbh;

    //Store Errors
    private $_errors;

    //Store the current class type for the PDO service
    private $_className;

    //Store the prepared statement;
    private $_pstmt;


    //Instntaite the object with the class definition
    public function __construct(string $className)  {

        //Store the classname
        $this->_className = $className;
        //Build the DSN
        $dsn = 'mysql:host=' . $this->_host . ';dbname=' . $this->_dbname;
        //Set the PDO options
        $options = array(PDO::ATTR_PERSISTENT  => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        //Connect
        try {
            $this->_dbh = new PDO($dsn, $this->_user, $this->_pass, $options);
        } catch (PDOException $pex) {
            echo $pex->getMessage();
            error_log($pex->getMessage());
            $this->_errors = $pex->getMessage();
        }
    }

        public function query($query)   {
            $this->_pstmt = $this->_dbh->prepare($query);
        }

        public function bind($param, $value, $type = null)  {
            if ($type == null) {
                switch (true)   {
                    
                    //Check for an Integer
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                    break;
                    
                    //check for a boolean
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                    break;
                    
                    //Check for Null
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    //Must be a string
                    default: 
                        $type = PDO::PARAM_STR;
                    break;
                }
            }

            //Add the bind Value to the prepared statement
            $this->_pstmt->bindValue($param, $value, $type);
        }

        public function execute()   {
            $this->_pstmt->execute();
        }

        public function resultSet() {
            return $this->_pstmt->fetchAll(PDO::FETCH_CLASS, $this->_className);
        }

        public function singleResult()  {
            $this->_pstmt->setFetchMode(PDO::FETCH_CLASS, $this->_className);
            return $this->_pstmt->fetch(PDO::FETCH_CLASS);
        }

        public function rowCount()  {
            return $this->_pstmt->rowcount();
        }

        public function lastInsertId()    {
            return $this->_dbh->lastInsertId();
        }


}