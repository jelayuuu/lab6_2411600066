<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','code','description','category','instructor',
        'units','minimum_grade','grade_point',
    ];

    protected $casts = [
        'units' => 'integer',
        'minimum_grade' => 'decimal:2',
        'grade_point' => 'decimal:2',
    ];

    public function gradeRecords()
    {
        return $this->hasMany(GradeRecord::class);
    }

    public function isNotGraded(): bool
    {
        return (float) $this->grade_point <= 0;
    }

    public function isAtRisk(): bool
    {
        return ! $this->isNotGraded()
            && (float) $this->grade_point < (float) $this->minimum_grade;
    }

    public function isPassing(): bool
    {
        return (float) $this->grade_point >= (float) $this->minimum_grade;
    }

    public function getAcademicStatusAttribute(): string
    {
        if ($this->isNotGraded()) return 'not graded';
        if ($this->isAtRisk()) return 'at risk';
        return 'passing';
    }

    public function getQualityPointsAttribute(): float
    {
        return (float) $this->grade_point * (int) $this->units;
    }
}
