@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type',"Doctor's List")






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
    <a href="{{url('/admin/doctor/list')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> Doctors </span>
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