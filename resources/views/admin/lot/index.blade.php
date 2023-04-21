@extends(backpack_view('blank'))
@section('content')
 <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
        @endif
    @endforeach
    </div>
   
    <h1>{{ __('Lots') }}</h1>
    <div class="row mb-0">
        <div class="col-sm-6">
            <div class="d-print-none with-border">
                <a href="{{ route('admin.lot.create') }}" class="btn btn-primary" data-style="zoom-in"><span class="ladda-label"><i class="la la-plus"></i> {{ __('Add lot') }}</span></a>
            </div>
        </div>
    </div>
    <form action="{{ route('admin.lot.index') }}" method="get">
        <div class="mb-3">
            <h3>{{ __('Filters') }}</h3>
            <div class="form-label">{{ __('Choose category') }}</div>
            <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $category->id == $filteredCategoryId ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class='row'>
            <div class='mb-3'>
            <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
            <a class="btn btn-primary" href="http://new_shop/admin/lots" role="button">{{ __('Clear') }}</a>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>{{ __('Id') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lots as $lot)
                    <tr>
                        <td>{{ $lot->id }}</td>
                        <td>{{ $lot->title }}</td>
                        <td>{{ $lot->description }}</td>
                        <td>
                            <a href="{{ route('admin.lot.show', $lot->id) }}" class="btn btn-sm btn-link"><i class="la la-eye"></i> {{ __('View') }}</a>
                            <a href="{{ route('admin.lot.edit', $lot->id) }}" class="btn btn-sm btn-link"><i class="la la-edit"></i> {{ __('Edit') }}</a>
                            <form action="{{ route('admin.lot.delete', $lot->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button type="submit"  onclick="return confirm('{{ __('Are you sure you want to delete this lot?') }}')">
                                   <i class="la la-trash"></i> {{ __('Delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection









