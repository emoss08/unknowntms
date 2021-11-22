<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class RunScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'System command to start the process for all schedule jobs to run.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Running all scheduled jobs...');

        return Command::SUCCESS;
    }
}
