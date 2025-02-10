<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use PDO;
use Symfony\Component\HttpFoundation\Response;

class EnsureDatabaseExists {
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle (Request $request, Closure $next): Response {
        try {
            DB::connection()->getPdo();
        } catch (Exception $e) {
            $this->createDatabase();
        }

        return $next($request);
    }

    protected function createDatabase () {
        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');

        try {
            $pdo = new PDO('mysql:host=' . $host, $username, $password);
            $pdo->exec('CREATE DATABASE IF NOT EXISTS ' . $database . ' CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');

            config(['database.connections.mysql.database' => $database]);
            Artisan::call('migrate --seed');
        } catch (Exception $e) {
            abort(500, 'Erro ao criar o banco de dados: ' . $e->getMessage());
        }
    }
}
