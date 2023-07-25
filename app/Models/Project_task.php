<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_task extends Model
{
    use HasFactory;
    protected $table = 'project_task';
    protected $fillable = ['task_name', 'project_id'];

    // Por ejemplo, si deseas agregar relaciones, puedes hacerlo aquí:
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
