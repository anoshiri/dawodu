<?php

namespace App\Http\Controllers;

use App\Models\DocumentLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentLibraryController extends Controller
{
    public function index()
    {
        $libraries = DocumentLibrary::orderBy('publication_date', 'desc')
            ->isActive()->paginate(10);

        return view('document_libraries', compact('libraries'));
    }

    public function show($slug, $file = false)
    {
        $library = DocumentLibrary::findOrFail(getIdFromSlug($slug));

        // get document if $file
        if ($file) {
            $file_id = getIdFromSlug($file);

            return Storage::download($library->documents[$file_id]);
        }

        return view('document_library', compact('library'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'param' => 'required',
        ]);

        $param = $request->param;

        // get the param
        $libraries = DocumentLibrary::where('title', 'like', '%'.$request->param.'%')
            ->orWhere('source', 'like', '%'.$request->param.'%')
            ->orWhere('content', 'like', '%'.$request->param.'%')
            ->orWhere('tags', 'like', '%'.$request->param.'%')
            ->orWhere('sites', 'like', '%'.$request->param.'%')
            ->orderBy('publication_date', 'desc')->orderBy('title')
            ->isActive()->paginate(10)->withQueryString();

        return view('document_libraries', compact('libraries', 'param'));
    }
}
