<div>
    <form wire:submit.prevent="save">
        <div class="card">
            <div class="card-header">
                {{ __('Content Form') }}
            </div>
            <div class="card-body">
                @if (session()->has('msg'))
                    <div class="alert alert-success"><i class="bi bi-file-excel"></i> {{ session('msg') }}</div>
                @endif

                <x-input name="title" label="Title"></x-input>
                <x-input name="searchCategory" label="Category"></x-input>
                @if ($categoryList->isNotEmpty())
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table">
                            @foreach ($categoryList as $item)
                                <tr>
                                    <td>
                                        {{ !empty($item->parentCategory->title) ? $item->parentCategory->title.' -> ' : '' }}
                                        {{ $item->title }}
                                    </td>
                                    <td class="float-end">
                                        <span
                                            wire:click="setCategories('{{ $item->id }}')"class="btn btn-sm btn-primary">{{ __('Pilih') }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endif
                @if (!empty($categories))
                    @foreach ($categories as $key => $value)
                        <span class="btn btn-sm btn-info">{{ $value }}</span>
                    @endforeach
                @endif
                <div wire:ignore>
                    <div id="full" wire:model="content">

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div wire:loading wire:target="save">
                    <button class="btn btn-primary ml-1 disabled">
                        <i class="bi bi-clock-history"></i>
                        <span>{{ __('Sedang Mengirim Data') }} ...</span>
                    </button>
                </div>
                <div wire:loading.remove wire:target="save">
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bi bi-upload"></i>
                        <span>{{ __('Save') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
