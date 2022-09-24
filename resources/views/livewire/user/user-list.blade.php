<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table table-responive">
                        <div class="container-fluid">
                            <x-input name="search" label="Role Name"></x-input>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('NO') }}</th>
                                    <th>{{ __('NAME') }}</th>
                                    <th>{{ __('ROLE') }}</th>
                                    <th>{{ __('ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dataUser->isNotEmpty())
                                    @foreach ($dataUser as $item)
                                        <tr>
                                            <td>{{ $loop->index + $dataUser->firstItem() }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->roles->first()->name }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#userEdit" wire:click="setEdit({{ $item->id }})"><i class="bi bi-pencil"></i></button>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#userDelete" wire:click="setDelete({{ $item->id }})"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $dataUser->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
