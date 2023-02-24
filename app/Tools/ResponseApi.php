<?php

namespace App\Tools;

class ResponseApi {    /**
     * It returns a json string
     *
     * @param array data The data you want to return.
     * @param string message The message you want to display.
     * @param string status The status of the response.
     * @param array headers The headers to be sent with the response.
     * @param int code HTTP status code
     * *description*
     *  200 OK: Esto significa que todo ha ido bien y la solicitud se ha realizado con éxito.
     *  201 Created: Este caso aparece por ejemplo cuando nos registramos como usuario en una web y todo ha ido bien.
     *  204 No Content: En este caso la petición ha sido exitosa, pero no hay nada que devolver.
     *  400 Bad Request: La petición que ha realizado el usuario es incorrecta, por ejemplo en un endpoint que tengamos que enviar un email, el formato sea inválido.
     *  401 Unauthorized: Este caso ocurre cuando realizas una petición a un endpoint que requiere de autenticación.
     *  403 Forbidden: A diferencia del estado 401, aquí si puedes estar logueado pero no tener los permisos necesarios para realizar la acción.
     *  404 Not Found: El más mítico de todos :alegría:. Por ejemplo al intentar acceder a un endpoint o recurso inexistente.
     *  500 Internal Server Error: Cuando ocurre cualquier error del lado del servidor.
     * @return string A JSON string
     */
    public function __construct(){}
    public static  function json(array $data, string $message = '', string $status = 'success', int $code = 200,  array $headers = [ 'content-type' => 'application/json']){
        return [
            "status" => $status,
            "code" => $code,
            "message" => $message,
            "headers" => $headers,
            "data" => $data
        ];
    }}
?>
