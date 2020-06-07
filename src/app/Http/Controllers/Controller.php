<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $messages = [
        400 => 'Bad request. Please make sure that all mandatory params are provided within the request.',
        401 => 'Bad authentication.'
    ];

    public function getMessage($code) {
        return isset($this->messages[$code])? $this->messages[$code] : 'Not valid request.';
    }
}
