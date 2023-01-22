<!DOCTYPE html>
<html lang="fr" dir="ltr">
    @include('partials.header')
    @routes
  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark navbar-theme bg-dark" >
        <div class="container">
          <a class="navbar-brand" href="../index.html"><span class="text-white">$auver Exchange</span></a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarStandard">
            
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#!">Échange</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Réduction</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">À Propos</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
            </ul>

            <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">

              @if(isset(Auth::user()->name))
              <li class="nav-item text-white">
                {{Auth::user()->name}}
              </li>
                <li class="nav-item dropdown dropdown-on-hover">
                  <a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-xl">
                      <img class="rounded-circle bg-white"  src="{{asset('assets/img/team/avatar.png')}}" alt="" />
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-center py-0" aria-labelledby="navbarDropdownUser">
                    <div class="bg-white rounded-soft py-2">
                      <a class="dropdown-item" href="{{ route('operations.index') }}">Opérations</a>
                      <a class="dropdown-item" href="pages/profile.html">Profil</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('users.logout') }}">Se déconnecter</a>
                    </div>
                  </div>
                </li>

              @else

                <li class="nav-item"><a class="nav-link" href="#!" data-toggle="modal" data-target="#connexion">Se connecter</a></li>
                <li class="nav-item"><a class="nav-link" href="#!" data-toggle="modal" data-target="#register">Créer un compte</a></li>
              @endif


            </ul>
          </div>
        </div>
      </nav>

      <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header bg-circle-shape p-2">
                    <div class="text-white text-center text-sans-serif  fs-4 z-index-1 position-relative">
                        $auver Exchange
                    </div>
                </div>

            <div class="modal-body p-4">
              <div class="row text-left justify-content-between align-items-center mb-2">
                <div class="col-auto">
                  <h5 id="modalLabel">Se connecter</h5>
                </div>
                <div class="col-auto">
                  {{-- <p class="fs--1 text-600 mb-0">Avez-vous un compte? <a href="../authentication/basic/login.html">Connexion</a></p> --}}
                  <p class="mb-0 fs--1"><span class="font-weight-semi-bold">Nouvel utilisateur? </span><a href="../../authentication/split/register.html">Créer un compte</a></p>

                </div>
              </div>

              <form id="login">
                <div class="form-group">
                <label for="connexion_email">E-mail</label>
                <input class="form-control" id="connexion_email" type="email" name="connexion_email"  />
                </div>
                <div class="form-group">
                <div class="d-flex justify-content-between">
                    <label for="connexion_password">Mot de passe</label><a class="fs--1" href="../../authentication/split/forgot-password.html">Mot de passe oublié?</a>
                </div>
                <input class="form-control" id="connexion_password" name="connexion_password" type="password"  />
                </div>
                <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="split-checkbox" />
                <label class="custom-control-label" for="split-checkbox">Remember me</label>
                </div>
                <div class="form-group">
                <button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Connexion</button>
                </div>
            </form>
              
              {{-- <div class="w-100 position-relative mt-4">
                <hr class="text-300" />
                <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">or register with</div>
              </div>
              <div class="form-group mb-0">
                <div class="row no-gutters">
                  <div class="col-sm-6 pr-sm-1"><a class="btn btn-outline-google-plus btn-sm btn-block mt-2" href="#"><span class="fab fa-google-plus-g mr-2" data-fa-transform="grow-8"></span> google</a></div>
                  <div class="col-sm-6 pl-sm-1"><a class="btn btn-outline-facebook btn-sm btn-block mt-2" href="#"><span class="fab fa-facebook-square mr-2" data-fa-transform="grow-8"></span> facebook</a></div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-circle-shape p-2">
                <div class="text-white text-center text-sans-serif  fs-4 z-index-1 position-relative">
                    $auver Exchange
                </div>
            </div>
            <div class="modal-body p-4">
              <div class="row text-left justify-content-between align-items-center mb-2">
                <div class="col-auto">
                  <h5 id="modalLabel">Créer un compte</h5>
                </div>
                <div class="col-auto">
                  <p class="fs--1 text-600 mb-0">Avez-vous un compte? <a href="../authentication/basic/login.html">Connexion</a></p>
                </div>
              </div>

            <form id="register">
                @csrf
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Nom et Prénoms" name="name" id="name"/>
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" placeholder="Adresse e-mail" name="email" id="email" />
                </div>
                <div class="form-row">
                  <div class="form-group col-6">
                    <input class="form-control" type="password" placeholder="Mot de passe" name="password" id="password"/>
                  </div>
                  <div class="form-group col-6">
                    <input class="form-control" type="password" placeholder="Confirmer mot de passe" name="confirm_password" id="confirm_password" />
                  </div>
                </div>
                {{-- <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="modal-register-checkbox" />
                  <label class="custom-control-label" for="modal-register-checkbox">J'accepte les <a href="#!">termes </a>et la <a href="#!">politique de confidentialité</a></label>
                </div> --}}
                <div class="form-group">
                  <button class="btn btn-primary btn-block mt-3" type="submit">S'inscrire</button>
                </div>
              </form>
              {{-- <div class="w-100 position-relative mt-4">
                <hr class="text-300" />
                <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">or register with</div>
              </div>
              <div class="form-group mb-0">
                <div class="row no-gutters">
                  <div class="col-sm-6 pr-sm-1"><a class="btn btn-outline-google-plus btn-sm btn-block mt-2" href="#"><span class="fab fa-google-plus-g mr-2" data-fa-transform="grow-8"></span> google</a></div>
                  <div class="col-sm-6 pl-sm-1"><a class="btn btn-outline-facebook btn-sm btn-block mt-2" href="#"><span class="fab fa-facebook-square mr-2" data-fa-transform="grow-8"></span> facebook</a></div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <div class=" px-0 py-8 bg-light shadow-sm">

        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-span h-100">
                <div class="card-body ">
                  <h4 class="mb-2">Échange instantané entre</h4>
                  <div class="row justify-content-center align-items-center">
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://perfectmoney.is/?ref=936528" title="Perfect Money"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/pm.png')}}" alt="Perfect Money"></a></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://payeer.com/?partner=992294" title="Payeer"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/payeer.png')}}" alt="Payeer"></a> </div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://bitcoin.org" title="Bitcoin"><img class="ex-icon" height="35" src="{{ asset('assets/img/exchange/bitcoin.png')}} " alt="Bitcoin"></a> </div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://www.ethereum.org/" title="Ether"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/ethereum.png')}}" alt="Ethereum"></a> </div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://www.bitcoincash.org" title="Bitcoin Cash"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/bitcoincash.png')}}" alt="Bitcoin Cash"></a> </div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="http://dogecoin.com" title="Dogecoin"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/dogecoin.png')}}" alt="Dogecoin"></a> </div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://www.dashpay.io" title="Dash"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/dash.png')}}" alt="Dash"></a></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://z.cash/" title="Zcash"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/zcash.png')}}" alt="Zcash"></a></div>

                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://litecoin.org" title="Litecoin"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/litecoin.png')}}" alt="Litecoin"></a></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://ethereumclassic.github.io" title="Ether Classic"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/ethereumclassic.png')}}" alt="Ethereum Classic"></a></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://augur.net" title="Augur"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/augur.png')}}" alt="Augur"></a></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://golem.network" title="Golem"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/golem.png')}}" alt="Golem"></a></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="https://lisk.io/" title="Lisk"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/lisk.png')}}" alt="Lisk"></a></div>
                    <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><a target="_blank" rel="nofollow" href="http://www.peercoin.net" title="Peercoin"><img class="ex-icon" height="35" src="{{asset('assets/img/exchange/peercoin.png')}}" alt="Peercoin"></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </div>
      <!-- <section> close ============================-->
      <!-- ============================================-->








      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <div class="bg-light px-0 py-0 text-center">

        <div class="container">
          <div class="row">
            <div class="col">
              <h1 class="fs-2 fs-sm-4 fs-md-5">Here's what's in it for you</h1>
              <p class="lead">Things you will get right out of the box with Falcon.</p>
            </div>
          </div>
          <div class="row mt-6">
            <div class="col-lg-4">
              <div class="card card-span h-100">
                <div class="card-span-img"><span class="fab fa-sass fs-4 text-info"></span></div>
                <div class="card-body pt-6 pb-4">
                  <h5 class="mb-2">Bootstrap 4.3.1</h5>
                  <p>Build your webapp with the world's most popular front-end component library along with Falcon's 32 sets of carefully designed elements.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-6 mt-lg-0">
              <div class="card card-span h-100">
                <div class="card-span-img"><span class="fab fa-node-js fs-5 text-success"></span></div>
                <div class="card-body pt-6 pb-4">
                  <h5 class="mb-2">SCSS & Javascript files</h5>
                  <p>With your purchased copy of Falcon, you will get all the uncompressed & documented SCSS and Javascript source code files.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-6 mt-lg-0">
              <div class="card card-span h-100">
                <div class="card-span-img"><span class="fab fa-gulp fs-6 text-danger"></span></div>
                <div class="card-body pt-6 pb-4">
                  <h5 class="mb-2">Gulp based workflow</h5>
                  <p>All the painful or time-consuming tasks in your development workflow such as compiling the SCSS or transpiring the JS are automated.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </div>
      <!-- <section> close ============================-->
      <!-- ============================================-->










      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0 bg-dark">
        <div>
          <hr class="my-0 border-600 opacity-25" />
          <div class="container py-3">

            <div class="row justify-content-between fs--1">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600 opacity-85">
                  All rights reserved.
                  <span class="d-none d-sm-inline-block">| </span>
                  <br class="d-sm-none" /> 2018 &copy; 
                  <a class="text-white opacity-85" href="https://sauverexchange.com .com">sauverexchange.com </a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    @include('partials.scripts')
    @include('js.register')
    @include('js.login')

  </body>

</html>