<?php


namespace Permissions\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PermissionMigrationCommand extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'permissions:migrate';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'this command migrate all permission\'s migration files';

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
    $migrationPath = base_path('Packages' . DIRECTORY_SEPARATOR . 'Permissions' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations');
    $migrationFiles = glob("$migrationPath" . DIRECTORY_SEPARATOR . "*.php");
    foreach ($migrationFiles as $filename) {
      try {
        Artisan::call('migrate:refresh', array('--path' => str_replace(base_path('') . DIRECTORY_SEPARATOR, '', $filename)));
      } catch (\Exception $exception) {
      }
    }
    $this->info('Migrations have been updated successfully ...');
  }
}
