<div>
    @foreach ($product_cover as $item)
        <div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
            {{-- <p>Category <a href="{{ url('category/'.$item->categories->slug) }}" target="_blank" class="fh5co-site-name">{{ $item->categories->title }}</a></p> --}}
            <h2>{{ $item->title }}</h2>
            <h3>{{ $item->description }}</h3>
            <span class="price">${{ $item->price }}</span>
            <!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
        </div>
    @endforeach
</div>
