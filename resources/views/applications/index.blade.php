<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Tracker By Nida </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fce4ec;
            color: #6a1b9a;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .btn-add {
            background-color: #ba68c8;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-edit, .btn-delete {
            background-color: #ffcc80;
            color: #6a1b9a;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
            border: none;
            cursor: pointer;
        }
        .btn-delete {
            background-color: #ef5350;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Job Application Tracker</h1>
    
    <!-- Form Filter dan Pencarian -->
    <form method="GET" action="{{ route('applications.index') }}">
        <label for="status">Filter by Status:</label>
        <select name="status" id="status">
            <option value="">All</option>
            <option value="Pending">Pending</option>
            <option value="Interview">Interview</option>
            <option value="Rejected">Rejected</option>
            <option value="Accepted">Accepted</option>
        </select>
        <input type="text" name="search" placeholder="Search by Company or Position">
        <button type="submit">Apply Filter</button>
    </form>

    <a href="{{ route('applications.create') }}" class="btn-add">+ Add New Application</a>

    <table>
        <tr>
            <th>Company Name</th>
            <th>Position</th>
            <th>Date Applied</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @foreach($applications as $application)
            <tr>
                <td>{{ $application->company_name }}</td>
                <td>{{ $application->position }}</td>
                <td>{{ $application->date_applied }}</td>
                <td>{{ $application->status }}</td>
                <td>
                    <a href="{{ route('applications.edit', $application->id) }}" class="btn-edit">Edit</a>

                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                    
                    @if ($application->status == 'Pending' && now()->diffInDays($application->date_applied) > 30)
                        <span style="color: red;">Reminder: Follow up!</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
