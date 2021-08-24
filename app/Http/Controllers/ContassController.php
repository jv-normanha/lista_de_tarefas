<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\models\models\ModelContass;
use App\models\User;

use Illuminate\Http\Request;

class ContassController extends Controller
{
    private $objectUser;//criando objeto que vai receber os usuarios
    private $objectTask;//criando objeto que vai receber as tarefas

    public function __construct()
    {
        $this->objectUser=new User();//estanciando objeto que vai receber os models dos usuarios
        $this->objectTask=new ModelContass();//Estanciando um objeto que vai receber os models de tarefas
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $task=ModelContass::all(); //Criando objeto que vai receber todas as tarefas
        return view('index',compact('task'));//Passando as tarefas para o "Index"

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objectUser->all();
        return view('create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)//aqui mudamos o padrão de Request para TaskRequest, as validações que nós fizemos
    {
        $cad=$this->objectTask->create([//variavel auxiliar de cadastro
            'description'=>$request->description,
            'user'=>$request->name,
            'date'=>$request->date,
            'user_id'=>$request->user_id
        ]);
        if($cad){ //Condicional , se verdadeiro redireciona para a view principal
            return redirect('tarefas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task=ModelContass::find($id);
        return view('show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=$this->objectTask->find($id);
        $users=$this->objectUser->all();
        return view('create',compact('task','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id) //aqui mudamos o padrão de Request para TaskRequest, as validações que nós fizemos
    {
        $this->objectTask->where(['id'=>$id])->update([
            'description'=>$request->description,
            'date'=>$request->date,
            'user_id'=>$request->user_id
        ]);
        return redirect('tarefas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objectTask->destroy($id);
        return($del)?"sim":"não";
    }
}
