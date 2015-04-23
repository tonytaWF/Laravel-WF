<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model {


    protected $table = 'phases';

    protected $fillable = ['experiment_id','name'];

    public function experiment()
    {
        return $this->belongsTo('App\Experiment');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

}
