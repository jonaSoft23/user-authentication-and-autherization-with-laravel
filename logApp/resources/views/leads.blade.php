@extends('layouts.dashboard')

@section('user')
<a href="#" class="d-block">User Man</a> 
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0 text-dark">Leads</h1>
          </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Leads</li>
              </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                  <div class="container text-right">
                  <button class="btn btn-primary btn-sm d-inline"  data-target="#demo" aria-controls="demo" aria-expanded="false">Add lead</button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  @forelse($leads as $lead)
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Lead Name</th>
                      <th>Company</th>
                      <th>Phone</th>
                      <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                      <td> {{ $lead->name }} </td>
                      <td> {{ $lead->company }} </td>
                      <td>{{ $lead->phone }}</td>
                      <td>  {{ $lead->email }} </td>
                    </tr>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Lead Name</th>
                      <th>Company</th>
                      <th>Phone</th>
                      <th>Email</th>
                    </tr>
                    </tfoot>
                  </table>
                  @empty
                      <p> No lead available.</p>

                  @endforelse
                </div>
                <!-- /.card-body -->
              </div>
              <div  id="demo">
              <div class="card " >
                <div class="card-header">
                    <h3 class="card-title">Add a new possible lead</h3>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" role="form" action="/app/leads" method="post">
                    
                      <div class="form-group">
                        <label for="name" class=" control-label " >Name: </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  >
                          @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="company" class=" control-label" >Company: </label>
                        <input type="text" class="form-control @error('company') is-invalid @enderror" name ="company" >
                        @error('company')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                        @enderror
                    </div>
                    <div>
                        <div class="form-group">
                          <label for="phone" class=" control-label" >Phone: </label>
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" name ="phone" >
                          @error('phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="email" class=" control-label" >Email: </label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror " name ="email" >
                            @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                            @enderror
                        </div>
                      </div>
                      @csrf
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  
                </div>
              </div>
              </div>
          </div>

      </div>
      </div>

  </div>
  <!-- /.content-wrapper -->

@endsection

