<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Category;
// use App\Incident;
use App\Denuncias;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $denuncias = Denuncias::all();

      return view('home')->with(compact('denuncias'));
        // return view('home');
    }

    public function getReport()
    {
        $categories = Category::where('project_id', 1)->get();
        return view('report')->with(compact('categories'));
    }

    public function postReport(Request $request)
    {
        $rules = [
            'category_id' => 'sometimes|exists:categories,id',
            'severity' => 'required|in:M,N,A',
            'title' => 'required|min:5',
            'description' => 'required|min:15',
        ];

        $messages = [
            'category_id.exists' => 'La categoria selecionada no pertenece a la Base de Datos.',
            'severity.required' => 'Debe tener una seleccion predefinida de: M, N, A. ',
            'title.min' => 'El Titulo debe tener como minino 5 caracteres.',
            'title.required' => 'El Titulo es necesario.',
            'description.min' => 'La Descripcion debe tener como minino 15 caracteres.',
            'description.required' => 'La Descripcion es necesario.',
        ];

        $this->validate($request, $rules, $messages);

        $incident = new Incident();
        $incident->category_id = $request->input('category_id') ?: null;
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->description = $request->input('description');
        $incident->client_id = auth()->user()->id;
        $incident->save();

        return back();


    }

}
