<!DOCTYPE html>
<html>
<head>
    <title>Edit Report</title>
</head>
<body>
<h1>Edit Report</h1>
<form method="POST" action="{{ route('reports.update', $report->report_id) }}">
    @csrf
    @method('PUT')
    <label for="report_name">Report Name:</label>
    <input type="text" id="report_name" name="report_name" value="{{ old('report_name', $report->report_name) }}" required>
    <br>
    <label for="super_admin_id">Super Admin ID:</label>
    <input type="text" id="super_admin_id" name="super_admin_id" value="{{ old('super_admin_id', $report->super_admin_id) }}" required>
    <br>
    <button type="submit">Update Report</button>
</form>
</body>
</html>
