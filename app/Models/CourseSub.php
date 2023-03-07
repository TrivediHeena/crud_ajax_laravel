<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Students;

class CourseSub extends Model
{
    use HasFactory;

    protected $table='course_subs';
    protected $primaryKey='id';
    //protected $fillable=['student_id','course'];
    public function students(){
        return $this->belongsTo(Students::class);
        //return $this->hasMany(Students::class);
    }
}
