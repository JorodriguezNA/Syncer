<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class NabhToolsModuleSyncerCreateSyncerFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name' => 'anomaly.field_type.text',
        'slug' => [
            'type' => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name',
                'type' => '_'
            ],
        ],
        'task_id' => 'anomaly.field_type.text',
        'task_commands' => 'anomaly.field_type.textarea',
        'last_run' => [
            'type' => 'anomaly.field_type.datetime',
            'config' => [
                "mode" => 'datetime',
                "default" => "now",
                "picker" => "true"
            ],
        ],
        'selected_users' => [
        	'type' => 'anomaly.field_type.relationship',
        	'config' => [
        		'related' => '\Anomaly\UsersModule\User\UserModel',
				'mode' => 'lookup',
        		'key_name' => 'id',
        	],
        	
        ],
        'is_operator' => [
        	'type' => 'anomaly.field_type.boolean',
        	'config' => [
        		'default_value' => true,
        		'mode' => 'switch',
        		'label' => ' Is this user authorized to run update scripts?',
        	],
        ],
    ];

}
