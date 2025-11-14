<div class="flex flex-col items-center">

    <!-- Preview Foto -->
    @if(Auth::user()->foto)
        <img src="{{ asset('uploads/' . Auth::user()->foto) }}"
             class="w-40 h-40 object-cover rounded-xl border shadow">
    @else
        <div class="w-40 h-40 bg-gray-300 dark:bg-gray-700 rounded-xl flex items-center justify-center text-gray-500 dark:text-gray-300">
            No Photo
        </div>
    @endif

    <!-- Upload Foto Baru -->
    <form action="{{ route('profile.updatePhoto') }}" method="POST"
          enctype="multipart/form-data"
          class="mt-4 w-full text-center flex flex-col items-center">
        @csrf

        <input type="file" name="foto"
               class="block w-full max-w-xs text-sm text-gray-600 dark:text-gray-300 mb-3
                      border border-gray-400 rounded-lg p-2">

        <button class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm hover:bg-green-700">
            Update Photo
        </button>
    </form>

    <!-- Hapus Foto -->
    @if(Auth::user()->foto)
        <form action="{{ route('profile.deletePhoto') }}" method="POST" class="mt-2">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700">
                Delete Photo
            </button>
        </form>
    @endif
</div>
