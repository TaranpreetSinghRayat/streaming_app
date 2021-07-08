<?php

function fix_path($path){
    return str_replace('\\', '/', $path);
}

function timestamp(){
    return date('Y-m-d H:i:s');
}

function get_ip(){
    if (function_exists('apache_request_headers')) {
        $headers = apache_request_headers();
    } else {
        $headers = $_SERVER;
    }
    if (array_key_exists('X-Forwarded-For', $headers) && filter_var($headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $IP = $headers['X-Forwarded-For'];
    } else if (array_key_exists('HTTP_X_FORWARDED_FOR', $headers) && filter_var($headers['X-HTTP_X_FORWARDED_FOR-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        $IP = $headers['HTTP_X_FORWARDED_FOR'];
    } else {
        $IP = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
    return $IP;
}

function ip_lookup($ip = null){
    if(!is_null($ip)){
        $user_ip = $ip;
        $ipData = json_decode(file_get_contents("http://extreme-ip-lookup.com/json/$user_ip"));
        return $ipData;
    }
    return false;
}

function run_process($cmd,$outputFile = '/dev/null', $append = false){
    $pid=0;
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {//'This is a server using Windows!';
        $cmd = 'wmic process call create "'.$cmd.'" | find "ProcessId"';
        $handle = popen("start /B ". $cmd, "r");
        $read = fread($handle, 200); //Read the output
        $pid=substr($read,strpos($read,'=')+1);
        $pid=substr($pid,0,strpos($pid,';') );
        $pid = (int)$pid;
        pclose($handle); //Close
    }else{
        $pid = (int)shell_exec(sprintf('%s %s %s 2>&1 & echo $!', $cmd, ($append) ? '>>' : '>', $outputFile));
    }
    return $pid;
}

function is_process_running($pid){
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {//'This is a server using Windows!';
        //tasklist /FI "PID eq 6480"
        $result = shell_exec('tasklist /FI "PID eq '.$pid.'"' );
        if (count(preg_split("/\n/", $result)) > 0 && !preg_match('/No tasks/', $result)) {
            return true;
        }
    }else{
        $result = shell_exec(sprintf('ps %d 2>&1', $pid));
        if (count(preg_split("/\n/", $result)) > 2 && !preg_match('/ERROR: Process ID out of range/', $result)) {
            return true;
        }
    }
    return false;
}

function stop_process($pid){
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {//'This is a server using Windows!';
        $result = shell_exec('taskkill /PID '.$pid );
        if (count(preg_split("/\n/", $result)) > 0 && !preg_match('/No tasks/', $result)) {
            return true;
        }
    }else{
        $result = shell_exec(sprintf('kill %d 2>&1', $pid));
        if (!preg_match('/No such process/', $result)) {
            return true;
        }
    }
}