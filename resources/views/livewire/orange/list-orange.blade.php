<div>
    @livewire('orange.update-orange')

    @livewire('orange.delete-orange')

    @livewire('orange.show-orange')

    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="flex justify-between">
            <h1 class="text-2xl font-medium text-gray-900">
                {{ __('Oranges') }}
            </h1>
            @livewire('orange.create-orange')
        </div>

        <div class="mt-6 text-gray-500 leading-relaxed">
            <div class="mt-3">
                <div class="flex justify-between">
                    <div>
                        <x-input type="search" wire:model.live.debounce.500ms="search"
                            placeholder="{{ __('Search ...') }}" />
                    </div>
                    <div>
                        <x-select class="overflow-scroll" wire:model.live.debounce.500ms="filter">
                            <option value="">{{ __('Status') }}</option>
                            <option value="active">{{ __('Active') }}</option>
                            <option value="pendding">{{ __('Pendding') }}</option>
                            <option value="cancelled">{{ __('Cancelled') }}</option>
                        </x-select>
                    </div>
                </div>
            </div>
            @can('import-export-orange')
                <div class="mt-3 flex">
                    @livewire('orange.import-export-orange')
                </div>
            @endcan
            @can('bulk-delete-orange')
                <div class="mt-3">
                    <x-bulk-delete-button />

                    @livewire('orange.bulk-delete-orange')
                </div>
            @endcan
            <x-table>
                <x-slot name="thead">
                    <tr>
                        @can('bulk-delete-orange')
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
                                <button wire:click="sortByField('price')">
                                    {{ __('Price') }}
                                </button>
                                <x-sort-icon sort_field="price" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('seats')">
                                    {{ __('Seats') }}
                                </button>
                                <x-sort-icon sort_field="seats" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('status')">
                                    {{ __('Status') }}
                                </button>
                                <x-sort-icon sort_field="status" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('start_date')">
                                    {{ __('Start Date') }}
                                </button>
                                <x-sort-icon sort_field="start_date" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('end_date')">
                                    {{ __('End Date') }}
                                </button>
                                <x-sort-icon sort_field="end_date" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td>
                        <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('company_id')">
                                    {{ __('Company') }}
                                </button>
                                <x-sort-icon sort_field="company_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                    @forelse ($oranges as $orange)
                        <tr wire:key="orange-{{ $orange->id }}">
                            @can('bulk-delete-orange')
                                <td class="p-2 border">
                                    <x-checkbox wire:model.live="form.checkbox_arr" value="{{ $orange->id }}" />
                                </td>
                            @endcan
                            <td class="p-2 border">
                                {{ $orange->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $orange->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $orange->price }}
                            </td>
                            <td class="p-2 border">
                                {{ $orange->seats }}
                            </td>
                            <td class="p-2 border">
                                <x-orange-status status="{{ $orange->status }}" />
                            </td>
                            <td class="p-2 border">
                                {{ $orange->start_date }}
                            </td>
                            <td class="p-2 border">
                                {{ $orange->end_date }}
                            </td>
                            <td class="p-2 border">
                                <x-show-button permission="show-orange" id="{{ $orange->id }}" />
                            </td>
                            <td class="p-2 border">
                                <x-edit-button permission="edit-orange" id="{{ $orange->id }}" />
                            </td>
                            <td class="p-2 border">
                                <x-delete-button permission="delete-orange" id="{{ $orange->id }}"
                                    name="{{ $orange->name }}" />
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

            <x-paginate :data-links="$oranges->links()" />
        </div>
    </div>
</div>
