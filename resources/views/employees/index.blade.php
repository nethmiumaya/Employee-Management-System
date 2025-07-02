<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees - HRMS</title>
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
</head>
<body>
<div class="employee-container">
    <div class="employee-header">
        <form method="GET" action="{{ route('employees.index') }}" class="employee-search-form">
            <input
                type="text"
                name="employee_name"
                placeholder="Search by name"
                value="{{ request('employee_name') }}"
                class="pl-10 pr-4 py-3 w-64 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
            />
            <select name="role" class="px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 bg-white">
                <option value="">All Roles</option>
                <option value="manager" {{ request('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="developer" {{ request('role') == 'developer' ? 'selected' : '' }}>Developer</option>
                <option value="designer" {{ request('role') == 'designer' ? 'selected' : '' }}>Designer</option>
                <option value="hr" {{ request('role') == 'hr' ? 'selected' : '' }}>HR</option>
            </select>
            <select name="paid_status" class="px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 bg-white">
                <option value="">Paid Status</option>
                <option value="paid" {{ request('paid_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="unpaid" {{ request('paid_status') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
            </select>
            <button type="submit" class="px-6 py-3 bg-orange-100 text-orange-600 rounded-lg hover:bg-orange-200 transition-colors duration-200 font-medium">
                Search
            </button>
        </form>
        <a href="{{ route('employees.create') }}" class="employee-add-btn">
            Add Employee
        </a>
    </div>
    <div class="employee-table-wrapper">
        <table class="employee-table">
            <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($employees as $index => $employee)
            <tr class="{{ $index % 2 === 0 ? 'employee-row-even' : 'employee-row-odd' }}">
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->department->name ?? '-' }}</td>
                <td>{{ $employee->contact_no }}</td>
                <td>
                    <div class="employee-actions">
                        <form action="{{ route('employees.destroy', $employee->employee_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="employee-action-btn employee-delete-btn" title="Delete">Delete</button>
                        </form>
                        <a href="{{ route('employees.show', $employee->employee_id) }}" class="employee-action-btn employee-view-btn" title="View">View</a>
                        <a href="{{ route('employees.edit', $employee->employee_id) }}" class="employee-action-btn employee-edit-btn" title="Edit">Edit</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="employee-empty-row">
                    No employees found.
                </td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($employees, 'links'))
    <div class="employee-pagination">
        {{ $employees->appends(request()->query())->links() }}
    </div>
    @endif
    <div class="employee-footer-info">
        @if(method_exists($employees, 'total'))
        Showing {{ $employees->firstItem() ?? 0 }} to {{ $employees->lastItem() ?? 0 }} of {{ $employees->total() }} employees
        @else
        Showing {{ $employees->count() }} employees
        @endif
    </div>
</div>
</body>
</html>
