        {{-- @extends('layouts.school_admin')

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
                                                {{-- <th>Action</th>
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

            </div> --}}


                                                {{-- <div class="modal fade" id="modal-default">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}








        {{-- <script>
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
                <button type="button" class="btn btn-primary fees-paid-btn" data-toggle="modal" data-target="#modal-default" data-student-id="${student.id}" data-medium-id="${student.medium ? student.medium.medium_name : ''}" data-student-name="${student.first_name} ${student.last_name}" data-total-fees="${response.totalFeesClassWise}" data-standard-name="${student.standard ? student.standard.standard_name : ''}">
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
        </script> --}}








        {{-- @endpush --}}
        {{-- @endsection --}}










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
                            <ul id="standardsList" class="overflow-auto list-group list-group-horizontal" style="display: flex; gap: 10px;">

                            </ul>
                        </div>
                    </div>
                </div>


                <div class="container-fluid" id="studentsTableContainer" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3 card">
                                <div class="card-header">
                                    <h4>StandardWise List</h4>
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
            $(document).ready(function() {

                let defaultMediumId = $('#mediumDropdown').val();
                if (!defaultMediumId) {
                    $('#mediumDropdown').val(defaultMediumId);
                    defaultMediumId = $('#mediumDropdown').val();
                }

                // Load standards for the default medium
                loadStandards(defaultMediumId);

                // Trigger loadStandards when medium dropdown value changes
                $('#mediumDropdown').change(function() {
                    const mediumId = $(this).val();
                    loadStandards(mediumId);
                });

                // Function to load standards based on medium selection
                function loadStandards(mediumId) {
                    if (!mediumId) {
                        $('#standardsContainer').hide();
                        $('#studentsTableContainer').hide();
                        return; // Exit if no medium is selected
                    }

                    $.ajax({
                        url: '/fetch-standards', // Endpoint to fetch standards for the selected medium
                        method: 'GET'
                        , data: {
                            medium_id: mediumId
                        }
                        , success: function(response) {
                            const standards = response.standards;
                            $('#standardsContainer').show();
                            $('#standardsList').empty();

                            // Populate standards in the list
                            standards.forEach((standard) => {
                                $('#standardsList').append(`
                    <li class="text-center list-group-item standard-item" style="min-width: 100px; border: 1px solid #ddd; padding: 10px; cursor: pointer;" data-standard-id="${standard.id}">
                        ${standard.standard_name}
                    </li>
                `);
                            });

                            // Automatically load students for the first standard after standards are loaded
                            const firstStandardId = standards[0].id;
                            loadStudents(firstStandardId);


                            // Highlight the first standard in the list
                            $('#standardsList li:first-child').addClass('active');
                        }
                    });
                }

                // Handle standard click event
                $(document).on('click', '.standard-item', function() {
                    const standardId = $(this).data('standard-id');
                    loadStudents(standardId);
                    $('.standard-item').removeClass('active');
                    $(this).addClass('active');
                    $('#studentsTableBody').empty();
                    $('#studentsTableContainer').show();
                });


                function loadStudents(standardId) {
                    $.ajax({
                        url: `/fetch-students/${standardId}`, // Endpoint to fetch students for the selected standard
                        method: 'GET'
                        , success: function(response) {
                            $('#studentsTableBody').empty();

                            if (response.students.length > 0) {
                                response.students.forEach(student => {
                                    const dueAmount = student.due_amount;
                                    const paidAmount = student.paid_amount;

                                    $('#studentsTableBody').append(`
                        <tr>
                            <td>${student.id}</td>
                            <td>${student.first_name} ${student.last_name}</td>
                            <td>${student.standard ? student.standard.standard_name : 'N/A'}</td>
                            <td>${student.medium ? student.medium.medium_name : 'N/A'}</td>
                            <td>${student.roll_number}</td>
                            <td>${response.totalFeesClassWise}</td>
                            <td class="due-amount" data-student-id="${student.id}">${dueAmount}</td>
                            <td class="paid-amount" data-student-id="${student.id}">${paidAmount}</td>
                            <td>
                               <button type="button" class="btn ${response.totalFeesClassWise === paidAmount ? 'btn-success' : 'btn-primary'} fees-paid-btn"
                    data-toggle="modal"
                    data-target="#modal-default"
                       data-student-id="${student.id}"
                        data-medium-id="${student.medium ? student.medium.medium_name : ''}"
                        data-student-name="${student.first_name} ${student.last_name}"
                       data-total-fees="${response.totalFeesClassWise}"
                        data-standard-name="${student.standard ? student.standard.standard_name : ''}"
                       ${response.totalFeesClassWise === paidAmount ? 'disabled' : ''}>
                        ${response.totalFeesClassWise === paidAmount ? 'Paid' : 'Fees Paid Details'}
                      </button>
                            </td>
                        </tr>
                    `);
                                });
                            } else {
                                $('#studentsTableBody').append('<tr><td colspan="9" class="text-center">No students found.</td></tr>');
                            }
                        }
                    });
                }
            });










//             $(document).ready(function() {

// let defaultMediumId = $('#mediumDropdown').val();
// if (!defaultMediumId) {
//     $('#mediumDropdown').val(defaultMediumId);
//     defaultMediumId = $('#mediumDropdown').val();
// }

// // Load standards for the default medium
// loadStandards(defaultMediumId);

// // Trigger loadStandards when medium dropdown value changes
// $('#mediumDropdown').change(function() {
//     const mediumId = $(this).val();
//     loadStandards(mediumId);
// });

// // Function to load standards based on medium selection
// function loadStandards(mediumId) {
//     if (!mediumId) {
//         $('#standardsContainer').hide();
//         $('#studentsTableContainer').hide();
//         return; // Exit if no medium is selected
//     }

//     $.ajax({
//         url: '/fetch-standards',  // Endpoint to fetch standards for the selected medium
//         method: 'GET',
//         data: {
//             medium_id: mediumId
//         },
//         success: function(response) {
//             const standards = response.standards;
//             $('#standardsContainer').show();
//             $('#standardsList').empty();

//             // Populate standards in the list
//             standards.forEach((standard, index) => {
//                 $('#standardsList').append(`
//                     <li class="text-center list-group-item standard-item" style="min-width: 100px; border: 1px solid #ddd; padding: 10px; cursor: pointer;" data-standard-id="${standard.id}">
//                         ${standard.standard_name}
//                     </li>
//                 `);
//             });

//             // Automatically load students for the first standard after standards are loaded
//             const firstStandardId = standards[0].id;
//             loadStudents(firstStandardId);

//             // Highlight the first standard in the list
//             $('#standardsList li:first-child').addClass('active');
//         }
//     });
// }

// // Event handler when a standard is clicked
// $(document).on('click', '.standard-item', function() {
//     const standardId = $(this).data('standard-id');
//     loadStudents(standardId);
//     $('.standard-item').removeClass('active');
//     $(this).addClass('active');
//     $('#studentsTableBody').empty();
//     $('#studentsTableContainer').show();
// });

// // Function to load students based on the selected standard ID
// function loadStudents(standardId) {
//     $.ajax({
//         url: `/fetch-students/${standardId}`,  // Endpoint to fetch students for the selected standard
//         method: 'GET',
//         success: function(response) {
//             $('#studentsTableBody').empty();  // Clear existing students

//             if (response.students.length > 0) {
//                 // Populate students in the table
//                 response.students.forEach(student => {
//                     const dueAmount = student.due_amount;
//                     const paidAmount = student.paid_amount;

//                     $('#studentsTableBody').append(`
//                         <tr>
//                             <td>${student.id}</td>
//                             <td>${student.first_name} ${student.last_name}</td>
//                             <td>${student.standard ? student.standard.standard_name : 'N/A'}</td>
//                             <td>${student.medium ? student.medium.medium_name : 'N/A'}</td>
//                             <td>${student.roll_number}</td>
//                             <td>${response.totalFeesClassWise}</td>
//                             <td class="due-amount" data-student-id="${student.id}">${dueAmount}</td>
//                             <td class="paid-amount" data-student-id="${student.id}">${paidAmount}</td>
//                             <td>
//                                 <button type="button" class="btn btn-primary fees-paid-btn" data-toggle="modal" data-target="#modal-default"
//                                 data-student-id="${student.id}" data-medium-id="${student.medium ? student.medium.medium_name : ''}"
//                                 data-student-name="${student.first_name} ${student.last_name}" data-total-fees="${response.totalFeesClassWise}"
//                                 data-standard-name="${student.standard ? student.standard.standard_name : ''}">
//                                     Fees Paid Details
//                                 </button>
//                             </td>
//                         </tr>
//                     `);
//                 });
//             } else {
//                 $('#studentsTableBody').append('<tr><td colspan="9" class="text-center">No students found</td></tr>');
//             }
//         }
//     });
// }
// });


        </script>









        <script>
            $(document).ready(function() {

                $.ajax({
                    url: '/fetch-master-fee-categories'
                    , type: 'GET'
                    , success: function(response) {
                        if (response.status) {
                            const feeCategoryDropdown = $('#fee_category_id');
                            response.categories.forEach(category => {
                                feeCategoryDropdown.append(
                                    `<option value="${category.id}">${category.category_name}</option>`
                                );
                            });
                        }
                    }
                    , error: function(err) {
                        console.error('Failed to fetch master fee categories:', err);
                    }
                });
            });

        </script>

        <script>
            $(document).on('submit', '#feesForm', function(e) {
                e.preventDefault();


                // $("button[type=submit]").attr("disabled", true);

                const studentId = $(this).data('student-id');
                const classId = $('#class_id').val();
                const mediumId = $('#mediumId').val();

                const studentName = $('#studentName').val();
                const totalFees = $('#totalFees').val();
                const paidAmount = $('#paidAmount').val();
                const dueAmount = $('#dueAmount').val();
                const fee_category_id = $('#fee_category_id').val();

                $.ajax({
                    url: `/submit-fees-payment/${studentId}`
                    , method: 'POST'
                    , data: {
                        student_name: studentName
                        , student_id: studentId
                        , class_id: classId
                        , medium_id: mediumId
                        , total_fees: totalFees
                        , paid_amount: paidAmount
                        , dueAmount: dueAmount
                        , fee_category_id: fee_category_id
                        , _token: $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function(response) {
                        // $("button[type=submit]").attr("disabled", false);
                        if (response.status == true) {

                            $('#feesForm')[0].reset();
                            $('#modal-default').modal('hide');

                            $(`#studentsTableBody tr td.due-amount[data-student-id="${studentId}"]`).text(response.new_due_amount);
                            $(`#studentsTableBody tr td.paid-amount[data-student-id="${studentId}"]`).text(response.paid_amount);

                            swal.fire({
                                icon: 'success'
                                , title: 'Success!'
                                , text: response.message
                                , showConfirmButton: true
                            , }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/schooladmin/fees-payment-history'; // Laravel route or your specific URL
                                }
                            });
                        } else {

                            if (err.status === 422) {
                                const errors = err.responseJSON.errors;
                                if (errors.paid_amount) {
                                    $('#paidAmountError').text(errors.paid_amount[0]);
                                }
                                if (errors.fee_category_id) {
                                    $('#FeeCategoryError').text(errors.fee_category_id[0]);
                                }
                            } else {
                                console.error('An error occurred:', err);
                            }
                        }
                    }
                , });
            });

        </script>

        <script>
            $(document).on('click', '.fees-paid-btn', function() {
                const studentId = $(this).data('student-id');
                const mediumId = $(this).data('medium-id');
                const studentName = $(this).data('student-name');
                const totalFees = $(this).data('total-fees');
                const standardName = $(this).data('standard-name');

                // Set values in the modal
                $('#studentName').val(studentName);
                $('#totalFees').val(totalFees);
                $('#class_id').val(standardName);
                $('#mediumId').val(mediumId);

                // Attach the student ID to the form data
                $('#feesForm').data('student-id', studentId);

                // Update modal title
                $('#StandardName').text(`Students Fees Amount Paid by ${standardName} Class`);
            });

        </script>

        @endpush
        @endsection
