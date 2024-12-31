<x-app-layout>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button>
                        <a href="{{ route('classes.create') }}">Create new class</a></x-primary-button>
                	<table class="table table-hover">
                		<thead>
                            <th>Class Name</th>
                            <th>Grade Level</th>
                            <th>Advisor</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                            <tr>
                                <td>{{ $class->name  }}</td>
                                <td>Grade {{ $class->grade_level  }}</td>
                                <td>{{ $class->teacher ? $class->teacher->user->name : '' }}</td>
                                <td class='flex flex-row space-x-2'>
                                    <a href="{{ route('classes.edit', $class->id) }}" class='bg-green-500 text-white rounded px-2 py-1 text-sm'>
                                    Edit</a>
                                    <form
                                    onsubmit="return confirm('Are you sure?')"
                                    method='POST'
                                    action='{{ route('classes.destroy', $class->id) }}'>
                                        @method('DELETE')
                                        @csrf
                                        <button class='bg-red-500 text-white rounded px-2 py-1 text-sm'>Delete</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>