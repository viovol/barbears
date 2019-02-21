
<div id="grid" class="grid ">
  @if(Auth::check())
      @if((Auth::user()->isAdmin()))
      <a href="{{route('products.edit', $product->id)}}" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
      @else
      <a href="{{route('product.addToCart', $product->id)}}" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
      @endif
    @endif
    @guest
    <a href="{{route('product.addToCart', $product->id)}}" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
    @endguest

        <figure>
          <img src="{{asset($product->img_url)}}" />
          <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
          <div>
            <h2>{{ $product->title}}</h2>
            <p>{{ $product->price}} eur</p>
            <p>liko: {{ $product->quantity}} </p>

            @if(Auth::check())
            	@if(Auth::user()->isAdmin())
              @component('components.delete',
                        ['url' => route('products.destroy', $product->id )])
              @endcomponent

                @else
                <button href="{{route('product.addToCart',['id'=>$product->id])}}"class="btn btn-danger btn-block">Add to cart</button>
              @endif
            @endif
            @guest
            <button class="btn btn-danger btn-block">Add to cart</button>

            @endguest



          </div>
        </figure>
       </a>
</div>
