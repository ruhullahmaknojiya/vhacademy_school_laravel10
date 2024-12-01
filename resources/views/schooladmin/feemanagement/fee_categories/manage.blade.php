@extends('layouts.school_admin')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Card for Create Fees Form -->
    <div class="card shadow mb-4">
        <div class="card-header bg-white text-white">
            <h4 class="mb-0">Create Fees</h4>
        </div>
        <div class="card-body">
            <div id="loader" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255, 255, 255, 0.8); z-index:9999;">
                <div class="d-flex justify-content-center align-items-center" style="height:100%;">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <form action="{{ route('storeFeeCategory') }}" method="POST">
                @csrf
                <!-- Section for Master Category, Medium, Standard, Fee Due Date -->
                <h5 class="mb-3">General Information</h5>
                <div class="form-row mb-4">
                    <div class="col-md-3">
                        <label for="master_category_id">Master Category</label>
                        <select name="master_category_id" id="master_category_id" class="form-control" required>
                            <option value="">-- Select Master Category --</option>
                            @foreach($masterCategories as $masterCategory)
                                <option value="{{ $masterCategory->id }}">{{ $masterCategory->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="medium_id">Medium</label>
                        <select name="medium_id" id="medium_id" class="form-control" required>
                            <option value="">-- Select Medium --</option>
                            @foreach($mediums as $medium)
                                <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="class_id">Class</label>
                        <select name="class_id" id="class_id" class="form-control" required>
                            <option value="">-- Select Class --</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->standard_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="due_date">Fee Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="form-control" required>
                    </div>
                </div>

                <!-- Dynamic Fee Category Fields Section -->
                <h5 class="mb-3">Fee Categories</h5>
                <div id="fee-category-fields">
                    <div class="fee-category-group">
                        <div class="form-row mb-3">
                            <div class="col-md-3">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="category_name[]" id="category_name" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount[]" id="amount" class="form-control" required>
                            </div>
                            <div class="col-md-5">
                                <label for="description">Description</label>
                                <textarea name="description[]" id="description" class="form-control" rows="1"></textarea>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-success add-more">+</button>
                                <button type="button" class="btn btn-danger remove-row ml-2">-</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Create Fee Categories</button>
            </form>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {

        $('#feeCategoryForm').submit(function() {
            $('#loader').show();
        });
        // Add more fee category fields dynamically
        $('.add-more').click(function() {
            var feeCategoryGroup = $('.fee-category-group').first().clone(); // Clone the first group
            feeCategoryGroup.find('input, textarea').val(''); // Clear input values
            $('#fee-category-fields').append(feeCategoryGroup);
        });

        // Remove fee category fields dynamically
        $(document).on('click', '.remove-row', function() {
            if ($('.fee-category-group').length > 1) {
                $(this).closest('.fee-category-group').remove();
            }
        });

        // AJAX to fetch classes based on selected medium
        $('#medium_id').change(function() {
            var mediumId = $(this).val();
            if (mediumId) {
                $.ajax({
                    url: '/get-classes/' + mediumId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#class_id').empty();
                        $('#class_id').append('<option value="">-- Select Class --</option>');
                        $.each(data, function(key, value) {
                            $('#class_id').append('<option value="' + value.id + '">' + value.standard_name + '</option>');
                        });
                    },
                    error: function() {
                        console.error('Error fetching classes');
                    }
                });
            } else {
                $('#class_id').empty();
                $('#class_id').append('<option value="">-- Select Class --</option>');
            }
        });
    });
</script>
@endpush

@endsection
