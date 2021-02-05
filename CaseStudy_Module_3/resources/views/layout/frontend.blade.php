@include ('frontend.include.head')

<body onload="myTimer()">
    <div class="container" style="height: auto">

        @yield('menutop')
        <div class="row">
            @yield('search')
            <div class='noidung' style="text-align:center">
                @yield('content')
            </div>
            <div class='phantrang'>
                @yield('phantrang')

            </div>
        </div>

        <div>
            @include ('frontend.include.footer')
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function hienAnh(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#hienanh').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>