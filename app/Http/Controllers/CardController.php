<?php

namespace App\Http\Controllers;

use App\Card;
use App\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Image;
use File;

class CardController extends Controller
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
        $cards = Card::all();
        return view('backend.card.index', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.card.create');
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
         'title' => 'unique:articles|required|max:255',
         'list_title' => 'required',
         'image' => 'required|mimes:jpeg,png,jpg|max:800',
         'body' => 'required',
         'type' => 'required',
        ];
        $messages = [
            'title.unique' => 'Ya existe una tarjeta con este nombre',
            'title.required' => 'El campo "título" es obligatorio',
            'list_title' => 'El campo "título en lista" es obligatorio',
            'imagen.required' => 'Debes subir una foto',
            'imagen.mimes' => 'El archivo debe ser una imágen',
            'imagen.max' => 'La imagen no debe pesar más de 400KB',
            'body.required' => 'El campo "contenido" es obligatorio',
            'type.required' => 'Necesitas sellecionar una sección'

        ];

       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
       return redirect('cards/create')
                   ->withErrors( $validator )
                   ->withInput();
        } else {
            //dd($request->imagen);
            $c = new Card;
            $c->title = $request->input('title');
            $c->list_title = $request->input('list_title');
            $c->body = $request->input('body');
            // Para evitar que inyecten una categoría diferente a las permitidas
            if ($request->input('type') == 'gastroenterologia'||'cirugia-general-y-laparoscopica'||'endoscopia') {
              $c->belongsTo = $request->input('type');
            }
            $c->slug = $c->getSlugFromTitle();

            $image = Input::file('image');
            $file_name = str_random(16).'.'.$image->getClientOriginalExtension();
            $c->image = Card::$image_path.$file_name;
            $image->move(Card::$image_path, $file_name);
            $c->save();

            return redirect('cards/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Card $article)
    {
        return view('backend.card.show',['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::find($id);
        return view('backend.card.edit', ['card' => $card]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dd($request->all());
        $input = $request->all();

        $rules = [
         'title' => 'unique:articles|required|max:255',
         'list_title' => 'required',
         'image' => 'mimes:jpeg,png,jpg|max:800',
         'body' => 'required',
         'type' => 'required',
        ];
        $messages = [
            'title.unique' => 'Ya existe una tarjeta con este nombre',
            'title.required' => 'El campo "título" es obligatorio',
            'list_title' => 'El campo "título en lista" es obligatorio',
            'imagen.mimes' => 'El archivo debe ser una imágen',
            'imagen.max' => 'La imagen no debe pesar más de 400KB',
            'body.required' => 'El campo "contenido" es obligatorio',
            'type.required' => 'Necesitas sellecionar una sección'

        ];

       $validator = Validator::make($input, $rules, $messages);
       if ( $validator->fails() ) {
       return redirect('cards/edit')
                   ->withErrors( $validator )
                   ->withInput();
        } else {
            //dd($request->imagen);
            $c = Card::find($id);
            $c->title = $request->input('title');
            $c->list_title = $request->input('list_title');
            $c->body = $request->input('body');
            // Para evitar que inyecten una categoría diferente a las permitidas
            if ($request->input('type') == 'gastroenterologia'||'cirugia-general-y-laparoscopica'||'endoscopia') {
              $c->belongsTo = $request->input('type');
            }
            $c->slug = $c->getSlugFromTitle();

            if ($request->image) {
              $oldImage = $c->image;
              $imageName = public_path($oldImage);
              File::delete($imageName);

              $image = Input::file('image');
              $file_name = str_random(16).'.'.$image->getClientOriginalExtension();
              $c->image = Card::$image_path.$file_name;
              $image->move(Card::$image_path, $file_name);
            }
            $c->save();

            return redirect('cards/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Card::find($id);
        $file = $c->image;
        $filename = public_path($file);
        File::delete($filename);
        $c->delete();
        return redirect('cards/');
    }

    public function searchResults(Request $request)
    {
     $title = $request->title;
     //dd($title);
     $cards = Card::Title($title)->get();
     //dd($cards);
     return view('backend.card.search', [
      'cards' => $cards,
      'title' => $title
     ]);
    }
    /**
     * Auxiliar function to give all Cards a slug, if they don´t have one.
     **/
    public function addSlugToAll()
    {
        $cards = Card::where('slug', '')->get();
        //dd($cards);
        foreach ($cards as $a) {
            $a->slug = $a->getSlugFromTitle();
            $a->save();
        }
        redirect()->action('HomeController@index');
    }

}
