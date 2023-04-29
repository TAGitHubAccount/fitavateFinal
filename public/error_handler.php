<?php

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    $logFile = '.\error.log';

    $now = new \DateTime();
    $nowFormatted = $now->format('h:ia');

    $error = "Error occurred at $nowFormatted" . PHP_EOL;
    $error .= "Number: $errno" . PHP_EOL;
    $error .= "Message: $errstr" . PHP_EOL;
    $error .= "File: $errfile" . PHP_EOL;
    $error .= "Line: $errline" . PHP_EOL;
    $error .= PHP_EOL;

    file_put_contents($logFile, $error, FILE_APPEND);
    return true;
});
