<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Tymon\JWAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /*git public function report(Exception $exception) {

        parent::report($exception);
    }*/

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->renderable(function (Exception $e, $request) {
            if ($e instanceOf TokenInvalidException){
                return response()->json('Token is invalid', 400);
            }
        });

    }

   /* public function render($request, Exception $exception) {

        if ($exception instanceOf TokenInvalidException){
            return response()->json('Token is invalid');
        }
    } */
}
