<div>
    @include('livewire.branchs.includes.save-patch')

    @include('livewire.branchs.includes.delete-patch')

    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

        <div class="flex justify-between">
            <h1 class=" text-2xl font-medium text-gray-900">
                {{ __('Patchs') }}
            </h1>
            <x-indigo-button wire:click="confirmPatchAdd()" wire:loading.attr="disabled">
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
                    @foreach ($patchs as $patch)
                        <tr>
                            <td class="p-2 border">
                                {{ $patch->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $patch->port }}
                            </td>
                            <td class="p-2 border">
                                <x-indigo-button wire:click="confirmPatchEdit({{ $patch->id }})"
                                    wire:loading.attr="disabled">
                                    <x-icon class="w-4 h-4" name="pencil-square" />
                                    {{ __('Edit') }}
                                </x-indigo-button>
                            </td>
                            <td class="p-2 border">
                                <x-danger-button wire:click="confirmPatchDeletion({{ $patch->id }})"
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
                {{ $patchs->links() }}
            </div>
        </div>
    </div>

</div>