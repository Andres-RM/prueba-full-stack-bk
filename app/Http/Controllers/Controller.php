<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $statusResponseError = '422';

    protected $errorsResponse = [];

    protected $messageResponseError = '';

    protected $messageResponse = '';

    protected $arrayResponse = [];

    protected function getErrors()
    {
        return [
            'errors' => $this->errorsResponse,
            'message' => $this->messageResponseError,
            'status' => $this->statusResponseError
        ];
    }

    protected function addToErrorResponse(string $key,string $value)
    {
        if (array_key_exists($key,$this->errorsResponse))
            $this->errorsResponse[$key] = array_push($this->errorsResponse[$key],$value);
        else
            $this->errorsResponse[$key] = [$value];
    }


    protected function addResponseElement($key, $value)
    {
        $this->arrayResponse[$key] = $value;
    }

    protected function getResponseFormat()
    {
        if ($this->messageResponse)
            $this->arrayResponse['message'] = $this->messageResponse;
        return $this->arrayResponse;
    }
}
