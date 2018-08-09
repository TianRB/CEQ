<div class="sidebar" data-color="blue">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->



    <div class="sidebar-wrapper">

        <div class="user">
            <div class="photo">
              <img src="{{ url('img/logo-omar-alejo.png') }}" alt="">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{ Auth::user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        {{-- <li>
                            <a href="#">
                                <span class="sidebar-mini-icon">MP</span>
                                <span class="sidebar-normal">Mi Perfil</span>
                            </a>
                        </li> --}}
                        <li>
                          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <span class="sidebar-mini-icon"><i class="fa fa-times"></i></span>
                              <span class="sidebar-normal">Cerrar sesion</span>
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav">
              <li class="">
                    <a href="{{ route('home') }}">

                        <i class="fa fa-tachometer-alt"></i>

                      <p>Dashboard</p>
                    </a>
              </li>
              <li class="">
                    <a href="{{ url('/') }}">

                        <i class="fa fa-globe"></i>

                      <p>Ir a Sitio</p>
                    </a>
              </li>

              <li>
                    <a data-toggle="collapse" href="#articles">

                        <i class="fa fa-newspaper"></i>

                        <p>
                          Contenido <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse " id="articles">
                        <ul class="nav">
                          <li>
                            <a href="{{ url('articles/') }}">
                                <span class="sidebar-mini-icon">A</span>
                                <span class="sidebar-normal"> Artículos </span>
                            </a>
                          </li>
                          <li>
                            <a href="{{ url('categories/') }}">
                                <span class="sidebar-mini-icon">C</span>
                                <span class="sidebar-normal"> Categorías</span>
                            </a>
                          </li>
                          <li>
                            <a href="{{ url('cards/') }}">
                                <span class="sidebar-mini-icon">T</span>
                                <span class="sidebar-normal"> Tarjetas</span>
                            </a>
                          </li>
                      </ul>
                  </div>
              </li>

        </ul>
    </div>
</div>
