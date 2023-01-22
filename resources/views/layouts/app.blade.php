<!doctype html>

<html lang="fr">

    <!-- Header -->
    @include('partials.header')
    <!-- END Header -->
    
    <body>

        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <main class="main" id="top">

            <div class="container" data-layout="container">
                
                <div class="content">
                    @include('partials.sidebar')

                    <!-- Page Content -->
                    @yield('content')
                    <!-- END Page Content -->

                    @include('partials.footer')
                </div>
            </div>
        </main>        
        @include('partials.scripts')
    </body>

</html>
