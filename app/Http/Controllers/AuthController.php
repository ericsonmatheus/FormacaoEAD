<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Administrator;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{ 
    
    private function checkSession() {
        return session()->has('sessionAd');
    }
    
    /********************************************************************
     ******************* Chamadas de telas do sistema *******************
     ********************************************************************/
    public function index() {

            $students = Student::all();

            return view('index', [
                'students' => $students
            ]);
    }

    public function formLogin() {

        if($this->checkSession()){
            return redirect()->route('admin.index');
        }

        $erro = session('erro');

        $data = [];

        if(!empty($erro)){
            $data = [
                'erro' => $erro
            ];
        }
        return view('login', $data);  
    }


    public function edit(Student $student) {

        if($this->checkSession()) {
            return view('edit', [
                'student' => $student
            ]);
        } else {
            return redirect()->route('admin.login');
        }

    }

    public function new() {
        if($this->checkSession()) {
            return view('new');
        } else {
            return redirect()->route('admin.login');
        }
    }

    /********************************************************************
     **************** Funções do sistema de Adminstração ****************
     ********************************************************************/

    public function login(LoginRequest $request) {

        $request->validated();

        $adm = Administrator::where('deslogin', $request->login)->first();

        if(!$adm || !Hash::check($request->password, $adm->despassword)) {
            session()->flash('erro', 'Usuário ou senha incorreto!');
            return redirect()->route('admin.login');
        } else {
            session()->put('sessionAd', $adm);

            return redirect()->route('admin.first.access');
         }

    }

    public function firstAccess(Request $request) {
        if ($this->checkSession()) {
            
            $firstPassword = 'form123';
            if(Hash::check($firstPassword, session('sessionAd')->despassword)) {
                return view('firstAccess');
            }
            
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.login');
        }

    }

    public function firstAccessDo(Administrator $adm, Request $request) {
        //Executar atualização no banco de dados da Senha nova do usuário
    
        if($request->password !== $request->confirmPassword) {
            return redirect()->back()->withInput()->withErrors(['• As senhas não conferem, digite novamente']);
        }

        $adm->despassword = Hash::make($request->password);

        $adm->save();

        return redirect()->route('admin.index');
        }
    

    public function create(Request $request){

        if($this->checkSession()) {
            $student = new Student();
            if(filter_var($request->nome, FILTER_SANITIZE_NUMBER_INT) == '' && $request->nome !== '' &&
                            AuthController::validaCPF($request->cpf) && $request->formacao !== '' && $request->regitro !== '') {
                $student->desname = $request->nome;
                $student->desdoc = $request->cpf;
                $student->desformation = $request->formacao;
                $student->desregister = $request->registro;
            } else {
                return redirect()->back()->withInput()->withErrors(['• Verifique os dados antes de salvar']);
            }

            $student->save();

            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function formEdit(Student $student, Request $request){
        
        if($this->checkSession()) {
            
            if(filter_var($request->nome, FILTER_SANITIZE_NUMBER_INT) == '' && $request->nome !== '' &&
                            AuthController::validaCPF($request->cpf) && $request->formacao !== '' && $request->regitro !== '') {
                $student->desname = $request->nome;
                $student->desdoc = $request->cpf;
                $student->desformation = $request->formacao;
                $student->desregister = $request->registro;
            } else {
                return redirect()->back()->withInput()->withErrors(['• Verifique os dados antes de salvar']);
            }

            $student->save();

            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function destroy(Student $student) {
        if($this->checkSession()) {
            $student->delete();

            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function logout() {
        session()->forget('sessionAd');
        return redirect()->route('search.register');
    }

    public static function validaCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }
}
