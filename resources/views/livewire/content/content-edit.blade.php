<div>
    <form wire:submit.prevent="save">
        <div class="card">
            <div class="card-header">
                {{ __('Content Form') }}
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-{{ session('alert') }}"><i class="bi bi-file-excel"></i> {{ session('message') }}</div>
                @endif

                <x-input name="title" label="Title"></x-input>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" readonly class="form-control" wire:model="slug" id="slug">
                </div>
                <x-input name="searchCategory" label="Category"></x-input>
                <div class="mb-3">
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
                                            <span wire:click="setCategories('{{ $item->id }}')"class="btn btn-sm btn-primary">{{ __('Pilih') }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    @if (!empty($categories))
                        @foreach ($categories as $key => $value)
                            <span class="btn btn-sm btn-info" wire:click="removeCategories({{ $key }})">{{ $value }} <i class="bi bi-trash"></i></span>
                        @endforeach
                    @endif
                </div>
                
                <hr>
                <div wire:ignore>
                    <div id="content_summernote" wire:model="content">

                    </div>
                </div>
                {{ $content }}
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
@push('scripts')
    <script src="/dist/assets/extensions/jquery/jquery.min.js"></script>
    <script src="/dist/assets/extensions/summernote/summernote-lite.min.js"></script>
    <script src="/dist/assets/js/pages/summernote.js"></script>
@endpush
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#content_summernote').summernote({
                callbacks:{
                    onChange:function(contents, $editable){
                        // console.log('onChange:' ,contents, $editable)
                        @this.set('content',contents)
                    }
                }
            })
        })
    </script>
@endpush