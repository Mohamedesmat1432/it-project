@props(['permission', 'id', 'name'])

@can($permission)
    <x-danger-button wire:click="$dispatch('delete-modal',{id:'{{ $id }}',name:'{{ $name }}'})"
        wire:loading.attr="disabled">
        <x-icon class="w-4 h-4" name="trash" />
        {{-- {{ __('Delete') }} --}}
    </x-danger-button>
@else
    <x-danger-button class="cursor-not-allowed opacity-60">
        <x-icon class="w-4 h-4" name="trash" />
    </x-danger-button>
@endcan
