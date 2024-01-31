<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
       
        $search = $request->input('search');
        $data=Document::count();
        $documents = Document::when($search, function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('tag', 'like', '%' . $search . '%')
                  ->orWhere('status', 'like', '%' . $search . '%')
                  ->orWhere('file_path', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate();
    
        return view('document.index', compact('documents', 'search','data'))
            ->with('i', (request()->input('page', 1) - 1) * $documents->perPage());

       // return  view('home', compact('data'));
    }
}
