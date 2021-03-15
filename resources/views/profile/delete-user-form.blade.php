<x-jet-action-section>
    <x-slot name="title">
        Eliminar cuenta
    </x-slot>

    <x-slot name="description">
       Eliminar permanentemente tu cuenta
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Una vez que tu cuenta es eliminada, toda la información asociada será eliminada también. Por eso, piensa bien si es lo que realmente quieres hacer.
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                Eliminar permanentemente mi cuenta
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                ¿Confirmas que quieres eliminar tu cuenta?
            </x-slot>

            <x-slot name="content">
                Recuerda que al eliminar la cuenta, toda la información asociada a ella se eliminará también. Si estás de acuerdo con ello y quieres seguir con el proceso de eliminación, escribe tu contraseña y presiona el botón "Eliminar".

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="Ingresa tu contraseña"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    Cancelar eliminación
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    Eliminar cuenta
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
