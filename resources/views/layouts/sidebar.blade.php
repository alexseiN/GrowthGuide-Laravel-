<div class="sidebar col-lg-3 col-3 col-md-3">
        <div style="text-align:center">
            <!-- <img src="/logo/PSB-logo.png" width=110px height=110px> -->
        </div>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>Categories&Services</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="pcollapse">

                        <a class="collapse-item" href="/admin">Add</a>
                        <hr>
                        <a class="collapse-item" href="/categories&services">Edit </a>
                    </div>
                </div>
            </li>
            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree"
                    aria-expanded="true" aria-controls="collapsethree">
                    <i class="fas fa-user"></i>
                    <span>Create Forms</span>
                </a>
                <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="pcollapse">

                        <a class="collapse-item" href="{{ route('app.home', 1) }}">Create Services Form</a>
                        <hr>
                        <a class="collapse-item" href="{{ route('app.serviceinfo', 1) }}">Create Service Info </a>
                        <hr>
                        <a class="collapse-item" href="{{ route('app.dashboardform', 1) }}">Create Dashboard Form</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour"
                    aria-expanded="true" aria-controls="collapsefour">
                    <i class="fas fa-user"></i>
                    <span>Forms Responses</span>
                </a>
                <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="pcollapse">
                        <a class="collapse-item" href="{{ route('forms.customers') }}">All Forms Response</a>
                    </div>
                </div>
            </li>
        </ul>

    </div>
