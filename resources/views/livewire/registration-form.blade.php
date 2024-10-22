<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm shadow border-teal-500 border-t-2">
    <div class="flex">
        <h2 class="text-center font-semibold text-2x text-gray-800 mb-5">Create New Account</h2>
    </div>
    @if(session('success'))
    <span class="text-green-500">{{ session('success') }}</span>
    @endif

    @if(session('error'))
    <span class="text-red-500">{{ session('error') }}</span>
    @endif

    <form wire:submit="create">
        <label for="name" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Name</label>
        <input type="text" wire:model="name" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-3 py-2">
        @error('name')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <label for="email" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Email</label>
        <input type="email" wire:model="email" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-3 py-2">
        @error('email')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <label for="password" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Password</label>
        <input type="password" wire:model="password" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-3 py-2">
        @error('password')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <label for="image" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Profile Picture</label>
        <input accept="image/png, image/jpeg, image/jpg" type="file" wire:model="image" class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-3 py-2">
        @error('image')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        @if($image)
        <img src="{{ $image->temporaryUrl() }}" class="rounded w-10 h-auto mt-5 block" alt="">
        @endif

        <div wire:loading wire:target="image">
            <span class="text-green-500">Uploading...</span>
        </div>

        <div class="flex items-center justify-center px-3 py-1" wire:loading.delay wire:target="create">
              <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
        </div>

        <button wire:click.prevent="ReloadList" type="button" class="block mt-3 px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
            Reload List
        </button>

        <button wire:loading.class="bg-gray-500 hover:bg-gray-600" wire:loading.attr="disabled" type="submit" class="block mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">
            Create +
        </button>
    </form>
</div>
