<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/img/agronesia_headLogo.png">
        <title>SIMAG | Dashboard</title>

        <link rel="canonical" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
        
        <!-- Custom styles for this template -->
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="/css/sidebars.css">
        <link rel="stylesheet" type="text/css" href="/css/sidebars_.css">
        
        <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
        <script type="text/javascript" src="/js/sidebars.js"></script>
        <script type="text/javascript" src="/js/sidebars_.js"></script>
        
        {{-- Trix  Editor --}}
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
        <script type="text/javascript" src="/js/trix.js"></script>
        <style>
            trix-toolbar [data-trix-button-group="file-tools"]
            {
              display:none;
            }
        </style>
      </head>

      <body class="bg-success bg-opacity-25">
    
          @include('dashboard.layouts.header')

          <div class="container-fluid">
              <div class="row">
                  @include('dashboard.layouts.sidebar')
                  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                      @yield('container')
                  </main>
              </div>
          </div>
          
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>    
          {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>--}}
          <script src="/js/dashboard.js"></script>
      </body>
</html>
