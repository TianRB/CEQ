<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use Validator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('backend.subcategories.index', ['subcategories' => $subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
         'nombre' => 'required|max:64|unique:subcategories,name',
        ];
        $messages = [
            'nombre.required' => 'El campo "nombre" es obligatorio',
            'nombre.max' => 'El nombre de la subcategoría debe ser de menos de 64 caracteres',
            'nombre.unique' => 'El nombre de la subcategoría ya existe',
        ];
       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
       return redirect('subcategories/create')
                   ->withErrors( $validator )
                   ->withInput();
        } else {  
            $subcat = new Subcategory;
            $subcat->name = $request->input('nombre');
            $subcat->save();
        }
        return redirect('subcategories/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('backend.subcategories.edit', ['s' => $subcategory]);
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
        $input = $request->all();

        $rules = [
         'nombre' => 'required|max:64|unique:subcategories,name',
        ];
        $messages = [
            'nombre.required' => 'El campo "nombre" es obligatorio',
            'nombre.max' => 'El nombre de la subcategoría debe ser de menos de 64 caracteres',
            'nombre.unique' => 'El nombre de la subcategoría ya existe',
        ];
       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
       return redirect('subcategories/'.$id.'/edit')
                   ->withErrors( $validator )
                   ->withInput();
        } else {  
            $subcat = Subcategory::find($id);
            $subcat->name = $request->input('nombre');
            $subcat->save();
        }
        return redirect('subcategories/');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Subcategory::find($id);
        $c->delete();
        return redirect('subcategories/');    
    }
}
