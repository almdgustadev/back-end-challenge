<?php
/**
 * Back-end Challenge.
 *
 * PHP version 7.4
 *
 * Este será o arquivo chamado na execução dos testes automátizados.
 *
 * @category Challenge
 * @package  Back-end
 * @author   Gustavo de Almeida Oliveira <almdgusta@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     https://github.com/apiki/back-end-challenge
 */
declare(strict_types=1);

require __DIR__ . '/Controller/ExchangeController.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$pattern='#^/exchange/([\d.]+)/([A-Z]{3})/([A-Z]{3})/([\d.]+)$#';

if ($method === 'GET' && preg_match($pattern, $uri, $matches)) {
    $amount = (float)$matches[1];
    $from = $matches[2];
    $to = $matches[3];
    $rate = (float)$matches[4];

    $controller = new \Controller\ExchangeController();
    $response = $controller->convert($amount, $from, $to, $rate);

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Rota não encontrada ou inválida']);
}
