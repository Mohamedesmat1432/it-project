<div>
    @livewire('department.update-department')

    @livewire('department.delete-department')

    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

        <div class="flex justify-between">
            <h1 class=" text-2xl font-medium text-gray-900">
                {{ __('Departments') }}
            </h1>
            @livewire('department.create-department')
        </div>

        <div class="mt-6 text-gray-500 leading-relaxed">
            <div class="mt-3">
                <div class="flex justify-between">
                    <div>
                        <x-input type="search" wire:model.live.debounce.500ms="search"
                            placeholder="{{ __('Search ...') }}" />
                    </div>
                    <div>
                        <x-select id="page_element" class="mt-1 block w-full" wire:model.live="page_element">
                            @for ($i = 10; $i <= 100; $i++)
                                <option value="{{ $i }}">Per page {{ $i }}</option>
                            @endfor
                        </x-select>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                @if (count($checkbox_arr) > 0)
                    <x-danger-button
                        wire:click="$dispatch('bulk-delete-modal',{arr:'{{ implode(',', $checkbox_arr) }}'})"
                        wire:loading.attr="disabled">
                        <x-icon class="w-4 h-4" name="trash" />
                        {{ __('Delete All') }} ({{ count($checkbox_arr) }})
                    </x-danger-button>
                @endif

                @livewire('department.bulk-delete-department')
            </div>

            <x-table>
                <x-slot name="thead">
                    <tr>
                        <td class="px-4 py-2 border">
                            <div class="text-center">
                                <x-checkbox wire:click="checkboxAll" />
                            </div>
                        </td>
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
                        <td class="px-4 py-2 border" colspan="2">
                            <div class="flex items-center">
                                {{ __('Action') }}
                            </div>
                        </td>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @forelse ($departments as $department)
                        <tr wire:key="department-{{ $department->id }}">
                            <td class="p-2 border">
                                <x-checkbox wire:model.live="checkbox_arr" value="{{ $department->id }}" />
                            </td>
                            <td class="p-2 border">
                                {{ $department->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $department->name }}
                            </td>
                            <td class="p-2 border">
                                @can('edit-department')
                                    <x-indigo-button wire:click="$dispatch('edit-modal',{id:'{{ $department->id }}'})"
                                        wire:loading.attr="disabled">
                                        <x-icon class="w-4 h-4" name="pencil-square" />
                                        {{ __('Edit') }}
                                    </x-indigo-button>
                                @endcan
                            </td>
                            <td class="p-2 border">
                                @can('delete-department')
                                    <x-danger-button wire:click="$dispatch('delete-modal',{id:'{{ $department->id }}'})"
                                        wire:loading.attr="disabled">
                                        <x-icon class="w-4 h-4" name="trash" />
                                        {{ __('Delete') }}
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
                {{ $departments->links() }}
            </div>
        </div>
    </div>

</div>