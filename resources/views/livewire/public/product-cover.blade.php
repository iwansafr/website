<div>
    <div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
        <p>{{ __('category') }} <a href="{{ url('category/'.$product_cover->categories->first()->slug) }}" target="_blank" class="fh5co-site-name">{{ $product_cover->categories->first()->title }}</a></p>
        <h2>{{ $product_cover->title }}</h2>
        <h3>{!! $product_cover->description !!}</h3>
        <span class="price">${{ $product_cover->price }}</span>
        <!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
    </div>
</div>
