<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::paginate();

        $data = [
            "documents" => $documents
        ];

        return view("document.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'doc_file' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png,gif,txt|max:5120',
        ]);

        $document = $request->except('doc_file');

        if ($request->hasFile('doc_file')) {
            $file = $request->file('doc_file');
            $document['file_path'] = $this->fileUpload($file);
        } else {
            session()->flash('type', 'Danger');
            session()->flash('message', 'File not found.');
            return redirect()->back()->withInput();
        }

        $doc = Document::create($document);

        if ($doc) {
            session()->flash('type', 'Success');
            session()->flash('message', 'Created successfully');
            return redirect()->route('documents.index');
        } else {
            session()->flash('type', 'Danger');
            session()->flash('message', 'Something wrong');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $data = [
            'document' => $document,
        ];

        return view('document.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required',
            'doc_file' => 'mimes:pdf,doc,docx,jpg,jpeg,png,gif,txt|max:5120',
        ]);

        $document_new = $request->except('doc_file');

        if ($request->hasFile('doc_file')) {
            $filePath = storage_path('app/public/' . $document['file_path']);
            $this->removeFile($filePath);
            $file = $request->file('doc_file');
            $document_new['file_path'] = $this->fileUpload($file);
        }

        $document->update($document_new);
        session()->flash('type', 'Success');
        session()->flash('message', 'Updated successfully');
        return redirect()->route('documents.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document) {
            Document::destroy($document->id);

            if ($document['file_path']) {
                $filePath = storage_path('app/public/' . $document['file_path']);
                // dd($filePath);
                $this->removeFile($filePath);
            }

            session()->flash('type', 'Success');
            session()->flash('message', 'Deleted successfully');
            return redirect()->back();
        } else {
            session()->flash('type', 'Danger');
            session()->flash('message', 'Something went wrong');
            return redirect()->back();
        }
    }
}
