# Exception Handler

Exception handler trait for lumen.

## Usage Instructions

First, create a Handler class that extends lumen ExceptionHandler class
```
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {
    use HandlerTrait;
}
```

Then register in /bootstrap/app.php the new class to the lumen service container:
```
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);
```

Thrown exceptions will now be catched by that middleware and sent as a message to the client.
You also have some httpresponse codes in a constant class called CustomExceptionsConstants.
```
class CustomExceptionsConstants {
    const OK = 200;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const UNPROCESSABLE_ENTITY = 422;
    const INTERNAL_SERVER_ERRROR = 500;
    const SERVICE_UNAVAILABLE = 503;
}
```
You could use them in the abort($code, $message); helper function provided by lumen.

## Installing

All you need is to add the dependency to your composer.json file.

```
Give the example
```

