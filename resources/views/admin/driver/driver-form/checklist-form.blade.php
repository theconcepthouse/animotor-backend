@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">

                               <div class="nk-block-between g-3">
                                <div class="nk-block-head-content mb-5">
                                    <h4 class="title nk-block-title">Checklist Form</h4>
                                </div>
                               <div class="nk-block-head-content">
                                    <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}"
                                       wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                            class="icon ni ni-arrow-left"></em><span>Back</span></a>

                                    <a href="{{ route('admin.driverForm', ['driverId' => $driver->id, 'formId' => $form->id]) }}"
                                       wire:navigate
                                       class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                            class="icon ni ni-arrow-left"></em></a>

                                </div>
                                </div>
{{--                               {{ dd($formFieldsJson['Customer Detail']) }}--}}
                                <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                             <form action="{{ route('admin.submitDriverForm', $form->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                <input type="hidden" name="form_id" value="{{ $form->id }}">

                                                 <div class="container">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Hirer Detail</h4>
                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-md-3" id="form-group-first_name">
                                                            <label for="first_name">First name</label>
                                                            <input type="text" class="form-control" id="first_name"
                                                                   name="personal_details[first_name]"
                                                                   value="{{ old('personal_details.first_name', $selectedForm->personal_details['first_name'] ?? $form->personal_details['first_name'] ?? '') }}">
                                                        </div>

                                                        <div class="form-group col-md-3" id="form-group-last_name">
                                                            <label for="last_name">Last name</label>
                                                            <input type="text" class="form-control" id="last_name"
                                                                   name="personal_details[last_name]"
                                                                   value="{{ old('personal_details.last_name', $selectedForm->personal_details['last_name'] ?? $form->personal_details['last_name'] ?? '') }}">
                                                        </div>

                                                        <div class="form-group col-md-3" id="form-group-email">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                   name="personal_details[email]"
                                                                   value="{{ old('personal_details.email', $selectedForm->personal_details['email'] ?? $form->personal_details['email'] ?? '') }}">
                                                        </div>

                                                        <div class="form-group col-md-3" id="form-group-phone">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" class="form-control" id="phone"
                                                                   name="personal_details[phone]"
                                                                   value="{{ old('personal_details.phone', $selectedForm->personal_details['phone'] ?? $form->personal_details['phone'] ?? '') }}">
                                                        </div>



                                                    </div>
                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Address Detail</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-4" id="form-group-address_line">
                                                            <label for="address_line">Address line</label>
                                                            <input type="text" class="form-control" id="address_line"
                                                                   name="address[address_line]"
                                                                   value="{{ old('address.address_line', $selectedForm->address['address_line'] ?? $form->address['address_line'] ?? '') }}">
                                                        </div>

                                                        <div class="form-group col-md-4" id="form-group-address_line_2">
                                                            <label for="address_line_2">Address line 2</label>
                                                            <input type="text" class="form-control" id="address_line_2"
                                                                   name="address[address_line_2]"
                                                                   value="{{ old('address.address_line_2', $selectedForm->address['address_line_2'] ?? $form->address['address_line_2'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4" id="form-group-country">
                                                            <label for="country">Country</label>
                                                            <select class="form-control" id="country" name="address[country]">
                                                                @php
                                                                    $selectedCountry = old('address.country', $selectedForm->address['country'] ?? '');
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
                                                                   name="address[city]"
                                                                   value="{{ old('address.city', $selectedForm->address['city'] ?? $form->address['city'] ?? '') }}">
                                                        </div>

                                                        <div class="form-group col-md-4" id="form-group-postcode">
                                                            <label for="postcode">Postcode</label>
                                                            <input type="text" class="form-control" id="postcode"
                                                                   name="address[postcode]"
                                                                   value="{{ old('address.postcode', $selectedForm->address['postcode'] ?? $form->address['postcode'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>


                                                  <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Vehicle Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="registration_number">Registration number</label>
                                                        <input type="text" class="form-control"
                                                               id="registration_number" name="vehicle[registration_number]"
                                                               value="{{ old('vehicle.registration_number', $selectedForm->vehicle['registration_number'] ?? $form->vehicle['registration_number'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="insurance_group">Insurance group</label>
                                                        <input type="text" class="form-control" id="insurance_group"
                                                               name="vehicle[insurance_group]"
                                                               value="{{ old('vehicle.insurance_group', $selectedForm->vehicle['insurance_group'] ?? $form->vehicle['insurance_group'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="car_model">Car model</label>
                                                        <input type="text" class="form-control" id="car_model"
                                                               name="vehicle[car_model]"
                                                               value="{{ old('vehicle.car_model', $selectedForm->vehicle['car_model'] ?? $form->vehicle['car_model'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="car_make">Car make</label>
                                                        <input type="text" class="form-control" id="car_make"
                                                               name="vehicle[car_make]"
                                                               value="{{ old('vehicle.car_make', $selectedForm->vehicle['car_make'] ?? $form->vehicle['car_make'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="date_out">Date out</label>
                                                        <input type="date" class="form-control" id="date_out"
                                                               name="vehicle[date_out]"
                                                               value="{{ old('vehicle.date_out', $selectedForm->vehicle['date_out'] ?? $form->vehicle['date_out'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="date_due">Date due</label>
                                                        <input type="date" class="form-control" id="date_due"
                                                               name="vehicle[date_due]"
                                                               value="{{ old('vehicle.date_due', $selectedForm->vehicle['date_due'] ?? $form->vehicle['date_due'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                            <label for="next_service">Next service</label>

                                                            <input type="text" class="form-control" id="next_service" name="vehicle[next_service]"
                                                                   value="{{ old('vehicle.next_service', $form->vehicle['next_service'] ?? '') }}" />
                                                        </div>
                                                </div>

                                                </div>
                                                 <div class="container mt-4 toggle-section" data-container-id="damageAssessmentContainer1">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Bodywork Detail</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="is_damage">Is damage</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="bodywork[is_damage]" id="is_damage_Yes" value="Yes"
                                                                    {{ old('bodywork.is_damage', $selectedForm->bodywork['is_damage'] ?? $form->bodywork['is_damage'] ?? '') == 'Yes' ? 'checked' : '' }} required />
                                                                <label class="form-check-label" for="is_damage_Yes">Yes</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="bodywork[is_damage]" id="is_damage_No" value="No"
                                                                    {{ old('bodywork.is_damage', $selectedForm->bodywork['is_damage'] ?? $form->bodywork['is_damage'] ?? '') == 'No' ? 'checked' : '' }} required />
                                                                <label class="form-check-label" for="is_damage_No">No</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="damageAssessmentContainer1" style="display:none; margin-top: 10px" >
                                                        <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label for="how_many_damaged_panel">How many damaged panels</label>
                                                            <input type="number" class="form-control" id="how_many_damaged_panel"
                                                                   name="damage_assessment[how_many_damaged_panel]"
                                                                   value="{{ old('damage_assessment.how_many_damaged_panel', $selectedForm->damage_assessment['how_many_damaged_panel'] ?? $form->damage_assessment['how_many_damaged_panel'] ?? '') }}" />
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label for="type_of_damage">Type of damage</label>
                                                            <select class="form-control" id="type_of_damage"
                                                                    name="damage_assessment[type_of_damage]">
                                                                <option value="Stone chips (more than 5)" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Stone chips (more than 5)' ? 'selected' : '' }}>Stone chips (more than 5)</option>
                                                                <option value="Small scratch or dent (less than 3cm)" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Small scratch or dent (less than 3cm)' ? 'selected' : '' }}>Small scratch or dent (less than 3cm)</option>
                                                                <option value="Scratch - long" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Scratch - long' ? 'selected' : '' }}>Scratch - long</option>
                                                                <option value="Small dent (between 3 and 30cm)" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Small dent (between 3 and 30cm)' ? 'selected' : '' }}>Small dent (between 3 and 30cm)</option>
                                                                <option value="Large dent - below door (sill)" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Large dent - below door (sill)' ? 'selected' : '' }}>Large dent - below door (sill)</option>
                                                                <option value="Large dent - roof" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Large dent - roof' ? 'selected' : '' }}>Large dent - roof</option>
                                                                <option value="Large dent - other" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Large dent - other' ? 'selected' : '' }}>Large dent - other</option>
                                                                <option value="Cracked or insecure bumper" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Cracked or insecure bumper' ? 'selected' : '' }}>Cracked or insecure bumper</option>
                                                                <option value="Rust" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Rust' ? 'selected' : '' }}>Rust</option>
                                                                <option value="Previous poor repair" {{ old('damage_assessment.type_of_damage', $selectedForm->damage_assessment['type_of_damage'] ?? $form->damage_assessment['type_of_damage'] ?? '') == 'Previous poor repair' ? 'selected' : '' }}>Previous poor repair</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            @include('admin.partials.image-upload', [
                                                                'field' => 'damage_assessment[images]',
                                                                'image' => $selectedForm->damage_assessment['images'] ?? '',
                                                                'id' => Str::uuid(),
                                                                'title' => 'Images',
                                                                'colSize' => 'col-md-10 col-sm-6',
                                                            ])
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label for="damage_description">Damage Description</label>
                                                            <textarea name="damage_assessment[damage_description]" class="form-control" cols="5" rows="5">{{ old('damage_assessment.damage_description', $selectedForm->damage_assessment['damage_description'] ?? $form->damage_assessment['damage_description'] ?? '') }}</textarea>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>




                                               <div class="container mt-4 toggle-section" data-container-id="wheelsTyresContainer">
                                                <div class="mb-4">
                                                    <h4 class="title nk-block-title">Wheels & Tyres</h4>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="is_wheel_damaged">Is wheel damaged</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="wheels_tyres[is_wheel_damaged]" id="is_wheel_damaged_Yes" value="Yes"
                                                                {{ old('wheels_tyres.is_wheel_damaged', $selectedForm->wheels_tyres['is_wheel_damaged'] ?? $form->wheels_tyres['is_wheel_damaged'] ?? '') == 'Yes' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="is_wheel_damaged_Yes">Yes</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="wheels_tyres[is_wheel_damaged]" id="is_wheel_damaged_No" value="No"
                                                                {{ old('wheels_tyres.is_wheel_damaged', $selectedForm->wheels_tyres['is_wheel_damaged'] ?? $form->wheels_tyres['is_wheel_damaged'] ?? '') == 'No' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="is_wheel_damaged_No">No</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="wheelsTyresContainer" style="display:none; margin-top: 10px">
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label for="how_many_alloys_are_scuffed">How many alloys are scuffed</label>
                                                            <input type="number" class="form-control"
                                                                   id="how_many_alloys_are_scuffed"
                                                                   name="wheels_tyres[how_many_alloys_are_scuffed]"
                                                                   value="{{ old('wheels_tyres.how_many_alloys_are_scuffed', $selectedForm->wheels_tyres['how_many_alloys_are_scuffed'] ?? $form->wheels_tyres['how_many_alloys_are_scuffed'] ?? '') }}" />
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label for="how_many_replacing_tyre">How many replacing tyre</label>
                                                            <input type="number" class="form-control"
                                                                   id="how_many_replacing_tyre"
                                                                   name="wheels_tyres[how_many_replacing_tyre]"
                                                                   value="{{ old('wheels_tyres.how_many_replacing_tyre', $selectedForm->wheels_tyres['how_many_replacing_tyre'] ?? $form->wheels_tyres['how_many_replacing_tyre'] ?? '') }}" />
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            @include('admin.partials.image-upload', [
                                                                'field' => 'wheels_tyres[images]',
                                                                'image' => $selectedForm->wheels_tyres['images'] ?? '',
                                                                'id' => Str::uuid(),
                                                                'title' => 'Images',
                                                                'colSize' => 'col-md-10 col-sm-6',
                                                            ])
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label for="damage_description">Wheels & Tyres Description</label>
                                                            <textarea name="wheels_tyres[damage_description]" class="form-control" cols="5" rows="5">{{ old('wheels_tyres.damage_description', $selectedForm->wheels_tyres['damage_description'] ?? $form->wheels_tyres['damage_description'] ?? '') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           <div class="container mt-4 toggle-section" data-container-id="WindscreensContainer">
                                                <div class="mb-4">
                                                    <h4 class="title nk-block-title">Windscreens Details</h4>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="is_windscreen_damaged">Is windscreen damaged</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="windscreens[is_windscreen_damaged]"
                                                                   id="is_windscreen_damaged_Yes" value="Yes"
                                                                   {{ old('windscreens.is_windscreen_damaged', $selectedForm->windscreens['is_windscreen_damaged'] ?? $form->windscreens['is_windscreen_damaged'] ?? '') == 'Yes' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="is_windscreen_damaged_Yes">Yes</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="windscreens[is_windscreen_damaged]"
                                                                   id="is_windscreen_damaged_No" value="No"
                                                                   {{ old('windscreens.is_windscreen_damaged', $selectedForm->windscreens['is_windscreen_damaged'] ?? $form->windscreens['is_windscreen_damaged'] ?? '') == 'No' ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="is_windscreen_damaged_No">No</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="WindscreensContainer" style="display:none; margin-top: 10px">
                                                 <div class="row">

                                                    <div class="form-group col-md-4">
                                                        <label for="what_damage">What damage</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="windscreens[what_damage][]"
                                                                   id="what_damage_Chipped_or_cracked_driver_side"
                                                                   value="Chipped or cracked driver side"
                                                                   {{ in_array('Chipped or cracked driver side', old('windscreens.what_damage', $selectedForm->windscreens['what_damage'] ?? $form->windscreens['what_damage'] ?? [])) ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="what_damage_Chipped_or_cracked_driver_side">Chipped or cracked driver side</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="windscreens[what_damage][]"
                                                                   id="what_damage_Chipped_or_cracked_passenger_side"
                                                                   value="Chipped or cracked passenger side"
                                                                   {{ in_array('Chipped or cracked passenger side', old('windscreens.what_damage', $selectedForm->windscreens['what_damage'] ?? $form->windscreens['what_damage'] ?? [])) ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="what_damage_Chipped_or_cracked_passenger_side">Chipped or cracked passenger side</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="windscreens[what_damage][]"
                                                                   id="what_damage_Chipped_or_cracked_rear_window"
                                                                   value="Chipped or cracked rear window"
                                                                   {{ in_array('Chipped or cracked rear window', old('windscreens.what_damage', $selectedForm->windscreens['what_damage'] ?? $form->windscreens['what_damage'] ?? [])) ? 'checked' : '' }} />
                                                            <label class="form-check-label" for="what_damage_Chipped_or_cracked_rear_window">Chipped or cracked rear window</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        @include('admin.partials.image-upload', [
                                                            'field' => 'windscreens[images]',
                                                            'image' => $selectedForm->windscreens['images'] ?? '',
                                                            'id' => Str::uuid(),
                                                            'title' => 'Images',
                                                            'colSize' => 'col-md-10 col-sm-6',
                                                        ])
                                                    </div>
                                                     <div class="form-group col-md-4">
                                                        <label for="windscreens">Windscreens Description</label>
                                                        <textarea name="windscreens[damage_description]" class="form-control" cols="5" rows="5">
                                                            {{ old('windscreens.damage_description', $selectedForm->windscreens['damage_description'] ?? $form->windscreens['damage_description'] ?? '') }}</textarea>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>


                                                 <div class="container mt-4 toggle-section" data-container-id="MirrorsContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Mirrors Details</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="mirrors_is_mirror_damaged">Is mirror damaged</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="mirrors[is_mirror_damaged]" id="mirrors_is_mirror_damaged_Yes" value="Yes"
                                                                {{ old('mirrors.is_mirror_damaged', $selectedForm->mirrors['is_mirror_damaged'] ?? $form->mirrors['is_mirror_damaged'] ?? '') == 'Yes' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="mirrors_is_mirror_damaged_Yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="mirrors[is_mirror_damaged]" id="mirrors_is_mirror_damaged_No" value="No"
                                                                {{ old('mirrors.is_mirror_damaged', $selectedForm->mirrors['is_mirror_damaged'] ?? $form->mirrors['is_mirror_damaged'] ?? '') == 'No' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="mirrors_is_mirror_damaged_No">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                      <div id="MirrorsContainer" style="display:none; margin-top: 10px">
                                                          <div class="row">

                                                        <div class="form-group col-md-4">
                                                            <label for="mirrors_mirror_electronics">Mirror electronics</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="mirrors[mirror_electronics][]" id="mirrors_mirror_electronics_Faulty" value="Faulty"
                                                                {{ in_array('Faulty', old('mirrors.mirror_electronics', $selectedForm->mirrors['mirror_electronics'] ?? $form->mirrors['mirror_electronics'] ?? [])) ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="mirrors_mirror_electronics_Faulty">
                                                                    Faulty
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="mirrors_mirror_glass">Mirror glass</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="mirrors[mirror_glass]" id="mirrors_mirror_glass_One_scratch_or_missing" value="One scratched or missing"
                                                                {{ old('mirrors.mirror_glass', $selectedForm->mirrors['mirror_glass'] ?? $form->mirrors['mirror_glass'] ?? '') == 'One scratched or missing' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="mirrors_mirror_glass_One_scratch_or_missing">
                                                                    One scratched or missing
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="mirrors[mirror_glass]" id="mirrors_mirror_glass_Both_scratch_or_missing" value="Both scratched or missing"
                                                                {{ old('mirrors.mirror_glass', $selectedForm->mirrors['mirror_glass'] ?? $form->mirrors['mirror_glass'] ?? '') == 'Both scratched or missing' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="mirrors_mirror_glass_Both_scratch_or_missing">
                                                                    Both scratched or missing
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="mirrors_mirror_cover">Mirror cover</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="mirrors[mirror_cover]" id="mirrors_mirror_cover_One_scratch_or_missing" value="One scratched or missing"
                                                                {{ old('mirrors.mirror_cover', $selectedForm->mirrors['mirror_cover'] ?? $form->mirrors['mirror_cover'] ?? '') == 'One scratched or missing' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="mirrors_mirror_cover_One_scratch_or_missing">
                                                                    One scratched or missing
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="mirrors[mirror_cover]" id="mirrors_mirror_cover_Both_scratch_or_missing" value="Both scratched or missing"
                                                                {{ old('mirrors.mirror_cover', $selectedForm->mirrors['mirror_cover'] ?? $form->mirrors['mirror_cover'] ?? '') == 'Both scratched or missing' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="mirrors_mirror_cover_Both_scratch_or_missing">
                                                                    Both scratched or missing
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      </div>


                                                </div>

                                                <div class="container mt-4 toggle-section" data-container-id="DashContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Dash Details</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="dash_any_warning_lights">Any warning lights</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="dash[any_warning_lights]" id="dash_any_warning_lights_yes" value="yes"
                                                                {{ old('dash.any_warning_lights', $selectedForm->dash['any_warning_lights'] ?? $form->dash['any_warning_lights'] ?? '') == 'yes' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="dash_any_warning_lights_yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="dash[any_warning_lights]" id="dash_any_warning_lights_no" value="no"
                                                                {{ old('dash.any_warning_lights', $selectedForm->dash['any_warning_lights'] ?? $form->dash['any_warning_lights'] ?? '') == 'no' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="dash_any_warning_lights_no">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div id="DashContainer" style="display: none; margin-top: 10px">
                                                         <div class="row">

                                                            <div class="form-group col-md-4">
                                                                <label for="dash_millage">Millage</label>
                                                                <input type="number" class="form-control" id="dash_millage" name="dash[millage]" value="{{ old('dash.millage', $selectedForm->dash['millage'] ?? $form->dash['millage'] ?? '') }}" />
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="dash_which_dash_light">Which dash light</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="dash[which_dash_light][]" id="dash_which_dash_light_Service_due" value="Service due"
                                                                    {{ in_array('Service due', old('dash.which_dash_light', $selectedForm->dash['which_dash_light'] ?? $form->dash['which_dash_light'] ?? [])) ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="dash_which_dash_light_Service_due">
                                                                        Service due
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="dash[which_dash_light][]" id="dash_which_dash_light_Oil_warning" value="Oil warning"
                                                                    {{ in_array('Oil warning', old('dash.which_dash_light', $selectedForm->dash['which_dash_light'] ?? $form->dash['which_dash_light'] ?? [])) ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="dash_which_dash_light_Oil_warning">
                                                                        Oil warning
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="dash[which_dash_light][]" id="dash_which_dash_light_Engine_management" value="Engine management"
                                                                    {{ in_array('Engine management', old('dash.which_dash_light', $selectedForm->dash['which_dash_light'] ?? $form->dash['which_dash_light'] ?? [])) ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="dash_which_dash_light_Engine_management">
                                                                        Engine management
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="dash[which_dash_light][]" id="dash_which_dash_light_Airbag_warning" value="Airbag warning"
                                                                    {{ in_array('Airbag warning', old('dash.which_dash_light', $selectedForm->dash['which_dash_light'] ?? $form->dash['which_dash_light'] ?? [])) ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="dash_which_dash_light_Airbag_warning">
                                                                        Airbag warning
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="dash[which_dash_light][]" id="dash_which_dash_light_ABS" value="ABS"
                                                                    {{ in_array('ABS', old('dash.which_dash_light', $selectedForm->dash['which_dash_light'] ?? $form->dash['which_dash_light'] ?? [])) ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="dash_which_dash_light_ABS">
                                                                        ABS
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => 'dash[images]',
                                                                    'image' => $selectedForm->dash['images'] ?? '',
                                                                    'id' => Str::uuid(),
                                                                    'title' => 'Images',
                                                                    'colSize' => 'col-md-12 col-sm-6',
                                                                ])
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                               <div class="container mt-4 toggle-section" data-container-id="InteriorContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Interior Details</h4>
                                                    </div>
                                                   <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="interior_damage">Interior damage</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="interior[damage]" id="interior_damage_Yes" value="Yes"
                                                                {{ old('interior.damage', $selectedForm->interior['damage'] ?? $form->interior['damage'] ?? '') == 'Yes' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="interior_damage_Yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="interior[damage]" id="interior_damage_No" value="No"
                                                                {{ old('interior.damage', $selectedForm->interior['damage'] ?? $form->interior['damage'] ?? '') == 'No' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="interior_damage_No">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                   </div>


                                                    <div id="InteriorContainer" style="display: none; margin-top: 10px">
                                                        <div class="row">
                                                             <div class="form-group col-md-6">
                                                                    <label for="interior_what_damage">What damage</label>

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="interior[what_damage][]" id="interior_what_damage_Has_stains" value="Has stains"
                                                                        {{ in_array('Has stains', old('interior.what_damage', $selectedForm->interior['what_damage'] ?? $form->interior['what_damage'] ?? [])) ? 'checked' : '' }} />
                                                                        <label class="form-check-label" for="interior_what_damage_Has_stains">
                                                                            Has stains
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="interior[what_damage][]" id="interior_what_damage_Has_tears" value="Has tears"
                                                                        {{ in_array('Has tears', old('interior.what_damage', $selectedForm->interior['what_damage'] ?? $form->interior['what_damage'] ?? [])) ? 'checked' : '' }} />
                                                                        <label class="form-check-label" for="interior_what_damage_Has_tears">
                                                                            Has tears
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="interior[what_damage][]" id="interior_what_damage_Has_burns" value="Has burns"
                                                                        {{ in_array('Has burns', old('interior.what_damage', $selectedForm->interior['what_damage'] ?? $form->interior['what_damage'] ?? [])) ? 'checked' : '' }} />
                                                                        <label class="form-check-label" for="interior_what_damage_Has_burns">
                                                                            Has burns
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            <div class="form-group col-md-6">
                                                                 @include('admin.partials.image-upload', [
                                                                    'field' => 'interior[images]',
                                                                    'image' => $selectedForm->interior['images'] ?? '',
                                                                    'id' => Str::uuid(),
                                                                    'title' => 'Images',
                                                                    'colSize' => 'col-md-10 col-sm-6',
                                                                ])
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                 <div class="container mt-4 toggle-section" data-container-id="ExteriorContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Exterior Details</h4>
                                                    </div>
                                                   <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="interior_damage">Is Exterior Clean</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="exterior[is_clean]" id="exterior_Yes" value="Yes"
                                                                {{ old('exterior.is_clean', $selectedForm->exterior['is_clean'] ?? $form->exterior['is_clean'] ?? '') == 'Yes' ? 'checked' : '' }}/>
                                                                <label class="form-check-label" for="exterior_Yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="exterior[is_clean]" id="exterior_No" value="No"
                                                                {{ old('exterior.is_clean', $selectedForm->exterior['is_clean'] ?? $form->exterior['is_clean'] ?? '') == 'No' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_No">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                   </div>


                                                    <div id="ExteriorContainer" style="display: none; margin-top: 10px">
                                                        <div class="row">
                                                             <div class="form-group col-md-6">
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => 'exterior[images]',
                                                                    'image' => $selectedForm->exterior['images'] ?? '',
                                                                    'id' => Str::uuid(),
                                                                    'title' => 'Images',
                                                                    'colSize' => 'col-md-10 col-sm-6',
                                                                ])
                                                            </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exterior_image_description">Description</label>
                                                            <textarea class="form-control" name="exterior[image_description]" cols="10" rows="5">{{ old('exterior.image_description', $selectedForm->exterior['image_description'] ?? '') }}</textarea>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="container mt-4 toggle-section" data-container-id="HandbookContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Handbook Details</h4>
                                                    </div>
                                                   <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="interior_damage">Is handbook</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="handbook[is_handbook]" id="is_handbook_Yes" value="Yes"
                                                                {{ old('handbook.is_handbook', $selectedForm->handbook['is_handbook'] ?? $form->handbook['is_handbook'] ?? '') == 'Yes' ? 'checked' : '' }}/>
                                                                <label class="form-check-label" for="exterior_Yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="handbook[is_handbook]" id="is_handbook_No" value="No"
                                                                {{ old('handbook.is_handbook', $selectedForm->handbook['is_handbook'] ?? $form->handbook['is_handbook'] ?? '') == 'No' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_No">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                   </div>

                                                    <div id="HandbookContainer" style="display: none; margin-top: 10px">
                                                        <div class="row">
                                                             <div class="form-group col-md-6">
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => 'handbook[images]',
                                                                    'image' => $selectedForm->handbook['images'] ?? '',
                                                                    'id' => Str::uuid(),
                                                                    'title' => 'Images',
                                                                    'colSize' => 'col-md-10 col-sm-6',
                                                                ])
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="handbook_image_description">Image description</label>
                                                                <textarea class="form-control" name="handbook[image_description]" cols="10" rows="5">{{ old('handbook.image_description', $selectedForm->handbook['image_description'] ?? '') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="container mt-4 toggle-section" data-container-id="SpareWheelContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Spare wheel Details</h4>
                                                    </div>
                                                   <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="interior_damage">Is spare wheel</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="spare_wheel[is_spare_wheel]" id="is_handbook_Yes" value="Yes"
                                                                {{ old('spare_wheel.is_spare_wheel', $selectedForm->spare_wheel['is_spare_wheel'] ?? $form->spare_wheel['is_spare_wheel'] ?? '') == 'Yes' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_Yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="spare_wheel[is_spare_wheel]" id="is_handbook_No" value="No"
                                                                {{ old('spare_wheel.is_spare_wheel', $selectedForm->spare_wheel['is_spare_wheel'] ?? $form->spare_wheel['is_spare_wheel'] ?? '') == 'No' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_No">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                   </div>

                                                    <div id="SpareWheelContainer" style="display: none; margin-top: 10px">
                                                        <div class="row">
                                                             <div class="form-group col-md-6">
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => 'spare_wheel[images]',
                                                                    'image' => $selectedForm->spare_wheel['images'] ?? '',
                                                                    'id' => Str::uuid(),
                                                                    'title' => 'Images',
                                                                    'colSize' => 'col-md-10 col-sm-6',
                                                                ])
                                                             </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="spare_wheel_image_description">Description</label>
                                                            <textarea class="form-control" name="spare_wheel[image_description]" cols="10" rows="5">{{ old('spare_wheel.image_description', $selectedForm->spare_wheel['image_description'] ?? '') }}</textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="container mt-4 toggle-section" data-container-id="FuelCapContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Fuel Cap Details</h4>
                                                    </div>
                                                   <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="interior_damage">Is Fuel Cap</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="fuel_cap[is_fuel_cap]" id="is_handbook_Yes" value="Yes"
                                                                {{ old('fuel_cap.is_fuel_cap', $selectedForm->fuel_cap['is_fuel_cap'] ?? $form->fuel_cap['is_fuel_cap'] ?? '') == 'Yes' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_Yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="fuel_cap[is_fuel_cap]" id="is_handbook_No" value="No"
                                                                {{ old('fuel_cap.is_fuel_cap', $selectedForm->fuel_cap['is_fuel_cap'] ?? $form->fuel_cap['is_fuel_cap'] ?? '') == 'No' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_No">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                   </div>

                                                    <div id="FuelCapContainer" style="display: none; margin-top: 10px">
                                                        <div class="row">
                                                             <div class="form-group col-md-6">
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => 'fuel_cap[images]',
                                                                    'image' => $selectedForm->fuel_cap['images'] ?? '',
                                                                    'id' => Str::uuid(),
                                                                    'title' => 'Images',
                                                                    'colSize' => 'col-md-10 col-sm-6',
                                                                ])
                                                           </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="fuel_cap_image_description">Description</label>
                                                                <textarea class="form-control" name="fuel_cap[image_description]" cols="10" rows="5">{{ old('fuel_cap.image_description', $selectedForm->fuel_cap['image_description'] ?? '') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="container mt-4 toggle-section" data-container-id="AerialContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Aerial Details</h4>
                                                    </div>
                                                   <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="interior_damage">Is Aerial</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="aerial[is_aerial]" id="is_handbook_Yes" value="Yes"
                                                                {{ old('aerial.is_aerial', $selectedForm->aerial['is_aerial'] ?? $form->aerial['is_aerial'] ?? '') == 'Yes' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_Yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="aerial[is_aerial]" id="is_handbook_No" value="No"
                                                                {{ old('aerial.is_aerial', $selectedForm->aerial['is_aerial'] ?? $form->aerial['is_aerial'] ?? '') == 'No' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_No">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                   </div>

                                                    <div id="AerialContainer" style="display: none; margin-top: 10px">
                                                        <div class="row">
                                                             <div class="form-group col-md-6">
                                                                    @include('admin.partials.image-upload', [
                                                                        'field' => 'aerial[images]',
                                                                        'image' => $selectedForm->aerial['images'] ?? '',
                                                                        'id' => Str::uuid(),
                                                                        'title' => 'Images',
                                                                        'colSize' => 'col-md-10 col-sm-6',
                                                                    ])
                                                               </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="aerial_image_description">Description</label>
                                                                <textarea class="form-control" name="aerial[image_description]" cols="10" rows="5">{{ old('aerial.image_description', $selectedForm->aerial['image_description'] ?? '') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="container mt-4 toggle-section" data-container-id="FloorMatContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Floor Mats Details</h4>
                                                    </div>
                                                   <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="interior_damage">Is Floor Mat</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="floor_mats[is_floor_mats]" id="is_handbook_Yes" value="Yes"
                                                                {{ old('floor_mats.is_floor_mats', $selectedForm->floor_mats['is_floor_mats'] ?? $form->floor_mats['is_floor_mats'] ?? '') == 'Yes' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_Yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="floor_mats[is_floor_mats]" id="is_handbook_No" value="No"
                                                                {{ old('floor_mats.is_floor_mats', $selectedForm->floor_mats['is_floor_mats'] ?? $form->floor_mats['is_floor_mats'] ?? '') == 'No' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_No">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                   </div>

                                                    <div id="FloorMatContainer" style="display: none; margin-top: 10px">
                                                        <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    @include('admin.partials.image-upload', [
                                                                        'field' => 'floor_mats[images]',
                                                                        'image' => $selectedForm->floor_mats['images'] ?? '',
                                                                        'id' => Str::uuid(),
                                                                        'title' => 'Images',
                                                                        'colSize' => 'col-md-10 col-sm-6',
                                                                    ])
                                                             </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="floor_mats_image_description">Description</label>
                                                                <textarea class="form-control" name="floor_mats[image_description]" cols="10" rows="5">{{ old('floor_mats.image_description', $selectedForm->floor_mats['image_description'] ?? '') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="container mt-4 toggle-section" data-container-id="ToolsContainer">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Tools Details</h4>
                                                    </div>
                                                   <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="interior_damage">Is Floor Mat</label>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="tools[is_tools]" id="is_handbook_Yes" value="Yes"
                                                                {{ old('tools.is_tools', $selectedForm->tools['is_tools'] ?? $form->tools['is_tools'] ?? '') == 'Yes' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="exterior_Yes">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="tools[is_tools]" id="is_handbook_No" value="No"
                                                                {{ old('tools.is_tools', $selectedForm->tools['is_tools'] ?? $form->tools['is_tools'] ?? '') == 'No' ? 'checked' : '' }}/>
                                                                <label class="form-check-label" for="exterior_No">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                   </div>

                                                    <div id="ToolsContainer" style="display: none; margin-top: 10px">
                                                        <div class="row">
                                                               <div class="form-group col-md-6">
                                                                @include('admin.partials.image-upload', [
                                                                    'field' => 'tools[images]',
                                                                    'image' => $selectedForm->tools['images'] ?? '',
                                                                    'id' => Str::uuid(),
                                                                    'title' => 'Images',
                                                                    'colSize' => 'col-md-10 col-sm-6',
                                                                ])
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="tools_image_description">Description</label>
                                                                <textarea class="form-control" name="tools[image_description]" cols="10" rows="5">{{ old('tools.image_description', $selectedForm->tools['image_description'] ?? '') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="container-fluid mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Signature Details</h4>
                                                    </div>

                                                    <div class="row">
                                                   <div class="form-group col-md-4">
                                                        @include('admin.partials.image-upload', [
                                                            'field' => 'signature[signature]',
                                                            'image' => $selectedForm->signature['signature'] ?? '',
                                                            'id' => Str::uuid(),
                                                            'title' => 'Images',
                                                            'colSize' => 'col-md-5 col-sm-6',
                                                        ])
                                                 </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="signature_document_date">Document date</label>
                                                        <input type="date" class="form-control" id="signature_document_date" name="signature[document_date]" value="{{ old('signature.document_date', $selectedForm->signature['document_date'] ?? '') }}" />
                                                    </div>
                                                </div>

                                                </div>

                                                <div class="form-group mt-3">
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

    <script>
    function toggleSection(show, containerId) {
        const container = document.getElementById(containerId);
        container.style.display = show ? 'block' : 'none';
    }

    // Initialize the visibility of the sections based on the current selection
    window.onload = function() {
        const sections = document.querySelectorAll('.toggle-section');

        sections.forEach(function(section) {
            const selectedRadio = section.querySelector('input[type="radio"]:checked');
            const isDamageSelected = selectedRadio ? selectedRadio.value.toLowerCase() === 'yes' : false;
            toggleSection(isDamageSelected, section.dataset.containerId);

            // Add event listeners for changes
            const radioButtons = section.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    const show = this.value.toLowerCase() === 'yes';
                    toggleSection(show, section.dataset.containerId);
                });
            });
        });
    };
</script>



{{--<script>--}}
{{--    function toggleSection(show, containerId) {--}}
{{--    const container = document.getElementById(containerId);--}}
{{--    container.style.display = show ? 'block' : 'none';--}}
{{--    }--}}

{{--    // Initialize the visibility of the sections based on the current selection--}}
{{--    window.onload = function() {--}}
{{--        const sections = document.querySelectorAll('.toggle-section');--}}

{{--        sections.forEach(function(section) {--}}
{{--            const isDamageSelected = section.querySelector('input[type="radio"]:checked').value === 'Yes';--}}
{{--            toggleSection(isDamageSelected, section.dataset.containerId);--}}

{{--            // Add event listeners for changes--}}
{{--            const radioButtons = section.querySelectorAll('input[type="radio"]');--}}
{{--            radioButtons.forEach(function(radio) {--}}
{{--                radio.addEventListener('change', function() {--}}
{{--                    const show = this.value === 'Yes';--}}
{{--                    toggleSection(show, section.dataset.containerId);--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    };--}}

{{--</script>--}}
@endsection
