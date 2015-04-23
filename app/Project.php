<?php namespace App;

use App\Experiment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'active'];


    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function experiments()
    {
        return $this->hasMany('App\Experiment');
    }
}
