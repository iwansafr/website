<div>
    <div class="alert @if(session()->missing('alert')) d-none @endif alert-{{ session('alert') ?? ''}}">
        {{ session('message') }}
    </div>
</div>