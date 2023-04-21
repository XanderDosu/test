@extends(backpack_view('blank'))
@section('content')
<div>    
    <h1>{{ $lot->title }}</h1>
    <div>{{ $lot->description }}</div>
    
</div>
@endsection
