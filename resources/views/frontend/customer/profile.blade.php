@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Customer Profile') }}</div>

                    <div class="card-body">
                        Name : {{ Auth::user()->full_name }}
                        <br>
                        Name : {{ Auth::user()->email }}
                        <br>
                        Name : {{ Auth::user()->mobile_number }}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
