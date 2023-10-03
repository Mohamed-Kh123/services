<?php

namespace Permissions\Console\Commands;

use Illuminate\Console\Command;
class PermissionsSeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:seed {--guard=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command seeds all permission\'s seeds files';

    const DEFAULT_GUARD = 'admin-api';

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
    public function handle(\PermissionTableSeeder $tableSeeder)
    {
        try {
            $tableSeeder->run($this->option('guard') ? $this->option('guard') : static::DEFAULT_GUARD);
            $this->info('Seeds have been updated successfully ...');
        } catch (\Exception $exception) {
            $this->error('Something went wrong while seeding permissions');
        }
    }
}
