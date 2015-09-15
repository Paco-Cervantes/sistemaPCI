<?php namespace PCI\Mamarrachismo\PhoneParser\Interfaces;

interface PhoneParserInterface
{

    /**
     * Chequea y devuelve el telefono acomodado.
     * ej: 02123334422 -> (212)-333-4422
     * @param int $number
     * @return string
     */
    public function parseNumber($number);

    /**
     * Chequea y devuelve el telefono acomodado.
     * ej: algo1232224455xzx -> 1232224455
     * @param int $number
     * @return int
     */
    public function parseString($number);
}
