<div>
    @livewire('device.update-device')

    @livewire('device.delete-device')

    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

        <div class="flex justify-between">
            <h1 class=" text-2xl font-medium text-gray-900">
                {{ __('Devices') }}
            </h1>
            @livewire('device.create-device')
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
            <x-table>
                <x-slot name="thead">
                    <tr>
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
                                <button wire:click="sortByField('name')">
                                    {{ __('Device Name') }}
                                </button>
                                <x-sort-icon sort_field="name" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('serial')">
                                    {{ __('Serial') }}
                                </button>
                                <x-sort-icon sort_field="serial" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('specifications')">
                                    {{ __('Specifications') }}
                                </button>
                                <x-sort-icon sort_field="specifications" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                    @forelse ($devices as $device)
                        <tr wire:key="device-{{ $device->id }}">
                            <td class="p-2 border">
                                {{ $device->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $device->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $device->serial }}
                            </td>
                            <td class="p-2 border">
                                {!! $device->specifications !!}
                            </td>
                            <td class="p-2 border">
                                @can('edit-device')
                                    <x-indigo-button wire:click="$dispatch('edit-modal',{id:'{{ $device->id }}'})"
                                        wire:loading.attr="disabled">
                                        <x-icon class="w-4 h-4" name="pencil-square" />
                                        {{-- {{ __('Edit') }} --}}
                                    </x-indigo-button>
                                @endcan
                            </td>
                            <td class="p-2 border">
                                @can('delete-device')
                                    <x-danger-button
                                        wire:click="$dispatch('delete-modal',{id:'{{ $device->id }}'})"
                                        wire:loading.attr="disabled">
                                        <x-icon class="w-4 h-4" name="trash" />
                                        {{-- {{ __('Delete') }} --}}
                                    </x-danger-button>
                                @endcan
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

            <div class="mt-4">
                {{ $devices->links() }}
            </div>
        </div>
    </div>

</div>