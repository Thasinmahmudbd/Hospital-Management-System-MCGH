@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Dashboard')








<!--------------------charts----------------------->

@section('charts')


@endsection

<!-------------------charts end-------------------->











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


                <!--Session message-->

                @if(session('msg')=='Profile updated successfully.')

                    <div class="content_container_bg_less_thin text_center success_msg">{{session('msg')}}</div> 

                @endif


                <div class="content_container_bg_less_thin patient_form_element_one_is_to_one">
                    
                <b>Welcome Mr.{{Session::get('ADMIN_NAME')}}! Wish you all the best.</b>
                <b class="text_right">Date: {{Session::get('DATE_TODAY')}}. Today is {{Session::get('DAY_TODAY')}}day.</b>
            
                </div>


                <div class="purple_line"></div>
                <div class="gap"></div>


                <div class="dashboard_grid">
                
                    <div class="content_container_thin disBlock">

                        <div class="content_container_bg_less_thin text_center"><b>Employees</b></div>

                        <div class="purple_line"></div>
                        <div class="gap"></div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Doctors: <b class="greenTxt">{{Session::get('doctor_active')}}</b> <b class="redTxt">{{Session::get('doctor_inactive')}}</b></p>
                            <a href="{{url('/admin/doctor/list')}}" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></a>
                            <a href="{{url('/admin/doctor/add')}}" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></a>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Accountants: <b class="greenTxt">{{Session::get('accounts_active')}}</b> <b class="redTxt">{{Session::get('accounts_inactive')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Nurses: <b class="greenTxt">{{Session::get('nurse_active')}}</b> <b class="redTxt">{{Session::get('nurse_inactive')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">OT Operators: <b class="greenTxt">{{Session::get('ot_active')}}</b> <b class="redTxt">{{Session::get('ot_inactive')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                    </div>

                    <div class="content_container_thin disBlock">

                        <div class="content_container_bg_less_thin text_center"><b>Wards</b></div>

                        <div class="purple_line"></div>
                        <div class="gap"></div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Male: <b class="greenTxt">{{Session::get('male_ward')}}</b> <b class="yellowTxt">{{Session::get('occ_male_ward')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Female: <b class="greenTxt">{{Session::get('female_ward')}}</b> <b class="yellowTxt">{{Session::get('occ_female_ward')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Child: <b class="greenTxt">{{Session::get('child_ward')}}</b> <b class="yellowTxt">{{Session::get('occ_child_ward')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Maternity: <b class="greenTxt">{{Session::get('maternity_ward')}}</b> <b class="yellowTxt">{{Session::get('occ_maternity_ward')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                    </div>

                    <div class="content_container_thin disBlock">

                        <div class="content_container_bg_less_thin text_center"><b>Cabins</b></div>

                        <div class="purple_line"></div>
                        <div class="gap"></div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Normal: <b class="greenTxt">{{Session::get('normal_cabin')}}</b> <b class="yellowTxt">{{Session::get('occ_normal_cabin')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">AC: <b class="greenTxt">{{Session::get('ac_cabin')}}</b> <b class="yellowTxt">{{Session::get('occ_ac_cabin')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Double AC: <b class="greenTxt">{{Session::get('double_ac_cabin')}}</b> <b class="yellowTxt">{{Session::get('occ_double_ac_cabin')}}</b></p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                    </div>

                </div>




                <div class="purple_line"></div>
                <div class="gap"></div>



                <div class="patient_form_element_one_is_to_three" id="creditGHeader">

                    <b class="content_container_thin text_center">Credit Graph</b>

                    <div class="patient_form_element_three_is_to_one">

                        <b class="content_container_bg_less_thin text_center">Total this year: {{Session::get('credit_yearly')}} Tk</b>

                        <div class="patient_form_element_one_is_to_one_is_to_one">
                            <a class="content_container_white_thin btn form_btn title_bar_purple" href="#" onclick="creditGraph()">Credit</a>
                            <a class="content_container_white_thin btn form_btn title_bar_purple" href="#" onclick="debitGraph()">Debit</a>
                            <a class="content_container_white_thin btn form_btn title_bar_purple" href="#" onclick="incomeGraph()">Income</a>
                        </div>

                    </div>

                </div>

                <div class="graph" id="creditG">

                    <div class="popMsgContainer">
                        <p class="graph_bar_title"><abbr title="Credit amount: {{Session::get('credit_jan')}} tk, Percentage: ({{Session::get('credit_jan_per')}})%">Jan </abbr></p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_jan_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_jan_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">January <br> Credit amount: {{Session::get('credit_jan')}} tk <br> Percentage: ({{Session::get('credit_jan_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Feb</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_feb_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_feb_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">February <br> Credit amount: {{Session::get('credit_feb')}} tk <br> Percentage: ({{Session::get('credit_feb_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Mar</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_mar_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_mar_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">March <br> Credit amount: {{Session::get('credit_mar')}} tk <br> Percentage: ({{Session::get('credit_mar_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Apr</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_apr_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_apr_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">April <br> Credit amount: {{Session::get('credit_apr')}} tk <br> Percentage: ({{Session::get('credit_apr_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">May</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_may_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_may_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">May <br> Credit amount: {{Session::get('credit_may')}} tk <br> Percentage: ({{Session::get('credit_may_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Jun</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_jun_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_jun_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">June <br> Credit amount: {{Session::get('credit_jun')}} tk <br> Percentage: ({{Session::get('credit_jun_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Jul</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_jul_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_jul_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">July <br> Credit amount: {{Session::get('credit_jul')}} tk <br> Percentage: ({{Session::get('credit_jul_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Aug</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_aug_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_aug_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">August <br> Credit amount: {{Session::get('credit_aug')}} tk <br> Percentage: ({{Session::get('credit_aug_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Sep</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_sep_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_sep_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">September <br> Credit amount: {{Session::get('credit_sep')}} tk <br> Percentage: ({{Session::get('credit_sep_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Oct</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_oct_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_oct_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">October <br> Credit amount: {{Session::get('credit_oct')}} tk <br> Percentage: ({{Session::get('credit_oct_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Nov</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_nov_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_nov_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">November <br> Credit amount: {{Session::get('credit_nov')}} tk <br> Percentage: ({{Session::get('credit_nov_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Dec</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('credit_dec_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('credit_dec_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">December <br> Credit amount: {{Session::get('credit_dec')}} tk <br> Percentage: ({{Session::get('credit_dec_per')}})%</span>
                    </div>
                </div>














                <div class="patient_form_element_one_is_to_three disNone" id="debitGHeader">

                    <b class="content_container_thin text_center">Debit Graph</b>

                    <div class="patient_form_element_three_is_to_one">

                        <b class="content_container_bg_less_thin text_center">Total this year: {{Session::get('debit_yearly')}} Tk</b>

                        <div class="patient_form_element_one_is_to_one_is_to_one">
                            <a class="content_container_white_thin btn form_btn title_bar_purple" href="#" onclick="creditGraph()">Credit</a>
                            <a class="content_container_white_thin btn form_btn title_bar_purple" href="#" onclick="debitGraph()">Debit</a>
                            <a class="content_container_white_thin btn form_btn title_bar_purple" href="#" onclick="incomeGraph()">Income</a>
                        </div>

                    </div>

                </div>
                
                <div class="graph disNone" id="debitG">

                    <div class="popMsgContainer">
                        <p class="graph_bar_title"><abbr title="Debit amount: {{Session::get('debit_jan')}} tk, Percentage: ({{Session::get('debit_jan_per')}})%">Jan </abbr></p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_jan_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_jan_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">January <br> Debit amount: {{Session::get('debit_jan')}} tk <br> Percentage: ({{Session::get('debit_jan_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Feb</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_feb_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_feb_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">February <br> Debit amount: {{Session::get('debit_feb')}} tk <br> Percentage: ({{Session::get('debit_feb_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Mar</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_mar_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_mar_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">March <br> Debit amount: {{Session::get('debit_mar')}} tk <br> Percentage: ({{Session::get('debit_mar_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Apr</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_apr_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_apr_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">April <br> Debit amount: {{Session::get('debit_apr')}} tk <br> Percentage: ({{Session::get('debit_apr_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">May</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_may_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_may_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">May <br> Debit amount: {{Session::get('debit_may')}} tk <br> Percentage: ({{Session::get('debit_may_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Jun</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_jun_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_jun_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">June <br> Debit amount: {{Session::get('debit_jun')}} tk <br> Percentage: ({{Session::get('debit_jun_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Jul</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_jul_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_jul_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">July <br> Debit amount: {{Session::get('debit_jul')}} tk <br> Percentage: ({{Session::get('debit_jul_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Aug</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_aug_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_aug_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">August <br> Debit amount: {{Session::get('debit_aug')}} tk <br> Percentage: ({{Session::get('debit_aug_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Sep</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_sep_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_sep_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">September <br> Debit amount: {{Session::get('debit_sep')}} tk <br> Percentage: ({{Session::get('debit_sep_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Oct</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_oct_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_oct_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">October <br> Debit amount: {{Session::get('debit_oct')}} tk <br> Percentage: ({{Session::get('debit_oct_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Nov</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_nov_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_nov_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">November <br> Debit amount: {{Session::get('debit_nov')}} tk <br> Percentage: ({{Session::get('debit_nov_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Dec</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('debit_dec_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('debit_dec_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">December <br> Debit amount: {{Session::get('debit_dec')}} tk <br> Percentage: ({{Session::get('debit_dec_per')}})%</span>
                    </div>
                </div>



                













                <div class="patient_form_element_one_is_to_three disNone" id="incomeGHeader">

                    <b class="content_container_thin text_center">Income Graph</b>

                    <div class="patient_form_element_three_is_to_one">

                        <b class="content_container_bg_less_thin text_center">Total this year: {{Session::get('total_income_yearly')}} Tk</b>

                        <div class="patient_form_element_one_is_to_one_is_to_one">
                            <a class="content_container_white_thin btn form_btn title_bar_purple" href="#" onclick="creditGraph()">Credit</a>
                            <a class="content_container_white_thin btn form_btn title_bar_purple" href="#" onclick="debitGraph()">Debit</a>
                            <a class="content_container_white_thin btn form_btn title_bar_purple" href="#" onclick="incomeGraph()">Income</a>
                        </div>

                    </div>

                </div>

                <div class="graph disNone" id="incomeG">

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Jan</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_jan_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_jan_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">January <br> Total income: {{Session::get('total_income_jan')}} tk <br> Percentage: ({{Session::get('total_income_jan_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Feb</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_feb_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_feb_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">February <br> Total income: {{Session::get('total_income_feb')}} tk <br> Percentage: ({{Session::get('total_income_feb_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Mar</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_mar_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_mar_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">March <br> Total income: {{Session::get('total_income_mar')}} tk <br> Percentage: ({{Session::get('total_income_mar_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Apr</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_apr_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_apr_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">April <br> Total income: {{Session::get('total_income_apr')}} tk <br> Percentage: ({{Session::get('total_income_apr_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">May</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_may_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_may_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">May <br> Total income: {{Session::get('total_income_may')}} tk <br> Percentage: ({{Session::get('total_income_may_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Jun</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_jun_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_jun_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">June <br> Total income: {{Session::get('total_income_jun')}} tk <br> Percentage: ({{Session::get('total_income_jun_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Jul</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_jul_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_jul_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">July <br> Total income: {{Session::get('total_income_jul')}} tk <br> Percentage: ({{Session::get('total_income_jul_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Aug</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_aug_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_aug_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">August <br> Total income: {{Session::get('total_income_aug')}} tk <br> Percentage: ({{Session::get('total_income_aug_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Sep</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_sep_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_sep_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">September <br> Total income: {{Session::get('total_income_sep')}} tk <br> Percentage: ({{Session::get('total_income_sep_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Oct</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_oct_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_oct_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">October <br> Total income: {{Session::get('total_income_oct')}} tk <br> Percentage: ({{Session::get('total_income_oct_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Nov</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_nov_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_nov_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">November <br> Total income: {{Session::get('total_income_nov')}} tk <br> Percentage: ({{Session::get('total_income_nov_per')}})%</span>
                    </div>

                    <div class="popMsgContainer">
                        <p class="graph_bar_title">Dec</p>
                        <div class="graph_bar" height="100%">
                            @for ($i = 0; $i < Session::get('total_income_dec_per_10'); $i++)
                            <span class="graph_bar_sec"></span>
                            @endfor
                            @for ($i = Session::get('total_income_dec_per_10'); $i < 10; $i++)
                            <span class="graph_bar_sec_dud"></span>
                            @endfor
                        </div>
                        <span class="popMsg">December <br> Total income: {{Session::get('total_income_dec')}} tk <br> Percentage: ({{Session::get('total_income_dec_per')}})%</span>
                    </div>
                </div>







@endsection

<!--------------------content end---------------------->
