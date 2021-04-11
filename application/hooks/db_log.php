<?php
// Name of Class as mentioned in $hook['post_controller]
class Db_log {
    function __construct() {
        // Anything except exit() :P
    }
    // Name of function same as mentioned in Hooks Config
    function logQueries() {
        $CI = & get_instance();
        date_default_timezone_set("Asia/Bangkok");
        $filepath = APPPATH . 'logs/Query-log-' . date('Y-m-d') . '.php'; 
        

        $handle = fopen($filepath, "a+");                        

        $times = $CI->db->query_times;


        if(isset($CI->session->user_id)){
            $user_id = $CI->session->user_id;
        }else{
            $user_id = "SYSTEM";
        }

        // Create New table on every new month
        $month = date("Y_m");
        $db_table = "cas_query_log_" . $month;

        
        $CI->db_log = $CI->load->database('log', TRUE);
        $sql = "CREATE TABLE IF NOT EXISTS `" . $db_table . "` (
            `query_log_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `query` text NOT NULL,
            `executed_time` datetime NOT NULL,
            `time_taken` double NOT NULL,
            `excute_by` varchar(20) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $result = $CI->db_log->query($sql);

        foreach ($CI->db->queries as $key => $query) 
        { 
            $sql = $query . ";\n-- Execution Time: " . $times[$key];
            $sql .= "\n-- By user_id: " . $user_id; 

            fwrite($handle, $sql . "\n\n");    

            $CI->db_log->query('INSERT INTO ' . $db_table . '(`query`, `executed_time`, `time_taken`, `excute_by`) 
                            VALUES ("'.$query.'", "'.date('Y-m-d H:i:s').'", "'.$times[$key].'","'.$user_id.'")');

        }

        fclose($handle);  
    }

}