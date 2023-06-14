<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteInactiveTenants extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:delete-inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete tenants with no new data in the past year';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Tenant::query()
            ->whereDoesntHave('xpEntries', function ($query) {
                $query->where('created_at', '>=', Carbon::now()->subYear());
            })
            ->delete();

        $this->info('Inactive tenants have been deleted.');
    }
}
