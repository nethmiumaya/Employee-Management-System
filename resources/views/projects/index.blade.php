@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto p-6">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <form method="GET" action="{{ route('projects.index') }}" class="flex items-center gap-4">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input
                            type="text"
                            name="search"
                            placeholder="Search by Project ID"
                            value="{{ request('search') }}"
                            class="pl-10 pr-4 py-3 w-64 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200"
                        />
                    </div>
                    <button
                        type="submit"
                        class="px-6 py-3 bg-orange-100 text-orange-600 rounded-lg hover:bg-orange-200 transition-colors duration-200 font-medium"
                    >
                        Search
                    </button>
                </form>
                <a
                    href="{{ route('projects.create') }}"
                    class="flex items-center gap-2 px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors duration-200 font-medium shadow-sm hover:shadow-md"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Project
                </a>
            </div>
        </div>
        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm">Project ID</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm">Name</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm">Team</th>
                        <th class="text-left py-4 px-6 font-semibold text-gray-700 text-sm">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($projects as $index => $project)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150 {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-25' }}">
                        <td class="py-4 px-6 text-gray-800 font-medium">{{ $project->project_id }}</td>
                        <td class="py-4 px-6 text-gray-800">{{ $project->project_name }}</td>
                        <td class="py-4 px-6 text-gray-600">{{ $project->team_id }}</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <form action="{{ route('projects.destroy', $project->project_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all duration-200"
                                        title="Delete"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 7-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                                <a
                                    href="{{ route('projects.show', $project->project_id) }}"
                                    class="p-2 text-gray-400 hover:text-blue-500 hover:bg-blue-50 rounded-lg transition-all duration-200"
                                    title="View"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a
                                    href="{{ route('projects.edit', $project->project_id) }}"
                                    class="p-2 text-gray-400 hover:text-orange-500 hover:bg-orange-50 rounded-lg transition-all duration-200"
                                    title="Edit"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-12">
                            <div class="text-gray-400 mb-2">
                                <svg class="w-12 h-12 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No projects found</h3>
                            <p class="text-gray-600">Try adjusting your search criteria or add a new project</p>
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Pagination -->
        @if(method_exists($projects, 'links'))
        <div class="mt-6">
            {{ $projects->appends(request()->query())->links() }}
        </div>
        @endif
        <!-- Footer Info -->
        <div class="mt-6 text-sm text-gray-500 text-center">
            @if(method_exists($projects, 'total'))
            Showing {{ $projects->firstItem() ?? 0 }} to {{ $projects->lastItem() ?? 0 }} of {{ $projects->total() }} projects
            @else
            Showing {{ $projects->count() }} projects
            @endif
        </div>
    </div>
</div>
@push('styles')
<style>
    .bg-gray-25 {
        background-color: #fafafa;
    }
    .pagination {
        @apply flex items-center justify-center space-x-1;
    }
    .pagination .page-link {
        @apply px-3 py-2 text-sm text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 hover:text-gray-700 transition-colors duration-200;
    }
    .pagination .page-item.active .page-link {
        @apply bg-orange-500 text-white border-orange-500 hover:bg-orange-600;
    }
    .pagination .page-item.disabled .page-link {
        @apply text-gray-300 cursor-not-allowed hover:bg-white hover:text-gray-300;
    }
</style>
@endpush
@endsection
