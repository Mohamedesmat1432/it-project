<div>
    <x-create-button permission="create-department" />

    <x-dialog-modal wire:model.live="create_modal" submit="save" method="POST">
        <x-slot name="title">
            {{ __('Create New Department') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="form.name" value="{{ __('Name') }}" />
                <x-input type="text" class="mt-1 block w-full" wire:model="form.name"
                    placeholder="{{ __('Enter department name') }}" autocomplete="on"/>
                <x-input-error for="form.name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('create_modal',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-indigo-button type="submit" class="ml-3" wire:loading.attr="disabled">
                {{ __('Save Department') }}
            </x-indigo-button>
        </x-slot>
    </x-dialog-modal>
</div>
