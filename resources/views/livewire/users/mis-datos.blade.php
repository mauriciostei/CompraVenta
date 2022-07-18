<form wire:submit.prevent="save">

    <div class="form-floating mb-3">
        <input type="text" class="form-control" placeholder="Nombre" wire:model="user.name"/>
        <label>Nombre</label>
        @error('user.name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" placeholder="Correo" wire:model="user.email"/>
        <label>Correo Electronico</label>
        @error('user.email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 pt-3">
        <input type="submit" value="Actualizar" class="btn btn-primary w-100" />
    </div>

</form>