<?php

use App\Controllers\Front\HomeController;
use App\Controllers\Back\DashboardController;

return [
    '/' => [HomeController::class, 'index'],
    '/dashboard' => [DashboardController::class, 'index']
];
