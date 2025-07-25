<?php 
namespace Controller;

require_once __DIR__ . '/../Service/ExchangeService.php';

use Service\ExchangeService;

class ExchangeController
{
    public function convert(float $amount, string $from, string $to, float $rate): array
    {
        $service = new ExchangeService();
        return $service->convertCurrency($amount, $from, $to, $rate);
    }
}