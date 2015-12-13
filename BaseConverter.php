<?php

/**
 * Convert a number from one base to another.
 */
class BaseConverter
{
    protected $inputNumber;
    protected $inputBase;
    protected $outputBase;

    public function __construct(
        $inputNumber = null,
        $inputBase = null,
        $outputBase = null)
    {
        $this->inputNumber = $inputNumber;
        $this->inputBase = $inputBase;
        $this->outputBase = $outputBase;
    }

    /**
     * Convert the number.
     *
     * @return string
     */
    public function convert()
    {
        return base_convert(
            $this->inputNumber,
            $this->inputBase,
            $this->outputBase
        );
    }

    /**
     * Set input number.
     *
     * @param  mixed  $number
     * @return void
     */
    public function setInputNumber($number)
    {
        $this->inputNumber = (string) $number;
    }

    /**
     * Set input base.
     *
     * @param  mixed  $base
     * @return void
     */
    public function setInputBase($base)
    {
        $this->inputBase = $base;
    }

    /**
     * Set output base.
     *
     * @param  mixed  $base
     * @return void
     */
    public function setOutputBase($base)
    {
        $this->outputBase = $base;
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
