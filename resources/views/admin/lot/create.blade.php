@extends(backpack_view('blank'))
@section('content')
<div>    
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
    <form action="{{ route('admin.lot.store') }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">{{ __('Title') }}</label>
          <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="{{ __('Enter your title') }}">
          
          <label for="description" class="form-label">{{ __('Description') }}</label>
          <textarea class="form-control" name="description" id="description" placeholder="{{ __('Enter description') }}"></textarea>
        </div>
         <div class="form-group">
            <label class="col-form-label" for="multiple-select">{{ __('Categories') }}</label>
            <select class="form-control" id="multiple-select" name="categories_ids" size="5" multiple="">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach 
            </select>
         </div>
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
    </form>
</div>
@endsection
