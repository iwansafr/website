<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card pt-3">
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
                                    @if (!empty($cat_id))
                                        <th>{{ __('CATEGORY') }}</th>
                                    @endif
                                    <th>{{ __('ACTION') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dataProduct->isNotEmpty())
                                    @foreach ($dataProduct as $item)
                                        <tr>
                                            <td>{{ $loop->index + $dataProduct->firstItem() }}</td>
                                            <td>{{ $item->title }}</td>
                                            @if (!empty($cat_id))
                                                <td>
                                                    {{ $item->category }}
                                                </td>
                                            @endif
                                            <td>
                                                <a href="{{ url('admin/product/edit/'.$item->id) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" wire:click="setDelete({{ $item->id }})"><i class="bi bi-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $dataProduct->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
