<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['name' => 'Web System and Technologies', 'code' => 'ITE313', 'category' => 'Major Subjects', 'instructor' => 'Prof. Jamero', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 3.50, 'description' => 'Client-side and server-side web development using modern frameworks.'],
            ['name' => 'Advanced Database Systems', 'code' => 'IM101', 'category' => 'Major Subjects', 'instructor' => 'Prof. Arriza', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 2.75, 'description' => 'Advanced topics in relational and non-relational databases.'],
            ['name' => 'System Analysis and Design', 'code' => 'IPD312', 'category' => 'Major Subjects', 'instructor' => 'Prof. Oczon', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 1.75, 'description' => 'Structured approaches to requirements gathering and system design.'],
            ['name' => 'Information Management', 'code' => 'CC105', 'category' => 'Major Subjects', 'instructor' => 'Prof. Abdurajik', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 3.00, 'description' => 'Principles of managing organizational data and information systems.'],
            ['name' => 'System Integration and Architecture 1', 'code' => 'SIA101', 'category' => 'Programming', 'instructor' => 'Prof. Jamero', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 0, 'description' => 'Enterprise integration patterns, middleware, and architecture.'],
            ['name' => 'Object Oriented Programming', 'code' => 'ITE212', 'category' => 'Programming', 'instructor' => 'Prof. Nostros', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 3.25, 'description' => 'Classes, objects, inheritance, polymorphism, and design principles.'],
            ['name' => 'Data Structures and Algorithms', 'code' => 'CC104', 'category' => 'Programming', 'instructor' => 'Prof. Oczon', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 1.50, 'description' => 'Core data structures and algorithmic complexity analysis.'],
            ['name' => 'Integrative Programming and Technology', 'code' => 'IPT101', 'category' => 'Programming', 'instructor' => 'Prof. Arriza', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 0, 'description' => 'Integration of programming paradigms and emerging technologies.'],
            ['name' => 'Quantitative Methods', 'code' => 'MS102', 'category' => 'Mathematics', 'instructor' => 'Prof. Fajartin', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 2.25, 'description' => 'Statistical and quantitative techniques for decision making.'],
            ['name' => 'Discrete Structures', 'code' => 'MS101', 'category' => 'Mathematics', 'instructor' => 'Prof. Fajartin', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 2.00, 'description' => 'Logic, sets, relations, graphs, and combinatorics.'],
            ['name' => 'Platform Technologies', 'code' => 'ITE211', 'category' => 'Major Subjects', 'instructor' => 'Prof. Nosotros', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 1.25, 'description' => 'Hardware and software platforms, operating systems, and virtualization.'],
            ['name' => 'Purposive Communication', 'code' => 'GE104', 'category' => 'General Education', 'instructor' => 'Prof. Bantilan', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 3.75, 'description' => 'Academic and professional communication in multicultural settings.'],
            ['name' => 'Ethics', 'code' => 'GE107', 'category' => 'General Education', 'instructor' => 'Prof. Hubert', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 3.50, 'description' => 'Moral reasoning and professional ethics.'],
            ['name' => 'Readings in Philippine History', 'code' => 'GE202', 'category' => 'General Education', 'instructor' => 'Prof. Hermoso', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 3.00, 'description' => 'Critical reading of primary sources in Philippine history.'],
            ['name' => 'Art Appreciation', 'code' => 'GE301', 'category' => 'General Education', 'instructor' => 'Prof. Dalanan', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 0, 'description' => 'Introduction to visual and performing arts and their cultural significance.'],
            ['name' => 'Life and Works of Rizal', 'code' => 'GE205', 'category' => 'General Education', 'instructor' => 'Prof. Manalo', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 2.50, 'description' => 'Study of the life, writings, and legacy of José Rizal.'],
            ['name' => 'The Contemporary World', 'code' => 'GE203', 'category' => 'General Education', 'instructor' => 'Prof. Monteclaro', 'units' => 3, 'minimum_grade' => 2.00, 'grade_point' => 1.75, 'description' => 'Globalization, governance, and modern global systems.'],
            ['name' => 'Dance', 'code' => 'PATHFIT3', 'category' => 'Physical Education', 'instructor' => 'Prof. Ceralde', 'units' => 2, 'minimum_grade' => 2.00, 'grade_point' => 4.00, 'description' => 'Movement education through various dance forms.'],
            ['name' => 'Sports', 'code' => 'PATHFIT4', 'category' => 'Physical Education', 'instructor' => 'Prof. Ceralde', 'units' => 2, 'minimum_grade' => 2.00, 'grade_point' => 0, 'description' => 'Team and individual sports focusing on skill development and teamwork.'],
        ];

        foreach ($courses as $course) {
            Course::updateOrCreate(['code' => $course['code']], $course);
        }
    }
}
