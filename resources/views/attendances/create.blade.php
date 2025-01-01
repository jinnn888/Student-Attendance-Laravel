<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-3">
                        <form action='{{ route("attendances.create") }}' method='GET'>
                            @csrf
                            <label for="class_id" class="block text-gray-700 font-medium">Create Class Attendance</label>
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
                        <form action='{{ route('attendances.store') }}' method="POST">
                            @csrf
                            <table class="table table-hover my-4">
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Class</th>
                                    <th>ID Number</th>
                                    <th>Attendance</th>
                                </thead>
                                <tbody>
                                    @foreach ($searchedClass->students as $student)
                                    <tr>
                                        <td>{{ $student->user->name }}</td>
                                        <td>{{ $student->user->email }}</td>
                                        <td>{{ $student->class->name }}</td>
                                        <td>{{ $student->id_number }}</td>
                                        <td> 
                                            <input type="hidden" name="date" value="{{ now()->toDateString() }}">
                                            <input type="hidden" name="class_id" value="{{ $searchedClass->id  }}">
                                            <input name='student_id[]' type='hidden' value='{{ $student->id }}'/>
                                            <input type="hidden" name="status[{{ $student->id }}]" value="absent">
                                            <input name="status[{{ $student->id }}]" type="checkbox" value="present">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <x-primary-button>Submit attendance</x-primary-button>
                        </form>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
