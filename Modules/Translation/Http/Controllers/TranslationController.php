<?php

namespace Modules\Translation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Language;
use App\Models\TranslationKey;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $languages = Language::all();
        return view('translation::index',['languages' => $languages, 'title' => 'Manage Languages']);
    }
    public function strings($languageId)
    {
        $language = Language::findOrFail($languageId);
    $translations = TranslationKey::where('language_id', $languageId)->get();
    return view('translation::translations', compact('language', 'translations'));
    }
    public function update(Request $request, $languageId, $key)
{
    $translation = TranslationKey::where('language_id', $languageId)->where('key', $key)->firstOrFail();

    $translation->parent_key = $request->input('parent_key');
    $translation->value = $request->input('value');
    $translation->save();

    return response()->json(['message' => 'Translation updated successfully']);
}

    public function getTranslations($languageId)
    {
        $translations = TranslationKey::where('language_id', $languageId)->get();
        $translationArray = [];

        // foreach ($translations as $translation) {
        //     $translationArray[$translation->key] = $translation->value;
        // }

        return response()->json($translations);
    }
    public function getTranslationsApi($languageName)
    {
        $language = Language::where('name', $languageName)->firstOrFail();
        $translations = TranslationKey::where('language_id', $language->id)->get();
        $groupedTranslations = [];

        foreach ($translations as $translation) {
            if (!isset($groupedTranslations[$translation->parent_key])) {
                $groupedTranslations[$translation->parent_key] = [];
            }
            $groupedTranslations[$translation->parent_key][$translation->key] = $translation->value;
        }
        return response()->json($groupedTranslations);
    }

    public function storeTranslation(Request $request)
    {
        $request->validate([
            'language_id' => 'required|exists:languages,id',
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $translation = TranslationKey::updateOrCreate(
            ['language_id' => $request->language_id, 'parent_key' => $request->parent_key,'key' => $request->key],
            ['value' => $request->value,'parent_key'=>$request->parent_key,'parent_key' => $request->parent_key]
        );

        return response()->json($translation, 201);
    }

    public function updateTranslation(Request $request, $languageId, $key)
    {
        $request->validate([
            'value' => 'required|string',
        ]);

        $translation = TranslationKey::updateOrCreate(
            ['language_id' => $languageId, 'key' => $key],
            ['value' => $request->value,'parent_key'=>$request->parent_key]
        );

        return response()->json($translation);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('translation::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('translation::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('translation::edit');
    }

    

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
