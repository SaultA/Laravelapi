<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class studentController extends Controller
{
    // liste des étudiants
    public function getStudents()
    {
        return response()->json(Student::all(), 200);
    }

    //  fiche étudiant
    public function getStudentId($id)
    {
        $student = Student::find($id);

        // dd($student);
        // Log::info($student);
        // var_dump($student);

        if (is_null($student)) {
            return response()->json(['message' => `id Student:$id does not exist`], 404);
            // return response()->json(['message' => 'id Student:'.$id.' does not exist'], 404);
        }
        return response()->json($student::find($id), 200);
    }

    // Ajouter un étudiant

    public function addStudent(Request $request){

        $student = Student::create($request->all());
        return response($student, 201);
    }

    public function updateStudent(Request $request, $id){
        $student = Student::find($id);

        if (is_null($student)) {
            return response()->json(['message' => `id Student:$id does not exist`], 404);
            // return response()->json(['message' => 'id Student:'.$id.' does not exist'], 404);
        }

        $student->update($request->all());
        return response($student, 200);
    }

    public function deleteStudent($id){
        $student = Student::find($id);

        if (is_null($student)) {
            return response()->json(['message' => `id Student:$id does not exist`], 404);
        }
        $student->delete();
        return response()->json(['message' => 'supprimé avec succès'], 200  );
    }
}
