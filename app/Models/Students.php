<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\CourseSub;
class Students extends Model
{
    use HasFactory;
    protected $table='students';
    protected $primaryKey='id';
    protected $fillable=['name'];

    public function courseSub(){
        return $this->hasMany(CourseSub::class);
        //return $this->belongsTo(CourseSub::class);
    }
}
