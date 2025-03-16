<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class SystemInstall
 * @package App\Console\Commands
 */
class SystemInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setups system environment. NOTE: Do not run this command in production';

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
     * @return void
     */
    public function handle()
    {
        $this->info('checking system status');
        $this->warn('Optimizing application');
        $this->warn('migration started...');
        $this->call('migrate:fresh');
        $this->info('migration done...');
        $this->warn('Seeding');
        $this->call('db:seed');
        $this->warn('Housekeeping');
        $this->alert('Hoorah! Your environment is completely setup');
    }
}
