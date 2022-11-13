<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo" style="
    width: 100%;
">
                    <a href="index.html"><img src="/admin-assets/images/logo/logo.png" alt="Logo" srcset="" style="
    width: 100%;
    height: auto;
"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="/" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub {{request()->routeIs(['publishers.show','publishers.show.*'])? 'active' : ''}} ">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Publishers</span>
                    </a>

                    <ul class="submenu " id="sumbenu_publ">
                        @if(request()->route('publisher'))
                            @foreach($menu_list_publisher as $item)
                                <li class="submenu-item ">
                                    <a style="{{ request()->route('publisher')->id == $item->id ? 'background: #435ebe; color: white!important' : ''}}"   href="{{route('publishers.show', $item )}}">{{$item->name}}</a>
                                </li>
                            @endforeach
                        @else
                            @foreach($menu_list_publisher as $item)
                                <li class="submenu-item  ">
                                    <a href="{{route('publishers.show', $item )}}">{{$item->name}}</a>
                                </li>
                            @endforeach
                        @endif

                        <li class="submenu-item text-success " id="new_publisher" style="color: #00ff56!important;font-weight: bold;">
                            <a href="component-tooltip.html" data-bs-toggle="modal" data-bs-target="#default" style="color: #0027fd!important;">
                                <div class="icon dripicons-plus"></div>
                                Add new (+)</a>

                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Contacts</span>
                    </a>
                </li>


            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

