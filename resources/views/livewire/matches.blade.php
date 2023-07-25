<div>
    <div class="card">
        <div class="card-header">
            {{ $isMultiple?'Multiple':'Single' }} Match
        </div>

        <div class="card-body">
            <form wire:submit.prevent="submit">
                @csrf
                <div class="container">
                    @foreach ($matches as $index => $match )
                    <div class="row mb-3">
                        <div class="col-sm">
                            <select name="matches[{{$index}}][home][club_id]" wire:model="matches.{{$index}}.home.club_id" class="form-control mb-3">
                                <option value="">-- Pilih Klub --</option>
                                @foreach ($allClubs->except($match['away']['club_id']) as $club)
                                <option value="{{ $club->id }}">
                                    {{ $club->name }}
                                </option>
                                @endforeach
                            </select>
                            <input type="number" name="matches[{{$index}}][home][score]" class="form-control inline-block" wire:model="matches.{{$index}}.home.score" />
                            @error('matches.'.$index.'.home.club_id')
                            <div class="error text-danger mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm text-center m-auto">
                            -
                        </div>
                        <div class="col-sm">
                            <select name="matches[{{$index}}][away][club_id]" wire:model="matches.{{$index}}.away.club_id" class="form-control mb-3">
                                <option value="">-- Pilih Klub --</option>
                                @foreach ($allClubs->except($match['home']['club_id']) as $club)
                                <option value="{{ $club->id }}">
                                    {{ $club->name }}
                                </option>
                                @endforeach
                            </select>
                            
                            <input type="number" name="matches[{{$index}}][away][score]" class="form-control inline-block" wire:model="matches.{{$index}}.away.score" />
                            @error('matches.'.$index.'.away.club_id')
                            <div class="error text-danger mb-3">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    @if ($isMultiple)
                    <div class="row mb-5 justify-content-end">
                        <a href="#" wire:click.prevent="removeMatch({{$index}})">Remove Match</a>
                    </div>
                    <hr>
                    @endif
                    @endforeach
                    @if ($isMultiple)
                    <div class="row mb-5">
                        <div class="col-sm">
                            <button class="btn btn-sm btn-secondary" wire:click.prevent="addMatch">+ Add Another Match</button>
                        </div>
                    </div>
                    @endif
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