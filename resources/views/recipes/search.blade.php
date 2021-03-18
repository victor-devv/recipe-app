@extends('templates.main')

@section('content')

<div class="card card-default px-4 py-5">
    <div class="card-header">
        <h4>Recipes Search</h4>
    </div>
    <div class="card-body">
        @if($recipes->count() > 0)

        <table class="table">
            <thead>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Summary</th>
                <th></th>
            </thead>

            <tbody>
                @foreach($recipes as $recipe)
                <tr scope="row">
                    <td>
                        <img src="{{ asset('/storage/'.$recipe->image) }}" alt="img" width="120px" height="60px">
                    </td>

                    <td>
                        {{ $recipe->name }}
                    </td>

                    <td>
                        {{ $recipe->summary }}
                    </td>

                    <td scope="row" class="">
                        <div class="d-flex">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-info btn-sm mr-4" role="button">View</a>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h1 class="text-center display-5 m-3 mb-5">No Recipes Found</h1>

        @endif

    </div>
</div>

@endsection