<?php namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;

class Experiment extends Model {

    protected $table = 'experiments';

    protected $fillable = ['project_id','name'];

	public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function phases()
    {
        return $this->hasMany('App\Phase');
    }


}
