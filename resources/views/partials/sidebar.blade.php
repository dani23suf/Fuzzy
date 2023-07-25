<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                    <div class="user-menu d-flex align-self-center">
                        <div class="user-img d-flex align-items-center me-4">
                            <div class="avatar avatar-xl">
                                <img style="height: 60px" src="{{asset('dist/assets/images/faces/1.jpg')}}">
                            </div>
                        </div>
                        <div class="user-name mt-2">
                            <h6 class="mb-0 text-gray-600 name">{{Auth::user()->name}}</h6>
                            <p class="mb-0 text-sm text-gray-600 role">{{Auth::user()->roles->name}}</p>
                        </div>
                    </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                @auth
                        <li class="sidebar-item  ">
                            <a href="{{route('dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @can('isAdmin')

                        <li class="sidebar-item  ">
                            <a href="{{route('list-rules')}}" class='sidebar-link'>
                                <i class="bi bi-file-ruled"></i>
                                <span>Rules</span>
                            </a>
                        </li>
                        @endcan
                        <li class="sidebar-item  ">
                            <a href="{{route('list-balita')}}" class='sidebar-link'>
                                <i class="bi bi-arrow-through-heart"></i>
                                <span>Balita</span>
                            </a>
                        </li>
                    
                        <li class="sidebar-title">Perhitungan</li>
                        <li class="sidebar-item  ">
                            <a href="{{route('perhitungan')}}" class='sidebar-link'>
                                <i class="bi bi-capslock-fill"></i>
                                <span>Cek Status Gizi</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{route('list-hasil')}}" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Hasil</span>
                            </a>
                        </li>
                        
                       
                        <li class="sidebar-title">Pengaturan</li>
                        @can('isAdmin')

                        <li class="sidebar-item  ">
                            <a href="{{route('list.user')}}" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span>User</span>
                            </a>
                        </li>
                        @endcan
                        <li class="sidebar-item  ">
                            {{-- <a href="{{ route('logout') }}" id="logout-button" class='sidebar-link'>
                                <i class="fa-fw select-all fas"></i>
                                <span> {{ __('Logout') }}</span>
                            </a> --}}
                             <form action="/logout" method="post">
                                        @csrf
                                       <button type="submit" class="btn"><i class="fa-fw select-all fas"></i> Logout</button>
                                </form>
                            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form> --}}
                             
                        </li>
                @endauth


            </ul>
        </div>
    </div>
</div>