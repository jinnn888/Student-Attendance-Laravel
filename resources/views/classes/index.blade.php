<x-app-layout>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button>
                        <a href="{{ route('students.create') }}">Create new class</a></x-primary-button>
                	<table class="table table-hover">
                		<thead>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Advisor</th>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                            <tr>
                                <td>{{ $class->name  }}</td>
                                <td>Grade {{ $class->grade_level  }}</td>
                                <td>{{ $class->teacher ? $class->teacher->name : '' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>