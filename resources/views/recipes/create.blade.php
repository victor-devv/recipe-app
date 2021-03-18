@extends('templates.main')

@section('css')

@endsection

@section('content')

<div class="card card-default">
    <div class="card-header">
        <h4>{{ isset($recipe) ? 'Edit Recipe' : 'Create Recipe' }}</h4>
        
    </div>
    <div class="card-body p-5">
        @include('partials.errors')
        <form class="p-2" action="{{ isset($recipe) ? route('recipes.update', $recipe->id) : route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($recipe))
            @method('PUT')
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ isset($recipe) ? $recipe->name : '' }}">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Meal Type</label>
                <input type="text" id="type" class="form-control" name="type" value="{{ isset($recipe) ? $recipe->type : '' }}" placeholder="Breakfast, Lunch, Dinner ...">
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea name="summary" id="summary" cols="5" rows="2" class="form-control">{{ isset($recipe) ? $recipe->summary : '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input id="description" type="hidden" name="description" value="{{ isset($recipe) ? $recipe->description : '' }}" />
                <trix-editor input="description"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="main_ingredient" class="form-label">Main Ingredient</label>
                <input type="text" id="main_ingredient" class="form-control" name="main_ingredient" value="{{ isset($recipe) ? $recipe->main_ingredient : '' }}">
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredients</label>
                <input id="ingredients" type="hidden" name="ingredients" value="{{ isset($recipe) ? $recipe->ingredients : '' }}" />
                <trix-editor input="ingredients"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="nutritional_value" class="form-label">Nutritional Value</label>
                <input id="nutritional_value" type="hidden" name="nutritional_value" value="{{ isset($recipe) ? $recipe->nutritional_value : '' }}" />
                <trix-editor input="nutritional_value"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="cost" class="form-label">Estimated Cost</label>
                <input type="text" id="cost" class="form-control" name="cost" value="{{ isset($recipe) ? $recipe->cost : '' }}" step=".01">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                @if(isset($recipe))
                <img src="{{ asset('storage/'.$recipe->image) }}" alt="recipe image" style="width: 100%">
                @endif

                <input type="file" id="image" class="form-control" name="image">
            </div>

            <div class="mb-3">
                <button class="btn btn-success">{{ isset($recipe) ? 'Update Recipe' : 'Add Recipe' }}</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
@endsection