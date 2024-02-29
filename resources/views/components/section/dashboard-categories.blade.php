<div class="mb-4 ">
    <div
        class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md overflow-hidden xl:col-span-2">
        <div
            class="relative bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">
            <div>
                <h6
                    class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-blue-gray-900 mb-1">
                    The Films</h6>
                <p
                    class="antialiased font-sans text-sm leading-normal flex items-center gap-1 font-normal text-blue-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                         stroke="currentColor" aria-hidden="true" class="h-4 w-4 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5">
                        </path>
                    </svg>
                    <strong>{{ count($categories) }}</strong> medicines
                </p>
            </div>
            <x-modals.button modalId="category-create" style="true">Create Category</x-modals.button>

        </div>
        <div class="p-6 overflow-x-scroll px-0 pt-0 pb-2">
            <table class="w-full min-w-[640px] table-auto">
                <thead>
                <tr>
                    <x-elements.th>Image</x-elements.th>
                    <x-elements.th>Name</x-elements.th>
                    <x-elements.th>Description</x-elements.th>
                    <x-elements.th>Actions</x-elements.th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <div class="flex items-center gap-4">
                                <img class="w-24 h-24" src="{{ asset("storage/" . $category->image->path ) }}"
                                     alt="">
                            </div>
                        </td>
                        <x-elements.td
                            class="leading-normal text-blue-red-900 font-bold">{{ $category->name }}</x-elements.td>
                        <x-elements.td>{{ $category->description }}</x-elements.td>
                        <td class="py-3 px-5 border-b border-blue-gray-50 flex items-center gap-2">
                            <button
                                data-slug="{{ $category->slug }}"
                                data-name="{{ $category->name }}"
                                data-description="{{ $category->description }}"
                                data-modal-target="category-edit"
                                data-modal-toggle="category-edit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"
                                type="button">
                                <x-svg-icon name="edit"/>
                            </button>
                            <x-modals.category-update/>

                            <x-modals.button modalId="category-delete">
                                <x-svg-icon name="delete"/>
                            </x-modals.button>
                            <x-modals.category-delete :slug="$category->slug"/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>
