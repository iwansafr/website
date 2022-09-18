<div>
    @if (session()->has('msg'))
        <div class="alert alert-danger"><i class="bi bi-file-excel"></i> {{ session('msg') }}</div>
    @endif
    <form wire:submit.prevent="login">
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Username" wire:model="name">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            <div class="invalid-feedback">
                @error('name') {{ $message }} @enderror
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" wire:model="password">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            <div class="invalid-feedback">
                @error('password') {{ $message }} @enderror
            </div>
        </div>
        <div class="form-check form-check-lg d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" wire:model="remember_me">
            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                {{ __('Keep me logged in') }}
            </label>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('Log in') }}</button>
    </form>
</div>
