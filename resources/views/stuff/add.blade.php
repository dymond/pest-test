<x-layouts.app>
    <x-slot name="header">
        Add Stuff
    </x-slot>
    <form action="/stuffs" method="post" class="mt-4 space-y-4">
        @csrf

        <div class="space-y-1">
            <label for="title" class="block">Title</label>
            <input type="text" name="title" id="title" placeholder="What kinda stuff ya makin'?" class="bg-transparent rounded block w-full">
            @error('title')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="space-y-1">
            <label for="sku" class="block">SKU</label>
            <input type="text" name="sku" id="sku" placeholder="What that SKU look like?" class="bg-transparent rounded block w-full">
            @error('sku')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="space-y-1">
            <label for="status" class="block">Status</label>
            <select name="status" id="status" class="bg-transparent rounded block w-full">
                @foreach(App\Models\Pivot\StuffUser::$statuses as $key => $status)
                    <option value="{{ $key }}">{{ $status }}</option>
                @endforeach
            </select>
            @error('status')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="border border-gray-700 bg-white/5 hover:bg-white/0 px-3 py-2 rounded transition duration-500 ease-in-out">
            Make Stuff
        </button>
    </form>
</x-layouts.app>
