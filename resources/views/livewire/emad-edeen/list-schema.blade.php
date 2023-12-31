<div>
    @livewire('emad-edeen.update-schema')

    @livewire('emad-edeen.delete-schema')

    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

        <div class="flex justify-between">
            <h1 class=" text-2xl font-medium text-gray-900">
                {{ __('Emad Edeen Schema') }}
            </h1>
            @livewire('emad-edeen.create-schema')
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
            @can('import-export-schema')
                <div class="mt-3 flex">
                    @livewire('emad-edeen.import-export-schema')
                </div>
            @endcan
            @can('bulk-delete-schema')
                <div class="mt-3">
                    <x-bulk-delete-button />

                    @livewire('emad-edeen.bulk-delete-schema')
                </div>
            @endcan

            <x-table>
                <x-slot name="thead">
                    <tr>
                        @can('bulk-delete-schema')
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
                                <button wire:click="sortByField('name')">
                                    {{ __('Name') }}
                                </button>
                                <x-sort-icon sort_field="name" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('email')">
                                    {{ __('Email') }}
                                </button>
                                <x-sort-icon sort_field="email" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('department_id')">
                                    {{ __('Department') }}
                                </button>
                                <x-sort-icon sort_field="department_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('device_id')">
                                    {{ __('Device') }}
                                </button>
                                <x-sort-icon sort_field="device_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('ip_id')">
                                    {{ __('IP') }}
                                </button>
                                <x-sort-icon sort_field="ip_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('switch_id')">
                                    {{ __('Switch') }}
                                </button>
                                <x-sort-icon sort_field="switch_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('patch_id')">
                                    {{ __('Patch') }}
                                </button>
                                <x-sort-icon sort_field="patch_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('point_id')">
                                    {{ __('Point') }}
                                </button>
                                <x-sort-icon sort_field="point_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('port')">
                                    {{ __('Switch Port') }}
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
                    @forelse ($emadEdeens as $emadEdeen)
                        <tr wire:key="emadEdeen-{{ $emadEdeen->id }}">
                            @can('bulk-delete-schema')
                                <td class="p-2 border">
                                    <x-checkbox wire:model.live="form.checkbox_arr" value="{{ $emadEdeen->id }}" />
                                </td>
                            @endcan
                            <td class="p-2 border">
                                {{ $emadEdeen->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $emadEdeen->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $emadEdeen->email }}
                            </td>
                            <td class="p-2 border">
                                {{ $emadEdeen->department->name ?? '' }}
                            </td>
                            <td class="p-2 border">
                                {{ $emadEdeen->device->name ?? '' }}
                            </td>
                            <td class="p-2 border">
                                {{ $emadEdeen->ip->number ?? '' }}
                            </td>
                            <td class="p-2 border">
                                {{ $emadEdeen->switch->hostname ?? '' }}
                            </td>
                            <td class="p-2 border">
                                {{ $emadEdeen->patch->port ?? '' }}
                            </td>
                            <td class="p-2 border">
                                {{ $emadEdeen->point->name ?? '' }}
                            </td>
                            <td class="p-2 border">
                                {{ $emadEdeen->port }}
                            </td>
                            <td class="p-2 border">
                                <x-edit-button permission="edit-schema" id="{{ $emadEdeen->id }}" />
                            </td>
                            <td class="p-2 border">
                                <x-delete-button permission="delete-schema" id="{{ $emadEdeen->id }}"
                                    name="{{ $emadEdeen->name }}" />
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

            <x-paginate :data-links="$emadEdeens->links()" />
        </div>
    </div>
</div>
