<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstalationService extends Model
{
    protected $fillable = ['nameInstalation'];

    public function projects()
{
    return $this->belongsToMany(Project::class,'project_insta_service', 'instalation_service_id', 'project_id');
}

}


