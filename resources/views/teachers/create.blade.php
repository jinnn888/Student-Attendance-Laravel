<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('teachers.store') }}">
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
