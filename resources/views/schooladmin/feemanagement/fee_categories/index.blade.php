@extends('layouts.school_admin')

@section('content')
<div class="container">
    <div class="row">
        <!-- Left Section: Medium and Class Listing -->
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">EMS Classes</h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($emsClasses as $class)
                        <li class="list-group-item">
                            <a href="#" class="class-link {{ $loop->first ? 'active' : '' }}" data-class-id="{{ $class->id }}">
                                {{ $class->standard_name }} (EMS)
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">GMS Classes</h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($gmsClasses as $class)
                        <li class="list-group-item">
                            <a href="#" class="class-link {{ $emsClasses->isEmpty() && $loop->first ? 'active' : '' }}" data-class-id="{{ $class->id }}">
                                {{ $class->standard_name }} (GMS)
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Right Section: Fee Details -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body" id="fee-details">
                    <!-- Placeholder for fee details; populated on load with first class -->
                    <p>Select a class from the list to view its fee details.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function() {
        // Automatically load the first class fees on page load
        var firstClassId = $('.class-link.active').data('class-id');
        if (firstClassId) {
            loadClassFees(firstClassId);
        }

        // Event listener for class links
        $('.class-link').click(function(e) {
            e.preventDefault();
            var classId = $(this).data('class-id');

            // Remove 'active' class from all and add it to the clicked one
            $('.class-link').removeClass('active');
            $(this).addClass('active');

            // Load fee details for the clicked class
            loadClassFees(classId);
        });

        // Function to load class fee details via AJAX
        function loadClassFees(classId) {
            $.ajax({
                url: '/get-class-fees/' + classId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#fee-details').empty();

                    var feeContent = '<div class="d-flex justify-content-between align-items-center mb-3">';
                    feeContent += '<h4>Fees for ' + data.class_name + '</h4>';
                    feeContent += '<a href="/fee-categories" class="btn btn-primary">+ Create Fees</a>';
                    feeContent += '</div>';
                    feeContent += '<p><strong>Due Date:</strong> ' + data.due_date + '</p>';
                    feeContent += '<table class="table table-bordered mt-3">';
                    feeContent += '<thead><tr><th>Category</th><th>Amount</th><th>Description</th></tr></thead>';
                    feeContent += '<tbody>';

                    $.each(data.fees, function(index, fee) {
                        feeContent += '<tr>';
                        feeContent += '<td>' + fee.category_name + '</td>';
                        feeContent += '<td class="text-success"> ₹ ' + fee.amount + '</td>';
                        feeContent += '<td>' + (fee.description ? fee.description : 'N/A') + '</td>';
                        feeContent += '</tr>';
                    });

                    feeContent += '</tbody>';
                    feeContent += '<tfoot>';
                    feeContent += '<tr>';
                    feeContent += '<td colspan="2"><strong>Total Fee</strong></td>';
                    feeContent += '<td class="text-success"><strong>₹ ' + data.total_amount + '</strong></td>';
                    feeContent += '</tr>';
                    feeContent += '</tfoot>';
                    feeContent += '</table>';

                    $('#fee-details').html(feeContent);
                },
                error: function() {
                    $('#fee-details').html('<p>Error fetching fee details. Please try again.</p>');
                }
            });
        }
    });
</script>
@endpush

@endsection
