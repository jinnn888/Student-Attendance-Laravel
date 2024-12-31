<x-app-layout>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button>
                        <a href="{{ route('students.create') }}">Create new student</a></x-primary-button>
                	<table class="table table-hover">
                		<thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Class</th>
                            <th>ID Number</th>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->user->name  }}</td>
                                <td>{{ $student->user->email  }}</td>
                                <td>{{ $student->class->name  }}</td>
                                <td>{{ $student->id_number  }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>