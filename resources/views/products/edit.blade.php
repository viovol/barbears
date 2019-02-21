@extends('layouts.app')
@section('content')

<div class="formwrap">
  <h2>Create new product</h2>
  <hr>
  <br>
  @if(Session::has('update'))
    <div>
    <div class="alert alert-success alert-dismissable col-md-8 col-md-push-2">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <i class="fa fa-check" aria-hidden="true"></i>
     <em> {!! session('update') !!}</em>
    </div>
 </div>
  @endif
  <form  action="{{ route('products.update', $product->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group {{$errors -> has('title') ? ' has-error' : ''}}">
      <input class=" form-control" name="title" type="text" value="{{ old('title', $product->title) }}">
      @if ($errors->has('title'))
        <span class="help-block">
          <strong>{{ $errors -> first('title')}}</strong>
        </span>
      @endif
    </div>
    <div class="form-group {{$errors -> has('description') ? ' has-error' : ''}}">
      <textarea class=" form-control" name="description" value="{{ old('description', $product->description) }}">{{$product->description}}</textarea>
      @if ($errors->has('description'))
        <span class="help-block">
          <strong>{{ $errors -> first('description')}}</strong>
        </span>
      @endif
    </div>
    <div class="form-group {{$errors -> has('img_url') ? ' has-error' : ''}}">
      <input class=" form-control" name="img_url"type="text" value="{{ old('img_url', $product->img_url) }}" placeholder="Image url">
      @if ($errors->has('img_url'))
        <span class="help-block">
          <strong>{{ $errors -> first('img_url')}}</strong>
        </span>
      @endif
    </div>
    <div class="form-group {{$errors -> has('price') ? ' has-error' : ''}}">
      <input type="numeric" class=" form-control" name="price" value="{{ old('price', $product->price) }}" placeholder="price">
      @if ($errors->has('price'))
        <span class="help-block">
          <strong>{{ $errors -> first('price')}}</strong>
        </span>
      @endif
    </div>
    <div class="form-group {{$errors -> has('quantity') ? ' has-error' : ''}}">
      <input type="numeric" class=" form-control" name="quantity" value="{{ old('quantity', $product->quantity) }}" placeholder="quantity">
      @if ($errors->has('quantity'))
        <span class="help-block">
          <strong>{{ $errors -> first('quantity')}}</strong>
        </span>
      @endif
    </div>
    <div class=" form-group dropdown {{$errors -> has('category_id') ? ' has-error' : ''}}">
              <select name="category_id" class=" form-control dropdown-select">
                <option value="{{ old('category_id', $product->category_id) }}">{{$product->category->title}}</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}" </option>
                @endforeach
              </select>
    </div>
    <div class="form-group">
          <button type="submit" class="button_base b01_simple_rollover ">Sumbmit</button >
        </div>
  </form>
</div>

@endsection
