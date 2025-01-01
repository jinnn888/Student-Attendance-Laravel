<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-3">
                        <x-primary-button>
                            <a href="{{ route('attendances.create') }}">Record new attendance</a></x-primary-button>
                        <form action='{{ route("attendances.index") }}' method='GET'>
                            @csrf
                            <label for="class_id" class="block text-gray-700 font-medium">View Class Attendance</label>
                            <div class='flex flex-row gap-4 w-full'>
                                <div class='flex-grow'>
                                    <select name="class_id" id="class_id" class="form-select">
                                        <option value="" disabled selected>Select Class</option>
                                        <!-- Populate options dynamically -->
                                        @foreach($classes as $class)    
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('class_id')" class="mt-2" />
                                </div>
                                <x-primary-button>Select Class</x-primary-button>
                            </div>
                        </form>
                        <h2 class='mt-4 text-2xl'>{{ \Carbon\Carbon::now()->format('D d, M, Y. h:i A') }}</h2>
                        @if (isset($searchedClass))
                        <table class="table table-hover my-4">
                            <thead>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($searchedClass as $attendance)
                                <tr>
                                    <td>{{ $attendance->student->user->name }}</td>
                                    <td>{{ $attendance->class->name  }}</td>
                                    <td>{{ $attendance->date  }}</td>
                                    <td>{!!$attendance->status == 'absent' 
                                            ? '<span class="rounded text-sm font-bold p-2 text-white bg-red-600">Absent</span>' 
                                            : '<span class="rounded text-sm font-bold p-2 text-white bg-green-600">Present</span>'
                                        !!}</td>
                                    {{-- <td>{{ $student->id_number }}</td> --}}
                                    <td>
                                       
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
