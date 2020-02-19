<?php

/**
 * Created by PhpStorm.
 * User: bryan
 * Date: 12/13/2017
 * Time: 10:26 AM
 */

class tableDataObject
{
    protected $dataColumns;
    public $tableName;
    public $pKey;
    public $recordObject;

    /**
     * tableDataObject constructor.
     * @param mixed $objectid
     *
     * $objectid - value to look up as the primary key (automatically detected) in object instantiation
     *
     * This constructor will return a complete object based on the fields from any*
     * table. Public properties on the object are:
     *  - $tableName string
     *  - $primaryKey string / name of key column
     *  - recordObject stdClass object - properties are all the columns of the specified table.
     *
     * IMPORTANT NOTES:
     * 1. As of the writing of this comment, this object will only function with
     * tables that have a single primary key column, and for being able to insert rows,
     * that column needs to be a generated auto incrementing ID.
     *
     *
     * TODO: This should be extensible with validators to check uniqueness on the
     * search parameters, and could also easily check for things like foreign key constraints based on the information
     * in the private $dataColumns property.
     *
     * IMPORTANT UPDATE: changing the constructor here such that it only accepts one parameter,
     * which will be searched for in the primary key of the table!
     *
     */
    public function __construct($objectid = null)
    {
        $child = get_class($this);
        $tablename = $child::TABLENAME;

        $tableinfo = self::getTableInfo($tablename);
        $this->dataColumns = $tableinfo->dataColumns;
        $this->tableName = $tablename;
        $this->pKey = $tableinfo->primaryKey;

        /*
         * The recordObject property will be an object with properties representing specifically
         * and only the columns from the specified table.
         */
        $this->recordObject = new stdClass();

        /*
         * IF and only if fieldname was specified, we also require searchvalue and attempt to retrieve
         * a single row based on these parameters.
         *
         * If fieldname is not specified, an object is returned with all the columns of the specified table
         * as properties, but with null values.
         */
        if (isset($objectid)) {
            //Dirty hack
            ini_set('display_errors', false);
            $conditions = array($this->pKey => $objectid);
            $getarecord = self::getRecordByParams($this->tableName, $conditions);

            $reccount = (isset($getarecord) ? count($getarecord) : 0);

            if ($reccount == 1) {
                foreach ($getarecord as $fieldname => $value) {
                    $this->recordObject->$fieldname = $value;
                }
            } else {
                // next line can be enabled to debug additional logging of conditions if consistent TDO errors occur, normally do not enable this.
                // new Logger("Debugging Bitdefender API issue","error",null,serialize([$this->tableName,$conditions]));
                throw new frameworkError("Error: Zero or multiple records returned when trying to create a tableDataObject!");
            }
        } else {
            foreach ($this->dataColumns->columns as $colname => $colMeta) {
                $this->recordObject->$colname = null;
            }
        }
    }

    /*
     * This function allows you to build a where clause for selecting records.
     * Originally it was intended to only ever return a single record,
     * for use in the constructor of a tableDataObject or classes that inherit from
     * it.
     *
     * Now, it should be safe for use in the constructor, as it will only ever operate
     * on the primary key in that context (still limited to single, not compound, primary
     * keys).
     *
     * If only one record is returned, you get it as a simple object of the calling child class.
     * If more than one record is returned,
     * an array of objects
     *
     *
     * If more than one record is returned, you get a record set to iterate over.
     *
     * example of the $conditions array:
     * $conds = array(
     *	'tenantid' => '04ba9f64-6c72-44c1-be19-b67b36f8fbc6',
     *	'quantity' => 48,
     *	'logtimestamp' => '2018-01-07 12:33:25'
     *	);
     *
     * 30 December 2018 - this function has beenb further extended to support
     * testing against null / not null. Just use these in conditions, example:
     * $conditions = [
     *     'must_be_null'     => 'null',
     *     'must_not_be_null' => 'notnull',
     *     'example_color'    => 'red'
     * ];
     *
     */
    public static function getRecordByParams($table, $conditions, $returnarray = false, $join = null)
    {
        global $connectedDb;

        if (!is_array($conditions)) {
            throw new frameworkError("Error: conditions for finding an object must be a key => value pair array");
        }

        foreach ($conditions as $cfield => $cvalue) {
            if (strtolower($cvalue) == 'null') {
                $prewhere[] = $cfield . " is null ";
            } elseif (strtolower($cvalue) == 'notnull') {
                $prewhere[] = $cfield . " is not null ";
            } else {
                $prewhere[] = $cfield . " = :" . $cfield;
            }
        }
        $wherec = implode(" and ", $prewhere);

        $baseq = "select * from $table";

        /*
         * 02-12-2018 - adding the ability to join tables to support EDI.
         * This change is designed to maintain backward compatibility.
         * TODO: document this
         *
         * Devs: should be obvious how to use this if you read the code.
         */
        if (isset($join) && is_array($join)) {
            $ltable = $table;
            $jtable = $join['table'];
            $jtype = $join['type'];
            $jleftkey = $join['left'];
            $jrightkey = $join['right'];

            $joinclause = "\n$jtype join $jtable on $ltable.$jleftkey = $jtable.$jrightkey\n";
            $baseq .= $joinclause;
        }

        $postjoin = $baseq . "\nwhere $wherec";

        $connectedDb->prepare($postjoin);
        foreach ($conditions as $cfield => $cvalue) {
            if (strtolower($cvalue) != "null" && strtolower($cvalue) != "notnull") {
                $connectedDb->bind(":$cfield", $cvalue);
            }
        }

        // get the information from the child class and the table
        $objClass = get_called_class();
        $tableinfo = self::getTableInfo($table);
        $pKey = $tableinfo->primaryKey;
        $rowbyparam = $connectedDb->resultSet();

        if (count($rowbyparam) == 0) {
            /* TODO - this is a bug waiting to happen. Need to figure out
             * what to do here if nothing is found on a primary key search.
             *
             * Maybe insert a blank record for that primary key value?
             * That would solve the problem with ms access tokens, but
             * needs more thinking.
             *
             */
            $output = null;
            /*
         * TODO - evaluate fixing single-item returns as array!
         *
         * There are unfortunately now places where we have ugly
         * hacks in place to loop through returns from
         * getRecordByParams if there is a single result...
         */
        } elseif (count($rowbyparam) == 1) {
            $output = $rowbyparam[0];
        } else {
            // we MIGHT want to return a loopable array tableDataObjects.
            if ($returnarray) {
                $output = $rowbyparam;
            } else {
                foreach ($rowbyparam as $dataobject) {
                    $output[] = new $objClass($dataobject->$pKey);
                }
            }
        }

        return $output;
    }

    public static function listAll($extraSQL = array(), $createObjects = false)
    {
        $objClass = get_called_class();
        $tableinfo = self::getTableInfo(static::TABLENAME);
        $pKey = $tableinfo->primaryKey;

        /*
    	 * modifying here to force listAll to order by primary key.
    	 * Useful during migration of users and customers.
    	 * todo: extend this method to accept an order by parameter
    	 */

        $child = get_called_class();
        $tablename = $child::TABLENAME;
        $tableinfo = self::getTableInfo($tablename);

        global $connectedDb;
        $listQ = "select * from $tablename";

        /*
         * Finally time to add some extra power to the TDO, mainly the
         * ability to do things like ORDER BY, LIMIT and OFFSET.
         *
         * Initially we are only going to handle ORDER BY.
         */
        if (isset($extraSQL['order by'])) {
            $listQ .= " order by " . $extraSQL['order by'];
        } else {
            // default order will be by primary kex
            $listQ .= " order by $tableinfo->primaryKey";
        }

        $connectedDb->prepare($listQ);

        if (!$createObjects) {
            $results = $connectedDb->resultSet();
        } else {
            foreach ($connectedDb->resultSet() as $resultrecord) {
                $results[] = new $objClass($resultrecord->$pKey);
            }
        }
        return $results;
    }

    public function store($forcenulls = false)
    {
        global $connectedDb;
        // grabbing the value of the primaryKey property just for clarity using it as a dynamic property of recordObject
        $pk = $this->pKey;
        if (!isset($this->tableName) || !isset($this->recordObject)) {
            throw new frameworkError("Error storing tableDataObject - missing tableName or recordObject");
        }

        /*
         * The following preparation is the same for both insert and update,
         * we just need to match up what we are binding with their values
         * for the prepared statements.
         *
         * TODO: change this below to use the dataColumns property of the object.
         * Otherwise, database errors could result from erroneously adding extra properties to the
         * recordObject.
         */
        $dcounts = 0;
        foreach ($this->recordObject as $field => $value) {
            /*
             * IMPORTANT - VERY IMPORTANT!
             * Previous behavior here would throw an error if there were items in recordObject that
             * did not resolve to a column in the database. To support models that get properties from
             * other tables, changing this to SILENTLY IGNORE properties that are not found
             * in the model's primary table! IGNORE THIS COMMENT AT YOUR OWN RISK!
             *
             * TODO: Extend this to look elsewhere for storing not found fields.
             *
             * Note: change below allows setting values to null
             * The $forcenulls flag is for compatibility when the TDO needs to explicitly set nulls,
             * like with the frameworkJob. It breaks other places where we need implicit nulls
             * for column default values.
             */
            if ($forcenulls === false) {
                if ($field != $this->pKey && isset($value) && array_key_exists($field, $this->dataColumns->columns)) {
                    $fields[$dcounts]  = $field;
                    $binders[$dcounts] = ":" . $field;
                    $values[$dcounts]  = $value;
                    $dcounts++;
                }
            } else {
                if ($field != $this->pKey && array_key_exists($field, $this->dataColumns->columns)) {
                    $fields[$dcounts] = $field;
                    if (isset($value)) {
                        $binders[$dcounts] = ":" . $field;
                        $values[$dcounts]  = $value;
                    } else {
                        $binders[$dcounts] = "null";
                        $values[$dcounts]  = null;
                    }
                    $dcounts++;
                }
            }
        }

        /*
         * If the recordObject has a value for its primary key, we assume we need to do an update.
         * TODO: consider how dangerous this is, as an outside method COULD modify the pkey without realizing it...
         *
         * at any rate, this is where the queries differ, and thus the way we make the prepared statement differs,
         * depending on insert or update.
         */
        if (!isset($this->recordObject->$pk)) {
            $mode = 'insert';

            // need to do an insert...

            $ifields = implode(",", $fields);
            $ibinders = implode(",", $binders);
            $pqry = "insert into $this->tableName ($ifields) values ($ibinders)";
            $connectedDb->prepare($pqry);
        } else {
            $mode = 'update';

            // gotta do an update...

            for ($fcount = 0; $fcount < count($fields); $fcount++) {
                $setters[] = $fields[$fcount] . " = " . $binders[$fcount];
            }
            $isetters = implode(",", $setters);

            /*
             * changing the prepared query to single-quote the PK value, to accommodate
             * tables that have a string PK (like the tokencache).
             *
             * TODO - bind the where clause properly.
             */
            if (isset($isetters)) {
                $pqry = "update " .  $this->tableName . " set " . $isetters . " where $pk = '" . $this->recordObject->$pk . "'";
                $connectedDb->prepare($pqry);
            } else {
                throw new frameworkError("Problem in store method of TDO preparing query!");
            }
        }
        /*
         * Now again the following code is the same whether we are doing an insert or an update.
         * Previous commit had duplicate code here.
         */
        for ($fcount = 0; $fcount < count($fields); $fcount++) {
            if (isset($values[$fcount])) {
                $connectedDb->bind($binders[$fcount], $values[$fcount]);
            }
        }
        if ($connectedDb->execute()) {
            if ($mode == 'insert') {
                $this->recordObject->$pk = $connectedDb->lastInsertId();
            }
            return $this;
        } else {
            /*
             * TODO - as always, real error handling, but also a better message indicating with the error was on insert
             * or update.
             */
            throw new frameworkError("error in inserting or updating tableDataObject");
        }
    }

    public function deleteFromDB()
    {
        global $connectedDb;
        $tablename = $this->tableName;
        $pk = $this->primaryKey;
        $pkval = $this->recordObject->$pk;

        $delsql = "delete from $tablename where $pk = '$pkval'";
        $connectedDb->prepare($delsql);
        if ($connectedDb->execute()) {
            foreach ($this as $property => $value) {
                unset($this->$property);
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Collect information about a given table and return it in a useful object format.
     *
     * @param $tablename
     * @return stdClass
     */
    protected static function getTableInfo($tablename)
    {
        $db = new Database();
        $columns = $db->getColumns($tablename);

        $output = new stdClass();

        $output->dataColumns = $columns;
        $output->tableName = $tablename;
        $output->primaryKey = $output->dataColumns->primaryKey;

        return $output;
    }
}
