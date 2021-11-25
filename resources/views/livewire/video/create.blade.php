<div>
    <x-form wire:submit.prevent="save" has-files>
        <x-form-group label="Name">
            <x-input name="name" wire:model="name" />

            @error('name')
            <x-form-error name="name" />
            @enderror
        </x-form-group>

        <x-form-group label="Cover">
            <x-file-pond wire:model="cover">
            </x-file-pond>

            @error('cover')
            <x-form-error name="cover" />
            @enderror
        </x-form-group>
        <button type="submit" class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-red-300">
            Save
        </button>
    </x-form>
</div>
