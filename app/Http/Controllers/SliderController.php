<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Image;
use File;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.index', ['slider_pics' => $sliders]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//dd($request->all());
        $input = $request->all();
        $rules = [
         'titulo' => 'required|max:64',
         'descripcion' => 'required|max:128',
         'url' => 'required',
         'imagen' => 'required|mimes:jpeg,png,jpg|max:400'
        ];
        $messages = [
            'titulo.required' => 'El campo "título" es obligatorio',
            'titulo.max' => 'El campo "título" debe ser de menos de 64 caracteres',
            'descripcion.required' => 'El campo "descripción" es obligatorio',
            'url.required' => 'El campo "URL" es obligatorio',
            'imagen.required' => 'Debes subir una foto',
            'imagen.mimes' => 'El archivo debe ser una imágen',
            'imagen.max' => 'La imagen no debe pesar más de 400KB'
        ];

       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
       return redirect('sliders/create')
                   ->withErrors( $validator )
                   ->withInput();
        } else {  
            //  Crear Imagen
            $file = Input::file('imagen');
            $name = str_replace(' ', '', strtolower($input['titulo']));
            $file_name = $name.str_random(6).'.'.$file->getClientOriginalExtension();
            $img_path ='slider_pictures/'.$file_name;
            $request->imagen->move('slider_pictures/', $file_name); 

            $s = new Slider;
            $s->title = $request->input('titulo');
            $s->description = $request->input('descripcion');
            $s->url = $request->input('url');
            $s->path = $img_path;
            if ($request->input('activado')) {
                $s->enabled = true;
            }
            $s->save();
            return redirect('sliders/');
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
        $slide = Slider::find($id);
        return view('backend.slider.edit', ['slide' => $slide]);
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
        //dd($request->all());
        $input = $request->all();
        $rules = [
         'titulo' => 'required|max:64',
         'descripcion' => 'required|max:128',
         'url' => 'required',
         'imagen' => 'mimes:jpeg,png,jpg|max:400'
        ];
        $messages = [
            'titulo.required' => 'El campo "título" es obligatorio',
            'titulo.max' => 'El campo "título" debe ser de menos de 64 caracteres',
            'descripcion.required' => 'El campo "descripción" es obligatorio',
            'url.required' => 'El campo "URL" es obligatorio',
            'imagen.mimes' => 'El archivo debe ser una imágen',
            'imagen.max' => 'La imagen no debe pesar más de 400KB'
        ];

       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
       return redirect('sliders/'.$id.'/edit')
                   ->withErrors( $validator )
                   ->withInput();
        } else {  
            $s = Slider::find($id);
            if (Input::file('imagen')) { // Si hay imagen
                $file = $s->path; // Eliminar vieja imagen
                $filename = public_path($file);
                File::delete($filename);
                $file = Input::file('imagen'); //  Crear Imagen
                $name = str_replace(' ', '', strtolower($input['titulo']));
                $file_name = $name.str_random(6).'.'.$file->getClientOriginalExtension();
                $img_path ='slider_pictures/'.$file_name;
                $request->imagen->move('slider_pictures/', $file_name);
                $s->path = $img_path; 
            }
            $s->title = $request->input('titulo');
            $s->description = $request->input('descripcion');
            $s->url = $request->input('url');

            if ($request->input('activado')) {
                $s->enabled = true;
            } else {
                $s->enabled = false;
            }
            $s->save();
            return redirect('sliders/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Slider::find($id);
        if ($s->path != null) {
         $file = $s->path;
         $filename = public_path($file);
         File::delete($filename);
        }
        $s->delete();
        return redirect('sliders/');
    }
}
