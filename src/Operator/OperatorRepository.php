<?php namespace NabhTools\SyncerModule\Operator;

use NabhTools\SyncerModule\Operator\Contract\OperatorRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class OperatorRepository extends EntryRepository implements OperatorRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var OperatorModel
     */
    protected $model;

    /**
     * Create a new OperatorRepository instance.
     *
     * @param OperatorModel $model
     */
    public function __construct(OperatorModel $model)
    {
        $this->model = $model;
    }
}
