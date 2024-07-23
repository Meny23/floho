<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro("result", function (?bool $status = null, ?string $message = null, ?int $http_status = null, $data = null) {
            $response = [
                "status" => $status ?? true,
            ];

            if (!is_null($data)) {
                $response["data"] = $data;
            };

            if (!is_null($message)) {
                $response["message"] = $message;
            }

            $http_status ??= $status || is_null($status) ? 200 : 406;

            return Response::json($response, $http_status);
        });
    }
}
