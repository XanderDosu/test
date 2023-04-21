@extends(backpack_view('blank'))
@section('content')
<div class="flash-message">
   @foreach (['danger', 'warning', 'success', 'info'] as $msg)
       @if(Session::has($msg))
           <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
       @endif
   @endforeach
</div>
<div class="col-md-12">
   @if ($errors->any())
       <div class="flash-message">
           @foreach ($errors->all() as $error)
               <p class="alert alert-danger">{{ $error }}</p>
           @endforeach
       </div>
   @endif
<div>    
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        <input type="hidden" name="_method" value="put" />
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">{{ __('Name') }}</label>
          <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?? $category->name }}" placeholder='Enter name'>
         </div>
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</div>
@endsection
