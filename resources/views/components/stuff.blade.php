@props(['stuff'])
<div class="py-1">
    <div class="flex justify-between items-center bg-gray-800 py-2 px-4 rounded">
        <div class="">
            <h2 class="font-bold text-lg text-gray-500">
                {{ $stuff->title }}
            </h2>
            <div class="text-gray-500 text-xs">
                <div class="inline font-bold">SKU:</div> {{ $stuff->sku }}
            </div>
        </div>
        @isset($links)
            <div class="">
                {{ $links }}
            </div>
        @endisset
    </div>
</div>
