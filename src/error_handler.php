<?php

namespace ptk\log;

function error_handler(int $errno, string $errstr, string $errfile, int $errline): void {
    switch ($errno){
        case E_COMPILE_WARNING:
        case E_CORE_WARNING:
        case E_DEPRECATED:
        case E_RECOVERABLE_ERROR:
        case E_USER_DEPRECATED:
        case E_USER_WARNING:
        case E_WARNING:
            warn(
                '%msg (%file:%line)',
                [
                    '%msg' => $errstr,
                    '%file' => $errfile,
                    '%line' => $errline
                ]
            );
            break;
        
        case E_ALL:
        case E_COMPILE_ERROR:
        case E_CORE_ERROR:
        case E_ERROR:
        case E_PARSE:
        case E_STRICT:
        case E_USER_ERROR:
            error(
                '%msg (%file:%line)',
                [
                    '%msg' => $errstr,
                    '%file' => $errfile,
                    '%line' => $errline
                ]
            );
            exit($errno);
        
        case E_NOTICE:
        case E_USER_NOTICE:
            notice(
                '%msg (%file:%line)',
                [
                    '%msg' => $errstr,
                    '%file' => $errfile,
                    '%line' => $errline
                ]
            );
            break;
        default:
            info(
                '%msg (%file:%line)',
                [
                    '%msg' => $errstr,
                    '%file' => $errfile,
                    '%line' => $errline
                ]
            );
            break;
    }
}