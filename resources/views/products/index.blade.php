@extends('layouts.app')

@section('content')
<div class="container">
  @if(Auth::check())
  	@if(Auth::user()->isAdmin())
      <div class="row ">
      <div class="col-md-8 col-xs-12">
        <ul class="nav nav-pills">
          <li><a type="button" class="btn " data-toggle="modal" data-target="#addCategoryModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
          <li><a href="{{route('categories.index')}}"type="button" class="btn "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </ul>
      </div>
    </div>
    @endif
  @endif

  <div class="row ">
    <div class="col-md-8 col-xs-12 ">
          <ul class="nav nav-pills ">
              @foreach($categories as $category)
                <li  class=""><a href="#">{{$category->title}}</a></li>
              @endforeach
          </ul>
        </div>
  </div>
  <div class="modal fade" id="addCategoryModal" role="dialog">
    <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add category</h4>
            </div>
            <form class="form-Horizontal" action="{{route('categories.store')}}" method="POST">
              {{csrf_field()}}
                <div class="form-group {{$errors -> has('title') ? ' has-error' : ''}}">
                  <div class="col-md-6 col-xs-3">
                    <input type="text" name="title" class="form-control" placeholder="please add category title">
                    @if ($errors->has('title'))
                      <span class="help-block">
                        <strong>{{ $errors -> first('title')}}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group {{$errors -> has('img_url') ? ' has-error' : ''}}">
                  <div class="col-md-6 col-xs-6">
                    <input type="text" name="img_url" class="form-control" placeholder="please add image url">
                    @if ($errors->has('img_url'))
                      <span class="help-block">
                        <strong>{{ $errors -> first('img_url')}}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <br>
                <br>
              <div class="modal-footer">
                <button type="submit" class="btn">save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
          <!-- End Modal content-->
    </div>
  </div>


    <!-- here should be foreach -->
  @foreach (array_chunk($products->getCollection()->all(), 3) as $row)
    <div class="row">
      @foreach($row as $product)
      <div class="col-md-4 col-sm-4 col-sm-6">
        @component('components.product', ['product' => $product])
        @endcomponent
      </div>
      @endforeach
    </div>
  @endforeach
  @if(Auth::check())
  @if(Auth::user()->isAdmin())
    <div id="grid" class="grid ">
      <a href="{{route('products.create')}}" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
        <figure>
          <img src="https://i.pinimg.com/736x/3b/4b/1f/3b4b1f141710743708c6418971ed6a4d--boy-models-male-models-poses.jpg" />
          <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
          <div>
            <h2>Add New Product</h2>
            <p>Press enter to add product</p>
            <button><i class="fa fa-plus-circle fa-3x" aria-hidden="true" ></i></button>
          </div>
        </figure>
      </a>
    </div>
    <br>
  @endif
  @endif
  {{$products->links()}}
</div>

  <script src="http://lethalsilicon.com/resources/js/snap.svg-min.js"></script>
  <script type="text/javascript">
      (function() {

       function init() {
      var speed = 250,
          easing = mina.easeinout;

      [].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
          var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
         pathConfig = {
             from : path.attr( 'd' ),
             to : el.getAttribute( 'data-path-hover' )
         };

          el.addEventListener( 'mouseenter', function() {
         path.animate( { 'path' : pathConfig.to }, speed, easing );
          } );

          el.addEventListener( 'mouseleave', function() {
         path.animate( { 'path' : pathConfig.from }, speed, easing );
          } );
      } );
       }

       init();

        })();
  </script>
@endsection
