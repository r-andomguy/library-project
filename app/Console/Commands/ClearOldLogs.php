<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClearOldLogs extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove registros de logs com mais de 30 dias';

    /**
     * Execute the console command.
     */
    public function handle () {
        $limitDate = Carbon::now()->subDays(30);
        $removedRecords = DB::table('logs')->where('created_at', '<', $limitDate)->delete();

        Log::info('Comando logs:clear executado. Registros removidos: ' . $removedRecords);

        $this->info('Registros antigos removidos: ' . $removedRecords);
    }
}
