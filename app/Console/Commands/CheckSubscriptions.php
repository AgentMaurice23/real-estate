<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Carbon\Carbon;

class CheckSubscriptions extends Command
{
    protected $signature = 'subscriptions:check';
    protected $description = 'Check and deactivate expired subscriptions';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $subscriptions = Subscription::where('end_date', '<', Carbon::now())->get();

        foreach ($subscriptions as $subscription) {
            // Mettez à jour l'état ou supprimez l'entrée de l'abonnement si nécessaire
            $subscription->delete();
        }

        $this->info('Expired subscriptions have been checked and handled.');
    }
}
