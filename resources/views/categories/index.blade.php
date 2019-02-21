@extends('layouts.app')

@section('content')

<div class="container">
  @foreach ($categories as $category)
  <div id="grid" class="grid ">
         <a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
          <figure>
            <img src="{{asset($category->img_url)}}" />
            <div>
              <h2>{{ $category->title}}</h2>
              @component('components.delete',
                        ['url' => route('categories.destroy', $category->id )])
              @endcomponent
          </div>
      </figure>
    </a>
  </div>
  @endforeach
</div>

@endsection
