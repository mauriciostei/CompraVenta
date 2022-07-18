<form wire:submit.prevent="save">

    <div class="form-floating mb-3">
        <input type="password" class="form-control" placeholder="password" wire:model="password" autocomplete="off"/>
        <label>Contraseña Actual</label>
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" placeholder="password" wire:model="newPassword1" autocomplete="off"/>
        <label>Contraseña Nueva</label>
        @error('newPassword1')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="password" class="form-control" placeholder="password" wire:model="newPassword2" autocomplete="off"/>
        <label>Contraseña Nueva (igual que anterior)</label>
        @error('newPassword2')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 pt-3">
        <input type="submit" value="Actualizar" class="btn btn-primary w-100" />
    </div>

</form>