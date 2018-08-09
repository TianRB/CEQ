<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Slider;
use App\Subcategory;
use App\Card;
use App\Message;
use App\Mail\NewMessage;
use App\Mail\RecievedMessage;
use Mail;
use Validator;

class FrontController extends Controller
{
    public function index()
    {
        //$slides = Slider::where('enabled', 1)->take(3)->get();
        return view('frontend.index');
    }


    public function category($category)
    {
      $sub = Subcategory::all();
        switch ($category) {
          case 'muebles':
            $cat_name = 'Muebles'; break;
          case 'silleria':
            $cat_name = 'Silleria'; break;
          case 'archivo':
            $cat_name = 'Archivo'; break;
          case 'cafeteria-y-hoteleria':
            $cat_name = 'Cafetería y Hotelería'; break;
          case 'sofas-y-espera':
            $cat_name = 'Sofás y Espera'; break;
          case 'recepciones':
            $cat_name = 'Recepciones'; break;
          case 'accesorios':
            $cat_name = 'Accesorios'; break;
          default:
            $cat_name = '';
        }
        $articles = Article::whereHas('categories', function($query) use ($cat_name) {
            $query->where('categories.name', $cat_name); })->get();

        //Obtener todos los id de artículos
        $article_ids = collect($articles)->pluck('id');
        //Obtener todas las Subcategorias relacionadas con los Articulos
        $sub = Subcategory::whereHas('articles', function($query) use ($article_ids) {
            $query->whereIn('articles.id', $article_ids);
        })->get();
        return view('frontend.category', ['articles' => $articles, 'subcategories' => $sub]);
    }

    public function showArticles()
    {
        $articles = Article::all();
        return view('front', ['articles' => $articles]);
    }
    public function showRelatedArticles($category)
    {
        // Decode JSON to PHP array
        $category = json_decode($category);

        // If it's an array
        if (is_array($category)){
            //Obtener todos los id de categoria
            $category_ids = collect($category)->pluck('id');
            $articles = Article::whereHas('categories', function($query) use ($category_ids) {
                // Assuming your category table has a column id
                $query->whereIn('categories.id', $category_ids);
            })->get();
        } else {
            dd('Not an array (bad url parameter)');
        }
        return view('front', ['articles' => $articles]);
    }

    public function showArticle($article_id)
    {
      // Decode JSON to PHP array
      $a = Article::find($article_id);
    	$category = json_decode($a->categories()->get());
      // If it's an array
      if (is_array($category)){
        //Obtener todos los id de categoria
        $category_ids = collect($category)->pluck('id');

        $articles = Article::whereHas('categories', function($query) use ($category_ids) {
          // Assuming your category table has a column id
          $query->whereIn('categories.id', $category_ids);
        })->get();

        // Excluye el artículo que estás viendo
        $filtered_articles = $articles->filter(function ($current, $key) use ($a)
        {
           return ($current->id != $a->id);
        });

        //dd($filtered_articles);
      } else {
        dd('Not an array (bad url parameter)');
      }
        //dd($articles);
        return view('frontend.article', ['main' => $a, 'related' => $filtered_articles]);
    }

    public function articleBySlug($article_slug)
    {
      // Decode JSON to PHP array
      $a = Article::where('slug', $article_slug)->get()->pop();
      //dd($a);
      $category = json_decode($a->categories()->get());
      // If it's an array
      if (is_array($category)){
        //Obtener todos los id de categoria
        $category_ids = collect($category)->pluck('id');

        $articles = Article::whereHas('categories', function($query) use ($category_ids) {
          // Assuming your category table has a column id
          $query->whereIn('categories.id', $category_ids);
        })->get();

        // Excluye el artículo que estás viendo
        $filtered_articles = $articles->filter(function ($current, $key) use ($a)
        {
           return ($current->slug != $a->slug);
        });

        //dd($filtered_articles);
      } else {
        dd('Not an array (bad url parameter)');
      }
        //dd($articles);
        return view('frontend.articleBySlug', ['main' => $a, 'related' => $filtered_articles]);
    }

    // Valor default para el slug es nulo. Si no le pasas parámetro, busca la primera tarjeta
    public function gastro($card_slug = NULL)
    {
      if($card_slug) {
        $main = Card::where('slug', $card_slug)->get()->pop();
      } else {
        $main = Card::where('belongsTo', 'gastroenterologia')->take(1)->get()->pop();
      }
      $cards = Card::where('belongsTo', 'gastroenterologia')->get();
      return view('frontend.gastro', ['main' => $main, 'cards' => $cards]);
    }

    public function messagesend(Request $request)
    {
      $input = $request->all();
      //dd($input);

      $rules = [
       'name' => 'required|max:64|unique:categories,name',
       'email' => 'required|email',
       'phone' => 'required|numeric'
      ];
      $messages = [
          'name.required' => 'El campo "nombre" es obligatorio.',
          'name.max' => 'El nombre debe tener de menos de 64 caracteres.',
          'email.required' => 'el campo "email" es obligatorio',
          'email.email' => 'La el correo no es una dirección válida.',
          'phone.required' => 'El campo "Teléfono" es obligatorio',
          'phone.numeric' => 'El campo "Teléfono" debe contener sólo números.'
      ];
     $validator = Validator::make($input, $rules, $messages);
     if ( $validator->fails() ) {
     return redirect('/#contacto')
                 ->withErrors( $validator )
                 ->withInput();
      } else {
       $message = Message::create([
        'name' => $input['name'],
        'phone' => $input['phone'],
        'email' => $input['email'],
        'message' => $input['message']
       ]);
       //$mall = Message::all();
       //dd($mall,$message);
       Mail::to('contacto@casaralero.com.mx')->send(new NewMessage($message));
       Mail::to($message->email)->send(new RecievedMessage($message));
       return redirect()->route('front.index');
      }
    }
}
