<div>
    <h1 id="fh5co-logo">
        <a href="/">
            @if (!empty($logo['showImage']))
                <img src="{{ asset('storage/'.$logo['image']) }}" width="150" style="margin-top: -12px;" class="img img-fluid" alt="{{ $logo['title'] }}">
            @else
                <i class="icon-airplane"></i>{{ $logo['title'] }}
            @endif
        </a>
    </h1>
</div>
