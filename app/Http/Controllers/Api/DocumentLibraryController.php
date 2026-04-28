<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DocumentLibrary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DocumentLibraryController extends Controller
{
    public function index()
    {

        return response()->json([
            'documents' => DocumentLibrary::orderBy('publication_date', 'desc')
                ->isActive()->paginate(10),
        ]);
    }

    public function show($slug, $file = false)
    {
        $library = DocumentLibrary::findOrFail(getIdFromSlug($slug));

        // get document if $file
        if ($file) {
            $file_id = getIdFromSlug($file);

            return Storage::download($library->documents[$file_id]);

            // return response()->download(Storage::path($library->documents[$file_id] ));
        }

        return response()->json([
            'document' => $library,
        ]);
    }

    public function search(Request $request)
    {
        $param = $request->param;

        // get the param
        return response()->json([
            'documents' => DocumentLibrary::where('title', 'like', '%'.$param.'%')
                ->orWhere('source', 'like', '%'.$param.'%')
                ->orWhere('content', 'like', '%'.$param.'%')
                ->orWhere('tags', 'like', '%'.$param.'%')
                ->orWhere('sites', 'like', '%'.$param.'%')
                ->orderBy('publication_date', 'desc')->orderBy('title')
                ->isActive()->paginate(10)->withQueryString(),
        ]);
    }
}
