<?php

namespace App\API;

class messageError
{
    public static function erroMessage($message) 
    {
        return [
            'message' => $message
        ];
    }
}