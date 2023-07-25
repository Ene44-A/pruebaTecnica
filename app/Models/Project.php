<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Project_task::class);
    }

    // Relación muchos a uno con la tabla User (para el usuario que creó el proyecto)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_user');
    }
}