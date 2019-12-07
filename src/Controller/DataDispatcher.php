<?php
namespace App\Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Controller\Base as BaseController;

class DataDispatcher extends BaseController
{
    public function __construct($container)
    {
        parent::__construct($container);
    }

    public function getData(Request $request, Response $response, array $args)
    {
        $sql = $this->database->prepare('SELECT * FROM datos WHERE id > :id;');
        $sql->execute(array('id' => 1));
        $resultado = $sql->fetchAll();

        $responseBody = "<pre />";

        foreach ($resultado as $row) {
            $responseBody .= "ID: ".$row["Id"]."\tTemperatura ".$row["Temperatura"]."\tHora: ".$row["Hora"]."\n";
        }

        $response->getBody()->write($responseBody);

        return $response;
    }
}