<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class NabhToolsModuleSyncerCreateOperatorsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'operators',
        'title_column' => 'name',
        'translatable' => true,
        'versionable' => false,
        'trashable' => false,
        'searchable' => false,
        'sortable' => false,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'translatable' => false,
            'required' => true,
        ],
        'slug' => [
            'unique' => true,
            'required' => true,
        ],
        'selected_users' => [
            "required" => true,
        ],
        'is_operator',
    ];

}
