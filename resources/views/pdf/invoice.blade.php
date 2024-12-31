<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  <title>Generate Invoice PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .table {
            margin-top: 20px;
        }


        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #777;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Student Fee Invoice</h1>
        <div class="p-3 shadow-sm card">
            <h3 class="mb-3 text-center text-primary">Invoice Details</h3>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Class Name</th>
                        <th>Medium Name</th>
                        <th>Total Fees</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $student_id }}</td>
                        <td>{{ $student_name }}</td>
                        <td>{{ $class_name }}</td>
                        <td>{{ $medium_name }}</td>
                        <td>{{ $total_fees }}</td>
                        <td>{{ $paid_amount }}</td>
                        <td>{{ $due_amount }}</td>
                        <td>
                            @if($due_amount == 0)
                            <span class="badge text-bg-success">Success</span>

                            @else
                            <span class="badge text-bg-danger">Pending Fees Amount</span>
                            @endif
                        </td>
                        <td>
                            @php
                                use Carbon\Carbon;
                                $formattedDate = Carbon::parse($date)->format('d-m-y h:i:s');
                            @endphp
                            {{ $formattedDate }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>&copy; {{ now()->year }} Student Fee Management System. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
