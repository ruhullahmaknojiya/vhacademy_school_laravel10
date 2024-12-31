<!DOCTYPE html>
<html>
<head>
    <title>Fee Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Fee Invoice</h2>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $fees_payment_history->id }}</td>
        </tr>
        <tr>
            <th>Student Name</th>
            <td>{{ $fees_payment_history->student_name }}</td>
        </tr>
        <tr>
            <th>Class Name</th>
            <td>{{ $fees_payment_history->standard->standard_name }}</td>
        </tr>
        <tr>
            <th>Medium Name</th>
            <td>{{ $fees_payment_history->medium->medium_name }}</td>
        </tr>
        <tr>
            <th>Master Fee Category</th>
            <td>{{ $fees_payment_history->feeCategory->category_name }}</td>
        </tr>
        <tr>
            <th>Total Fees</th>
            <td>{{ $fees_payment_history->total_fees }}</td>
        </tr>
        <tr>
            <th>Due Amount</th>
            <td>{{ $fees_payment_history->due_amount }}</td>
        </tr>
        <tr>
            <th>Paid Amount</th>
            <td>{{ $fees_payment_history->paid_amount }}</td>
        </tr>
        <tr>
            <th>Start Date</th>
            <td>{{ $fees_payment_history->created_at->format('Y-m-d H:i:s') }}</td>
        </tr>
        <tr>
            <th>End Date</th>
            <td>{{ $fees_payment_history->updated_at->format('Y-m-d H:i:s') }}</td>
        </tr>
    </table>
</body>
</html>
