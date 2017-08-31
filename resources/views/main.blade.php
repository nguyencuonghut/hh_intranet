<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._header')
    </head>

    <body>
        @include('partials._nav')
        <div class="container">
            @yield('content')
            @include('partials._footer')
        </div>
    </body>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
            });
        });
    </script>
</html>