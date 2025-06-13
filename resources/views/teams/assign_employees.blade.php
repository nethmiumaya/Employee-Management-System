<form action="{{ route('teams.assignEmployees', $team->team_id) }}" method="POST">
    @csrf
    <label for="employee_ids">Select Employees:</label>
    <select name="employee_ids[]" id="employee_ids" multiple required>
        @foreach($employees as $employee)
        <option value="{{ $employee->employee_id }}">{{ $employee->employee_name }}</option>
        @endforeach
    </select>
    <button type="submit">Assign Employees</button>
</form>
