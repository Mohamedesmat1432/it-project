<div>
    <x-dialog-modal wire:model.live="edit_modal" submit="save()" method="PATCH">
        <x-slot name="title">
            {{ __('Update Patch') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="port" value="{{ __('Port') }}" />
                <x-input type="text" class="mt-1 block w-full" wire:model="form.port"
                    placeholder="{{ __('Enter patch port') }}" autocomplete="on" />
                <x-input-error for="form.port" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('edit_modal',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-indigo-button class="ml-3" type="submit" wire:loading.attr="disabled">
                {{ __('Save Patch') }}
            </x-indigo-button>
        </x-slot>
    </x-dialog-modal>
</div>
