<div>
    @can('create-device')
        <x-indigo-button wire:click="createModal()" wire:loading.attr="disabled">
            <x-icon class="w-4 h-4" name="plus" />
            {{ __('Create') }}
        </x-indigo-button>
    @endcan

    <x-dialog-modal wire:model.live="create_modal" submit="save()" method="POST">
        <x-slot name="title">
            {{ __('Create New Device') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="form.name" value="{{ __('Device Name') }}" />
                <x-input id="form.name" type="text" class="mt-1 block w-full" wire:model="form.name"
                    placeholder="{{ __('Enter device name') }}" />
                <x-input-error for="form.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-label for="form.serial" value="{{ __('Serial') }}" />
                <x-input id="form.serial" type="text" class="mt-1 block w-full" wire:model="form.serial"
                    placeholder="{{ __('Enter device serial') }}" />
                <x-input-error for="form.serial" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-label for="form.specifications" value="{{ __('Specifications') }}" />
                <x-quill-editor name="form.specifications" body="{!! $this->form->specifications !!}" />

                {{-- <x-textarea id="form.specifications" type="text" class="mt-1 block w-full"
                    wire:model="form.specifications" placeholder="{{ __('Enter device specifications') }}">
                </x-textarea> --}}
                <x-input-error for="form.specifications" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('create_modal',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-indigo-button class="ml-3" type="submit" wire:loading.attr="disabled">
                {{ __('Save Device') }}
            </x-indigo-button>
        </x-slot>
    </x-dialog-modal>
</div>