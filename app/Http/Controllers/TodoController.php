<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return Todo::where('user_id',auth()->user()->id)->get();
    }

    public function create()
    {
		//
    }

    public function store(Request $request)
    {
		$todo = new Todo();
		$todo->user_id = auth()->user()->id;
		$todo->author = $request->author;
        $todo->bookname = $request->bookname;
		
    	if($todo->save()){
			return ['success'=>true]; 
		}  
    	return ['success'=>false]; 
    }

    public function show(Todo $todo)
    {
        //
    }

    public function edit($id)
    {
		//
    }
    
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
		$todo->user_id = auth()->user()->id;
		$todo->author = $request->author;
		$todo->bookname = $request->bookname;
    	if($todo->save()){
			return ['success'=>true]; 
		}  
    	return ['success'=>false]; 
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return ['success'=>true];
    }
}
