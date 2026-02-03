<?php
namespace App\Models;
use CodeIgniter\Model;
class Task_model extends Model{
    protected $table = "to_do_list";
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Task_added', 'Added_at', 'Task_completed'];
    public function task_store($task)
    {
        return $this->insert([
            'Task_added' => $task,
            'Added_at' => date('Y-m-d H:i:s'),
            'Task_completed' => 0
        ]);
    }
    public function task_list()
    {
        return $this->findAll();
    }
}