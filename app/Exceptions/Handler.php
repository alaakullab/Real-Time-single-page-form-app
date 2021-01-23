<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function report(Throwable $e)
    {
        parent::report($e);
    }

    public function render($request, Throwable $e)
    {
        if($e instanceof TokenBlacklistedException){
            return response(['error'=> 'Token can not be used, get new one', 500]);
        }elseif($e instanceof TokenInvalidException){
            return response(['error'=> 'Token is invalid', 500]);
        }elseif($e instanceof TokenExpiredException){
            return response(['error'=> 'Token is ecpired', 500]);
        }elseif($e instanceof JWTException){
            return response(['error'=> 'Token is not provided', 500]);
        }

        return parent::render($request, $e);
    }
}
