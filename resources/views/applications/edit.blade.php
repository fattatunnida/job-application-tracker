<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Application By Nida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fce4ec;
            color: #6a1b9a;
            padding: 20px;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #ba68c8;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #9c27b0;
        }
    </style>
</head>
<body>
    <h1>Edit Job Application</h1>

    <form action="{{ route('applications.update', $application->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $application->company_name) }}" required>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" value="{{ old('position', $application->position) }}" required>

        <label for="date_applied">Date Applied:</label>
        <input type="date" id="date_applied" name="date_applied" value="{{ old('date_applied', $application->date_applied ? \Carbon\Carbon::parse($application->date_applied)->format('Y-m-d') : '') }}" required>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Pending" {{ $application->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Interview" {{ $application->status == 'Interview' ? 'selected' : '' }}>Interview</option>
            <option value="Rejected" {{ $application->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            <option value="Accepted" {{ $application->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
        </select>

        <button type="submit">Update Application</button>
    </form>

    <a href="{{ route('applications.index') }}">Back to Application List</a>
</body>
</html>
