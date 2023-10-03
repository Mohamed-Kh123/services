<?php


namespace Permissions\Console\Commands;


use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Permissions\Models\Permission;

class AuthorizeSuperAdmin extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'permissions:authorize {--email=} {--guard=}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'This command grants admin the permissions according to his email';

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
  public function handle()
  {
    $email = $this->option('email');
    if (!$email) {
      $this->error('Admin email is required');
      return;
    }
    $guard = $this->option('guard') ? $this->option('guard') : static::DEFAULT_GUARD;
    $countOfPermissions = Permission::where(['guard_name' => $guard])->count();
    if(!$countOfPermissions){
      $this->error('"'.$guard.'" is an invalid guard');
      return;
    }
    $admin = Admin::where(['email' => $email])->firstOrFail();
    $permissions = \Spatie\Permission\Models\Permission::where(['guard_name' => $guard])->get();
    try{
      $admin->syncPermissions($permissions);
    }catch (\Exception $exception){
      $this->error($exception->getMessage());
    }

    $this->info('Admin "' . $email . '" has been granted the permissions');
  }
}
