<?php 
namespace Util;

class CurrencySymbol
{
    public static function getSymbol(string $currency): string
    {
        $symbols = [
            'USD' => '$',
            'BRL' => 'R$',
            'EUR' => '€'
        ];

        return $symbols[$currency] ?? '';
    }
}