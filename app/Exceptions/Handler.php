<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * render an exception into HTTP response.
     */
    public function render($request, \Throwable $exception)
    {
        if ($request->expectsJson()) {
            $response_code = 500;
            $response = [
                "status" => false,
                "message" => "Whoops, something went wrong..."
            ];

            if ($exception instanceof \Illuminate\Validation\ValidationException) {
                $response_code = 422;
                $response["message"] = "Please verify the information entered!";
                $response["errors"] = $exception->validator->errors();
            }

            if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
                $response_code = 401;
                $response["message"] = "Authentication required!";
            }

            if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                $response_code = 422;
                $response["message"] = "The entity does not exist!";
            }

            if (app()->hasDebugModeEnabled()) {
                $response["exception"] = get_class($exception);
                $response["file"] = $exception->getFile();
                $response["line"] = $exception->getLine();
                $response["message"] = $exception->getMessage();
                $response["trace"] = $exception->getTrace();
            }

            return response()->json($response, $response_code);
        }

        return parent::render($request, $exception);
    }
}
