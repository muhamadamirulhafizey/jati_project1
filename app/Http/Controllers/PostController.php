<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use App\Crud;
use App\Result;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cruds = Crud::all()->toArray();
        //$cruds = Crud::find($id);
        return view('crud.index', compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = new Crud([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'result' => $request->get('result')
          ]);

          $result = new result([
            
            'name' => $request->get('name'),
            'result' => $request->get('result')
          ]);

          $result->save();
          $crud->save();
          return redirect('/crud');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$crud = Crud::find($id);
       $crud = DB::table('cruds')->select('results.name','id','title','body')->join('results','results.result','=','cruds.result')->where('cruds.id',$id)->get();
        
       // $crud = DB::table('cruds')->select('SELECT results.name,id,title,body
       // FROM crud
        //INNER JOIN result
       // ON crud.result = result.result;')->first();
        
        
        //$crud = (array)$crudss;
        // $crud = $crud::toArray();
       
        // $crud->tags()->all()->toArray();
       // $crud = DB::table('cruds')
       //->leftJoin('cruds.title', 'cruds.result', '=', 'results.result')
       //->get();

       //$crud = SELECT * FROM cruds WHERE id = ($id) ;
      // $crud = SELECT * FROM addresses, linked_addresses WHERE addresses.address = linked_addresses.address WHERE code != 5;
       
      //$crud = DB::table('cruds')
               // ->select('cruds.title','cruds.body','cruds.result','results.name')
               // ->join('cruds', 'cruds.result', '=', 'results.result')->where('cruds.id',$id)
               // ->join('users', 'users.id', '=', 'articles.user_id')
                // ->get();

                
      
      return view('crud.show', compact('crud','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$crud = Crud::find($id);
        //$crud = DB::table('cruds')
       // ->join('cruds.result', '=', 'results.result')
       // ->select('results.result', 'name.result', 'body','title')
        //->get();

        $crud = DB::table('cruds')->select('results.name','results.result','id','title','body')->join('results','results.result','=','cruds.result')->where('cruds.id',$id)->first();
      
        return view('crud.edit', compact('crud','id'));
    }

    public function editt($id)
    {
        $crud = Crud::find($id);
        return view('crud.show', compact('crud','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $crud = Crud::find($id);
        $crud->title = $request->get('title');
        $crud->body = $request->get('body');
        $crud->body = $request->get('result');
        $crud->save();
        return redirect('/crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = Crud::find($id);
        $crud->delete();
  
        return redirect('/crud');
    }
}
