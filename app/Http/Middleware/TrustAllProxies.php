<?php

// app/Http/Middleware/TrustAllProxies.php
namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class TrustAllProxies extends Middleware
{
    protected $proxies;

    public function __construct(Application $app, Request $request)
    {
        parent::__construct($app, $request);

        $this->proxies = '*';
    }
}

