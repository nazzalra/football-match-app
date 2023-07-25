<div>
    <div class="card">
        <div class="card-header">
            Buat Data Klub
        </div>

        <div class="card-body">
            <form wire:submit.prevent="submit">
                @csrf
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-sm">
                            <div class="form-group">
                                Nama Klub
                                <input type="text" name="name" class="form-control" wire:model="name">
                                @error('name')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                Kota
                                <input type="text" name="city" class="form-control" wire:model="city">
                                @error('city')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br />

</div>