<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Request;
use Throwable;

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
        'current_password',
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
//        $this->reportable(function (Throwable $e) {
//            echo "<!-- ";
//            print_r($e);
//            echo " -->";
//        });
        // // redirects user to login page if csrf token expires
        $this->renderable(function(\Exception $e,$request){

            if($e->getPrevious() instanceof TokenMismatchException) {
                if($request->ajax()){
                    return response()->json(["redirect" => route('user.login'), "message" => "Session Expired"]);
                }
                else
                    return redirect()->route('user.login');
            }
        });

    }
   

}
