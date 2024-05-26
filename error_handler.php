<?php
function error_handler($errno, $errstr, $errfile, $errline, $errcontext) {
    $error_message = "Gabim [$errno]: $errstr\n";
    $error_message .= "File: $errfile, Rreshti: $errline\n";
    $error_message .= "Konteksti: " . print_r($errcontext, true) . "\n";
    
    echo nl2br($error_message);
    
    $file = fopen('error_log.txt', 'a');
    fwrite($file, $error_message);
    fclose($file);
}

set_error_handler("error_handler");
?>