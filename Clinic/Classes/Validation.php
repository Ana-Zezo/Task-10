<?php

class Validation
{
    public $errors = array();

    public function isEmpty(string $value)
    {
        if (empty($value)) {
            return true;
        } else {
            return false;
        }
    }
    private function minVal(string $value, int $length)
    {
        if (strlen($value) < $length) {
            return true;
        } else {
            return false;
        }
    }
    private function maxVal(string $value, int $length)
    {
        if (strlen($value) > $length) {
            return true;
        } else {
            return false;
        }
    }
    // name
    public function isValid(string $key, string $value, int $min, $max)
    {
        
        $firstUpper = ucfirst($key);
        if ($this->isEmpty($value)) {
            $errors[$key] = "$firstUpper Is Required Value";
            return $errors[$key];
        } else if ($this->minVal($value, $min)) {
            $errors[$key] = "$firstUpper Is Less Than $min";
            return $errors[$key];
        } else if ($this->maxVal($value, $max)) {
            $errors[$key] = "$firstUpper Is Greater Than $max";
            return $errors[$key];
        }
    }
    private function emailVal(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    public function isValidEmail($key, string $value)
    {
        if ($this->isEmpty($value)) {
            $firstUpper = ucfirst($key);
            $errors[$key] = "$firstUpper $firstUpper Is Required";
            return $errors[$key];
        } else if ($this->emailVal($value)) {
            $firstUpper = ucfirst($key);
            $errors[$key] = "$firstUpper Is Invalid";
            return $errors[$key];
        }
    }
    public function dateVal(string $date, $format = "Y-m-d")
    {
        $dateTime = DateTime::createFromFormat($format, $date);
        return $dateTime && $dateTime->format($format) === $date;
    }
}