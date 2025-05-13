{{-- 
    Description:
    This view extends a main layout and includes a form partial.
    It's commonly used to render a page with a form while maintaining a consistent layout across the application.
--}}

@extends('layouts.app') {{-- Extend the main layout named "app" located in resources/views/layouts/app.blade.php --}}

@section('content')     {{-- Define the section named "content" which will be injected into the layout --}}
    @include('form')    {{-- Include the form partial view located at resources/views/form.blade.php --}}
@endsection             {{-- End of the "content" section --}}
