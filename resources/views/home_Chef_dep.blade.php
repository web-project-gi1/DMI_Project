@extends('layouts.app')
@section('content')
<div class="container-fluid">
                <div class="row content">
                            <aside class="col-lg-2  " style="border-color:black; border-style: solid; border-width: 1px  "   >
                                
                                    <ul class="navbar-nav mr-auto">
                                            <li class="nav-item ">
                                                <a class="nav-link " href="#"  role="button" aria-haspopup="true" aria-expanded="false">
                                                Descriptif
                                                </a>
                                                
                                            </li>
                                            <div class="dropdown-divider"></div>
                                        <li class="nav-item ">
                                          <a class="nav-link " href="http://localhost:8000/AffectChefFil"  role="button"  aria-haspopup="true" aria-expanded="false">
                                            Affectation
                                          </a>
                                          
                                        </li>
                                        
                                        
                                    </ul>
                                    
                                
                            </aside>
                        <section class="col-lg-10">
                             @yield('content1')   
                        </section>
                    
                </div>
            </div>
@endsection