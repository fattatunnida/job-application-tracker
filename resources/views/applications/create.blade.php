<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fce4ec;
            color: #6a1b9a;
        }
        form {
            background-color: #f3e5f5;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            margin: auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        .btn-save {
            background-color: #ba68c8;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Add New Application</h2>
    <form action="{{ route('applications.store') }}" method="POST">
        @csrf
        <label for="company_name">Company Name</label>
        <input type="text" id="company_name" name="company_name" required>

        <label for="position">Position</label>
        <input type="text" id="position" name="position" required>

        <label for="date_applied">Date Applied</label>
        <input type="date" id="date_applied" name="date_applied" required>

        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="Pending">Pending</option>
            <option value="Interview">Interview</option>
            <option value="Rejected">Rejected</option>
            <option value="Accepted">Accepted</option>
        </select>

        <button type="submit" class="btn-save">Save Application</button>
    </form>
</body>
</html>
