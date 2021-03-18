@extends('templates.main')

@section('css')
<style>
trix-editor, 
trix-toolbar {
  pointer-events: none;
}
</style>
@endsection

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h4>{{ isset($recipe) ? $recipe->name : '' }}</h4>
        
    </div>
    <div class="card-body p-5">
        <form class="p-2" action="#" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="type" class="form-label">Meal Type</label>
                <input type="text" id="type" class="form-control" name="type" value="{{ isset($recipe) ? $recipe->type : '' }}" placeholder="Breakfast, Lunch, Dinner ..." disabled>
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea name="summary" id="summary" cols="5" rows="2" class="form-control" disabled>{{ isset($recipe) ? $recipe->summary : '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input id="description" type="hidden" name="description" value="{{ isset($recipe) ? $recipe->description : '' }}" disabled/>
                <trix-editor input="description" disabled></trix-editor>
            </div>

            <div class="mb-3">
                <label for="main_ingredient" class="form-label">Main Ingredient</label>
                <input type="text" id="main_ingredient" class="form-control" name="main_ingredient" value="{{ isset($recipe) ? $recipe->main_ingredient : '' }}" disabled>
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredients</label>
                <input id="ingredients" type="hidden" name="ingredients" value="{{ isset($recipe) ? $recipe->ingredients : '' }}" disabled/>
                <trix-editor input="ingredients" disabled></trix-editor>
            </div>

            <div class="mb-3">
                <label for="nutritional_value" class="form-label">Nutritional Value</label>
                <input id="nutritional_value" type="hidden" name="nutritional_value" value="{{ isset($recipe) ? $recipe->nutritional_value : '' }}" disabled/>
                <trix-editor input="nutritional_value" disabled></trix-editor>

            </div>

            <div class="mb-3">
                <label for="cost" class="form-label">Estimated Cost</label>
                <input type="text" id="cost" class="form-control" name="cost" value="{{ isset($recipe) ? $recipe->cost : '' }}" step=".01" disabled>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                @if(isset($recipe))
                <img src="{{ asset('storage/'.$recipe->image) }}" alt="recipe image" style="width: 100%">
                @endif
            </div>
            @if($recipe->approval_status === 0)
                <div class="mb-3">
                    <label for="comments" class="form-label">Rejection Comments</label>
                    <textarea name="comments" id="comments" cols="5" rows="5" class="form-control" disabled>{{ isset($recipe) ? $recipe->comments : '' }}</textarea>
                </div>

            @endif
        </form>
    </div>
</div>

@endsection