<?php

namespace App\Http\Controllers;

use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        $totalCourses = $courses->count();
        $totalUnits = $courses->sum('units');

        $passingCount = $courses->filter(fn ($course) => $course->isPassing())->count();
        $atRiskCount = $courses->filter(fn ($course) => $course->isAtRisk())->count();
        $notGradedCount = $courses->filter(fn ($course) => $course->isNotGraded())->count();

        $graded = $courses->filter(fn ($course) => ! $course->isNotGraded());
        $gradedUnits = $graded->sum('units');
        $gpa = $gradedUnits > 0
            ? $graded->sum(fn ($course) => $course->quality_points) / $gradedUnits
            : 0;

        $recentCourses = Course::latest()->take(5)->get();

        $atRiskCourses = $courses
            ->filter(fn ($course) => $course->isAtRisk() || $course->isNotGraded())
            ->sortBy('grade_point')
            ->take(5);

        $categorySummary = Course::selectRaw('category, COUNT(*) as total_courses, SUM(units) as total_units, AVG(grade_point) as average_grade')
            ->groupBy('category')
            ->get();

        return view('dashboard', compact(
            'totalCourses',
            'totalUnits',
            'passingCount',
            'atRiskCount',
            'notGradedCount',
            'gpa',
            'recentCourses',
            'atRiskCourses',
            'categorySummary'
        ));
    }
}
