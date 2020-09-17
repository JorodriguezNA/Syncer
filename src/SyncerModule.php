<?php namespace NabhTools\SyncerModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class SyncerModule extends Module
{

    /**
     * The navigation display flag.
     *
     * @var bool
     */
    protected $navigation = true;

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-refresh';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'tasks' => [
            'buttons' => [
                'new_task',
                'view_tasks' => [
                    'href' => '/admin/syncer/tasks',
                ],
            ],
        ],
        'operators' => [
            'buttons' => [
                'new_operator',
            ],
        ],
    ];

}
