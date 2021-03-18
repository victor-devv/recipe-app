<?php

namespace App\Http\Controllers\Admin;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth.isAdmin']);
    }

    public function index()
    {
        if (Gate::denies('logged-in')) {
            dd('unauthorized');
        }
        
        return view('admin.index')->with('recipes', Recipe::all());
    }

    // page to display comment box for recipe rejection
    public function reject($id)
    {
        $recipe = Recipe::findorFail($id);

        return view('recipes.reject')->with('recipe', $recipe);

    }

}
