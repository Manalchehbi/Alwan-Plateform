 <!-- Left Sidebar Start -->
 <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">
                    <li>
                        <a href="{{ route('home') }}" class="waves-effect">
                            <i class="dripicons-home"></i><span class="badge badge-info badge-pill float-right"></span> <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('list/password')}}" class="waves-effect"><i class=" dripicons-store"></i><span>Passwords<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class=" dripicons-store"></i><span>Schools<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{route('all/school/list')}}">All School</a></li>
                            <li><a href="{{route('import/school')}}">Add School</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class=" dripicons-document"></i><span>Classes<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{route('all/classe/list')}}">All Classes</a></li>
                            <li><a href="{{route('add/classe/new')}}">Add Classe</a></li>
                     </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class=" dripicons-document"></i><span>workSheetCategories<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{route('all/workSheetCategory/list')}}">All workSheetCategories</a></li>
                            <li><a href="{{route('add/workSheetCategory/new')}}">Add workSheetCategory</a></li>
                     </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class=" dripicons-user-group"></i><span>students<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{ route('all/student/list') }}">All Students</a></li>
                            <li><a href="{{ route('import') }}">Add Student</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class=" dripicons-user"></i><span> Teachers<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span></a>
                        <ul class="submenu">
                            <li><a href="{{ route('all/speciality/list') }}">All Specialities</a></li>
                            <li><a href="{{ route('all/teacher/list') }}">All Teachers</a></li>
                            <li><a href="{{ route('import/teacher') }}">Add Teacher</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-wallet"></i><span> Stories <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{ route('all/story/list') }}">All Stories</a></li>
                            <li><a href="{{ route('add/story/new') }}">Add Story</a></li>
                            
                                
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-wallet"></i><span> Exercises <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{ route('all/exercise/list') }}">All Exercises</a></li>
                            <li><a href="{{ route('add/exercise/new') }}">Add Exercise</a></li> 
                          
                        </ul>
                    </li>
                        <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-box"></i><span> worksheets  <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ route('worksheets/All_worksheet') }}">All worksheets </a></li>
                                <li><a href="{{ route('worksheets/add_worksheet') }}" class="waves-effect"><i class=" "></i><span> Add worksheets </span></a></li>
                               
                                    
                                
                            </ul>                       
                        </li>
                        <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-media-next"></i><span>  Useful Ressources  <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ route('usefuls/All_useful_ressources') }}">All  Useful Ressources </a></li>
                                <li><a href="{{ route('usefuls/add_useful_ressources') }}" class="waves-effect"><i class=" "></i><span> Add Useful Ressources </span></a></li>
                            
    
                                
                            </ul> 
                       </li>
                   <li> <a href="javascript:void(0);" class="waves-effect"><i class=" dripicons-gear"></i><span> Settings </span></a></li>
                </ul>
            </div>
        </div>
        <!-- Sidebar -left -->
    </div>
</div>