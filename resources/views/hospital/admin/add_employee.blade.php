@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type',"Employee Registration")






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

                <form action="{{url('/admin/employee/add')}}" class="patient_info_form" method="post">
                @csrf

                    <p>Basic Info</p>

                    <div class="content_container">

                        <div class="patient_form_element_one_is_to_one">

                            <div class="patient_form_element_three_is_to_one">

                                <div class="patient_form_element">

                                    <label for="name" class="label">Name</label>
                                    <input type="text" class="input" name="name" required>

                                </div>

                                <div class="patient_form_element">

                                    <label for="pass" class="label">Password</label>
                                    <input type="password" class="input" name="password" value="" required>

                                </div>

                            </div>

                            <div class="patient_form_element_one_is_to_one">

                                <div class="patient_form_element">

                                    <label for="gender" class="label">Gender</label>
                                    <select name="gender" id="gender" class="input" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>

                                </div>

                                <div class="patient_form_element">

                                    <label for="employee" class="label">Employee Type</label>
                                    <select name="employee" id="employee" class="input" onchange="onChange(this.value);" required>
                                        <option value="">Null</option>    
                                        <option onclick="extraDocForm()" value="doctors">Doctor</option>
                                        <option onclick="normalForm()" value="nurses">Nurse</option>
                                        <option onclick="normalForm()" value="accounts">Accountant</option>
                                        <option onclick="normalForm()" value="receptionists">Receptionist</option>
                                        <option onclick="normalForm()" value="ot_operator">OT Operator</option>
                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>

                    <p class="disNone" id="docSectionHeader">Info related to Doctors</p>

                    <div class="content_container disNone" id="docSection">

                        <div class="patient_form_element_one_is_to_one">

                            <div class="patient_form_element_one_is_to_one">

                                <div class="patient_form_element" id="dropdownSpecialty">

                                    <label for="specialty" class="label">Specialty</label>
                                        
                                    <div class="patient_form_element_one_is_to_btn">

                                        <select name="specialty" id="specialty" class="input">
                                            @foreach($specialty as $list)
                                            <option value="{{$list->Specialty}}">{{$list->Specialty}}</option>    
                                            @endforeach
                                        </select>

                                        <a href="#" onclick="showSpecialtyInput()" class="btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></a>

                                    </div>

                                </div>

                                <div class="patient_form_element disNone" id="addNewSpecialty">

                                    <label for="specialty" class="label">Specialty</label>
                                        
                                    <div class="patient_form_element_one_is_to_btn">

                                        <input type="text" class="input" name="specialty">

                                        <a href="#" onclick="showSpecialtyDropdown()" class="btn form_btn"><i class="fas fa-caret-down log_out_btn text_center"></i></a>

                                    </div>

                                </div>

                                <div class="patient_form_element" id="dropdownDepartment">

                                    <label for="department" class="label">Department</label>
                                        
                                    <div class="patient_form_element_one_is_to_btn">

                                        <select name="department" id="department" class="input">
                                            @foreach($department as $list)
                                            <option value="{{$list->Department}}">{{$list->Department}}</option>    
                                            @endforeach
                                        </select>

                                        <a href="#" onclick="showDepartmentInput()" class="btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></a>

                                    </div>

                                </div>

                                <div class="patient_form_element disNone" id="addNewDepartment">

                                    <label for="department" class="label">Department</label>
                                        
                                    <div class="patient_form_element_one_is_to_btn">

                                        <input type="text" class="input" name="department">

                                        <a href="#" onclick="showDepartmentDropdown()" class="btn form_btn"><i class="fas fa-caret-down log_out_btn text_center"></i></a>

                                    </div>

                                </div>

                            </div>

                            <div class="patient_form_element_one_is_to_one">

                                <div class="patient_form_element">

                                    <label for="basic_fee" class="label">Basic Fee</label>
                                    <input type="text" class="input" name="basic_fee">

                                </div>

                                <div class="patient_form_element">

                                    <label for="discount" class="label">Second Visit</label>
                                    <input type="text" class="input" name="discount">

                                </div>

                            </div>

                        </div>

                    </div>

                    

                    <div class="patient_form_element">

                        <input type="submit" class="btn patient_form_btn form_btn"  value="Enlist Employee" name="submit">

                    </div>

                </form>















@endsection

<!--------------------content end---------------------->