<?php

namespace App;

/**
 * Convert a number from one base to another.
 */
class BaseConverter
{
    protected $inputNumber;
    protected $inputBase;
    protected $outputBase;

    public function __construct(
        $inputNumber = '',
        $inputBase = 0,
        $outputBase = 0)
    {
        $this->setInputNumber((string) $inputNumber);
        $this->setInputBase((float) $inputBase);
        $this->setOutputBase((float) $outputBase);
    }

    /**
     * Convert the number.
     *
     * @return string
     */
    public function convert()
    {
        if (empty($this->inputNumber)) {
            return '0';
        }

        return base_convert(
            $this->inputNumber,
            $this->inputBase,
            $this->outputBase
        );
    }

    /**
     * Convert number using uppercase alpha digits.
     *
     * @return string
     */
    public function convertToUpper()
    {
        return $this->toUpper($this->convert());
    }

    /**
     * Set input number.
     *
     * @param  string  $number
     * @return void
     */
    public function setInputNumber($number)
    {
        $this->inputNumber = (string) $number;
    }

    /**
     * Set input base.
     *
     * @param  float  $base
     * @return void
     */
    public function setInputBase($base)
    {
        $this->inputBase = (float) $base;
    }

    /**
     * Set output base.
     *
     * @param  float  $base
     * @return void
     */
    public function setOutputBase($base)
    {
        $this->outputBase = (float) $base;
    }

    /**
     * Convert number to uppercase.
     *
     * @param  mixed  $number
     * @return string
     */
    private function toUpper($number)
    {
        $digits = array_map(function($digit) {
            return strtoupper($digit);
        }, str_split($number));

        return (implode('', $digits));
    }
}
