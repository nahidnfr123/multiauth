@extends('admin/layouts/app')

@section('body_content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if(count($Users)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($Users as $User)
                                    <tr>
                                        <th scope="row">{{ $User->id }}</th>
                                        <td>{{ $User->name }}</td>
                                        <td>{{ $User->email }}</td>
                                        <td>{{ implode(', ', $User->roles()->get()->pluck('name')->toArray()) }}</td>
                                        <td class="d-flex">
                                            @can('edit-users')
                                            <a href="{{ route('admin.users.edit', $User->id) }}">
                                                <button type="button" class="btn-warning btn btn-sm">Edit</button>
                                            </a>
                                            @endcan
                                            |
                                            @can('delete-users')
                                            <form action="{{ route('admin.users.destroy', $User->id) }}" method="post" class="">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn-danger btn btn-sm">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
