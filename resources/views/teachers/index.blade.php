<x-app-layout>
	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-primary-button>
                        <a href="{{ route('teachers.create') }}">Create new teacher</a></x-primary-button>
                	<table class="table table-hover">
                		<thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Class</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $user)
                            <tr>
                                <td>{{ $user->name  }}</td>
                                <td>{{ $user->email  }}</td>
                                <td>{!! $user->teacher->class ? $user->teacher->class->name : '<span class="text-sm italic text-red-600">No Advisory</span>' !!}</td>
                                <td class='flex flex-row space-x-2'>
                                    <a href="{{ route('teachers.edit', $user->id) }}" class='bg-green-500 text-white rounded px-2 py-1 text-sm'>
                                    Edit</a>
                                    <form
                                    onsubmit="return confirm('Are you sure?')"
                                    method='POST'
                                    action='{{ route('teachers.destroy', $user->id) }}'>
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