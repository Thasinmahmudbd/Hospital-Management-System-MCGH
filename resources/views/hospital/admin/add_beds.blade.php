@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type',"Bed Registration")






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/admin/home/')}}" class="link">
        <i class="link_icons fas fa-th"></i>
        <span class="link_name"> Dashboard </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/admin/log/')}}" class="link">
        <i class="link_icons fas fa-clipboard-list"></i>
        <span class="link_name"> Logs </span>
    </a>
</li>

<li class="link_item">
    <a href="#" class="link" onclick="toggleSubLinkContainer()">
        <i class="link_icons fas fa-users"></i>
        <span class="link_name"> Employees </span>
    </a>
</li>

<li class="link_item">
    <a href="#" class="link" onclick="toggleSubLinkContainer2()">
        <i class="link_icons fas fa-procedures"></i>
        <span class="link_name"> Wards </span>
    </a>
</li>

<li class="link_item">
    <a href="#" class="link" onclick="toggleSubLinkContainer3()">
        <i class="link_icons fas fa-procedures"></i>
        <span class="link_name"> Cabins </span>
    </a>
</li>

<div class="sub_link_item disNone" id="subLinkContainer">

    <li class="link_item">
        <a href="{{url('/admin/doctor/list')}}" class="link2">
            <i class="link_icons fas fa-user-md"></i>
            <span class="link_name"> Doctors </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/accountant/list')}}" class="link2">
            <i class="link_icons fas fa-user-tie"></i>
            <span class="link_name"> Accountants </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/receptionist/list')}}" class="link2">
            <i class="link_icons fas fa-user"></i>
            <span class="link_name"> Receptionists </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/nurse/list')}}" class="link2">
            <i class="link_icons fas fa-user-nurse"></i>
            <span class="link_name"> Nurses </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/ot/list')}}" class="link2">
            <i class="link_icons fas fa-user"></i>
            <span class="link_name"> OT Operators </span>
        </a>
    </li>

</div>

<div class="sub_link_item disNone" id="subLinkContainer2">

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Ward'.'/'.'Male')}}" class="link2">
            <i class="link_icons fas fa-male"></i>
            <span class="link_name"> Male </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Ward'.'/'.'Female')}}" class="link2">
            <i class="link_icons fas fa-female"></i>
            <span class="link_name"> Female </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Ward'.'/'.'Child')}}" class="link2">
            <i class="link_icons fas fa-child"></i>
            <span class="link_name"> Child </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Ward'.'/'.'Maternity')}}" class="link2">
            <i class="link_icons fas fa-baby"></i>
            <span class="link_name"> Maternity </span>
        </a>
    </li>

</div>

<div class="sub_link_item disNone" id="subLinkContainer3">

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Cabin'.'/'.'Normal')}}" class="link2">
            <i class="link_icons fas fa-bed"></i>
            <span class="link_name"> Normal </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Cabin'.'/'.'AC')}}" class="link2">
            <i class="link_icons fas fa-wind"></i>
            <span class="link_name"> AC </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Cabin'.'/'.'Double AC')}}" class="link2">
            <i class="link_icons fas fa-snowflake"></i>
            <span class="link_name"> Double AC </span>
        </a>
    </li>

</div>

<li class="link_item">
    <a href="#" class="link" onclick="toggleSubLinkContainer4()">
        <i class="link_icons fas fa-vials"></i>
        <span class="link_name"> Tests </span>
    </a>
</li>

<div class="sub_link_item disNone" id="subLinkContainer4">

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Pathology')}}" class="link2">
            <i class="link_icons fas fa-tint"></i>
            <span class="link_name"> Pathology </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Hormone')}}" class="link2">
            <i class="link_icons fas fa-dna"></i>
            <span class="link_name"> Hormone </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Ultrasonography')}}" class="link2">
            <i class="link_icons fas fa-wave-square"></i>
            <span class="link_name"> Ultrasonography </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'X-Ray')}}" class="link2">
            <i class="link_icons fas fa-x-ray"></i>
            <span class="link_name"> X-Ray </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Dental')}}" class="link2">
            <i class="link_icons fas fa-tooth"></i>
            <span class="link_name"> Dental </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Others')}}" class="link2">
            <i class="link_icons fas fa-vial"></i>
            <span class="link_name"> Others </span>
        </a>
    </li>

</div>

<li class="link_item">
    <a href="{{url('/admin/show/services')}}" class="link">
        <i class="link_icons fas fa-stethoscope"></i>
        <span class="link_name"> Other Services </span>
    </a>
</li>




@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/admin/home/')}}">Dashboard</a>
    <a class="mobile_link" href="{{url('/admin/log/')}}">Logs</a>
    <a class="mobile_link" href="{{url('/admin/doctor/list')}}">Doctors</a>
    <a class="mobile_link" href="{{url('/admin/accountant/list')}}">Accountants</a>
    <a class="mobile_link" href="{{url('/admin/receptionist/list')}}">Receptionists</a>
    <a class="mobile_link" href="{{url('/admin/nurse/list')}}">Nurses</a>
    <a class="mobile_link" href="{{url('/admin/ot/list')}}">OT Operators</a>
    <a class="mobile_link" href="{{url('/admin/show/services')}}">Other Services</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')


                <!--admit patients-->

                <form action="{{url('/admin/bed/add')}}" class="patient_info_form" method="post">
                @csrf

                    <span></span>

                    <div class="patient_form_element_three_is_to_one">

                        <div>

                            <p>Basic Info</p>

                            <span class="gap"></span>

                            <div class="content_container">

                                <div class="patient_form_element_one_is_to_one">

                                    <div class="patient_form_element_one_is_to_one_is_to_one">

                                        <div class="patient_form_element">

                                            <label for="floor" class="label">Floor No</label>
                                            <input type="number" class="input flexible textFix" name="floor" required min="1">

                                        </div>

                                        <div class="patient_form_element">

                                            <label for="room" class="label">Room No</label>
                                            <input type="number" class="input flexible textFix" name="room" required min="1">

                                        </div>

                                        <div class="patient_form_element">

                                            <label for="bed" class="label">Bed No</label>
                                            <input type="text" class="input flexible textFix" name="bed" value="" required placeholder="Room-Bed">

                                        </div>

                                    </div>

                                    <div class="patient_form_element_one_is_to_one">

                                        <div class="patient_form_element">

                                            <label for="type" class="label">Bed Type</label>
                                            <input type="text" class="input shade disable flexible textFix" name="type" value="{{session('type')}}" readonly>

                                        </div>

                                        <div class="patient_form_element">

                                            <label for="quality" class="label">Quality</label>
                                            <input type="text" class="input shade disable flexible textFix" name="quality" value="{{session('quality')}}" readonly>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div>

                            <p>Location</p>

                            <span class="gap"></span>

                            <div class="content_container">

                                <div class="patient_form_element">

                                    <label for="location" class="label">Location</label>
                                    <input type="text" class="input flexible textFix" name="location">

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="patient_form_element_one_is_to_one">

                        <div>

                            <p>Package</p>

                            <span class="gap"></span>

                            <div class="content_container patient_form_element_three_is_to_one">

                                <div class="patient_form_element">

                                    <label for="package" class="label">Name</label>
                                    <input type="text" class="input flexible textFix" name="package">

                                </div>

                                <div class="patient_form_element">

                                    <label for="range" class="label">Range</label>
                                    <input type="number" class="input flexible textFix" name="range" min="1">

                                </div>

                            </div>

                        </div>

                        <div>

                            <p>Pricing</p>

                            <span class="gap"></span>

                            <div class="content_container patient_form_element_one_is_to_one_is_to_one">

                                <div class="patient_form_element">

                                    <label for="normal_pricing" class="label">Normal</label>
                                    <input type="number" class="input flexible textFix" name="normal_pricing" min="1" required>

                                </div>   

                                <div class="patient_form_element">

                                    <label for="package_pricing" class="label">Package</label>
                                    <input type="number" class="input flexible textFix" name="package_pricing" min="1">

                                </div>

                                <div class="patient_form_element">

                                    <label for="admission" class="label">Admission</label>
                                    <input type="number" class="input flexible textFix" name="admission" min="1" required>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="patient_form_element">

                        <input type="submit" class="btn patient_form_btn form_btn" value="Add Bed" name="submit">

                    </div>

                </form>















@endsection

<!--------------------content end---------------------->