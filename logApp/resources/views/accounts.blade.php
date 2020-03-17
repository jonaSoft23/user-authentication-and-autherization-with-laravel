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
                  <button class="btn btn-primary btn-sm d-inline" aria-pressed="true" data-toggle="collapse" data-target="#demo" aria-controls="demo" aria-expanded="false">Add new Account</button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  @forelse($accounts as $account)
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Account Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                      <td> {{ $account->name }} </td>
                      <td> {{ $account->phone }} </td>
                      <td>{{ $account->email }}</td>
                    </tr>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Account Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                    </tr>
                    </tfoot>
                  </table>
                  @empty
                      <p> No Account available.</p>

                  @endforelse
                </div>
                <!-- /.card-body -->
              </div>
              <div  class="collapse" id="demo">
              <div class="card " >
                <div class="card-header">
                    <h3 class="card-title">Add a new Account</h3>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" role="form" action="/app/accounts" method="post">
                    
                      <div class="form-group">
                        <label for="name" class=" control-label " >Account Name: </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  >
                          @error('name')
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

