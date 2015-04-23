<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model {

    use SoftDeletes;

    protected $table = 'files';

    protected $dates = ['deleted_at'];

    protected $fillable = ['filename', 'phase_id'];

    public function phase()
    {
        return $this->belongsTo('App\Phase');
    }
}
