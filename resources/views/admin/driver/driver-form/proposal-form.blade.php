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
                                    <h4 class="title nk-block-title">Proposal Form</h4>
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
                                                </div>

                                                <div class="container">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Customer Detail</h4>
                                                    </div>
                                                     <div class="row">
                                                    <div class="form-group col-md-4">
                                                    <label for="first_name">First name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           name="personal_details[first_name]"
                                                           value="{{ old('personal_details.first_name', $form->personal_details['first_name'] ?? '') }}" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="last_name">Last name</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           name="personal_details[last_name]"
                                                           value="{{ old('personal_details.last_name', $form->personal_details['last_name'] ?? '') }}" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                           name="personal_details[email]"
                                                           value="{{ old('personal_details.email', $form->personal_details['email'] ?? '') }}" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone"
                                                           name="personal_details[phone]"
                                                           value="{{ old('personal_details.phone', $form->personal_details['phone'] ?? '') }}" required>
                                                </div>
                                                 <div class="form-group col-md-4">
                                                    <label for="work_phone">Work phone</label>
                                                    <input type="text" class="form-control bg" id="work_phone" name="personal_details[work_phone]"
                                                           value="{{ old('personal_details.work_phone', $selectedForm->personal_details['work_phone'] ?? $form->personal_details['work_phone'] ?? '') }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="hire_type">Hire type</label>
                                                    <select class="form-control" id="hire_type" name="personal_details[hire_type]">
                                                        <option value="Social Domestic" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Social Domestic' ? 'selected' : '' }}>Social Domestic</option>
                                                        <option value="Rent to Buy" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Rent to Buy' ? 'selected' : '' }}>Rent to Buy</option>
                                                        <option value="Credit Hire" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Credit Hire' ? 'selected' : '' }}>Credit Hire</option>
                                                        <option value="Insurance" {{ old('personal_details.hire_type', $form->personal_details['hire_type'] ?? '') == 'Insurance' ? 'selected' : '' }}>Insurance</option>
                                                    </select>
                                                </div>

                                                          <div class="form-group col-md-4">
                                                            <label for="ni_number">Ni number</label>
                                                            <input type="text" class="form-control" id="ni_number"
                                                                   name="personal_details[ni_number]" value="{{ old('personal_details.ni_number', $form->personal_details['ni_number'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="occupation">Occupation</label>
                                                            <input type="text" class="form-control" id="occupation"
                                                                  name="personal_details[occupation]" value="{{ old('personal_details.occupation', $form->personal_details['occupation'] ?? '') }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="how_long_resident_in_uk">How long resident in
                                                                uk</label>
                                                            <input type="text" class="form-control"
                                                                   id="how_long_resident_in_uk"
                                                                   name="personal_details[how_long_resident_in_uk]" value="{{ old('personal_details.how_long_resident_in_uk', $form->personal_details['how_long_resident_in_uk'] ?? '') }}">
                                                        </div>

                                                </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Address Details</h4>
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
                                                        <div class="form-group col-md-4" id="form-group-country"
                                                             style="">
                                                            <label for="country">Country</label>
                                                              <select class="form-control" id="country" name="address[country]">
                                                                @php
                                                                    $selectedCountry = old('address.country', $selectedForm->address['country'] ?? '');
                                                                @endphp

                                                                 <option value="United Kingdom" {{ $selectedCountry == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
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
                                                        <h4 class="title nk-block-title">Drivers License Details</h4>
                                                    </div>

                                                   <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="license_type">License type</label>
                                                        <select class="form-control" id="license_type" name="drivers_license[license_type]" >
                                                            <option value="Full UK" {{ old('drivers_license.license_type', $selectedForm->drivers_license['license_type'] ?? $form->drivers_license['license_type'] ?? '') == 'Full UK' ? 'selected' : '' }}>Full UK</option>
                                                            <option value="Provisional UK" {{ old('drivers_license.license_type', $selectedForm->drivers_license['license_type'] ?? $form->drivers_license['license_type'] ?? '') == 'Provisional UK' ? 'selected' : '' }}>Provisional UK</option>
                                                            <option value="EU" {{ old('drivers_license.license_type', $selectedForm->drivers_license['license_type'] ?? $form->drivers_license['license_type'] ?? '') == 'EU' ? 'selected' : '' }}>EU</option>
                                                            <option value="International" {{ old('drivers_license.license_type', $selectedForm->drivers_license['license_type'] ?? $form->drivers_license['license_type'] ?? '') == 'International' ? 'selected' : '' }}>International</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="license_number">License number</label>
                                                        <input type="text" class="form-control" id="license_number" name="drivers_license[license_number]"
                                                               value="{{ old('drivers_license.license_number', $selectedForm->drivers_license['license_number'] ?? $form->drivers_license['license_number'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="license_issue_date">License issue date</label>
                                                        <input type="date" class="form-control" id="license_issue_date" name="drivers_license[license_issue_date]"
                                                               value="{{ old('drivers_license.license_issue_date', $selectedForm->drivers_license['license_issue_date'] ?? $form->drivers_license['license_issue_date'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="license_expire_date">License expire date</label>
                                                        <input type="date" class="form-control" id="license_expire_date" name="drivers_license[license_expire_date]"
                                                               value="{{ old('drivers_license.license_expire_date', $selectedForm->drivers_license['license_expire_date'] ?? $form->drivers_license['license_expire_date'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="date_driving_test_passed">Date driving test passed</label>
                                                        <input type="date" class="form-control" id="date_driving_test_passed" name="drivers_license[date_driving_test_passed]"
                                                               value="{{ old('drivers_license.date_driving_test_passed', $selectedForm->drivers_license['date_driving_test_passed'] ?? $form->drivers_license['date_driving_test_passed'] ?? '') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="dvla_check_code">Dvla check code</label>
                                                        <input type="text" class="form-control" id="dvla_check_code" name="drivers_license[dvla_check_code]"
                                                               value="{{ old('drivers_license.dvla_check_code', $selectedForm->drivers_license['dvla_check_code'] ?? $form->drivers_license['dvla_check_code'] ?? '') }}">
                                                    </div>
                                                </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Taxi License Details</h4>
                                                    </div>

                                                   <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="is_driver_hold_taxi_licence">Is driver hold taxi licence</label>
                                                            <select class="form-control" id="is_driver_hold_taxi_licence" name="taxi_license[is_driver_hold_taxi_licence]" >
                                                                <option value="Yes" {{ old('taxi_license.is_driver_hold_taxi_licence', $selectedForm->taxi_license['is_driver_hold_taxi_licence'] ?? $form->taxi_license['is_driver_hold_taxi_licence'] ?? '') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                                <option value="No" {{ old('taxi_license.is_driver_hold_taxi_licence', $selectedForm->taxi_license['is_driver_hold_taxi_licence'] ?? $form->taxi_license['is_driver_hold_taxi_licence'] ?? '') == 'No' ? 'selected' : '' }}>No</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="issuing_authority">Issuing authority</label>
                                                            <input type="text" class="form-control" id="issuing_authority" name="taxi_license[issuing_authority]"
                                                                   value="{{ old('taxi_license.issuing_authority', $selectedForm->taxi_license['issuing_authority'] ?? $form->taxi_license['issuing_authority'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="how_long">How long</label>
                                                            <input type="date" class="form-control" id="how_long" name="taxi_license[how_long]"
                                                                   value="{{ old('taxi_license.how_long', $selectedForm->taxi_license['how_long'] ?? $form->taxi_license['how_long'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="how_long_resident_in_uk">How long resident in uk</label>
                                                            <input type="date" class="form-control" id="how_long_resident_in_uk" name="taxi_license[how_long_resident_in_uk]"
                                                                   value="{{ old('taxi_license.how_long_resident_in_uk', $selectedForm->taxi_license['how_long_resident_in_uk'] ?? $form->taxi_license['how_long_resident_in_uk'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="license_number">License number</label>
                                                            <input type="text" class="form-control" id="license_number" name="taxi_license[license_number]"
                                                                   value="{{ old('taxi_license.license_number', $selectedForm->taxi_license['license_number'] ?? $form->taxi_license['license_number'] ?? '') }}" >
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Claim Details</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="accident_claim">Accident claim</label>
                                                            <select class="form-control" id="accident_claim" name="claim[accident_claim]" >
                                                                <option value="Yes" {{ old('claim.accident_claim', $selectedForm->claim['accident_claim'] ?? $form->claim['accident_claim'] ?? '') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                                <option value="No" {{ old('claim.accident_claim', $selectedForm->claim['accident_claim'] ?? $form->claim['accident_claim'] ?? '') == 'No' ? 'selected' : '' }}>No</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="number_of_claim">Number of claim</label>
                                                            <input type="number" class="form-control" id="number_of_claim" name="claim[number_of_claim]"
                                                                   value="{{ old('claim.number_of_claim', $selectedForm->claim['number_of_claim'] ?? $form->claim['number_of_claim'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="type_of_claim">Type of claim</label>
                                                            <select class="form-control" id="type_of_claim" name="claim[type_of_claim]" >
                                                                <option value="Fault" {{ old('claim.type_of_claim', $selectedForm->claim['type_of_claim'] ?? $form->claim['type_of_claim'] ?? '') == 'Fault' ? 'selected' : '' }}>Fault</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="status">Status</label>
                                                            <select class="form-control" id="status" name="claim[status]" >
                                                                <option value="Open" {{ old('claim.status', $selectedForm->claim['status'] ?? $form->claim['status'] ?? '') == 'Open' ? 'selected' : '' }}>Open</option>
                                                                <option value="Closed" {{ old('claim.status', $selectedForm->claim['status'] ?? $form->claim['status'] ?? '') == 'Closed' ? 'selected' : '' }}>Closed</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="claim_date">Claim date</label>
                                                            <input type="date" class="form-control" id="claim_date" name="claim[claim_date]"
                                                                   value="{{ old('claim.claim_date', $selectedForm->claim['claim_date'] ?? $form->claim['claim_date'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="claim_time">Claim time</label>
                                                            <input type="time" class="form-control" id="claim_time" name="claim[claim_time]"
                                                                   value="{{ old('claim.claim_time', $selectedForm->claim['claim_time'] ?? $form->claim['claim_time'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="describe_incident_circumstances">Describe incident circumstances</label>
                                                            <input type="text" class="form-control" id="describe_incident_circumstances" name="claim[describe_incident_circumstances]"
                                                                   value="{{ old('claim.describe_incident_circumstances', $selectedForm->claim['describe_incident_circumstances'] ?? $form->claim['describe_incident_circumstances'] ?? '') }}" >
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Convictions Details</h4>
                                                    </div>

                                                   <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="motoring_convictions">Motoring convictions</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                       name="convictions[motoring_convictions]"
                                                                       id="motoring_convictions_Yes" value="Yes"
                                                                       {{ old('convictions.motoring_convictions', $selectedForm->convictions['motoring_convictions'] ?? $form->convictions['motoring_convictions'] ?? '') == 'Yes' ? 'checked' : '' }} >
                                                                <label class="form-check-label" for="motoring_convictions_Yes">Yes</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                       name="convictions[motoring_convictions]"
                                                                       id="motoring_convictions_No" value="No"
                                                                       {{ old('convictions.motoring_convictions', $selectedForm->convictions['motoring_convictions'] ?? $form->convictions['motoring_convictions'] ?? '') == 'No' ? 'checked' : '' }} >
                                                                <label class="form-check-label" for="motoring_convictions_No">No</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="number_of_motoring_convictions">Number of motoring convictions</label>
                                                            <input type="number" class="form-control"
                                                                   id="number_of_motoring_convictions"
                                                                   name="convictions[number_of_motoring_convictions]"
                                                                   value="{{ old('convictions.number_of_motoring_convictions', $selectedForm->convictions['number_of_motoring_convictions'] ?? $form->convictions['number_of_motoring_convictions'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="conviction_code">Conviction code</label>
                                                            <input type="text" class="form-control"
                                                                   id="conviction_code"
                                                                   name="convictions[conviction_code]"
                                                                   value="{{ old('convictions.conviction_code', $selectedForm->convictions['conviction_code'] ?? $form->convictions['conviction_code'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="penalty_points">Penalty points</label>
                                                            <input type="number" class="form-control"
                                                                   id="penalty_points"
                                                                   name="convictions[penalty_points]"
                                                                   value="{{ old('convictions.penalty_points', $selectedForm->convictions['penalty_points'] ?? $form->convictions['penalty_points'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="conviction_date">Conviction date</label>
                                                            <input type="date" class="form-control"
                                                                   id="conviction_date"
                                                                   name="convictions[conviction_date]"
                                                                   value="{{ old('convictions.conviction_date', $selectedForm->convictions['conviction_date'] ?? $form->convictions['conviction_date'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="expiry_date">Expiry date</label>
                                                            <input type="date" class="form-control"
                                                                   id="expiry_date"
                                                                   name="convictions[expiry_date]"
                                                                   value="{{ old('convictions.expiry_date', $selectedForm->convictions['expiry_date'] ?? $form->convictions['expiry_date'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="criminal_conviction">Criminal conviction</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                       name="convictions[criminal_conviction]"
                                                                       id="criminal_conviction_Yes" value="Yes"
                                                                       {{ old('convictions.criminal_conviction', $selectedForm->convictions['criminal_conviction'] ?? $form->convictions['criminal_conviction'] ?? '') == 'Yes' ? 'checked' : '' }} >
                                                                <label class="form-check-label" for="criminal_conviction_Yes">Yes</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                       name="convictions[criminal_conviction]"
                                                                       id="criminal_conviction_No" value="No"
                                                                       {{ old('convictions.criminal_conviction', $selectedForm->convictions['criminal_conviction'] ?? $form->convictions['criminal_conviction'] ?? '') == 'No' ? 'checked' : '' }} >
                                                                <label class="form-check-label" for="criminal_conviction_No">No</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="number_of_criminal_convictions">Number of criminal convictions</label>
                                                            <input type="number" class="form-control"
                                                                   id="number_of_criminal_convictions"
                                                                   name="convictions[number_of_criminal_convictions]"
                                                                   value="{{ old('convictions.number_of_criminal_convictions', $selectedForm->convictions['number_of_criminal_convictions'] ?? $form->convictions['number_of_criminal_convictions'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="describe_conviction">Describe conviction</label>
                                                            <textarea class="form-control" name="convictions[describe_conviction]"
                                                                      cols="10" rows="5"
                                                                      >{{ old('convictions.describe_conviction', $selectedForm->convictions['describe_conviction'] ?? $form->convictions['describe_conviction'] ?? '') }}</textarea>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="ever_been_refused_motor_insurance">Ever been refused motor insurance</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                       name="convictions[ever_been_refused_motor_insurance]"
                                                                       id="ever_been_refused_motor_insurance_Yes" value="Yes"
                                                                       {{ old('convictions.ever_been_refused_motor_insurance', $selectedForm->convictions['ever_been_refused_motor_insurance'] ?? $form->convictions['ever_been_refused_motor_insurance'] ?? '') == 'Yes' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="ever_been_refused_motor_insurance_Yes">Yes</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                       name="convictions[ever_been_refused_motor_insurance]"
                                                                       id="ever_been_refused_motor_insurance_No" value="No"
                                                                       {{ old('convictions.ever_been_refused_motor_insurance', $selectedForm->convictions['ever_been_refused_motor_insurance'] ?? $form->convictions['ever_been_refused_motor_insurance'] ?? '') == 'No' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="ever_been_refused_motor_insurance_No">No</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="number_of_refusals">Number of refusals</label>
                                                            <input type="number" class="form-control"
                                                                   id="number_of_refusals"
                                                                   name="convictions[number_of_refusals]"
                                                                   value="{{ old('convictions.number_of_refusals', $selectedForm->convictions['number_of_refusals'] ?? $form->convictions['number_of_refusals'] ?? '') }}" >
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="describe_refusals">Describe refusals</label>
                                                            <textarea class="form-control" name="convictions[describe_refusals]"
                                                                      cols="10" rows="5"
                                                                      >{{ old('convictions.describe_refusals', $selectedForm->convictions['describe_refusals'] ?? $form->convictions['describe_refusals'] ?? '') }}</textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Vehicle Details</h4>
                                                    </div>

                                                   <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="vehicle_reg_number">Vehicle Registration Number</label>
                                                        <input type="text" class="form-control"
                                                               id="vehicle_reg_number" name="vehicle[registration_number]"
                                                               value="{{ old('vehicle.registration_number', $selectedForm->vehicle['registration_number'] ?? $form->vehicle['registration_number'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="vehicle_make">Vehicle make</label>
                                                        <input type="text" class="form-control" id="vehicle_make"
                                                               name="vehicle[car_make]"
                                                               value="{{ old('vehicle.car_make', $selectedForm->vehicle['car_make'] ?? $form->vehicle['car_make'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="vehicle_model">Vehicle model</label>
                                                        <input type="text" class="form-control" id="vehicle_model"
                                                               name="vehicle[car_model]"
                                                               value="{{ old('vehicle.car_model', $selectedForm->vehicle['car_model'] ?? $form->vehicle['car_model'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="number_of_seat">Number of seats</label>
                                                        <input type="text" class="form-control" id="number_of_seat"
                                                               name="vehicle[number_of_seat]"
                                                               value="{{ old('vehicle.number_of_seat', $selectedForm->vehicle['number_of_seat'] ?? $form->vehicle['number_of_seat'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="year">Year</label>
                                                        <input type="text" class="form-control" id="year"
                                                               name="vehicle[year]"
                                                               value="{{ old('vehicle.year', $selectedForm->vehicle['year'] ?? $form->vehicle['year'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="engine_size">Engine size</label>
                                                        <input type="text" class="form-control" id="engine_size"
                                                               name="vehicle[engine_size]"
                                                               value="{{ old('vehicle.engine_size', $selectedForm->vehicle['engine_size'] ?? $form->vehicle['engine_size'] ?? '') }}" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="current_value">Current value</label>
                                                        <input type="text" class="form-control" id="current_value"
                                                               name="vehicle[current_value]"
                                                               value="{{ old('vehicle.current_value', $selectedForm->vehicle['current_value'] ?? $form->vehicle['current_value'] ?? '') }}" >
                                                    </div>
                                                </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Level of cover Details</h4>
                                                    </div>

                                                    <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="level_of_cover">Level of cover</label>
                                                        <select class="form-control" id="level_of_cover"
                                                                name="level_of_cover[level_cover]" >
                                                            <option value="Fully comprehensive"
                                                                {{ old('level_of_cover.level_cover', $selectedForm->level_of_cover['level_cover'] ?? $form->level_of_cover['level_cover'] ?? '') == 'Fully comprehensive' ? 'selected' : '' }}>
                                                                Fully comprehensive
                                                            </option>
                                                            <option value="Third part only"
                                                                {{ old('level_of_cover.level_cover', $selectedForm->level_of_cover['level_cover'] ?? $form->level_of_cover['level_cover'] ?? '') == 'Third part only' ? 'selected' : '' }}>
                                                                Third part only
                                                            </option>
                                                            <option value="Third party fire and theft"
                                                                {{ old('level_of_cover.level_cover', $selectedForm->level_of_cover['level_cover'] ?? $form->level_of_cover['level_cover'] ?? '') == 'Third party fire and theft' ? 'selected' : '' }}>
                                                                Third party fire and theft
                                                            </option>
                                                            <option value="Social domestic and pleasure"
                                                                {{ old('level_of_cover.level_cover', $selectedForm->level_of_cover['level_cover'] ?? $form->level_of_cover['level_cover'] ?? '') == 'Social domestic and pleasure' ? 'selected' : '' }}>
                                                                Social domestic and pleasure
                                                            </option>
                                                            <option value="Credit hire"
                                                                {{ old('level_of_cover.level_cover', $selectedForm->level_of_cover['level_cover'] ?? $form->level_of_cover['level_cover'] ?? '') == 'Credit hire' ? 'selected' : '' }}>
                                                                Credit hire
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Use of vehicle Details</h4>
                                                    </div>

                                                   <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="level_of_cover">Level of cover</label>
                                                            <select class="form-control" id="level_of_cover"
                                                                    name="level_of_cover[vehicle_use_cover]" >
                                                                <option value="Fully comprehensive"
                                                                    {{ old('level_of_cover.vehicle_use_cover', $selectedForm->level_of_cover['vehicle_use_cover'] ?? $form->level_of_cover['vehicle_use_cover'] ?? '') == 'Fully comprehensive' ? 'selected' : '' }}>
                                                                    Fully comprehensive
                                                                </option>
                                                                <option value="Third part only"
                                                                    {{ old('level_of_cover.vehicle_use_cover', $selectedForm->level_of_cover['vehicle_use_cover'] ?? $form->level_of_cover['vehicle_use_cover'] ?? '') == 'Third part only' ? 'selected' : '' }}>
                                                                    Third part only
                                                                </option>
                                                                <option value="Third party fire and theft"
                                                                    {{ old('level_of_cover.vehicle_use_cover', $selectedForm->level_of_cover['vehicle_use_cover'] ?? $form->level_of_cover['vehicle_use_cover'] ?? '') == 'Third party fire and theft' ? 'selected' : '' }}>
                                                                    Third party fire and theft
                                                                </option>
                                                                <option value="Social domestic and pleasure"
                                                                    {{ old('level_of_cover.vehicle_use_cover', $selectedForm->level_of_cover['vehicle_use_cover'] ?? $form->level_of_cover['vehicle_use_cover'] ?? '') == 'Social domestic and pleasure' ? 'selected' : '' }}>
                                                                    Social domestic and pleasure
                                                                </option>
                                                                <option value="Credit hire"
                                                                    {{ old('level_of_cover.vehicle_use_cover', $selectedForm->level_of_cover['vehicle_use_cover'] ?? $form->level_of_cover['vehicle_use_cover'] ?? '') == 'Credit hire' ? 'selected' : '' }}>
                                                                    Credit hire
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="container mt-4">
                                                    <div class="mb-4">
                                                        <h4 class="title nk-block-title">Supporting Documents</h4>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <div class="col-md-5 col-sm-6">
                                                                    @include('admin.partials.image-upload', [
                                                                        'field' => 'documents[driving_license_front]',
                                                                        'image' => $selectedForm->documents['driving_license_front'] ?? $form->documents['driving_license_front'] ?? '',
                                                                        'id' => 'file' . Str::uuid(),
                                                                        'title' => 'Driving License Front',
                                                                        'colSize' => 'col-md-12 col-sm-6',
                                                                        ])

                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <div class="col-md-5 col-sm-6">
                                                                    @include('admin.partials.image-upload', [
                                                                        'field' => 'documents[driving_license_back]',
                                                                        'image' => $selectedForm->documents['driving_license_back'] ?? $form->documents['driving_license_back'] ?? '',
                                                                        'id' => 'file' . Str::uuid(),
                                                                        'title' => 'Driving License Back',
                                                                        'colSize' => 'col-md-12 col-sm-6',
                                                                        ])

                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <div class="col-md-5 col-sm-6">
                                                                    @include('admin.partials.image-upload', [
                                                                        'field' => 'documents[proof_of_address]',
                                                                        'image' => $selectedForm->documents['proof_of_address'] ?? $form->documents['proof_of_address'] ?? '',
                                                                        'id' => 'file' . Str::uuid(),
                                                                        'title' => 'Proof Of Address',
                                                                        'colSize' => 'col-md-12 col-sm-6',
                                                                        ])

                                                            </div>

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="col-md-5 col-sm-6">
                                                                    @include('admin.partials.image-upload', [
                                                                        'field' => 'documents[license_summery_sheet]',
                                                                        'image' => $selectedForm->documents['license_summery_sheet'] ?? $form->documents['license_summery_sheet'] ?? '',
                                                                        'id' => 'file' . Str::uuid(),
                                                                        'title' => 'License summery sheet',
                                                                        'colSize' => 'col-md-12 col-sm-6',
                                                                        ])

                                                            </div>

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

@endsection
