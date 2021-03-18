@extends('templates.main')

@section('content')

<div class="card card-default px-4 py-5">
    <div class="card-header">
        <h4>Recipes</h4>
    </div>
    <div class="card-body">
        @if($recipes->count() > 0)
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('recipes.create') }}" class="btn btn-success float-right">Add Recipes</a>
        </div>

        <table class="table">
            <thead>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Summary</th>
                <th scope="col">Approval Status</th>
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
                    <td>
                        @if($recipe->approval_status)
                            Approved
                        @elseif(is_null($recipe->approval_status))
                            Not approved
                        @else
                            Rejected
                        @endif
                    </td>

                    <td scope="row" class="">
                        <div class="d-flex">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-info btn-sm mr-4" role="button">View</a>
                        @if(is_null($recipe->approval_status))
                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-secondary btn-sm ml-2" role="button">Edit</a>
                        @endif
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h1 class="text-center display-5 m-3 mb-5">No Recipes At The Moment...</h1>

        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('recipes.create') }}" class="btn btn-success float-right">Add Recipes</a>
        </div>

        @endif

    </div>
</div>

@endsection