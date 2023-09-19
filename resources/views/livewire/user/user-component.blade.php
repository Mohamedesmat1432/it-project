<div>

    @include('livewire.user.includes.save-user')

    @include('livewire.user.includes.delete-user')

    {{-- @include('livewire.user.includes.import-user') --}}

    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

        <div class="flex justify-between">
            <h1 class=" text-2xl font-medium text-gray-900">
                {{ __('Users') }}
            </h1>
            <x-indigo-button wire:click="confirmUserAdd()" wire:loading.attr="disabled">
                <x-icon class="w-4 h-4" name="plus" />
                {{ __('Create') }}
            </x-indigo-button>
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
                        {{-- <td class="px-4 py-2 border">
                            <div class="flex items-center">
                                <button wire:click="sortByField('role')">
                                    {{ __('Role') }}
                                </button>
                                <x-sort-icon sort_field="role" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                            </div>
                        </td> --}}
                        <td class="px-4 py-2 border" colspan="2">
                            <div class="flex items-center">
                                {{ __('Action') }}
                            </div>
                        </td>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($users as $user)
                        <tr wire:key="user-{{ $user->id }}">
                            <td class="p-2 border">
                                {{ $user->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $user->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $user->email }}
                            </td>
                            {{-- <td class="p-2 border">
                                {{ $user->role }}
                            </td> --}}
                            <td class="p-2 border">
                                <x-indigo-button wire:click="confirmUserEdit({{ $user->id }})"
                                    wire:loading.attr="disabled">
                                    <x-icon class="w-4 h-4" name="pencil-square" />
                                    {{ __('Edit') }}
                                </x-indigo-button>
                            </td>
                            <td class="p-2 border">
                                <x-danger-button wire:click="confirmUserDeletion({{ $user->id }})"
                                    wire:loading.attr="disabled">
                                    <x-icon class="w-4 h-4" name="trash" />
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>

</div>
