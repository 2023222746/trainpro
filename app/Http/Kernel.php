protected $routeMiddleware = [
    // ... other middleware
    'auth' => \App\Http\Middleware\Authenticate::class,
    // ... 
    'role' => \App\Http\Middleware\CheckRole::class,   // <-- add this line
];
