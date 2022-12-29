@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  
                    @if (auth()->check())
                       <p>you are loged in</p>
                    @else
                        <p>You must be logged in to view this content.</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
