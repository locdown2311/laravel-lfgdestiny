<div>
    <div class="fixed z-100 w-full h-full bg-gray-500 opacity-50 top-0 left-0">
    </div>
    <div class="fixed z-101 w-full h-full top-0 left-0 overflow-y-auto">
        <button wire:click="goBack()" type="button" class="z-40 block rounded-md border border-red-500 bg-white p-4 ml-2 mt-1 ">X</button>
        <div class="table w-full h-full py-6">
            <div class="table-cell text-center align-middle">
                <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg text-left overflow-hidden shadow-xl">
                        {{ $content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
