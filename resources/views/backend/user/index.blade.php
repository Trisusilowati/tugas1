@extends('backend.app')

@section('content')

<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Tables</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Tables</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Basic Tables</a>
                </li>
              </ul>
            </div>
            <div class="row"></div>
    
    </div>
</div>
<div class="col-md-12">
                <div class="card">
                  <d class="card-header">
                    <div class="card-title">Halaman User</div>
                  </div>
                  <div class="card-body">
                  <table class="table table-head-bg-success table-hover">
                  <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
@endsection