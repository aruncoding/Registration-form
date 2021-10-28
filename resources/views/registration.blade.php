<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registartion Form</title>
</head>
<body>
    <section id="regist_body">
        <div class="registration_form">
            <div class="registration_head">
                <h3>Registration Form</h3>
            </div>
            <div class="form_input">
                <form method="post" action="{{route('sendform')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form_element">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form_text" >
                        @if ($errors->any())
                            @foreach ($errors->get('name') as $message)
                            <div style="color:red;">{{$message}}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form_element">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form_text">
                        @if ($errors->any())
                            @foreach ($errors->get('email') as $message)
                            <div style="color:red;">{{$message}}</div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form_element">
                        <label for="phone">Mobile No.</label>
                        <input type="text" name="phone" id="phone" class="form_text">
                        @if ($errors->any())
                            @foreach ($errors->get('phone') as $message)
                            <div style="color:red;">{{$message}}</div>
                            @endforeach
                        @endif
                    </div>
                   
                        <div class="form_element">
                            <label for="country">Country</label>
                            <select class="form-control" name="country_name" id="country-dropdown">
                                <option value="">Please Select Company</option>
                                @foreach ($countries as $country) 
                                <option value="{{$country->id}}">
                                {{$country->country}}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                            @foreach ($errors->get('country_name') as $message)
                            <div style="color:red;">{{$message}}</div>
                            @endforeach
                        @endif
                        </div>
                        <div class="form_element">
                            <label for="state">State</label>
                            <select class="form-control" name="state_name" id="state-dropdown">
                              
                                
                            </select>
                            @if ($errors->any())
                            @foreach ($errors->get('state_name') as $message)
                            <div style="color:red;">{{$message}}</div>
                            @endforeach
                        @endif
                        </div>
                        <div class="form_element">
                            <label for="city">City</label>
                            <select class="form-control" name="city_name" id="city-dropdown">
                            </select>
                        </select>
                        @if ($errors->any())
                        @foreach ($errors->get('state_name') as $message)
                        <div style="color:red;">{{$message}}</div>
                        @endforeach
                    @endif
                        </div>
                    
                    <div class="form_element">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" rows="7" class="form_text"></textarea>
                        @if ($errors->any())
                        @foreach ($errors->get('address') as $message)
                        <div style="color:red;">{{$message}}</div>
                        @endforeach
                    @endif
                    </div>
                    <div class="form_element">
                        <label for="profile">Profile Image</label>
                        <input type="file" name="profile" id="profile" class="form_text">
                        @if ($errors->any())
                        @foreach ($errors->get('profile') as $message)
                        <div style="color:red;">{{$message}}</div>
                        @endforeach
                    @endif
                    </div>
                    <div class="form_element">
                        <label for="resume">Resume</label>
                        <input type="file" name="resume" id="resume" class="form_text">
                        @if ($errors->any())
                        @foreach ($errors->get('resume') as $message)
                        <div style="color:red;">{{$message}}</div>
                        @endforeach
                    @endif
                        
                    </div>
                    <div class="form_element">
                        <label for="qualification">Qualification</label>
                        <input type="text" name="quali_name" value="Name" id="Name">
                        <input type="text" name="qualification_name" id="qualif_input">
                        
                        <input type="text" name="certificate" value="Certificate" id="certificate">
                        <input type="file" name="certificate_file" id="certifi_file" >
                        @if ($errors->any())
                        @foreach ($errors->get('qualification_name') as $message)
                            <div style="color:red;">{{$message}}</div>
                        @endforeach
                        @endif
                        @if ($errors->any())
                        @foreach ($errors->get('certificate_file') as $message)
                        <div style="color:red;">{{$message}}</div>
                        @endforeach
                        @endif
                        
                    </div>
                    <div class="form_element">
                        <input type="text" name="quali_names" value="Name" id="quali">
                        <input type="text" name="qualification_inputs" id="qualif_inputs">
                        
                        
                        <input type="text" name="certificate" value="Certificate" id="certificate">
                        <input type="file" name="certification_files" id="certifi_files">
                        @if ($errors->any())
                        @foreach ($errors->get('qualification_inputs') as $message)
                        <div style="color:red;">{{$message}}</div>
                        @endforeach
                        @endif
                        @if ($errors->any())
                        @foreach ($errors->get('certification_files') as $message)
                        <div style="color:red;">{{$message}}</div>
                        @endforeach
                        @endif
                        
                    </div>
                    <div class="submit_btn">
                        <button type="submit">Submit</button>
                    </div>
                </form>
                @if (session()->has('status'))
                <div style="color:green;">{{session('status')}}</div>
            @endif
            @if (session()->has('flash'))
            <div style="color:green;">{{session('flash')}}</div>
        @endif
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function() {
    $('#country-dropdown').on('change', function() {
    var country_id = this.value;
    $("#state-dropdown").html('');
    $.ajax({
    url:"{{url('get-states-by-country')}}",
    type: "POST",
    data: {
    country_id: country_id,
    _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
    $('#state-dropdown').html('<option value="">Select State</option>'); 
    $.each(result.states,function(key,value){
    $("#state-dropdown").append('<option value="'+value.id+'">'+value.state_name+'</option>');
    });
    $('#city-dropdown').html('<option value="">Select State First</option>'); 
    }
    });
    });    
    $('#state-dropdown').on('change', function() {
    var state_id = this.value;
    $("#city-dropdown").html('');
    $.ajax({
    url:"{{url('get-cities-by-state')}}",
    type: "POST",
    data: {
    state_id: state_id,
    _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
    $('#city-dropdown').html('<option value="">Select City</option>'); 
    $.each(result.cities,function(key,value){
    $("#city-dropdown").append('<option value="'+value.id+'">'+value.city_name+'</option>');
    });
    }
    });
    });
    });
        </script>
    {{-- <script src="{{asset('js/style.js')}}"></script> --}}
</body>
</html>