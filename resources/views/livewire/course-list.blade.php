<div class="ml-5 text-blue-500 shadow-lg">
    <button class="btn btn-sm" wire:click="incrementa">+</button>
    {{ strtoupper($hola) }}
    {{$search}}
    <div>
        {{ $contador }}
    </div>
    <label for="my-modal" class="btn">Crear usuario</label>
    <div class="flex  items-center">
        <div>
            <input class="rounded-xl border-blue-600 m-5" type="text" wire:model="search" wire:keyup.escape="borrar">
        </div>
        <div>
            <button class="bg-blue-400 text-white rounded-lg p-2" wire:click="borrar">Borrar</button>
        </div>
    </div>
    <div>
        @foreach($users as $user)
            <div>
                {{ $user->name }}
                <button class="btn btn-xs" wire:click="elimina('{{ $user->id }}')">Eliminar</button>
            </div>
        @endforeach
        
    </div>

    <input type="checkbox" id="my-modal" class="modal-toggle" wire:model="open" />
    <div class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Crear usuario</h3>
        <div>
            <div>
                <label for="name">Nombre:*</label><br>
                <input class="input input-bordered input-sm input-secondary w-50 max-w-xs" type="text" wire:model="name">
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label for="email">Email:*</label><br>
                <input class="input input-bordered input-sm input-secondary w-50 max-w-xs" type="input input-bordered input-secondary w-full max-w-xs" wire:model="email">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password">Password:*</label><br>
                <input class="input input-bordered input-sm input-secondary w-50 max-w-xs" type="input input-bordered input-secondary w-full max-w-xs" wire:model="password">
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="modal-action">
        <button class="btn btn-sm btn-outline btn-primary" wire:click="crear">Crear</button>
        <label for="my-modal" class="btn btn-sm btn-outline btn-secondary">Cerrar</label>

        
        </div>
    </div>
    </div>


</div>
