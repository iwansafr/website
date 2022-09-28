<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table table-responive">
                        <div class="container-fluid">
                            <x-input name="search" label="Category Title"></x-input>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('NO') }}</th>
                                    <th>{{ __('TITLE') }}</th>
                                    <th>{{ __('PARENT') }}</th>
                                    <th>{{ __('ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dataCategory->isNotEmpty())
                                    @foreach ($dataCategory as $item)
                                        <tr>
                                            <td>{{ $loop->index + $dataCategory->firstItem() }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                {{ $item->parentCategory->title ?? 'None' }}
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal" wire:click="setEdit({{ $item->id }})"><i class="bi bi-pencil"></i></button>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="setDelete({{ $item->id }})"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $dataCategory->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
