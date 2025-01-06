@extends('layouts.school_admin')

@section('content')

<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Category and SubCategory Records</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Fees Payment History</a></li>
                    <li class="breadcrumb-item active">Category SubCategory Records</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Card Header -->
                    <div class="text-white card-header bg-info d-flex justify-content-between">
                        <h5>{{ $category->category_name }} - SubCategory Records</h5>

                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Category Details Table -->
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 50%;">Category Name</th>
                                    <th>Sub Category Fee Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>{{ $category->category_name }}</strong></td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($subCategories as $subCategory)
                                            <li>
                                                <strong>{{ $subCategory->category_name }}</strong> -
                                                <span class="text-primary">₹{{ number_format($subCategory->amount, 2) }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
