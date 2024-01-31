<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function __construct()
{
    // Apply 'role' middleware to specific actions

   

    // if (auth()->user() && in_array(auth()->user()->role->name, $roles)) {
    //    'dsfsdfsdfdsfsdfsdf';
    // }
    //$this->middleware('role:superadmin')->only(['create', 'store', 'edit', 'update', 'destroy']);
}

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
    }
    

  
    public function create()
    {
        $document = new Document();
        return view('document.create', compact('document'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'file_path' => 'required|file|mimes:pdf,doc,docx', // Adjust allowed file types as needed
        ]);
    
        // Handle file upload
        $file = $request->file('file_path');
        $filePath = $file->store('public/document'); // 'documents' is the storage folder where the file will be saved
    
        // Create a new document with the validated data and file path
        $document = Document::create([
            'title' => $request->input('title'),
            'tag' => $request->input('tag'),
            'onlyuser' => $request->input('onlyuser'),
            'status' => $request->input('status'),
            'file_path' => $filePath, // Store the file path in the database
            'description' => $request->input('description'),
        ]);
    
        return redirect()->route('document.index')->with('success', 'Document created successfully.');
    }
    

    public function show($id)
    {
        $document = Document::find($id);

        return view('document.show', compact('document'));
    }

    public function edit($id)
    {
        $document = Document::find($id);

        return view('document.edit', compact('document'));
    }


    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx', // Adjust allowed file types as needed
        ]);
    
        // Update other fields
        $document->update([
            'title' => $request->input('title'),
            'tag' => $request->input('tag'),
            'onlyuser' => $request->input('onlyuser'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
        ]);
    
        // Handle file upload if a new file is provided
        if ($request->hasFile('file_path')) {
            // Delete the previous file if it exists
            // Assuming you have a method in your Document model to handle file deletion
            $document->deleteFile(); // Implement this method in your Document model
    
            // Handle the new file upload
            $file = $request->file('file_path');
            $filePath = $file->store('public/document'); // 'documents' is the storage folder where the file will be saved
            $document->update(['file_path' => $filePath]); // Update the file path in the database
        }
    
        return redirect()->route('document.index')->with('success', 'Document updated successfully');
    }
    


    public function destroy($id)
    {
        $document = Document::find($id)->delete();

        return redirect()->route('document.index')
            ->with('success', 'Document deleted successfully');
    }
}
