<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="{{route('website_home')}}"
            style="color: #ffcb06;" 
            >
                <div class="sidebar-brand-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dashboard</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item {{  request()->is('home')  ? 'active' : ''   }}">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu</span></a>
            </li>
            @role('Super Admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Role Management</span>
                    </a>
                    <div id="collapseUtilities" class="collapse 
                    {{  request()->is('roles') || request()->is('roles/*')  
                        || request()->is('permissions')  ? 'show' : '' }}" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item" style="background-color:{{  request()->is('roles') || request()->is('roles/*')  ? '#ffcb06' : '' }} "  href="{{   route('roles.index')   }}">Roles</a>
                            <a class="collapse-item" style="background-color:{{  request()->is('permissions')  ? '#ffcb06' : '' }} "
                            href="{{   route('permissions.index')   }}">Permissions</a>
                            
                        </div>
                    </div>
                </li>
            @endif

            @can('user-list')
                <hr class="sidebar-divider">

                <li class="nav-item {{  request()->is('users') || request()->is('users/*') ? 'active' : ''   }}">
                    <a class="nav-link" href="{{   route('users.index')   }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Memberships</span></a>
                </li>
            @endcan


            @can('complaint-list')
                <hr class="sidebar-divider">

                <li class="nav-item {{  request()->is('complaint_section') || request()->is('complaint_section/*') ? 'active' : ''   }}">
                    <a class="nav-link" href="{{    route('complaint_section.index')    }}">
                        <i class="fas fa-fw fa-exclamation-triangle"></i>
                        <span>Complaints</span></a>
                </li>
            @endcan


            @can('complaint-list')
                <hr class="sidebar-divider">
                <li class="nav-item {{  request()->is('hateform_section') || request()->is('hateform_section/*') ? 'active' : ''   }}">
                    <a class="nav-link" href="{{    route('hateform_section.index')    }}">
                        <i class="fas fa-fw fa-exclamation-circle"></i>
                        <span>Hate Forms</span></a>
                </li>
            @endcan


            @can('news-list')
                <hr class="sidebar-divider">

                <li class="nav-item {{  request()->is('news') || request()->is('news/*') ? 'active' : ''   }}">
                    <a class="nav-link" href="{{    route('news.index')    }}">
                        <i class="fas fa-fw fa-file"></i>
                        <span>News Section</span></a>
                </li>
            @endcan           

            <!-- @can('news-list') -->
                <hr class="sidebar-divider">

                <li class="nav-item {{  request()->is('blogs') || request()->is('blogs/*') ? 'active' : ''   }}">
                    <a class="nav-link" href="{{    route('blogs.index')    }}">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Blog Section</span></a>
                </li>


                <hr class="sidebar-divider">

                <li class="nav-item {{  request()->is('knowledge') || request()->is('knowledge/*') ? 'active' : ''   }}">
                    <a class="nav-link" href="{{    route('knowledge.index')    }}">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Blog Section</span></a>
                </li>
                   
            <!-- @endcan            -->
             

            @can('polls-list')
                <hr class="sidebar-divider">

                <li class="nav-item {{  request()->is('polls') || request()->is('polls/*') ? 'active' : ''   }}">
                    <a class="nav-link" href="{{    route('polls.index')    }}">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Polls Section</span></a>
                </li>
            @endcan        

            @role('Donor-dashboard')    
                <li class="nav-item {{  request()->is('donor_section/certificate_80g')  ? 'active' : ''   }}">
                    <a class="nav-link" href="{{    route('certificate_80g')    }}">
                        <i class="fas fa-fw fa-file"></i>
                        <span>80G certificate</span></a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item {{  request()->is('donor_section/donations') ? 'active' : ''   }}">
                    <a class="nav-link" href="{{    route('donations')    }}">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Donations</span></a>
                </li>

                <hr class="sidebar-divider">
                <li class="nav-item {{  request()->is('donor_section/profile')  ? 'active' : ''   }}">
                    <a class="nav-link" href="{{    route('profile')    }}">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Donor Profile</span></a>
                </li>

                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Reviews</span></a>
                </li>
                
            @endif

            @can('campaign-list')
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_Campaign"
                        aria-expanded="true" aria-controls="collapse_Campaign">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Campaign Section</span>
                    </a>
                    <div id="collapse_Campaign" class="collapse 
                    {{  request()->is('campaign') || request()->is('campaign_section/*')  
                        || request()->is('campaign/*')  ? 'show' : '' }}" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" style="background-color:{{  request()->is('campaign') || request()->is('campaign/*')  ? '#ffcb06' : '' }} "  href="{{   route('campaign.index')   }}">Campaign</a>
                            @can('campaign-create')
                                <a class="collapse-item" style="background-color:{{  request()->is('campaign_section/Categories')  ? '#ffcb06' : '' }} "
                                href="{{   route('campaign.necessary', 'Categories')   }}">Categories</a>
                                <a class="collapse-item" style="background-color:{{  request()->is('campaign_section/Tags')  ? '#ffcb06' : '' }} "
                                href="{{   route('campaign.necessary', 'Tags')   }}">Tags</a>
                                <a class="collapse-item" style="background-color:{{  request()->is('campaign_section/Keywords')  ? '#ffcb06' : '' }} "
                                href="{{   route('campaign.necessary', 'Keywords')   }}">Keywords</a>
                            @endcan
                        </div>
                    </div>
                </li>
            @endcan            

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>