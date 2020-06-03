@extends('admin/layouts/app')

@section('body_content')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit user, {{ $user->name }}</div>

                    <div class="card-body">
                        @isset($user)
                            <form action="{{route('admin.users.update', $user)}}" method="post">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name', $user->full_name) }}" required autocomplete="name" autofocus>
                                        @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
                                    <div class="col-md-6">
                                    @foreach($roles as $role)
                                        <div class="form-check " id="roles">
                                            <input type="checkbox" name="roles[]" value="{{$role->id}}" id="{{ $role->name.'inp' }}"
                                            @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                            <label for="{{ $role->name.'inp' }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('Script')

@endsection
