<?php

namespace App\Http\Controllers;

use App\Models\Constitution;

class ConstitutionController extends Controller
{
    public function show($slug = 'constitution-of-the-federal-republic-of-nigeria-20')
    {

        // get all sections
        $sections = Constitution::select('id', 'subject', 'constitution_id')
            ->with('subsections', 'subsections.subsections', 'subsections.subsections.subsections')
            ->whereNull('constitution_id')
            ->isActive()
            ->orderBy('sort')
            ->orderBy('constitution_id')->get();

        $id = getIdFromSlug($slug);
        $item = Constitution::with('section')->findOrFail($id);

        return view('constitution', compact('sections', 'item'));
    }
}
