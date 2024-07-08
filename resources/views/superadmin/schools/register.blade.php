@extends('layouts.superadmin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">School Create</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header" >
                    <h2 class="card-title" style="font-family: 'Arial', sans-serif;">School Registration Form</h2>
                        <a href="{{ route('school.list') }}" class="btn  float-right"><i class="fa fa-arrow-left"></i></a>
                </div>
                <form method="POST" action="{{ route('school.register') }}">
                    @csrf
                    <div class="card-body">
                        <!-- User details -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" style="font-family: 'Arial', sans-serif;">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" style="font-family: 'Arial', sans-serif;">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" style="font-family: 'Arial', sans-serif;">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation" style="font-family: 'Arial', sans-serif;">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <!-- School details -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="school_name" style="font-family: 'Arial', sans-serif;">School Name</label>
                                    <input id="school_name" type="text" class="form-control" name="school_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address" style="font-family: 'Arial', sans-serif;">Address</label>
                                    <input id="address" type="text" class="form-control" name="address" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" style="font-family: 'Arial', sans-serif;">Phone</label>
                                    <input id="phone" type="text" class="form-control" name="phone" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary float-right" >Register School</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </section>
@endsection
