<div>
    @livewire('switch.update-switch')

    @livewire('switch.delete-switch')

    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

        <div class="flex justify-between">
            <h1 class=" text-2xl font-medium text-gray-900">
                {{ __('Switchs') }}
            </h1>
            @livewire('switch.create-switch')
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
            {{-- <div class="mt-3">
                @if ($bulk_disabled)
                    <x-danger-button wire:click="confirmDeletionAll()" wire:loading.attr="disabled">
                        <x-icon class="w-4 h-4" name="trash" />
                        {{ __('Delete Selected') }} ({{ $bulk_disabled }})
                    </x-danger-button>
                @endif
            </div> --}}
        </div>

        <x-table>
            <x-slot name="thead">
                <tr>
                    {{-- <td class="px-4 py-2 border">
                        <div class="flex items-center">
                            <x-checkbox wire:click="selectedAll" />
                        </div>
                    </td> --}}
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
                            <button wire:click="sortByField('hostname')">
                                {{ __('HostName') }}
                            </button>
                            <x-sort-icon sort_field="hostname" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                        </div>
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center">
                            <button wire:click="sortByField('ip')">
                                {{ __('Ip / 24') }}
                            </button>
                            <x-sort-icon sort_field="ip" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                        </div>
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center">
                            <button wire:click="sortByField('platform')">
                                {{ __('Platform') }}
                            </button>
                            <x-sort-icon sort_field="platform" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                        </div>
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center">
                            <button wire:click="sortByField('version')">
                                {{ __('Version') }}
                            </button>
                            <x-sort-icon sort_field="version" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                        </div>
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center">
                            <button wire:click="sortByField('floor')">
                                {{ __('Floor') }}
                            </button>
                            <x-sort-icon sort_field="floor" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                        </div>
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center">
                            <button wire:click="sortByField('location')">
                                {{ __('Location') }}
                            </button>
                            <x-sort-icon sort_field="location" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                        </div>
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center">
                            <button wire:click="sortByField('password')">
                                {{ __('Password') }}
                            </button>
                            <x-sort-icon sort_field="password" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                        </div>
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center">
                            <button wire:click="sortByField('password_enable')">
                                {{ __('PasswordEnable') }}
                            </button>
                            <x-sort-icon sort_field="password_enable" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                @forelse ($switchs as $switch)
                    <tr wire:key="switch-{{ $switch->id }}">
                        {{-- <td class="p-2 border">
                            <x-checkbox wire:model.live="selected_switch" value="{{ $switch->id }}" />
                        </td> --}}
                        <td class="p-2 border">
                            {{ $switch->id }}
                        </td>
                        <td class="p-2 border">
                            {{ $switch->hostname }}
                        </td>
                        <td class="p-2 border">
                            {{ $switch->ip }}
                        </td>
                        <td class="p-2 border">
                            {{ $switch->platform }}
                        </td>
                        <td class="p-2 border">
                            {{ $switch->version }}
                        </td>
                        <td class="p-2 border">
                            {{ $switch->floor }}
                        </td>
                        <td class="p-2 border">
                            {{ $switch->location }}
                        </td>
                        <td class="p-2 border">
                            {{ $switch->password }}
                        </td>
                        <td class="p-2 border">
                            {{ $switch->password_enable }}
                        </td>
                        <td class="p-2 border">
                            @can('edit-switch')
                                <x-indigo-button wire:click="$dispatch('edit-modal',{id:'{{ $switch->id }}'})"
                                    wire:loading.attr="disabled">
                                    <x-icon class="w-4 h-4" name="pencil-square" />
                                    {{ __('Edit') }}
                                </x-indigo-button>
                            @endcan
                        </td>
                        <td class="p-2 border">
                            @can('delete-switch')
                                <x-danger-button
                                    wire:click="$dispatch('delete-modal',{id:'{{ $switch->id }}'})"
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
            {{ $switchs->links() }}
        </div>
    </div>
</div>

</div>