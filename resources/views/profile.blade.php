<x-app-layout>
    <div class="overflow-x-auto">
    <div class="min-w-screen flex items-center justify-center font-sans overflow-hidden">
    <div class="w-full lg:w-5/6">
        @if ($message = Session::get('alert'))
            <x-alert  />
        @endif
        <h1 class="text-5xl font-bold leading-tight">Edit Profile</h1>
        <div class=" overflow-x-auto bg-white shadow-md rounded my-6">
        <div class="grid mt-8 gap-8 grid-cols-1">
        <div class="flex flex-col ">
        <div class="bg-white shadow-md rounded-3xl p-5">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $user->id }}" />
    
                <div>
                    <x-label for="fname" :value="__('Name')" />
    
                    <input value="{{ $user->name  }}" type="text" name="name" id="idUserName" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" required>
                </div>
    
                <div class="mt-4">
                    <x-label for="mname" :value="__('Code Name')" />
    
                    <input value="{{ $user->code_name  }}" type="text" name="code_name" id="idUserName" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" required>
                </div>
    
                <div class="mt-4">
                    <x-label for="name" :value="__('Gender')" />
                    <select name="gender" id="idGender" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                        <option value="" disabled selected>
                            Select Gender
                        </option>
                        <option value='1' @if($user->gender == 1) selected @endif>Male</option>
                        <option value='2' @if($user->gender == 2) selected @endif>Female</option>
                        <option value='0' @if($user->gender == 0) selected @endif>Secret :P</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="mname" :value="__('Wishlist')" />
    
                    <input value="{{ $user->wishlist  }}" type="text" name="wishlist" id="idUserName" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" required>
                </div>
    
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
    
                    <input value="{{ $user->email }}" type="email" name="email" id="idUserEmail" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"  required>
                </div>
    
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
    
                    <input value="" type="text" name="password" id="idUserPassword" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Password will not be changed if empty">
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
        </div>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </x-app-layout>