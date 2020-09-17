<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class NabhToolsModuleSyncerCreateTasksStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'tasks',
        'title_column' => 'name',
        'translatable' => true,
        'versionable' => true,
        'trashable' => false,
        'searchable' => false,
        'sortable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'required' => true,
        ],
        'slug' => [
            'unique' => true,
            'required' => true,
        ],
        'task_id' => [
            'unique' => true,
            'required' => true,
        ],
        'last_run' => [
            'unique' => true,
        ],
        'task_commands' => [
            'required' => true,
        ]
        
    ];

}
