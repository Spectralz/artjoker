<?php

namespace classes;

use Throwable;

class Logger extends \Exception
{
    public static $errorArgs;
    public static $errorFile;
    public static $errorLine;
    public static $ip;
    public static $errorMessage;
    public static $type;


    public function __construct($type = "" , $message = "",$code = 0, Throwable $previous = null )
    {

        parent::__construct($message, $code, $previous);
        $info = debug_backtrace();
        if(isset($info['1']['args'])){
            $c = $info['1']['args'];
            self::$errorArgs = json_encode($c);
        }else{
            self::$errorArgs = 'null';
        }
        self::$errorFile = $this->getFile();
        self::$errorLine = $this->getLine();
        self::$errorMessage = $this->getMessage();
        self::$type = $type;
        self::$ip = $_SERVER['REMOTE_ADDR'];
    }

    // catch Exceptions
    public function log()
    {
        $time = date('d-m-Y H:i:s');
        $text_error = $time.";\t IP: ".self::$ip.";\t".self::$type.": ".self::$errorMessage." - args:".self::$errorArgs.";\t Line: ".self::$errorLine.";\t File: ".self::$errorFile;
        error_log($text_error.PHP_EOL, 3 , "eror_log.txt");
    }

    // catch 'Not catch' Exceoptions
    public static function traceLog($message , $trace)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = date('d-m-Y H:i:s');
        $text_error = $time.";\t IP: ".$ip.";\t Message: ".$message.";\t Info: ".$trace;
        error_log($text_error.PHP_EOL, 3 , "eror_fatal_log.txt");

    }

}