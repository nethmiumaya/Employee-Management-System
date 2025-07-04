<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management - HRMS</title>
    <link rel="stylesheet" href="{{ asset('css/project.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/project.css') }}">
</head>
<body>
<div class="employee-page">
    <div class="employee-container">
        <!-- Header Section -->
        <div class="employee-header">
            <form method="GET" action="{{ route('projects.index') }}" class="employee-search-form">
                <!-- Search Input -->
                <div class="employee-input-group">
                    <svg class="employee-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input
                        type="text"
                        name="project_name"
                        placeholder="Search by project name"
                        value="{{ request('project_name') }}"
                        class="employee-search-input"
                    />
                </div>
                <!-- Status Dropdown -->
                <div class="employee-dropdown-wrapper">
                    <select name="status" class="employee-dropdown">
                        <option value="">Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="on_hold" {{ request('status') == 'on_hold' ? 'selected' : '' }}>On Hold</option>
                    </select>
                    <svg class="employee-dropdown-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6,9 12,15 18,9"></polyline>
                    </svg>
                </div>
                <!-- Department Dropdown -->
                <div class="employee-dropdown-wrapper">
                    <select name="department" class="employee-dropdown">
                        <option value="">Department</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ request('department') == $department->id ? 'selected' : '' }}>
                        {{ $department->department_name }}
                        </option>
                        @endforeach
                    </select>
                    <svg class="employee-dropdown-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6,9 12,15 18,9"></polyline>
                    </svg>
                </div>
                <!-- Search Button -->
                <button type="submit" class="employee-search-btn">Search</button>
            </form>
            <!-- Add Project Button -->
            <a href="{{ route('projects.create') }}" class="employee-add-btn">
                <svg class="employee-add-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Add Project
            </a>
        </div>
        <!-- Table Section -->
        <div class="employee-table-wrapper">
            <table class="employee-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Department</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($projects as $index => $project)
                <tr class="employee-row {{ $index % 2 === 0 ? 'employee-row-even' : 'employee-row-odd' }}">
                    <td class="employee-name">{{ $project->project_name }}</td>
                    <td class="employee-status">{{ ucfirst($project->status) }}</td>
                    <td class="employee-department">{{ $project->department->department_name ?? '-' }}</td>
                    <td class="employee-start">{{ $project->start_date }}</td>
                    <td class="employee-end">{{ $project->end_date }}</td>
                    <td class="employee-actions">
                        <div class="employee-action-buttons">
                            <!-- Delete Button -->
                            <form action="{{ route('projects.destroy', $project->id) }}"
                                  method="POST"
                                  class="employee-delete-form"
                                  onsubmit="return confirm('Are you sure you want to delete {{ $project->project_name }}?')">
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
                            <a href="{{ route('projects.show', $project->id) }}"
                               class="employee-action-btn employee-view-btn"
                               title="View">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </a>
                            <!-- Edit Button -->
                            <a href="{{ route('projects.edit', $project->id) }}"
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
                    <td colspan="6" class="employee-empty-state">
                        <div class="employee-empty-content">
                            <svg class="employee-empty-icon" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                                <path d="M16 3v4M8 3v4"></path>
                            </svg>
                            <p>No projects found.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination Section -->
        @if(method_exists($projects, 'links'))
        <div class="employee-pagination">
            {{ $projects->appends(request()->query())->links() }}
        </div>
        @endif
        <div class="employee-footer-info">
            @if(method_exists($projects, 'total'))
            Showing {{ $projects->firstItem() ?? 0 }} to {{ $projects->lastItem() ?? 0 }} of {{ $projects->total() }} projects
            @else
            Showing {{ $projects->count() }} projects
            @endif
        </div>
    </div>
</div>
</body>
</html>
