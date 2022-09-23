<div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    @if (session()->has('msg'))
                        <div class="alert alert-success"><i class="bi bi-file-excel"></i> {{ session('msg') }}</div>
                    @endif
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <x-input name="name" label="Name"></x-input>
                        <button type="submit" class="btn btn-sm btn-primary">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('NO') }}</th>
                                <th>{{ __('NAME') }}</th>
                                <th>{{ __('GUARD') }}</th>
                                <th>{{ __('ACTION') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataRole->isNotEmpty())
                                @foreach ($dataRole as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->guard_name }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $dataRole->links() }}
                </div>
            </div>
        </div>
        
    </div>
</div>
