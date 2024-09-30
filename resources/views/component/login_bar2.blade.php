<div class="navbar ">
        <div class="navbar-brand">

            <a class="navbar-item" href="{{ route('officer.show',['mode_id' => "1"]) }}" style="text-decoration:none">
                <div class=" tags  ">
                    <span class="tag is-light is-rounded"><b>ไม่ได้รับ</b></span>
                    <span id="i-receive" class="tag is-danger is-rounded"><b>0</b></span>
                </div>
            </a>

            <a class="navbar-item" href="{{ route('officer.show',['mode_id' => "2"]) }}" style="text-decoration:none">
                <div class=" tags ">
                    <span class="tag is-light is-rounded"><b>ไม่บันทึก</b></span>
                    <span id="i-additional" class="tag is-warning is-rounded"><b>0</b></span>
                </div>
            </a>
            <a class="navbar-item" href="{{ route('officer.show',['mode_id' => "3"]) }}" style="text-decoration:none">
                <div class=" tags ">
                    <span class="tag is-light is-rounded"><b>ไม่ดำเนินการ</b></span>
                    <span id="i-process" class="tag is-rounded is-primary"><b>0</b></span>
                </div>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                data-target="navMenuDocumentation">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        
        <div id="navMenuDocumentation" class="navbar-menu">
            <div class="navbar-end has-dropdown">

                <nav class="navbar" role="navigation" aria-label="dropdown navigation">

                    <a class="navbar-item">
                    @if( Auth::user()->position == "manager" or Auth::user()->position == "admin" )
                        <i class="fas fa-user-lock"></i>
                    @else
                        <i class="fas fa-user-circle"></i>
                    @endif
                        &nbsp{{ Auth::user()->name }}
                    </a>

                   
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <i class="fa fa-th"></i>
                        </a>

                        <div class="navbar-dropdown is-right is-boxed ">
                            <a class="navbar-item has-text-danger" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i>&nbsp;
                                ลงทะเบียนเจ้าหน้าที่เพิ่มเติม
                            </a>
                            <hr class="navbar-divider">
                            @if( Auth::user()->position == "admin" )
                            <a class="navbar-item  has-text-link" href="{{ route('officer.m_officer') }}">
                                <i class="fa fa-users"></i>&nbsp;
                                จัดการรายชื่อเจ้าหน้าที่ </a>

                            @else
                            
                            <a class="navbar-item  has-text-link" href="{{ route('officer.view_officer') }}">
                                <i class="fa fa-users"></i>&nbsp;
                                รายชื่อเจ้าหน้าที่ </a>

                            @endif
                        </div>
                    </div>

                   


                    <div class="navbar-item">
                        <a class="button  is-danger has-text-white is-small is-rounded" href="{{ route('officer.logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span><b><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Logout</b></span>
                        </a>
                        <form id="logout-form" action="{{ route('officer.logout') }}" method="POST"
                            style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </nav>


            </div>
        </div>
    </div>
    <input type="hidden" id="p_id" value="{{ Auth::user()->prov_id }}">
    <input type="hidden" id="user_name" value="{{ Auth::user()->name }}">
    <input type="hidden" id="user_username" value="{{ Auth::user()->username }}">
    <input type="hidden" id="p_position" value="{{ Auth::user()->position }}">
    <input type="hidden" id="p_area" value="{{ Auth::user()->area_id }}">