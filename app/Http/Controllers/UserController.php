<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $students = Student::with('user')->get();
        return response()->json($students);
    }





    public function index2()
    {
        $teachers = Teacher::query()->get();
        return response()->json($teachers);
    }





    public function show($id)
    {
        $teacher = Teacher::query()->find($id);
        return response()->json($teacher->courses);
    }





    public function show2($id)
    {
        $course = Course::query()->findOrFail($id);
        return response()->json($course->students);
    }





    public function createCourses($id)
    {
        $teacher = Teacher::query()->findOrFail($id);
        $courses = $teacher->courses()->createMany([
            ['name' => 'laravel'],
            ['name' => 'php']

       ]);
        return response()->json($courses);
    }




    public function syncStudents($id)
    {
        $course = Course::findOrFail($id);

        $course->students()->sync([1, 2, 3]);
    }
}
