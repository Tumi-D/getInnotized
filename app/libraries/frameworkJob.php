<?php
/**
 * Created by PhpStorm.
 * User: astro
 * Date: 06-Jan-18
 * Time: 12:05
 */

class frameworkJob extends tableDataObject {
    const TABLENAME = 'marketplacejobs';

    public function activate() {
        $jobrecord =& $this->recordObject;

        if (!isset($jobrecord->queuedata)) {
            $totalwork = $this->getInitialBatch();
            $jobrecord->numtoprocess = count($totalwork);
            $jobrecord->queuedata = serialize($totalwork);

            /*
             * Implementing logging here, at the start of scheduled
             * jobs, and also below in endbatch() for the completion
             * of them.
             */
            new Logger(
                "Starting run of $jobrecord->jobname with $jobrecord->numtoprocess units.",
                "system - scheduled"
            );
        }



        $jobrecord->active = true;
        $jobrecord->queuewait = false;
        $this->store();
        $runresult = $this->run();

        // end of queue, asses and store the job...
        if (count(unserialize($jobrecord->queuedata)) > 0) {
            // still pending work
            $jobrecord->queuewait = 1;
        } else {
            // work finished
            $this->endbatch($jobrecord);
        }
        $this->store();

        print_r($this);
    }

    public function endbatch($jobrecord) {
        /*
         * Log the end of the scheduled job run.
         */
        new Logger(
            "Completed run of $jobrecord->jobname - processed $jobrecord->processed units.",
            "system - scheduled"
        );

        $jobrecord->queuewait = null;
        $jobrecord->processed = null;
        $jobrecord->lastrun = date('Y-m-d H:i:s');
        $jobrecord->lastprocessed = null;
        $jobrecord->queuedata = null;
        $jobrecord->numtoprocess = null;
        if ($jobrecord->deactivateafter == 1) {
            $jobrecord->active = 0;
        }
        if (isset($jobrecord->triggerjob)) {
            $jobtotrigger = new frameworkJob($jobrecord->triggerjob);
            $jobtotrigger->recordObject->active = 1;
            $jobtotrigger->store();
        }
    }


    /*
     * overriding the store() method to pass in a flag to force nulls!
     */
    public function store($forenulls = true) {
        parent::store($forenulls);
    }

    // ------------------------------------------------------------

    public static function getNext() {
        global $connectedDb;
        $waitingq = "select * from " . self::TABLENAME .  " where queuewait = 1 order by lasttimestamp limit 1";
        $connectedDb->prepare($waitingq);



        /*
    	 * First, grab the oldest job from the queue; if the queue is empty, then grab
    	 * the job next scheduled to run...
    	 */
        if ($nextjob = $connectedDb->singleRecord()) {
            return $nextjob;
        } else {
            $nextactiveq = "select * from " . self::TABLENAME . " where 
					 (lastrun < (date_sub(now(),interval frequencyminutes MINUTE)) or lastrun is null) and active = 1 order by lastrun limit 1";
            $connectedDb->prepare($nextactiveq);

            /*
             * this will either return the next job or null
             */
            return $connectedDb->singleRecord();
        }
    }

    public static function getTaskStatus($taskmethod){
        $taskrecord = frameworkJob::getRecordByParams('marketplacejobs',['jobmethod'=>$taskmethod]);
        if($taskrecord->active != 1) {
            $taskstatus = 'inactive';
        } elseif($taskrecord->queuewait === null){
            $taskstatus = 'idle';
        } elseif($taskrecord->queuewait == 0){
            $taskstatus = 'active, processing';
        } elseif($taskrecord->queuewait == 1){
            $taskstatus = 'active, waiting on queue';
        } else {
            $taskstatus = 'unknown status';
        }
        return $taskstatus;
    }
}
