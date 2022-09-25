<div>
    @push('styles')
        <style>
            .my-custom-scrollbar {
                position: relative;
                height: 200px;
                overflow: auto;
            }

            .table-wrapper-scroll-y {
                display: block;
            }

            /* width */
            ::-webkit-scrollbar {
                width: 5px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #888;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: #555;
            }
        </style>
    @endpush
    <form wire:submit.prevent="save">
        <div class="modal-body">
            @if (session()->has('msg'))
                <div class="alert alert-success"><i class="bi bi-file-excel"></i> {{ session('msg') }}</div>
            @endif
            {{-- <div wire:ignore>
                <x-multiselect name="roles" label="Role" :options="$roleOptions"></x-multiselect></div>
            <div class="hidden @error('roles') is-invalid @enderror"></div>
            <div class="invalid-feedback">
                @error('roles')
                    {{ $message }}
                @enderror
            </div> --}}
            <x-input name="searchRole" label="Role"></x-input>
            @if ($roleList->isNotEmpty())
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table">
                        @foreach ($roleList as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td class="float-end">
                                    <span
                                        wire:click="setRoles('{{ $item->name }}')"class="btn btn-sm btn-primary">{{ __('Pilih') }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
            @if (!empty($roles))
                @foreach ($roles as $key => $value)
                    <span class="btn btn-sm btn-info">{{ $value }}</span>
                @endforeach
            @endif
            <x-input name="name" label="Name"></x-input>
            <x-input name="email" label="Email" type="email"></x-input>
            <x-input name="password" label="Password" type="password"></x-input>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal" wire:click="clear">
                <i class="bi bi-x"></i>
                <span>Close</span>
            </button>
            <div wire:loading wire:target="save">
                <button class="btn btn-primary ml-1 disabled">
                    <i class="bi bi-check"></i>
                    <span>{{ __('Sedang Mengirim Data') }} ...</span>
                </button>
            </div>
            <div wire:loading.remove wire:target="save">
                <button type="submit" id="buttonSave" class="btn btn-primary ml-1">
                    <i class="bi bi-check"></i>
                    <span>{{ __('Save') }}</span>
                </button>
            </div>
        </div>
    </form>

</div>