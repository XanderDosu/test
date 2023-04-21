@extends(backpack_view('blank'))
@section('content')
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}</p>
        @endif
    @endforeach
    <h1>{{ __('Categories') }}</h1>
    <div class="row mb-0">
        <div class="col-sm-6">
            <div class="d-print-none with-border">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary" data-style="zoom-in"><span class="ladda-label"><i class="la la-plus"></i> {{ __('Add categoty') }}</span></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>{{ __('Id') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-sm btn-link"><i class="la la-eye"></i> {{ __('View') }}</a>
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-link"><i class="la la-edit"></i> {{ __('Edit') }}</a>
                            <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button type="submit"  onclick="return confirm('{{ __('Are you sure you want to delete this category?') }}')">
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









