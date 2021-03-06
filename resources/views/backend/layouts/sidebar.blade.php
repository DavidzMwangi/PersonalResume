{{--<div class="sidebar-header">--}}
    {{--<a class="sidebar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>--}}
    {{--<button type="button" class="sidebar-toggle">--}}
        {{--<i class="fa fa-times"></i>--}}
    {{--</button>--}}
{{--</div>--}}
<div class="sidebar-menu">
    <ul class="sidebar-nav">
        <li class="active">
            <a href="{{route('admin.home')}}">
                <div class="icon">
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                </div>
                <div class="title">Dashboard</div>
            </a>
        </li>
        <li class="">
            <a href="{{route('admin.about_me')}}">
                <div class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="title">About Me</div>
            </a>
        </li>
        {{--<li class="">--}}
            {{--<a href="{{route('admin.technical_skills')}}">--}}
                {{--<div class="icon">--}}
                    {{--<i class="fa fa-comment" aria-hidden="true"></i>--}}
                {{--</div>--}}
                {{--<div class="title">Technical Skills</div>--}}
            {{--</a>--}}
        {{--</li>--}}


        {{--<li class="">--}}
            {{--<a href="{{route('admin.professional_skills')}}">--}}
                {{--<div class="icon">--}}
                    {{--<i class="fa fa-comment" aria-hidden="true"></i>--}}
                {{--</div>--}}
                {{--<div class="title">Professional Skills</div>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="">
            <a href="{{route('admin.interest')}}">
                <div class="icon">
                    <i class="fa fa-comment" aria-hidden="true"></i>
                </div>
                <div class="title">Interest</div>
            </a>
        </li>
        <li class="dropdown ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="icon">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                </div>
                <div class="title">Skills</div>
            </a>
            <div class="dropdown-menu">
                <ul>
                    <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i>Skills</li>
                    <li><a href="{{route('admin.technical_skills')}}">Technical Skills</a></li>
                    <li><a href="{{route('admin.professional_skills')}}">Professional Skills</a></li>
                    {{--<li><a href="./uikits/card.html">Card</a></li>--}}
                    {{--<li><a href="./uikits/form.html">Form</a></li>--}}
                    {{--<li><a href="./uikits/table.html">Table</a></li>--}}
                    {{--<li><a href="./uikits/icons.html">Icons</a></li>--}}
                    {{--<li class="line"></li>--}}
                    {{--<li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Advanced Components</li>--}}
                    {{--<li><a href="./uikits/pricing-table.html">Pricing Table</a></li>--}}
                    {{--<li><a href="./uikits/chart.html">Chart</a></li>--}}
                </ul>
            </div>
        </li>


        <li class="">
            <a href="{{route('admin.experience')}}">
                <div class="icon">
                    <i class="fa fa-comment" aria-hidden="true"></i>
                </div>
                <div class="title">Experience</div>
            </a>
        </li>
     <li class="">
            <a href="{{route('admin.projects')}}">
                <div class="icon">
                    <i class="fa fa-comment" aria-hidden="true"></i>
                </div>
                <div class="title">Projects</div>
            </a>
        </li>


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="icon">
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                </div>
                <div class="title">Pages</div>
            </a>
            <div class="dropdown-menu">
                <ul>
                    <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Admin</li>
                    <li><a href="./pages/form.html">Form</a></li>
                    <li><a href="./pages/profile.html">Profile</a></li>
                    <li><a href="./pages/search.html">Search</a></li>
                    <li class="line"></li>
                    <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Landing</li>
                    <!-- <li><a href="./pages/landing.html">Landing</a></li> -->
                    <li><a href="./pages/login.html">Login</a></li>
                    <li><a href="./pages/register.html">Register</a></li>
                    <!-- <li><a href="./pages/404.html">404</a></li> -->
                </ul>
            </div>
        </li>
    </ul>
</div>
{{--<div class="sidebar-footer">--}}
    {{--<ul class="menu">--}}
        {{--<li>--}}
            {{--<a href="/" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--<i class="fa fa-cogs" aria-hidden="true"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>--}}
    {{--</ul>--}}
{{--</div>--}}
