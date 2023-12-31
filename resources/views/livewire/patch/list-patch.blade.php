<div>
    @livewire('patch.update-patch')

    @livewire('patch.delete-patch')

    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

        <div class="flex justify-between">
            <h1 class=" text-2xl font-medium text-gray-900">
                {{ __('Patchs') }}
            </h1>
            @livewire('patch.create-patch')
        </div>

        <div class="mt-6 text-gray-500 leading-relaxed">
            <div class="mt-3">
                <div class="flex justify-between">
                    <div>
                        <x-input type="search" wire:model.live.debounce.500ms="search"
                            placeholder="{{ __('Search ...') }}" />
                    </div>
                </div>
            </div>
            @can('bulk-delete-patch')
                <div class="mt-3">
                    <x-bulk-delete-button />

                    @livewire('patch.bulk-delete-patch')
                </div>
            @endcan

            <x-table>
                <x-slot name="thead">
                    <tr>
                        @can('bulk-delete-patch')
                            <td class="px-4 py-2 border">
                                <div class="text-center">
                                    <x-checkbox wire:click="checkboxAll" />
                                </div>
                            </td>
                        @endcan
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button class="flex items-center" wire:click="sortByField('id')">
                                    {{ __('ID') }}
                                </button>
                                <x-sort-icon sort_field="id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('port')">
                                    {{ __('Port') }}
                                </button>
                                <x-sort-icon sort_field="port" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border" colspan="2">
                            <div class="flex items-center">
                                {{ __('Action') }}
                            </div>
                        </td>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @forelse ($patchs as $patch)
                        <tr wire:key="patch-{{ $patch->id }}">
                            @can('bulk-delete-patch')
                                <td class="p-2 border">
                                    <x-checkbox wire:model.live="form.checkbox_arr" value="{{ $patch->id }}" />
                                </td>
                            @endcan
                            <td class="p-2 border">
                                {{ $patch->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $patch->port }}
                            </td>
                            <td class="p-2 border">
                                <x-edit-button permission="edit-patch" id="{{ $patch->id }}" />
                            </td>
                            <td class="p-2 border">
                                <x-delete-button permission="delete-patch" id="{{ $patch->id }}"
                                    name="{{ $patch->port }}" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="p-2 border text-center">
                                {{ __('No Data Found') }}
                            </td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-table>

            <x-paginate :data-links="$patchs->links()" />
        </div>
    </div>
</div>
