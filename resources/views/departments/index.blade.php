<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Management - HRMS</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="employee-page">
    <div class="employee-container">
        <!-- Header Section -->
        <div class="employee-header">
            <form method="GET" action="{{ route('departments.index') }}" class="employee-search-form">
                <div class="employee-input-group">
                    <svg class="employee-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input
                        type="text"
                        name="department_name"
                        placeholder="Search by name"
                        value="{{ request('department_name') }}"
                        class="employee-search-input"
                    />
                </div>
                <button type="submit" class="employee-search-btn">Search</button>
            </form>
            <a href="{{ route('departments.create') }}" class="employee-add-btn">
                <svg class="employee-add-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Add Department
            </a>
        </div>

        <!-- Table Section -->
        <div class="employee-table-wrapper">
            <table class="employee-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($departments as $index => $department)
                <tr class="employee-row {{ $index % 2 === 0 ? 'employee-row-even' : 'employee-row-odd' }}">
                    <td>{{ $department->department_id ?? $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td class="employee-actions">
                        <div class="employee-action-buttons">
                            <!-- Delete Button -->
                            <form action="{{ route('departments.destroy', $department->department_id ?? $department->id) }}"
                                  method="POST"
                                  class="employee-delete-form"
                                  onsubmit="return confirm('Are you sure you want to delete {{ $department->department_name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="employee-action-btn employee-delete-btn" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3,6 5,6 21,6"></polyline>
                                        <path d="m19,6v14a2,2 0 0,1-2,2H7a2,2 0 0,1-2-2V6m3,0V4a2,2 0 0,1,2-2h4a2,2 0 0,1,2,2v2"></path>
                                    </svg>
                                </button>
                            </form>
                            <!-- View Button -->
                            <a href="{{ route('departments.show', $department->department_id ?? $department->id) }}"
                               class="employee-action-btn employee-view-btn"
                               title="View">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </a>
                            <!-- Edit Button -->
                            <a href="{{ route('departments.edit', $department->department_id ?? $department->id) }}"
                               class="employee-action-btn employee-edit-btn"
                               title="Edit">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="m18.5 2.5 a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="employee-empty-state">
                        <div class="employee-empty-content">
                            <svg class="employee-empty-icon" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="m22 21-3-3m0 0a5 5 0 1 0-7-7 5 5 0 0 0 7 7z"></path>
                            </svg>
                            <p>No departments found.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
        @if(method_exists($departments, 'links'))
        <div class="employee-pagination">
            {{ $departments->appends(request()->query())->links() }}
        </div>
        @endif

        <div class="employee-footer-info">
            @if(method_exists($departments, 'total'))
            Showing {{ $departments->firstItem() ?? 0 }} to {{ $departments->lastItem() ?? 0 }} of {{ $departments->total() }} departments
            @else
            Showing {{ $departments->count() }} departments
            @endif
        </div>
    </div>
</div>
</body>
</html>
