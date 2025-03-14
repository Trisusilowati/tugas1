@extends('backend.app')

@section('content')

    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-title">Tambah Mapel</div>
                            <a href="{{ route('mapel') }}" class="btn btn-info btn-sm">Kembali</a>
                        </div>


                        <div class="card-body">
                            <form method="POST" action="{{ route('mapel.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                        value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary px-4">
                                        {{ __('Tambah') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection