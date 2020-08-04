<?php
class Modal extends CI_Controller {

    public function timeslotGenerator($start_time, $end_time, $gametime, $interval) {

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
        return $timeslot;

    }

    public function demo(){

        $themeList = [
            [
                'title' => "Game A", 
                'startime' => "13:00:00",
                'endtime'  => "22:00:00",
                'gametime' => "1",
                'interval' => "15",   
                'timeslot' => [],            
            ],
            [
                'title' => "Game B",                
                'startime' => "13:00:00",
                'endtime'  => "23:00:00",
                'gametime' => "2",
                'interval' => "15",          
                'timeslot' => [],                 
            ],
            [
                'title' => "Game C",                
                'startime' => "10:00:00",
                'endtime'  => "22:00:00",
                'gametime' => "1",
                'interval' => "30",          
                'timeslot' => [],                 
            ],
        ];

        foreach($themeList as $k=>$v) {

            $themeList[$k]['timeslot'] = $this->timeslotGenerator($v['startime'], $v['endtime'], $v['gametime'], $v['interval']);

        }


        $data = [
            'themeList' => $themeList
        ];

        $this->load->view("header");
        $this->load->view("modal", $data);
        $this->load->view("footer");


    }

}
?>