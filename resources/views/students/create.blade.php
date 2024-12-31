<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf
                        <!-- Basic Information -->
                        <h2 class="text-xl font-bold mb-3">Basic Information</h2>
                        
                        <div class="mb-3">
                            <label for="name" class="block text-gray-700 font-medium">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name" >
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="block text-gray-700 font-medium">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
 
                        <div class="mb-3">
                            <label for="id_number" class="block text-gray-700 font-medium">ID Number</label>
                            <input type="text" name="id_number" id="id_number" class="form-control" placeholder="Enter ID number" >
                            <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <label for="date_of_birth" class="block text-gray-700 font-medium">Date of Birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" >
                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                            

                        </div>
                        
                        <div class="mb-3">
                            <label for="gender" class="block text-gray-700 font-medium">Gender</label>
                            <select name="gender" id="gender" class="form-select" >
                                <option value="" disabled selected>Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />

                        </div>
                        
                        <div class="mb-3">
                            <label for="class_id" class="block text-gray-700 font-medium">Classes</label>
                            <select name="class_id" id="class_id" class="form-select">
                                <option value="" disabled selected>Select Class</option>
                                <!-- Populate options dynamically -->
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('class_id')" class="mt-2" />

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
