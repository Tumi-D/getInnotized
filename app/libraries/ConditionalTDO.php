<?php
/**
 * Created by PhpStorm.
 * User: bryan
 * Date: 7/12/2018
 * Time: 10:06
 */

class conditionalTDO extends tableDataObject {

    public function __construct( $conditions = null ) {
        global $connectedDb;

        // Have to do this to get the constant from the child class...
        $childClass = get_called_class();
        $tablename = $childClass::TABLENAME;

        /*
         * If $conditions is integer, or if no conditions specified,
         * act like a normal TDO object...
         */
        if($conditions === null || is_int($conditions)){
            parent::__construct($conditions);
        } else {

            if ( ! is_array( $conditions ) ) {
                throw new frameworkError( "conditionalTDO requires key:value array of conditions" );
            }

            /*
             * This next piece likely duplicates code from the getRecordByParams method...
             * which is no suprise since we are trying here to solve limitations in that
             * method based on six months of learning since that... ahem... beautiful function was
             * written.
             */
            $myTableInfo = self::getTableInfo( $tablename );
            $priK        = $myTableInfo->primaryKey;

            /*
             * We can determine right away if there is a uniqueness problem...
             */
            $this->isUniqueSafe($tablename,$priK,$conditions);


            /*
             * Next loop could be unsafe, as we are bypassing the power of prepared statements.
             * This is being done for speed.
             * TODO: REFACTOR THIS TO PROPERLY BIND PARAMETERS FOR QUERY.
             */
            foreach ( $conditions as $column => $value ) {
                $condarr[] = $column . " = '" . $value . "'";
            }
            $whereclause = implode( " and ", $condarr );
            $countQ      = "select count(" . $priK . ") from " . $tablename . " where ";
            $countQ      .= $whereclause;
            $connectedDb->prepare( $countQ );
            $recordcount = $connectedDb->fetchColumn();

            if ( $recordcount > 1 ) {
                throw new frameworkError( "Can't determine a unique record with the conditions '$whereclause'" );
            } elseif ( (int) $recordcount === 0 ) {
                $objectid = null;
            } else { // we know here that recordcount is 1 / we have a unique record
                $getidQ = "select " . $priK . " from " . $tablename . " where ";
                $getidQ .= $whereclause;
                $connectedDb->prepare( $getidQ );
                $objectid = $connectedDb->fetchColumn();
            }

            parent::__construct( $objectid );
        }
    }

    private function isUniqueSafe($tablename,$priK,$conditions){
        global $connectedDb;
        $connectedDb->prepare("select count($priK) from $tablename");
        $totalrecs = $connectedDb->fetchColumn();

        $columns      = implode( ", ", array_keys( $conditions ) );
        $columnclause = "group by " . $columns;
        $vfyUqQ       = "select $priK from $tablename $columnclause";
        $connectedDb->prepare( $vfyUqQ );
        $pkcount = count($connectedDb->resultSet());
        if ( $pkcount != $totalrecs ) {
            throw new frameworkError( "Cannot guarantee unique record from $tablename with columns $columns" );
        }
    }

}