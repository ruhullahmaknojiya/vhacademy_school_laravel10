<!DOCTYPE html>
<html>
<head>
    <title>Paid Fees Invoice</title>
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
    <h2>Paid Fees Invoice</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Class Name</th>
                <th>Medium Name</th>
                <th>Master Fee Categories</th>
                <th>Total Fees</th>
                <th>Due Amount</th>
                <th>Paid Amount</th>
                <th>Paid Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fees_payment_histories as $fees_payment_history)
            <tr>
                <td>{{ $fees_payment_history->id }}</td>
                <td>{{ $fees_payment_history->student_name }}</td>
                <td>{{ $fees_payment_history->standard->standard_name }}</td>
                <td>{{ $fees_payment_history->medium->medium_name }}</td>
                <td>{{ $fees_payment_history->feeCategory->category_name }}</td>
                <td>{{ $fees_payment_history->total_fees }}</td>
                <td>{{ $fees_payment_history->due_amount }}</td>
                <td>{{ $fees_payment_history->paid_amount }}</td>
                <td>{{ $fees_payment_history->created_at->format('Y-M-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
