        @extends('layouts.school_admin')

        @section('content')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="content">
            <div class="row">

                <!-- Medium Dropdown -->
                <div class="mt-3 col-2">
                    <select id="mediumDropdown" name="medium" class="form-control" style="border-radius: 5px;">
                        <option value="">Select Medium</option>
                        @foreach ($mediums as $medium)
                        <option value="{{ $medium->id }}" @if($medium->medium_name == 'English Medium') selected @endif>
                            {{ $medium->medium_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Horizontal Standards List -->
                <div class="mt-3 col-10" id="standardsContainer" style="display: none;">
                    <!-- Initially hidden -->
                    <div class="card">
                        <div class="card-header">
                            <ul id="standardsList" class="overflow-auto list-group list-group-horizontal" style="display: flex; gap:9px;">

                            </ul>


                        </div>
                    </div>
                </div>

                <!-- Students Table Section (Initially Hidden) -->
                <div class="container-fluid" id="studentsTableContainer" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3 card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4>StandardWise List</h4>
                                    <a href="{{ route('fees-payment-history') }}" class="btn btn-info ms-auto">Fees Payment History</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" style="margin-top: -7px;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Student Name</th>
                                                <th>ClassName</th>
                                                <th>Medium Name</th>
                                                <th>Role Number</th>
                                                <th>Total Fees ClassWise</th>
                                                <th>Due Amount</th>
                                                <th>Paid Amount</th>
                                                {{-- <th>{{ $master_fee_categories }}</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentsTableBody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="StandardName">Students Fees Amount Paid By Class</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form id="feesForm" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="mb-3">
                                    <label for="studentName" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" id="studentName" name="student_name" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="totalFees" class="form-label">Total Fees</label>
                                    <input type="text" class="form-control" id="totalFees" name="total_fees" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="class_id" class="form-label">Standard Name</label>
                                    <input type="text" class="form-control" id="class_id" name="class_id" readonly>
                                </div>



                                <div class="mb-3">
                                    <label for="class_id" class="form-label">Medium Name</label>
                                    <input type="text" class="form-control" id="mediumId" name="medium_id" readonly>
                                </div>



                                <div class="mb-3">
                                    <label for="fee_category" class="form-label">Master Category Fee</label>
                                    <select name="fee_category_id" id="fee_category_id" class="form-control">
                                        <option value="">Select a Master Category</option>
                                    </select>
                                    <span class="text-danger" id="FeeCategoryError"></span> <!-- Error message for fee category -->
                                </div>

                                <div class="mb-3">
                                    <label for="paidAmount" class="form-label">Enter Paid Amount</label>
                                    <input type="number" class="form-control" id="paidAmount" name="paid_amount" placeholder="Enter Your Paid Amount">
                                    <span class="text-danger" id="paidAmountError"></span> <!-- Error message for paid amount -->
                                </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Submit Payment</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>














<script>
    // When the page loads, check for default "English Medium" and load standards automatically
    $(document).ready(function() {
        // Set the default "English Medium" and load standards
        let selectedMedium = $('#mediumDropdown').val();

        if (!selectedMedium) {
            // Set to 'English Medium' by default if no medium selected
            $('#mediumDropdown').val(@php echo json_encode($mediums->firstWhere('medium_name', 'English Medium')->id); @endphp);
            selectedMedium = $('#mediumDropdown').val();
        }

        loadStandards(selectedMedium);  // Load standards based on medium selection

        // When the medium changes, load standards accordingly
        $('#mediumDropdown').change(function() {
            const mediumId = $(this).val();
            loadStandards(mediumId);
        });

        function loadStandards(mediumId) {
            // Fetch standards based on selected medium
            $.ajax({
                url: '/fetch-standards',
                method: 'GET',
                data: { medium_id: mediumId },
                success: function(response) {
                    const standards = response.standards;
                    $('#standardsContainer').show();
                    $('#standardsList').empty();

                    standards.forEach((standard, index) => {
                        $('#standardsList').append(`
                            <li class="text-center list-group-item standard-item" style="min-width: 100px; border: 1px solid #ddd; padding: 10px; cursor: pointer;" data-standard-id="${standard.id}">
                                ${standard.standard_name}
                            </li>
                        `);
                    });

                    // Automatically click the first standard if available
                    if (standards.length > 0) {
                        loadStudents(standards[0].id);  // Load students for the first standard
                        $('#standardsList li:first-child').addClass('active');  // Highlight the first standard
                    }
                }
            });
        }

        // When a standard is clicked, load students for that standard
        $(document).on('click', '.standard-item', function() {
            const standardId = $(this).data('standard-id');
            loadStudents(standardId);
            $('.standard-item').removeClass('active');
            $(this).addClass('active');
        });

        function loadStudents(standardId) {
            $.ajax({
                url: "{{ url('fetch-students') }}/" + standardId,
                method: 'GET',
                data: { standard_id: standardId },
                success: function(response) {
                    const students = response.students;
                    const totalFeesClassWise = response.totalFeesClassWise;

                    const totalPaidAmount = response.totalPaidAmount;
                    const totalDueAmount = response.totalDueAmount;
                    // Display students in the table
                    $('#studentsTableContainer').show();
                    $('#studentsTableBody').empty();

                    students.forEach(student => {
                        $('#studentsTableBody').append(`
                            <tr>
                                <td>${student.id}</td>
                                 <td>${student.first_name} ${student.last_name}</td>
                                <td>${student.standard.standard_name}</td>
                                <td>${student.medium.medium_name}</td>
                                <td>${student.roll_number}</td>
                                <td>${totalFeesClassWise}</td>
                                <td>${student.due_amount}</td>
                                <td>${student.paid_amount}</td>
                                <td>
                                <button type="button" class="btn btn-primary fees-paid-btn"
                                        data-toggle="modal"
                                        data-target="#modal-default"
                                        data-student-id="${student.id}"
                                        data-medium-id="${student.medium ? student.medium.medium_name : ''}"
                                        data-student-name="${student.first_name} ${student.last_name}"
                                        data-total-fees="${response.totalFeesClassWise}"
                                        data-standard-name="${student.standard ? student.standard.standard_name : ''}">
                                        Fees Paid Button....
                                </button>
                            </td>
                            </tr>
                        `);
                    });
                }
            });
        }
    });
</script>








        @endpush
        @endsection
