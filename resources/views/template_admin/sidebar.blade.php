   <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}">{{ $site_setting->site_name }}</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}"></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{request()->routeIs('home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Features</li>
            <li class="dropdown {{request()->routeIs('post.*') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-list-alt"></i> <span>Posts</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('post.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('post.create')}}">Create Post</a></li>
                <li class="{{request()->routeIs('post.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('post.index')}}">List Post</a></li>
                 @if(Auth::user()->admin)
                <li class="{{request()->routeIs('post.trashed') ? 'active' : '' }}"><a class="nav-link" href="{{ route('post.trashed')}}">Trashed Post</a></li>
                @endif
                </ul>
            </li>
             @if(Auth::user()->admin)
            <li class="dropdown {{request()->routeIs('category.*') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-folder-open"></i> <span>Category</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('category.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.create')}}">Create Category</a></li>
                <li class="{{request()->routeIs('category.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.index')}}">List Category</a></li>

                </ul>
            </li>
            <li class="dropdown {{request()->routeIs('tag.*') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-bookmark"></i> <span>Tags</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('tag.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tag.create')}}">Create Tag</a></li>
                <li class="{{request()->routeIs('tag.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tag.index')}}">List Tags</a></li>

                </ul>
            </li>
           
            <li class="dropdown {{request()->routeIs('user.*') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>Users</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('user.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.create')}}">Create User</a></li>
                <li class="{{request()->routeIs('user.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.index')}}">List Users</a></li>

                </ul>
            </li>
            <li class="dropdown {{request()->routeIs('file.*') ? 'active' : '' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file"></i> <span>File Manager</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('file.file_manager_file') ? 'active' : '' }}"><a class="nav-link" href="{{ route('file.file_manager_file')}}">File Manager</a></li>
                <li class="{{request()->routeIs('file.file_manager_images') ? 'active' : '' }}"><a class="nav-link" href="{{ route('file.file_manager_images')}}">Images Manager</a></li>
              </ul>
            </li>
            <li class="{{request()->routeIs('setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('setting')}}"><i class="fas fa-cog"></i> <span>Site Setting</span></a></li>
            @endif
            <li class="{{request()->routeIs('profile') ? 'active' : '' }}"><a class="nav-link" href="{{ route('profile')}}"><i class="fas fa-id-card"></i> <span>Manage Profile</span></a></li>
          


        </aside>
    </div>