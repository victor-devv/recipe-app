@extends('templates.main')

@section('css')

@endsection

@section('content')

<div class="card card-default">
    <div class="card-header">
        <h4>Reject {{ $recipe->name }} Recipe</h4>
    </div>
    <div class="card-body p-5">
        @include('partials.errors')
        <form class="p-2" action="{{ route('admin.recipe.reject', $recipe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($recipe))
            @method('PATCH')
            @endif
            <input type="hidden" name="id" value="{{$recipe->id}}">
            <div class="mb-3">
                <label for="comments" class="form-label">Comments</label>
                <textarea name="comments" id="comments" cols="5" rows="5" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <button class="btn btn-danger">Reject Recipe</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
@endsection