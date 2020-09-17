<?php namespace NabhTools\SyncerModule\Task;

use NabhTools\SyncerModule\Task\Contract\TaskRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class TaskRepository extends EntryRepository implements TaskRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var TaskModel
     */
    protected $model;

    /**
     * Create a new TaskRepository instance.
     *
     * @param TaskModel $model
     */
    public function __construct(TaskModel $model)
    {
        $this->model = $model;
    }
}
