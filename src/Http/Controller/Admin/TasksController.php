<?php namespace NabhTools\SyncerModule\Http\Controller\Admin;

use NabhTools\SyncerModule\Task\Form\TaskFormBuilder;
use NabhTools\SyncerModule\Task\Table\TaskTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use NabhTools\SyncerModule\Task\Contract\TaskInterface;
use Anomaly\Streams\Platform\Model\Syncer\SyncerTasksEntryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class TasksController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param TaskTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TaskTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param TaskFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TaskFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param TaskFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TaskFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    public function run($id)
    {
        $taskInfo = DB::table('syncer_tasks')->where('id', $id)->first();

        return $this->view->make('module::admin/taskrun', ['task_info' => $taskInfo]);
    }

    public function apirun($id)
    {
        $resourcePath = realpath(__DIR__.'/../../../../resources/data');

        $dirRoute = str_replace("/public", "/", $_SERVER['DOCUMENT_ROOT']);
        //echo $dirRoute .'git push origin master <br />';
        //echo shell_exec('git pull origin master 2>&1');
        $setDate = Date('Y-m-d G:i:s');
        $updateTime = DB::table('syncer_tasks')->where('id', $id)->update(['last_run' => $setDate]);
        $taskInfo = DB::table('syncer_tasks')->where('id', $id)->first();
        $commands = explode("\r\n", $taskInfo->task_commands);
        //echo Artisan::call('assets:clear');
        //exit;
        shell_exec('cd '. $dirRoute);
        
        if(file_exists($dirRoute.'synctask_'.$id.'.sh'))
        {
            unlink($dirRoute.'synctask_'.$id.'.sh');
        }
        $commandfile = fopen($dirRoute.'synctask_'.$id.'.sh', "x+") or die ('unable to save script!');

        foreach($commands as $command)
        {
            fwrite($commandfile, $command. PHP_EOL);
            //echo $command . '<br />';
            //echo shell_exec($command. ' 2>&1');
            //echo '<br />';
        }
        fclose($commandfile);
        shell_exec('chmod 775 '.$dirRoute.'synctask_'.$id.'.sh');
        shell_exec('chmod +x artisan');
        echo shell_exec($dirRoute.'synctask_'.$id.'.sh 2>&1 &');
        unlink($dirRoute.'synctask_'.$id.'.sh');
        
        file_put_contents($resourcePath."/task_".$id.'.json', json_encode(array("last_run" => $setDate)));
        

        return "<br /><br />Complete!";

        //return 'Hello';
    }

    public function checkTask($id)
    {
        $resourcePath = realpath(__DIR__.'/../../../../resources/data');
        if (file_exists($resourcePath."/task_".$id.'.json'))
        {
            $jsonInfo = file_get_contents($resourcePath."/task_".$id.'.json');
            $jsonData = json_decode($jsonInfo, true);
            $lastRunLocal = $jsonData['last_run'];
            $now = Date('Y-m-d G:i:s');
            $syncerData = DB::table('syncer_tasks')->where('id', $id)->first();
            if($syncerData->last_run > $lastRunLocal)
            {
                $thisString = $this->apirun($id);
                return $this->apirun($id);
            }else{
                return "Up to date.";
            }
            
        }else{
            return $this->apirun($id);
        }
    }
}


