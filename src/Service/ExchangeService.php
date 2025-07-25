<?php 
namespace Service;

require_once __DIR__ . '/../Util/CurrencySymbol.php';

use Util\CurrencySymbol;

class ExchangeService
{
    public function convertCurrency(float $amount, string $from, string $to, float $rate): array
    {
        $converted = $amount * $rate;
        $convertedFormatted = number_format($converted, 2, ',', '.');

        $symbol = CurrencySymbol::getSymbol($to);

        return [
            'valorConvertido' => $convertedFormatted,
            'simboloMoeda' => $symbol
        ];
    }
}