<?php
/**

 ** This is our database class

 */

class Database{

	private $dbhost = DB_HOST;
	private $dbuser = DB_USER;
	private $dbpass = DB_PASS;
	private $dbname = DB_NAME;
	private $dbport = DB_PORT;

	public $dbh;
	private $stmt;
	public $error;

	/**
	 * Database constructor.
	 *
	 * @param array $extraOptions - key => value pairs to be added to $options
	 */
	public function __construct($extraOptions = array()){

		$dsn = "mysql:host=". $this->dbhost.";port=".$this->dbport. ";dbname=".$this->dbname . ";charset=UTF8MB4";
		$options = array(
			PDO::ATTR_PERSISTENT =>true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		/**
		 * We need a way to use the database connection differently
		 * by providing extra options.
		 */
		if (count($extraOptions) != 0){
			$options = array_merge($options,$extraOptions);
		}

		try{
			$this->dbh = new PDO($dsn, $this->dbuser, $this->dbpass, $options);
		}
		catch(PDOException $e){
			$this->error = $e->getMessage();
			echo $this->error;
		}
	}

    /**
     * @param $sql
     */
    public function prepare($sql){
		$this->stmt = $this->dbh->prepare($sql);
	}

    /**
     * @param $param
     * @param $value
     * @param null $type
     */
    public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	//Execute Result

    /**
     * @return mixed
     * @throws frameworkError
     */
    public function execute(){
		try {
			try {
				$result = $this->stmt->execute();
			} catch (PDOException $e) {
				throw new frameworkError( $e->getMessage() . ": \n" . $this->stmt->queryString);
			}
		} catch(frameworkError $e){
			throw new frameworkError($e->getMessage());
		}
		return $result;
	}

	// Fetch all Result Set

    /**
     * @param bool $returnarray
     *
     * @return mixed
     * @throws frameworkError
     */
    public function resultSet($returnarray = false) {
		$this->execute();
		if ( $returnarray ) {
			return $this->stmt->fetchAll();
		}	    else {
			return $this->stmt->fetchAll( PDO::FETCH_OBJ );

		}
	}

	// Fetch single Record Set
	/*
	 * IMPORTANT - this method is currently dangerous - it will return a single record even if the query would
	 * return multiple records, which makes error checking wherever this is called impossible.
	 *
	 * TODO - don't use this for now! use resultSet and check the quantity returned where you call it!
	 * TODO - fix this if we do need it!
	 */
    /**
     * @return mixed
     * @throws frameworkError
     */
    public function singleRecord(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

    /**
     * @return mixed
     * @throws frameworkError
     */
    public function fetchColumn(){
		$this->execute();
		return $this->stmt->fetchColumn();
	}

	// Get Row Count

    /**
     * @return mixed
     */
    public function rowCount(){
		return $this->stmt->rowCount();
	}

	// Get Last Insert ID

    /**
     * @return string
     */
    public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}

    /**
     * @param $class
     *
     * @return mixed
     * @throws frameworkError
     */
    public function fetchObject($class){
		$this->execute();
		$this->stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
		return $this->stmt->fetch();
	}


    /**
     * @param $tablename
     *
     * @return null|stdClass
     * @throws frameworkError
     */
    public function getColumns($tablename){
		$result = $this->dbh->query("select * from $tablename limit 0");
		if($result->columnCount() > 0) {

			$dataObj = new stdClass();

			for ($cc = 0; $cc < $result->columnCount(); $cc++) {
				$dataObj->columns[$result->getColumnMeta($cc)['name']] = $result->getColumnMeta($cc);
				if(array_search('primary_key',$result->getColumnMeta($cc)['flags'])){
					if(!isset($pkey)) {
						$pkey = $result->getColumnMeta($cc)['name'];
					} else {
						throw new frameworkError("Error: getColumns encountered multiple primary keys in $tablename - supports only single primary key!");
					}
				}
			}

			if(isset($pkey)){
				$dataObj->primaryKey = $pkey;
			}


			return $dataObj;
		} else {
			return null;
		}
	}

}
