<?php

function createResponse($status, $message, $data=null)
{
    return [
        'success' => $status,
        'message' => $message,
        'responseData' => $data
    ];
}

 ?>
