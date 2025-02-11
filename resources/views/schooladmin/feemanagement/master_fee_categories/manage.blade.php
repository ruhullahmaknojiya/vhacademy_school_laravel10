@extends('layouts.school_admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Create Master Fee Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Master Fee Category</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Card for Create Form -->
    <div class="mt-3 card">
        <div class="card-header">
            <h2>Create Master Fee Category</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('feemanagement.storeMasterFeeCategory') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="mb-3 col-md-6">
                        <label for="category_name">Category Name</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="payment_type">Payment Type</label>
                        <select name="payment_type" id="payment_type" class="form-control" required>
                            <option value="full">Full</option>
                            <option value="emi">EMI</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="mb-3 col-md-6">
                        <label for="installments">Number of Installments (If EMI)</label>
                        <input type="number" name="installments" id="installments" class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="installment_amount">Installment Amount (If EMI)</label>
                        <input type="number" name="installment_amount" id="installment_amount" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Create Master Fee Category</button>
            </form>
        </div>
    </div>

    <!-- Card for Listing Master Fee Categories -->
    <div class="card">
        <div class="card-header">
            <h2>Master Fee Categories</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Payment Type</th>
                        <th>Installments</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ strtoupper($category->payment_type) }}</td>
                        <td>{{ $category->payment_type === 'emi' ? $category->installments : 'N/A' }}</td>
                        <td>{{ $category->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
@endsection
