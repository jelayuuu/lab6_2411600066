<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id','term','grade_point','remarks','user_id',
    ];

    protected $casts = [
        'grade_point' => 'decimal:2',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
