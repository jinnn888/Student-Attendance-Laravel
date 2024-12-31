<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('classes.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="block text-gray-700 font-medium">Class Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Class name" >
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        </div>

                        <div class="mb-3">
                            <label for="grade_level" class="block text-gray-700 font-medium">Grade Level</label>
                            <input type="number" name="grade_level" id="name" class="form-control" placeholder="Grade 7 - 12">
                            <x-input-error :messages="$errors->get('grade_level')" class="mt-2" />
                        </div>

                         <div class="mb-3">
                            <label for="teacher_id" class="block text-gray-700 font-medium">Assign Teacher</label>
                            <select name="teacher_id" id="class_id" class="form-select">
                                <option value="" disabled selected>Select Teacher</option>
                                <!-- Populate options dynamically -->
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('teacher_id')" class="mt-2" />

                        </div>
                       
                        <!-- Submit Button -->
                        <div class="mt-6">
                            <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
