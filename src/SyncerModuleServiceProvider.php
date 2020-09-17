<?php namespace NabhTools\SyncerModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use NabhTools\SyncerModule\Operator\Contract\OperatorRepositoryInterface;
use NabhTools\SyncerModule\Operator\OperatorRepository;
use Anomaly\Streams\Platform\Model\Syncer\SyncerOperatorsEntryModel;
use NabhTools\SyncerModule\Operator\OperatorModel;
use NabhTools\SyncerModule\Task\Contract\TaskRepositoryInterface;
use NabhTools\SyncerModule\Task\TaskRepository;
use Anomaly\Streams\Platform\Model\Syncer\SyncerTasksEntryModel;
use NabhTools\SyncerModule\Task\TaskModel;
use Illuminate\Routing\Router;

class SyncerModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Additional addon plugins.
     *
     * @type array|null
     */
    protected $plugins = [];

    /**
     * The addon Artisan commands.
     *
     * @type array|null
     */
    protected $commands = [];

    /**
     * The addon's scheduled commands.
     *
     * @type array|null
     */
    protected $schedules = [];

    /**
     * The addon API routes.
     *
     * @type array|null
     */
    protected $api = [];

    /**
     * The addon routes.
     *
     * @type array|null
     */
    protected $routes = [
        'admin/syncer/operators'           => 'NabhTools\SyncerModule\Http\Controller\Admin\OperatorsController@index',
        'admin/syncer/operators/create'    => 'NabhTools\SyncerModule\Http\Controller\Admin\OperatorsController@create',
        'admin/syncer/operators/edit/{id}' => 'NabhTools\SyncerModule\Http\Controller\Admin\OperatorsController@edit',
        'admin/syncer'           => 'NabhTools\SyncerModule\Http\Controller\Admin\TasksController@index',
        'admin/syncer/create'    => 'NabhTools\SyncerModule\Http\Controller\Admin\TasksController@create',
        'admin/syncer/edit/{id}' => 'NabhTools\SyncerModule\Http\Controller\Admin\TasksController@edit',
        'admin/syncer/run/{id}'  => 'NabhTools\SyncerModule\Http\Controller\Admin\TasksController@run',
        'admin/syncer/apirun/{id}'  => 'NabhTools\SyncerModule\Http\Controller\Admin\TasksController@apirun',
        'admin/syncer/apicheck/{id}'  => 'NabhTools\SyncerModule\Http\Controller\Admin\TasksController@checkTask',
    ];

    /**
     * The addon middleware.
     *
     * @type array|null
     */
    protected $middleware = [
        //NabhTools\SyncerModule\Http\Middleware\ExampleMiddleware::class
    ];

    /**
     * Addon group middleware.
     *
     * @var array
     */
    protected $groupMiddleware = [
        //'web' => [
        //    NabhTools\SyncerModule\Http\Middleware\ExampleMiddleware::class,
        //],
    ];

    /**
     * Addon route middleware.
     *
     * @type array|null
     */
    protected $routeMiddleware = [];

    /**
     * The addon event listeners.
     *
     * @type array|null
     */
    protected $listeners = [
        //NabhTools\SyncerModule\Event\ExampleEvent::class => [
        //    NabhTools\SyncerModule\Listener\ExampleListener::class,
        //],
    ];

    /**
     * The addon alias bindings.
     *
     * @type array|null
     */
    protected $aliases = [
        //'Example' => NabhTools\SyncerModule\Example::class
    ];

    /**
     * The addon class bindings.
     *
     * @type array|null
     */
    protected $bindings = [
        SyncerOperatorsEntryModel::class => OperatorModel::class,
        SyncerTasksEntryModel::class => TaskModel::class,
    ];

    /**
     * The addon singleton bindings.
     *
     * @type array|null
     */
    protected $singletons = [
        OperatorRepositoryInterface::class => OperatorRepository::class,
        TaskRepositoryInterface::class => TaskRepository::class,
    ];

    /**
     * Additional service providers.
     *
     * @type array|null
     */
    protected $providers = [
        //\ExamplePackage\Provider\ExampleProvider::class
    ];

    /**
     * The addon view overrides.
     *
     * @type array|null
     */
    protected $overrides = [
        //'streams::errors/404' => 'module::errors/404',
        //'streams::errors/500' => 'module::errors/500',
    ];

    /**
     * The addon mobile-only view overrides.
     *
     * @type array|null
     */
    protected $mobile = [
        //'streams::errors/404' => 'module::mobile/errors/404',
        //'streams::errors/500' => 'module::mobile/errors/500',
    ];

    /**
     * Register the addon.
     */
    public function register()
    {
        // Run extra pre-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Boot the addon.
     */
    public function boot()
    {
        // Run extra post-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Map additional addon routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        // Register dynamic routes here for example.
        // Use method injection or commands to bring in services.
    }

}
