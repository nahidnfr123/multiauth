@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Index page') }}</div>

                    <div class="card-body">
                        @if (Auth::check())
                            <div class="alert alert-info col-6 m-auto text-center">
                                <b>"{{ Auth::user()->full_name }}"</b> is logged in ..
                            </div>
                        @else
                            <div class="alert alert-warning col-6 m-auto text-center">
                                No logged in User ..
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



