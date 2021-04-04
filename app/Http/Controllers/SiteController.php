<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class SiteController extends Controller
{
    /********************************************************************
     ******************* Chamadas de telas do sistema *******************
     ********************************************************************/
    public function searchRegister($student = null) {
        return view("site.searchRegister", [
            'student' => $student
        ]);
    }
    
    public function searchName($student = null) {
        return view("site.searchName", [
            'student' => $student
        ]);
    }

    public function searchCpf($student = null) {
        return view("site.searchCpf", [
            'student' => $student
        ]);
    }

    /********************************************************************
     **************** Funções do sistema de Adminstração ****************
     ********************************************************************/
    public function findRegister() {

        $student = $_GET['search']; 

        $resultStudent = Student::where('desregister', '=', $student)->first();
        if($resultStudent == null) {
            return redirect()->back()->withErrors(['Nenhum aluno encontrado']);
        }
        
        return $this->searchRegister($resultStudent);

    }

    public function findName() {

        $student = $_GET['search']; 

        $resultStudent = Student::where('desname', '=', $student)->first();
        if($resultStudent == null) {
            return redirect()->back()->withErrors(['Nenhum aluno encontrado']);
        }

        return $this->searchName($resultStudent);

    }



    public function findCpf() {

        $student = $_GET['search']; 
        
        if( AuthController::validaCPF($student)) {
            $resultStudent = Student::where('desdoc', '=', $student)->first();
            if($resultStudent == null) {
                return redirect()->back()->withErrors(['Nenhum aluno encontrado']);
            } else {
                return $this->searchCpf($resultStudent);
            }
        }

        return redirect()->back()->withErrors(['CPF inválido']);

    }


}
