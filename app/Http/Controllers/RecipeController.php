<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function show($recipe)
{
    $recipe = \App\Models\Recipe::findOrFail($recipe);
    return view('recipes.show', compact('recipe'));
}

public function edit($recipe)
{
    $recipe = \App\Models\Recipe::findOrFail($recipe);
    return view('recipes.edit', compact('recipe'));
}

    public function update(Request $request, $recipe)
    {
        $recipe = Recipe::findOrFail($recipe);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $recipe->update([
            'title' => $request->title,
            'description' => $request->description,
            'instructions' => $request->instructions,
            'image' => $request->image,
            'origin_country' => $request->origin_country,
        ]);

        return redirect()->route('recipes.index');
    }

    public function destroy($recipe)
    {
        $recipe = Recipe::findOrFail($recipe);
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}