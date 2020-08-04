<?php
class Interval extends CI_Controller {

    public function demo() {

        $start_time = "13:00:00"; //time
        $end_time   = "23:00:00"; //time
        $gametime   = "1"; //hour
        $interval   = "15"; //minutes

        $stt = explode(":", $start_time);
        $ett = explode(":", $end_time); 

        $gt  = $gametime * 3600; //seconds
        $itt = $interval * 60;   //seconds

        $start_time_ts = mktime($stt[0], $stt[1], $stt[2], 1, 1, 2020); //seconds
        $end_time_ts = mktime($ett[0], $ett[1], $ett[2], 1, 1, 2020); //seconds

        $timeslot = [];
        for($i=$start_time_ts; $i <= $end_time_ts; $i=$i+$gt+$itt) {

            $starting = date("H:i", $i);
            $endding  = date("H:i", $i+$gt);

            $timeslot[] = [
                'starttime' => $starting,
                'endtime'   => $endding,
            ];

        }


        foreach($timeslot as $v) {
        ?>
        <div style="border:1px solid black; padding:10px; margin:5px">
            <?=$v['starttime']?> ~ <?=$v['endtime']?>
        </div>
        <?php
        }
        // echo json_encode($timeslot);



    }

}
?>