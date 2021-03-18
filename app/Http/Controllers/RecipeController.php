<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Recipe\UpdateRecipeRequest;
use App\Http\Requests\Recipe\CreateRecipesRequest;

class RecipeController extends Controller
{

    public function all()
    {
        $recipes = Recipe::where('approval_status', 1)->get();
        return view('welcome')->with('recipes', $recipes);

    }
    /**
     * Display a listing of the resource per user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id(); 
        // dd(Recipe::where('user_id', $user_id));

        $recipes = Recipe::where('user_id', $user_id)->get();
        return view('recipes.index')->with('recipes', $recipes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRecipesRequest $request)
    {
        $user_id = Auth::id(); 

        $image = $request->image->store('recipes');

        // Create post
        $recipe = Recipe::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'type' => $request->type,
            'summary' => $request->summary,
            'description' => $request->description,
            'main_ingredient' => $request->main_ingredient,
            'ingredients' => $request->ingredients,
            'image' => $image,
            'nutritional_value' => $request->nutritional_value,
            'cost' => $request->cost,   
        ]);

        // Flash success message
        session()->flash('success', 'Recipe Added Successfully!');

        // Redirect user
        return redirect(route('recipes.index'));
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('recipes.create')->with('recipe', $recipe);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {

        $data = $request->only(['name', 'type', 'summary', 'description', 'main_ingredient', 'ingredients', 'nutritional_value', 'cost']);

        // check for new image
        if ($request->hasFile('image')) {
            // upload it
            $image = $request->image->store('recipes');

            // delete old image
            $recipe->deleteImage();

            $data['image'] = $image;
        }

        // update attributes
        $recipe->update($data);

        // flash message
        session()->flash('success', 'Recipe Updated Successfully');

        // redirect user
        return redirect(route('recipes.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->search;

        // Search all necessary columns from the recipes table
        $recipes = Recipe::query()
            ->where('approval_status', true)
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('type', 'LIKE', "%{$search}%")
            ->orWhere('summary', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('main_ingredient', 'LIKE', "%{$search}%")
            ->orWhere('ingredients', 'LIKE', "%{$search}%")
            ->orWhere('nutritional_value', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('recipes.search', compact('recipes'));
    }

    public function approve($id)
    {
        $recipe = Recipe::findorFail($id);

        $recipe->update(['approval_status' => true]);
        $recipe->save();

        return redirect(route('admin.dashboard'));
    }

    public function reject(Request $request, Recipe $recipe)
    {
        $recipe = Recipe::findorFail($request->id);

        // $data = $request->only(['comments']);
        // $data['approval_status'] = false;

        $recipe->update(['approval_status' => false, 'comments' => $request->comments]);
        $recipe->save();

        // $recipe->save();

        // flash message
        session()->flash('success', 'Recipe Rejected Successfully');

        return redirect(route('admin.dashboard'));
    }

}
