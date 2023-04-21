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
    <form action="{{ route('admin.lot.update', $lot->id) }}" method="post">
        <input type="hidden" name="_method" value="put" />
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">{{ __('Title') }}</label>
          <input type="text" name="title" class="form-control" id="title" value="{{ old('title') ?? $lot->title }}" placeholder='Enter title'>
          
          <label for="description" class="form-label">{{ __('Description') }}</label>
          <textarea class="form-control" name="description" id="description" placeholder='Enter description'>{{ $lot->description }}</textarea>
        </div>
         <div class="form-group">
            <label class="col-form-label" for="multiple-select">{{ __('Categories') }}</label>
            <select class="form-control" id="multiple-select" name="categories_ids" size="5" multiple="">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if ($lotCategoriesIds->contains($category->id))
                                selected="selected"
                            @endif
                            >
                        {{ $category->name }}
                    </option>
                    
                @endforeach 
            </select>
         </div>
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </form>
</div>
@endsection
