<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private array $categories = [
        'Major Subjects',
        'Programming',
        'Mathematics',
        'General Education',
        'Electives',
        'Physical Education',
    ];

    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });
        }

        $courses = $query->orderBy('name')->get();
        $categories = Course::select('category')->distinct()->pluck('category');

        return view('courses.index', compact('courses', 'categories'));
    }

    public function create()
    {
        $course = new Course();
        $categories = $this->categories;

        return view('courses.create', compact('course', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateCourse($request);

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course added to your record successfully.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = $this->categories;

        return view('courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $this->validateCourse($request, $course->id);

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course removed from your record.');
    }

    private function validateCourse(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => [
                'required',
                'string',
                'max:20',
                'unique:courses,code' . ($ignoreId ? ",{$ignoreId}" : ''),
            ],
            'description' => ['nullable', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'instructor' => ['nullable', 'string', 'max:255'],
            'units' => ['required', 'integer', 'min:1', 'max:12'],
            'minimum_grade' => ['required', 'numeric', 'min:0', 'max:4'],
            'grade_point' => ['required', 'numeric', 'min:0', 'max:4'],
        ], [
            'code.unique' => 'This course code is already in your record.',
            'units.min' => 'A course must be worth at least 1 unit.',
            'units.max' => 'A course cannot exceed 12 units.',
            'grade_point.max' => 'Grade point cannot exceed 4.00.',
            'minimum_grade.max' => 'Passing grade cannot exceed 4.00.',
        ]);
    }
}
