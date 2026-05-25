<?php

namespace App\Http\Middleware;

use App\Services\VisitorService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Catat hanya request GET sukses (bukan AJAX, bukan redirect)
        if (
            $request->isMethod('GET') &&
            !$request->ajax() &&
            $response->getStatusCode() === 200
        ) {
            VisitorService::record($request);
        }

        return $response;
    }
}
