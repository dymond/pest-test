<x-layouts.app>
    @guest
        <x-slot name="header" class="">
            Home
        </x-slot>
        <div class="mt-8">
            <a href="/register" class="font-bold text-gray-400 hover:text-blue-500 transition duration-500 ease-in-out">Sign up</a> to get started.
        </div>
    @endguest

    @auth
        <x-slot name="header" class="">
            My Stuff
        </x-slot>
        <div class="space-y-4">
            @foreach($stuffByStatus as $status => $stuffs)
                <div class="">
                    <h2 class="font-bold text-xl text-gray-600 mt-4">
                        {{ App\Models\Pivot\StuffUser::$statuses[$status] }}
                    </h2>
                    <div class="grid grid-cols-1">
                        @foreach($stuffs as $stuff)
                            <x-stuff :stuff="$stuff">
                                <x-slot name="links">
                                    link
                                </x-slot>
                            </x-stuff>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endauth
</x-layouts.app>
