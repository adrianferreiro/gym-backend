<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

Class Cors implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verifica si es una solicitud CORS
        if ($request->getMethod() === 'OPTIONS' && $request->hasHeader('Origin')) {
            return;
        }

        // Configura los encabezados de respuesta CORS
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }

public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Configura los encabezados de respuesta CORS utilizando el objeto de respuesta
        return $response
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', 'X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
    }

}