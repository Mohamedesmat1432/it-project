<div>
    @can(['create-user'])
        <x-indigo-button wire:click="createModal()" wire:loading.attr="disabled">
            <x-icon class="w-4 h-4" name="plus" />
            {{ __('Create') }}
        </x-indigo-button>
    @endcan
    <x-dialog-modal wire:model.live="create_modal" submit="save()" method="POST">
        <x-slot name="title">
            {{ __('Create New User') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="form.name" value="{{ __('Name') }}" />
                <x-input id="form-name-create" type="text" class="mt-1 block w-full" wire:model="form.name"
                    placeholder="{{ __('Enter user name') }}" autocomplete="username" />
                <x-input-error for="form.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-label for="form.email" value="{{ __('Email') }}" />
                <x-input id="form-email-create" type="email" class="mt-1 block w-full" wire:model="form.email"
                    placeholder="{{ __('Enter user email') }}" autocomplete="form.email" />
                <x-input-error for="form.email" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-label for="form.role" value="{{ __('Roles') }}" />
                <x-select id="form-role-create" class="mt-1 block w-full" wire:model="form.role" multiple>
                    @foreach ($roles as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.role" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-3">
                <x-label for="form.password" value="{{ __('Password') }}" />
                <x-input id="form-password-create" type="password" class="mt-1 block w-full" wire:model="form.password"
                    placeholder="{{ __('Enter user password') }}" autocomplete="current-password" />
                <x-input-error for="form.password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('create_modal',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-indigo-button class="ml-3" type="submit" wire:loading.attr="disabled">
                {{ __('Save User') }}
            </x-indigo-button>
        </x-slot>
    </x-dialog-modal>
</div>