


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Panel</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="" href=" {{ asset('deshboard/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" type="" href=" {{ url('deshboard/css/style.css') }}" /> 
  <link rel="stylesheet" type="" href=" {{ url('deshboard/css/responsive.css') }}"/>
  {{-- <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> --}}
  {{-- <link
    href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;500;700;900&family=Rubik:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  
      <!-- main content area start -->
      @yield('body')
  {{-- <script src="{{ asset('/assets/deshboard/js/jquery-2.2.4.min.js') }}" ></script>
  <script src="{{ asset('/assets/deshboard/js/bootstrap.min.js') }}" ></script>
  <script src="{{ asset('/assets/deshboard/js/app.js') }}"></script> --}}
  {{-- <script>
    function onclickErrorHide() {
        var displayStatus = document.querySelector(".alert");
        displayStatus.style.display = 'none';
    };
</script>  --}}


  <!-- <script src="./js/jquery-2.2.4.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="./js/app.js"></script> -->
  <script>
    function showPassword() {
      var x = document.getElementById("passwordInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
 
</body>

</html>