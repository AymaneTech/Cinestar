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
                    <strong>{{ count($films) }}</strong> medicines
                </p>
            </div>
            <x-modals.button modalId="film-create">Create Film</x-modals.button>

        </div>
        <div class="p-6 overflow-x-scroll px-0 pt-0 pb-2">
            <table class="w-full min-w-[640px] table-auto">
                <thead>
                <tr>
                    <x-elements.th>Image</x-elements.th>
                    <x-elements.th>Title</x-elements.th>
                    <x-elements.th>Description</x-elements.th>
                    <x-elements.th>Duration</x-elements.th>
                    <x-elements.th>Category</x-elements.th>
                    <x-elements.th>Genre</x-elements.th>
                    <x-elements.th>Country</x-elements.th>
                    <x-elements.th>Language</x-elements.th>
                    <x-elements.th>Actions</x-elements.th>
                </tr>
                </thead>
                <tbody>
                @foreach ($films as $film)
                    <tr>
                        <td class="py-3 px-5 border-b border-blue-gray-50">
                            <div class="flex items-center gap-4">
                                <img class="w-24 h-24" src="{{ asset("storage/" . $film->image->path) }}"
                                     alt="">
                            </div>
                            {{--                            {{ asset('storage/' . $film->image->path ?? null) }}--}}
                        </td>
                        <x-elements.td
                            class="leading-normal text-blue-red-900 font-bold">{{ $film->title }}</x-elements.td>
                        <x-elements.td>{{ $film->description }}</x-elements.td>
                        <x-elements.td>{{ $film->duration }}</x-elements.td>
                        <x-elements.td>{{ $film->category->name }}</x-elements.td>
                        <x-elements.td>{{ $film->genre }}</x-elements.td>
                        <x-elements.td>{{ $film->country }}</x-elements.td>
                        <x-elements.td>{{ $film->language }}</x-elements.td>
                        <td class="py-3 px-5 border-b border-blue-gray-50 flex items-center gap-2">
                            <button
                                data-id="{{ $film->id }}"
                                data-title="{{ $film->title }}"
                                data-slug="{{ $film->slug }}"
                                data-description="{{ $film->description }}"
                                data-genre="{{ $film->genre }}"
                                data-actors="{{ $film->actors }}"
                                data-duration="{{ $film->duration }}"
                                data-year="{{ $film->year }}"
                                data-screening_date="{{ $film->screening_date }}"
                                data-category="{{ $film->category_id }}"
                                data-room="{{ $film->room_id }}"
                                data-country="{{ $film->country }}"
                                data-language="{{ $film->language }}"
                                data-modal-target="film-edit"
                                data-modal-toggle="film-edit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"
                                type="button">
                                <x-svg-icon name="edit"/>
                            </button>

                            <x-modals.film-update :data="$data" :slug="$film->slug"/>
                            <form action="{{ route('films.destroy', $film->slug) }}" method="post">
                                @method('delete')
                                @csrf
                                <button>
                                    <x-svg-icon name="delete"/>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $films->links() }}
        </div>
    </div>
</div>
