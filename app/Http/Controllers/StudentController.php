<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('student', compact('students'));
    }

    public function create()
    {
        return view('form_add_student');
    }

    public function store(Request $request) 
    {
         // Validate the input data
         $validated = $request->validate([
            'studentName' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'contact' => 'required|string|max:15',  // You can adjust the max length for contact
        ]);

        // Create a new student record
        $student = new Student();
        $student->name = $validated['studentName'];
        $student->class = $validated['class'];
        $student->contact = $validated['contact'];

        // Save the student to the database
        $student->save();

        // Redirect to a page (for example, students list) with a success message
        return redirect()->route('student.index')->with('success', 'Student added successfully!');
    }

    public function edit($id) {
        $student = Student::find($id);
        return view('form_edit_student', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'studentName' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'contact' => 'required|string|max:15',
        ]);

        // Find the student by ID and update their details
        $student = Student::findOrFail($id);
        $student->name = $validated['studentName'];
        $student->class = $validated['class'];
        $student->contact = $validated['contact'];
        $student->save();

        // Redirect back with a success message
        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully!');
    }
}
