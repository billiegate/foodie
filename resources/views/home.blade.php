@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} {user}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <center>
                        <h2>Available Foods</h2>
                    </center>
                    <div>
                        <items></items>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
