@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Halaman Member - Isi Data</h6>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (isset($user) && $user->id != null) 
                        @include('member.partials._editdata_form2');
                    @else
                        @include('member.partials._isidata_form2');
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
