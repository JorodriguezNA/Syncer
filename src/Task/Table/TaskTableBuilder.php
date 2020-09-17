<?php namespace NabhTools\SyncerModule\Task\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class TaskTableBuilder extends TableBuilder
{

    /**
     * The table views.
     *
     * @var array|string
     */
    protected $views = [];

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'name',
        'task_id',
        'last_run'
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
        'run' => [
            'type' => 'success',
            'text' => 'Run',
            'icon' => 'fa fa-refresh',
            'href' => '/admin/syncer/run/{entry.id}'
        ]
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
