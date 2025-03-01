@extends('admin.layout.app')
@section('content')

    <style>
        .nk-sidebar{
            display: none;
        }
        .nk-header {
            display: none;
        }
    </style>

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">

                               <div class="nk-block-between g-3">
                                <div class="nk-block-head-content mb-5">
                                    <h4 class="title nk-block-title">Change of Address</h4>
                                </div>
                               <div class="nk-block-head-content">
                                     <a href="{{ route('booking.view', $booking->id) }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('booking.view', $booking->id) }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                </div>
                                </div>

                                <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">


                                             <form action="{{ route('storeChangeAddress') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="driver_id" value="{{ $user->id }}">
                                                <input type="hidden" name="form_id" value="{{ $form->id }}">


                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Address Details</h4>
                                                    </div>

                                                   <div class="row">
                                                        <div class="form-group col-md-4" id="form-group-address_line">
                                                            <label for="address_line">Address line</label>
                                                            <input type="text" class="form-control" id="address_line"
                                                                   name="change_address[address_line]"
                                                                   value="{{ old('change_address.address_line', $selectedForm->change_address['address_line'] ?? $form->change_address['address_line'] ?? '') }}">
                                                        </div>

                                                        <div class="form-group col-md-4" id="form-group-address_line_2">
                                                            <label for="address_line_2">Address line 2</label>
                                                            <input type="text" class="form-control" id="address_line_2"
                                                                   name="change_address[address_line_2]"
                                                                   value="{{ old('change_address.address_line_2', $selectedForm->change_address['address_line_2'] ?? $form->change_address['address_line_2'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4" id="form-group-country">
                                                            <label for="country">Country</label>
                                                            <select class="form-control" id="country" name="change_address[country]">
                                                                @php
                                                                    $selectedCountry = old('change_address.country', $selectedForm->change_address['country'] ?? '');
                                                                @endphp

                                                                <option value="Afghanistan" {{ $selectedCountry == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                                                                <option value="Albania" {{ $selectedCountry == 'Albania' ? 'selected' : '' }}>Albania</option>
                                                                <option value="Algeria" {{ $selectedCountry == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                                                                <option value="Andorra" {{ $selectedCountry == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                                                                <option value="Angola" {{ $selectedCountry == 'Angola' ? 'selected' : '' }}>Angola</option>
                                                                <option value="Antigua and Barbuda" {{ $selectedCountry == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
                                                                <option value="Argentina" {{ $selectedCountry == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                                                <option value="Armenia" {{ $selectedCountry == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                                                                <option value="Australia" {{ $selectedCountry == 'Australia' ? 'selected' : '' }}>Australia</option>
                                                                <option value="Austria" {{ $selectedCountry == 'Austria' ? 'selected' : '' }}>Austria</option>
                                                                <option value="Azerbaijan" {{ $selectedCountry == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                                                                <option value="Bahamas" {{ $selectedCountry == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                                                                <option value="Bahrain" {{ $selectedCountry == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                                                                <option value="Bangladesh" {{ $selectedCountry == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                                                <option value="Barbados" {{ $selectedCountry == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                                                                <option value="Belarus" {{ $selectedCountry == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                                                                <option value="Belgium" {{ $selectedCountry == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                                                <option value="Belize" {{ $selectedCountry == 'Belize' ? 'selected' : '' }}>Belize</option>
                                                                <option value="Benin" {{ $selectedCountry == 'Benin' ? 'selected' : '' }}>Benin</option>
                                                                <option value="Bhutan" {{ $selectedCountry == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                                                <option value="Bolivia" {{ $selectedCountry == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                                                                <option value="Bosnia and Herzegovina" {{ $selectedCountry == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                                                <option value="Botswana" {{ $selectedCountry == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                                                                <option value="Brazil" {{ $selectedCountry == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                                                <option value="Brunei" {{ $selectedCountry == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                                                                <option value="Bulgaria" {{ $selectedCountry == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                                                                <option value="Burkina Faso" {{ $selectedCountry == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
                                                                <option value="Burundi" {{ $selectedCountry == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                                                                <option value="Cabo Verde" {{ $selectedCountry == 'Cabo Verde' ? 'selected' : '' }}>Cabo Verde</option>
                                                                <option value="Cambodia" {{ $selectedCountry == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                                                <option value="Cameroon" {{ $selectedCountry == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                                                                <option value="Canada" {{ $selectedCountry == 'Canada' ? 'selected' : '' }}>Canada</option>
                                                                <option value="Central African Republic" {{ $selectedCountry == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
                                                                <option value="Chad" {{ $selectedCountry == 'Chad' ? 'selected' : '' }}>Chad</option>
                                                                <option value="Chile" {{ $selectedCountry == 'Chile' ? 'selected' : '' }}>Chile</option>
                                                                <option value="China" {{ $selectedCountry == 'China' ? 'selected' : '' }}>China</option>
                                                                <option value="Colombia" {{ $selectedCountry == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                                                                <option value="Comoros" {{ $selectedCountry == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                                                                <option value="Congo, Democratic Republic of the" {{ $selectedCountry == 'Congo, Democratic Republic of the' ? 'selected' : '' }}>Congo, Democratic Republic of the</option>
                                                                <option value="Congo, Republic of the" {{ $selectedCountry == 'Congo, Republic of the' ? 'selected' : '' }}>Congo, Republic of the</option>
                                                                <option value="Costa Rica" {{ $selectedCountry == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                                                                <option value="Cote d'Ivoire" {{ $selectedCountry == "Cote d'Ivoire" ? 'selected' : '' }}>Cote d'Ivoire</option>
                                                                <option value="Croatia" {{ $selectedCountry == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                                                                <option value="Cuba" {{ $selectedCountry == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                                                                <option value="Cyprus" {{ $selectedCountry == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                                                                <option value="Czech Republic" {{ $selectedCountry == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                                                                <option value="Denmark" {{ $selectedCountry == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                                                <option value="Djibouti" {{ $selectedCountry == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                                                                <option value="Dominica" {{ $selectedCountry == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                                                                <option value="Dominican Republic" {{ $selectedCountry == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                                                                <option value="Ecuador" {{ $selectedCountry == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                                                                <option value="Egypt" {{ $selectedCountry == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                                                <option value="El Salvador" {{ $selectedCountry == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                                                                <option value="Equatorial Guinea" {{ $selectedCountry == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                                                                <option value="Eritrea" {{ $selectedCountry == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                                                                <option value="Estonia" {{ $selectedCountry == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                                                                <option value="Eswatini" {{ $selectedCountry == 'Eswatini' ? 'selected' : '' }}>Eswatini</option>
                                                                <option value="Ethiopia" {{ $selectedCountry == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                                                                <option value="Fiji" {{ $selectedCountry == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                                                                <option value="Finland" {{ $selectedCountry == 'Finland' ? 'selected' : '' }}>Finland</option>
                                                                <option value="France" {{ $selectedCountry == 'France' ? 'selected' : '' }}>France</option>
                                                                <option value="Gabon" {{ $selectedCountry == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                                                                <option value="Gambia" {{ $selectedCountry == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                                                                <option value="Georgia" {{ $selectedCountry == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                                                <option value="Germany" {{ $selectedCountry == 'Germany' ? 'selected' : '' }}>Germany</option>
                                                                <option value="Ghana" {{ $selectedCountry == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                                                <option value="Greece" {{ $selectedCountry == 'Greece' ? 'selected' : '' }}>Greece</option>
                                                                <option value="Grenada" {{ $selectedCountry == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                                                                <option value="Guatemala" {{ $selectedCountry == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                                                                <option value="Guinea" {{ $selectedCountry == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                                                                <option value="Guinea-Bissau" {{ $selectedCountry == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
                                                                <option value="Guyana" {{ $selectedCountry == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                                                                <option value="Haiti" {{ $selectedCountry == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                                                                <option value="Honduras" {{ $selectedCountry == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                                                                <option value="Hungary" {{ $selectedCountry == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                                                                <option value="Iceland" {{ $selectedCountry == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                                                                <option value="India" {{ $selectedCountry == 'India' ? 'selected' : '' }}>India</option>
                                                                <option value="Indonesia" {{ $selectedCountry == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                                                <option value="Iran" {{ $selectedCountry == 'Iran' ? 'selected' : '' }}>Iran</option>
                                                                <option value="Iraq" {{ $selectedCountry == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                                                <option value="Ireland" {{ $selectedCountry == 'Ireland' ? 'selected' : '' }}>Ireland</option>
                                                                <option value="Israel" {{ $selectedCountry == 'Israel' ? 'selected' : '' }}>Israel</option>
                                                                <option value="Italy" {{ $selectedCountry == 'Italy' ? 'selected' : '' }}>Italy</option>
                                                                <option value="Jamaica" {{ $selectedCountry == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                                                                <option value="Japan" {{ $selectedCountry == 'Japan' ? 'selected' : '' }}>Japan</option>
                                                                <option value="Jordan" {{ $selectedCountry == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                                                                <option value="Kazakhstan" {{ $selectedCountry == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                                                                <option value="Kenya" {{ $selectedCountry == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                                                <option value="Kiribati" {{ $selectedCountry == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                                                                <option value="Korea, North" {{ $selectedCountry == 'Korea, North' ? 'selected' : '' }}>Korea, North</option>
                                                                <option value="Korea, South" {{ $selectedCountry == 'Korea, South' ? 'selected' : '' }}>Korea, South</option>
                                                                <option value="Kosovo" {{ $selectedCountry == 'Kosovo' ? 'selected' : '' }}>Kosovo</option>
                                                                <option value="Kuwait" {{ $selectedCountry == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                                                                <option value="Kyrgyzstan" {{ $selectedCountry == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
                                                                <option value="Laos" {{ $selectedCountry == 'Laos' ? 'selected' : '' }}>Laos</option>
                                                                <option value="Latvia" {{ $selectedCountry == 'Latvia' ? 'selected' : '' }}>Latvia</option>
                                                                <option value="Lebanon" {{ $selectedCountry == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
                                                                <option value="Lesotho" {{ $selectedCountry == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
                                                                <option value="Liberia" {{ $selectedCountry == 'Liberia' ? 'selected' : '' }}>Liberia</option>
                                                                <option value="Libya" {{ $selectedCountry == 'Libya' ? 'selected' : '' }}>Libya</option>
                                                                <option value="Liechtenstein" {{ $selectedCountry == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                                                <option value="Lithuania" {{ $selectedCountry == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
                                                                <option value="Luxembourg" {{ $selectedCountry == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
                                                                <option value="Madagascar" {{ $selectedCountry == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
                                                                <option value="Malawi" {{ $selectedCountry == 'Malawi' ? 'selected' : '' }}>Malawi</option>
                                                                <option value="Malaysia" {{ $selectedCountry == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                                                <option value="Maldives" {{ $selectedCountry == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                                                                <option value="Mali" {{ $selectedCountry == 'Mali' ? 'selected' : '' }}>Mali</option>
                                                                <option value="Malta" {{ $selectedCountry == 'Malta' ? 'selected' : '' }}>Malta</option>
                                                                <option value="Marshall Islands" {{ $selectedCountry == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
                                                                <option value="Mauritania" {{ $selectedCountry == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
                                                                <option value="Mauritius" {{ $selectedCountry == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
                                                                <option value="Mexico" {{ $selectedCountry == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                                                                <option value="Micronesia" {{ $selectedCountry == 'Micronesia' ? 'selected' : '' }}>Micronesia</option>
                                                                <option value="Moldova" {{ $selectedCountry == 'Moldova' ? 'selected' : '' }}>Moldova</option>
                                                                <option value="Monaco" {{ $selectedCountry == 'Monaco' ? 'selected' : '' }}>Monaco</option>
                                                                <option value="Mongolia" {{ $selectedCountry == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
                                                                <option value="Montenegro" {{ $selectedCountry == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
                                                                <option value="Morocco" {{ $selectedCountry == 'Morocco' ? 'selected' : '' }}>Morocco</option>
                                                                <option value="Mozambique" {{ $selectedCountry == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
                                                                <option value="Myanmar" {{ $selectedCountry == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                                                                <option value="Namibia" {{ $selectedCountry == 'Namibia' ? 'selected' : '' }}>Namibia</option>
                                                                <option value="Nauru" {{ $selectedCountry == 'Nauru' ? 'selected' : '' }}>Nauru</option>
                                                                <option value="Nepal" {{ $selectedCountry == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                                                <option value="Netherlands" {{ $selectedCountry == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                                                                <option value="New Zealand" {{ $selectedCountry == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                                                                <option value="Nicaragua" {{ $selectedCountry == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
                                                                <option value="Niger" {{ $selectedCountry == 'Niger' ? 'selected' : '' }}>Niger</option>
                                                                <option value="Nigeria" {{ $selectedCountry == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                                                <option value="North Macedonia" {{ $selectedCountry == 'North Macedonia' ? 'selected' : '' }}>North Macedonia</option>
                                                                <option value="Norway" {{ $selectedCountry == 'Norway' ? 'selected' : '' }}>Norway</option>
                                                                <option value="Oman" {{ $selectedCountry == 'Oman' ? 'selected' : '' }}>Oman</option>
                                                                <option value="Pakistan" {{ $selectedCountry == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                                                <option value="Palau" {{ $selectedCountry == 'Palau' ? 'selected' : '' }}>Palau</option>
                                                                <option value="Panama" {{ $selectedCountry == 'Panama' ? 'selected' : '' }}>Panama</option>
                                                                <option value="Papua New Guinea" {{ $selectedCountry == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
                                                                <option value="Paraguay" {{ $selectedCountry == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
                                                                <option value="Peru" {{ $selectedCountry == 'Peru' ? 'selected' : '' }}>Peru</option>
                                                                <option value="Philippines" {{ $selectedCountry == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                                                <option value="Poland" {{ $selectedCountry == 'Poland' ? 'selected' : '' }}>Poland</option>
                                                                <option value="Portugal" {{ $selectedCountry == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                                                <option value="Qatar" {{ $selectedCountry == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                                                                <option value="Romania" {{ $selectedCountry == 'Romania' ? 'selected' : '' }}>Romania</option>
                                                                <option value="Russia" {{ $selectedCountry == 'Russia' ? 'selected' : '' }}>Russia</option>
                                                                <option value="Rwanda" {{ $selectedCountry == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
                                                                <option value="Saint Kitts and Nevis" {{ $selectedCountry == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                                                <option value="Saint Lucia" {{ $selectedCountry == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
                                                                <option value="Saint Vincent and the Grenadines" {{ $selectedCountry == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
                                                                <option value="Samoa" {{ $selectedCountry == 'Samoa' ? 'selected' : '' }}>Samoa</option>
                                                                <option value="San Marino" {{ $selectedCountry == 'San Marino' ? 'selected' : '' }}>San Marino</option>
                                                                <option value="Sao Tome and Principe" {{ $selectedCountry == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
                                                                <option value="Saudi Arabia" {{ $selectedCountry == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                                                <option value="Senegal" {{ $selectedCountry == 'Senegal' ? 'selected' : '' }}>Senegal</option>
                                                                <option value="Serbia" {{ $selectedCountry == 'Serbia' ? 'selected' : '' }}>Serbia</option>
                                                                <option value="Seychelles" {{ $selectedCountry == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
                                                                <option value="Sierra Leone" {{ $selectedCountry == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
                                                                <option value="Singapore" {{ $selectedCountry == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                                                <option value="Slovakia" {{ $selectedCountry == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
                                                                <option value="Slovenia" {{ $selectedCountry == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
                                                                <option value="Solomon Islands" {{ $selectedCountry == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
                                                                <option value="Somalia" {{ $selectedCountry == 'Somalia' ? 'selected' : '' }}>Somalia</option>
                                                                <option value="South Africa" {{ $selectedCountry == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                                                <option value="South Sudan" {{ $selectedCountry == 'South Sudan' ? 'selected' : '' }}>South Sudan</option>
                                                                <option value="Spain" {{ $selectedCountry == 'Spain' ? 'selected' : '' }}>Spain</option>
                                                                <option value="Sri Lanka" {{ $selectedCountry == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                                                                <option value="Sudan" {{ $selectedCountry == 'Sudan' ? 'selected' : '' }}>Sudan</option>
                                                                <option value="Suriname" {{ $selectedCountry == 'Suriname' ? 'selected' : '' }}>Suriname</option>
                                                                <option value="Sweden" {{ $selectedCountry == 'Sweden' ? 'selected' : '' }}>Sweden</option>
                                                                <option value="Switzerland" {{ $selectedCountry == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                                                                <option value="Syria" {{ $selectedCountry == 'Syria' ? 'selected' : '' }}>Syria</option>
                                                                <option value="Taiwan" {{ $selectedCountry == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
                                                                <option value="Tajikistan" {{ $selectedCountry == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
                                                                <option value="Tanzania" {{ $selectedCountry == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
                                                                <option value="Thailand" {{ $selectedCountry == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                                                <option value="Timor-Leste" {{ $selectedCountry == 'Timor-Leste' ? 'selected' : '' }}>Timor-Leste</option>
                                                                <option value="Togo" {{ $selectedCountry == 'Togo' ? 'selected' : '' }}>Togo</option>
                                                                <option value="Tonga" {{ $selectedCountry == 'Tonga' ? 'selected' : '' }}>Tonga</option>
                                                                <option value="Trinidad and Tobago" {{ $selectedCountry == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
                                                                <option value="Tunisia" {{ $selectedCountry == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
                                                                <option value="Turkey" {{ $selectedCountry == 'Turkey' ? 'selected' : '' }}>Turkey</option>
                                                                <option value="Turkmenistan" {{ $selectedCountry == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
                                                                <option value="Tuvalu" {{ $selectedCountry == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
                                                                <option value="Uganda" {{ $selectedCountry == 'Uganda' ? 'selected' : '' }}>Uganda</option>
                                                                <option value="Ukraine" {{ $selectedCountry == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                                                <option value="United Arab Emirates" {{ $selectedCountry == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                                                <option value="United Kingdom" {{ $selectedCountry == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                                                <option value="United States" {{ $selectedCountry == 'United States' ? 'selected' : '' }}>United States</option>
                                                                <option value="Uruguay" {{ $selectedCountry == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
                                                                <option value="Uzbekistan" {{ $selectedCountry == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                                                                <option value="Vanuatu" {{ $selectedCountry == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
                                                                <option value="Vatican City" {{ $selectedCountry == 'Vatican City' ? 'selected' : '' }}>Vatican City</option>
                                                                <option value="Venezuela" {{ $selectedCountry == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
                                                                <option value="Vietnam" {{ $selectedCountry == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                                                                <option value="Yemen" {{ $selectedCountry == 'Yemen' ? 'selected' : '' }}>Yemen</option>
                                                                <option value="Zambia" {{ $selectedCountry == 'Zambia' ? 'selected' : '' }}>Zambia</option>
                                                                <option value="Zimbabwe" {{ $selectedCountry == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4" id="form-group-city">
                                                            <label for="city">City</label>
                                                            <input type="text" class="form-control" id="city"
                                                                   name="change_address[city]"
                                                                   value="{{ old('change_address.city', $selectedForm->change_address['city'] ?? $form->change_address['city'] ?? '') }}">
                                                        </div>

                                                       <div class="form-group col-md-4">
                                                            <label for="effective_date">Effective date</label>
                                                           <input type="date" class="form-control" id="effective_date" name="change_address[address_effective_date]"
                                                                  value="{{ old('change_address.address_effective_date', $selectedForm->change_address['address_effective_date'] ?? $form->change_address['address_effective_date'] ?? '') }}">
                                                       </div>
                                                    </div>
                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Phone Number Detail</h4>
                                                    </div>

                                                    <div class="row">
                                                         <div class="form-group col-md-4" id="form-group-phone">
                                                            <label for="phone">Phone Number</label>
                                                            <input type="text" class="form-control" id="phone"
                                                                   name="change_address[phone]"
                                                                   value="{{ old('change_address.phone', $selectedForm->change_address['phone'] ?? $form->change_address['phone'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="effective_date">Effective date</label>

                                                            <input type="date" class="form-control" id="effective_date"
                                                                   name="change_address[phone_effective_date]"
                                                                   value="{{ old('change_address.phone_effective_date', $selectedForm->change_address['phone_effective_date'] ?? $form->change_address['phone_effective_date'] ?? '') }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Email Detail</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-4" id="form-group-email">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                   name="change_address[email]"
                                                                   value="{{ old('change_address.email', $selectedForm->change_address['email'] ?? $form->change_address['email'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="effective_date">Effective date</label>

                                                            <input type="date" class="form-control" id="effective_date"
                                                                   name="change_address[email_effective_date]"
                                                                   value="{{ old('change_address.email_effective_date', $selectedForm->change_address['email_effective_date'] ?? $form->change_address['email_effective_date'] ?? '') }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Emergency Contact Detail</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="emergency_contact_name">Contact name</label>
                                                            <input type="text" class="form-control" id="emergency_contact_name"
                                                                   name="change_address[emergency_contact_name]"
                                                                   value="{{ old('change_address.emergency_contact_name', $selectedForm->change_address['emergency_contact_name'] ?? $form->change_address['emergency_contact_name'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="emergency_address_line_01">Address line 01</label>
                                                            <input type="text" class="form-control" id="emergency_address_line_01"
                                                                   name="change_address[emergency_address_line_01]"
                                                                   value="{{ old('change_address.emergency_address_line_01', $selectedForm->change_address['emergency_address_line_01'] ?? $form->change_address['emergency_address_line_01'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="emergency_address_line_02">Address line 02</label>
                                                            <input type="text" class="form-control" id="emergency_address_line_02"
                                                                   name="change_address[emergency_address_line_02]"
                                                                   value="{{ old('change_address.emergency_address_line_02', $selectedForm->change_address['emergency_address_line_02'] ?? $form->change_address['emergency_address_line_02'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="emergency_town_city">Town city</label>
                                                            <input type="text" class="form-control" id="emergency_town_city"
                                                                   name="change_address[emergency_town_city]"
                                                                   value="{{ old('change_address.emergency_town_city', $selectedForm->change_address['emergency_town_city'] ?? $form->change_address['emergency_town_city'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="emergency_postcode">Postcode</label>
                                                            <input type="text" class="form-control" id="emergency_postcode"
                                                                   name="change_address[emergency_postcode]"
                                                                   value="{{ old('change_address.emergency_postcode', $selectedForm->change_address['emergency_postcode'] ?? $form->change_address['emergency_postcode'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="emergency_effective_date">Effective date</label>
                                                            <input type="date" class="form-control" id="emergency_effective_date"
                                                                   name="change_address[emergency_effective_date]"
                                                                   value="{{ old('change_address.emergency_effective_date', $selectedForm->change_address['emergency_effective_date'] ?? $form->change_address['emergency_effective_date'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="form-group mt-4 text-center">
                                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection
