<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Attendances Report</title>
    <style>
        /* Sesuaikan gaya CSS sesuai kebutuhan */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Kehadiran</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Latlong In</th>
                <th>Latlong Out</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
            <tr>
                <td>{{ $attendance->user->name }}</td>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->time_in }}</td>
                <td>{{ $attendance->time_out }}</td>
                <td>{{ $attendance->latlon_in }}</td>
                <td>{{ $attendance->latlon_out }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
