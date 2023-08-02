<?php

namespace App\Helpers;

class ValidationErrorsHelper
{
    public static function formatErrors($validator)
    {
        $errors = [];

        foreach ($validator->errors()->all() as $error) {
            $errors[] = $error;
        }

        return $errors;
    }
}
