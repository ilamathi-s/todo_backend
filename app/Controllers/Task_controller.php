<?php
namespace App\Controllers;
use App\Models\Task_model;
use CodeIgniter\API\ResponseTrait;
class Task_controller extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $model=new Task_model();
        $task_input=$this->request->getPost('Task_added');
            if(!$task_input)
            {
                $jsondata = $this->request->getJSON(true);
                $task_input = $jsondata['Task_added'] ?? null;
            }
            if(!empty($task_input))
            {
                $model->task_store($task_input);
            }
        $data['task_list'] = $model->task_list();
        return $this->respond($data['task_list']);
    }
    public function update($id)
    {
        $model = new Task_model();
        $jsondata = $this->request->getJSON(true);
        if(isset($jsondata['Task_completed']))
        {
            $jsondata['Task_completed'] = ($jsondata['Task_completed'] == 1) ? 1 : 0;
        }
        if(!empty($jsondata) && $model->update($id,$jsondata))
        {
            return $this->respond($jsondata);
        }
    }
    public function delete($id)
    {
        $model = new Task_model();
        $model->delete($id);
    }

    
}