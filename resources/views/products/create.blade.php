@extends('layouts.app')
@section('content')
<div class="formwrap">
  <h2>Create new product</h2>
    <hr>
  <br>
<form  action="{{route('products.store')}}" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
    <input class=" form-control" name="title" type="text" value="{{old('title')}}"placeholder="Title">
  </div>

  <div class="form-group">
    <textarea class=" form-control" value="{{old('description')}}"name="description" placeholder="Description"></textarea>
  </div>

  <div class="form-group">
    <input class=" form-control" name="img_url"type="text" value="{{old('img_url')}}" placeholder="Image url">
  </div>


  <div class="form-group">
    <input type="numeric" class=" form-control" name="price" value="{{old('price')}}" placeholder="price">
  </div>
  <div class="form-group">
    <input type="numeric" class=" form-control" name="quantity" value="{{ old('quantity')}}" placeholder="quantity">
  </div>

  <div class=" form-group dropdown">
          <select name="category_id" class=" form-control dropdown-select">
            <option value="">Select Category</option>
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
