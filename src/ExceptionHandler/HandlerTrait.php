<?php

namespace Blumen\ExceptionHandler;

use Exception;

trait HandlerTrait {
    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     * @return void
     */
    public function report(Exception $e)
    {
        return;
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // Define the response
        if ($e->getMessage() != "") $message = $e->getMessage();
        else $message = $e->getMessage();

        $data = ['message' => $message];

        // If the app is in debug mode
        if (env('APP_DEBUG')) {
            // Add the exception class name, message and stack trace to response
            $data['exception'] = get_class($e); // Reflection might be better here
            $data['trace'] = $e->getTrace();
        }

        // Return a JSON response with the response array and status code
        if (method_exists($e, 'getStatusCode')) $statusCode = $e->getStatusCode();
        else $statusCode = 500;

        return response()->json($data, $statusCode);
    }
}