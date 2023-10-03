<?php

namespace Permissions;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Permissions\Console\Commands\AuthorizeSuperAdmin;
use Permissions\Console\Commands\PermissionMigrationCommand;
use Permissions\Console\Commands\PermissionsSeedCommand;

class PermissionServiceProvider extends ServiceProvider
{

    /**
     * The controller namespace for the application.
     *
     * @var string|null
     */
    protected $namespace = 'Permissions';

    public $helpers = [
        'helpers'
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

//       dd('roless', config('roless'));
        $this->registerHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishRoles();
        // register configs @author Amr
        $this->publishes([
            __DIR__ . '/../config/roles.php' => config_path('roles.php'),
//            __DIR__ . '/../config/roless.php' => config_path('roless.php'),
        ]);
        // register migrations @author Amr
//       $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');


//       $this->registerSeedsFrom(__DIR__ . '/../database/seeds');

//        if ($this->app->runningInConsole()) {
//            $this->commands([
//                PermissionsSeedCommand::class,
//                AuthorizeSuperAdmin::class,
//                PermissionMigrationCommand::class
//            ]);
//        }
    }


    public function sanitizePerms($array)
    {
        if (is_array($array))
            return array_map(function ($module) {
                return array_values(array_diff(array_keys(is_array($module) ? $module : []), ['index', 'store', 'update', 'status', 'ordering', 'delete-group', 'show-dialog', 'capacity']));
            }, $array);
        return null;
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            \Spatie\Permission\PermissionServiceProvider::class
        ];
    }

    /**
     * register package's helpers
     * @author Amr
     */
    function registerHelpers()
    {
        foreach ($this->helpers as $helper) {
            $helper_path = __DIR__ . '/Helpers/' . $helper . '.php';
            if (File::isFile($helper_path)) {
                require_once $helper_path;
            }
        }
    }

    /**
     * register seeders
     *
     * @param $path
     */
    protected function registerSeedsFrom($path)
    {
        foreach (glob("$path/*.php") as $filename) {
            include $filename;
            $classes = get_declared_classes();
            $class = end($classes);

            $command = Request::server('argv', null);
            if (is_array($command)) {
                $command = implode(' ', $command);
                if ($command == "artisan db:seed") {
                    Artisan::call('db:seed', ['--class' => $class]);
                }
            }

        }
    }


    /**
     * @param $array
     * @param $path
     * @param $value
     * @param $route
     * @param string $delimiter
     * @return mixed
     */
    function set_nested_array_value(&$array, $path, &$value, $route, $delimiter = '/')
    {
        $pathParts = explode($delimiter, $path);
        $current = &$array;
        foreach ($pathParts as $key) {
            $current = &$current[$key];
        }
        $backup = $current;
        $current = true;
        return $backup;
    }

    /**
     * @param $module
     * @return mixed
     */
    function getRolesWithPerms($module = null)
    {
        $roles = [];
        $value = [];
//        dd(collect(Route::getRoutes()->get()));
        foreach (collect(Route::getRoutes()->get()) as $route) {
            $this->set_nested_array_value($roles, $route->getName(), $value, $route, '.');
        }
        return $roles;
    }


    function roles()
    {
        $array = [];
        foreach ($this->getRolesWithPerms() as $key => $item) {
            $sanitized = $this->sanitizePerms($item);
            if ($sanitized)
                $array[$key] = $sanitized;
        }
        return $array;
    }


    function publishRoles()
    {
        $path = __DIR__ . '/../config/roles.php';
        $b = $this->roles();
        $fp = fopen($path, 'w');
        fwrite($fp, "<?php  return  " . var_export($b, true) . ";");
        fclose($fp);
    }
}
