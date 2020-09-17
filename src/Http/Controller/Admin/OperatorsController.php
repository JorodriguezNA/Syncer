<?php namespace NabhTools\SyncerModule\Http\Controller\Admin;

use NabhTools\SyncerModule\Operator\Form\OperatorFormBuilder;
use NabhTools\SyncerModule\Operator\Table\OperatorTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class OperatorsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param OperatorTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(OperatorTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param OperatorFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(OperatorFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param OperatorFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(OperatorFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
