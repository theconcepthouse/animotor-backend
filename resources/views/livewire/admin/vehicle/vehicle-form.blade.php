

<div class="nk-block nk-block-lg">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content ">
{{--            <h4 class="title nk-block-title">{{ 'Editing ' .$car->title  }} {{ $steps[$step - 1] }}</h4>--}}
          @if($step > 1)
                <h4 wire:click="goBack" class="title nk-block-title" style="cursor: pointer">
                    <img src="{{ asset('assets/img/icons/arrow-left.png') }}" />
                    {{ $steps[$step - 1] }}
                </h4>
          @endif

        </div>

        <div class="nk-block-head-content">
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.vehicle.index') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.vehicle.index') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
        </div>

    </div>
    <div class="row g-gs">

        <div class="col-lg-12">
            <div class="card card-bordered- h-100">
                <div class="card-inner">

                    <form method="post" wire:submit.prevent="saveVehicleDetails" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div style="background: transparent" class="step-form">
                                    @foreach($steps as $item)
                                        <div wire:key="{{ $item }}" wire:click="setStep({{ $loop->index + 1 }})"
                                             class="step {{ $step > $loop->index + 1 ? 'prev' : '' }} {{ $step == $loop->index + 1 ? 'active' : '' }}">
                                            @if($step > $loop->index + 1)
                                                <img class="step_img" src="{{ asset('admin/assets/images/mark.png') }}" style="height: 30px"/>
                                            @else
                                                <p>{{ $item }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{--    {{ $step }}--}}
                        <div class="card card-">
                              <div class="card-inner">
                                  <div class="preview-block ">
                                      @if($step == 1)
                                          <h4 class="text-center">Vehicle Details</h4>
                                        <div wire:key="1" class="row mt-3 gy-4">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="vehicleName" class="form-label">Vehicle name</label>
                                                    <input type="text" class="form-control" id="vehicleName" placeholder="" wire:model="vehicle_details.vehicle_name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="registrationNumber" class="form-label">Registration Number</label>
                                                    <input type="text" class="form-control" id="registrationNumber" placeholder="" wire:model="vehicle_details.registration_number">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="make" class="form-label">Make</label>
                                                    <input type="text" class="form-control" id="make" placeholder="" wire:model="vehicle_details.make">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="model" class="form-label">Model</label>
                                                    <input type="text" class="form-control" id="model" placeholder="" wire:model="vehicle_details.model">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="mileage" class="form-label">Mileage</label>
                                                    <input type="number" class="form-control" id="mileage" placeholder="" wire:model="vehicle_details.mileage">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="licenseNumber" class="form-label">License number</label>
                                                    <input type="text" class="form-control" id="licenseNumber" placeholder="" wire:model="vehicle_details.license_number">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="trackerNumber" class="form-label">Tracker number</label>
                                                    <input type="text" class="form-control" id="trackerNumber" placeholder="" wire:model="vehicle_details.tracker_number">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="carType" class="form-label">Car type</label>
                                                    <select class="form-select" id="carType" wire:model="vehicle_details.car_type">
                                                        <option selected disabled>Select car type</option>
                                                        <option value="small">Small</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="large">Large</option>
                                                        <option value="estate">Estate</option>
                                                        <option value="premium">Premium</option>
                                                        <option value="peopleCarriers">People carriers</option>
                                                        <option value="suv">SUV</option>
                                                        <option value="sportsCars">Sports cars</option>
                                                        <option value="privateHire">Private hire (taxi)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label for="vehicleDescription" class="form-label">Vehicle description</label>
                                                    <textarea class="form-control" id="vehicleDescription" rows="3" wire:model="vehicle_details.vehicle_description"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    @endif

                                    @if($step == 2)
                                        <h4 class="text-center">Transmission</h4>
                                        <div wire:key="2" class="row justify-content-center">

                                            <div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-5 offset-lg-3 col-md-12">
                                                        <label for="taskDueDate" class="form-label">Gear Box</label>
                                                        <select wire:model="transmission.gear_box" id="" class="form-control">
                                                            <option disabled selected>Select...</option>
                                                            <option value="Manual">Manual</option>
                                                            <option value="Automatic">Automatic</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($step == 3)
                                          <div wire:key="3">
                                              <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="engineSize" class="form-label">Engine size</label>
                                                <input type="text" class="form-control" id="engineSize" placeholder="" wire:model="specification.engine_size">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="fuelType" class="form-label"> Year</label>
                                                <input type="text" class="form-control" id="fuelType" placeholder="" wire:model="specification.fuel_type">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="numberOfDoors" class="form-label">No. of doors</label>
                                                <input type="text" class="form-control" id="numberOfDoors" placeholder="" wire:model="specification.number_of_doors">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="year" class="form-label">Fuel type</label>
                                                <select class="form-select" id="year" wire:model="specification.year">
                                                   <option value="diesel">Diesel</option>
                                                      <option value="petrol">Petrol</option>
                                                      <option value="diesel-hybrid">Diesel Hybrid</option>
                                                      <option value="petrol-hybrid">Petrol Hybrid</option>
                                                      <option value="electric">Electric</option>
                                                      <option value="plug-in-hybrid">Plug in Hybrid</option>
                                                      <option value="diesel-plug-in-hybrid">Diesel Plug in Hybrid</option>
                                                      <option value="petrol-plug-in-hybrid">Petrol Plug in Hybrid</option>
                                                      <option value="hydrogen-cell">Hydrogen cell</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="color" class="form-label">Color</label>
                                                <input type="text" class="form-control" id="color" placeholder="" wire:model="specification.color">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="bodyType" class="form-label">Body type</label>
                                                <input type="text" class="form-control" id="bodyType" placeholder="" wire:model="specification.body_type">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="numberOfSeats" class="form-label">No. of seats</label>
                                                <input type="text" class="form-control" id="numberOfSeats" placeholder="" wire:model="specification.number_of_seats">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="airConditioning" class="form-label">Air conditioning</label>
                                                <input type="text" class="form-control" id="airConditioning" placeholder="" wire:model="specification.air_conditioning">
                                            </div>
                                        </div>
                                          </div>
                                    @endif
                                  @if($step == 4)
                                       <div wire:key="4">
                                           <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="testDate1" class="form-label">Test date</label>
                                            <input type="date" class="form-control" id="testDate1" wire:model="mot.test_date_1">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="expiryDate1" class="form-label">Expiry date</label>
                                            <input type="date" class="form-control" id="expiryDate1" wire:model="mot.expiry_date_1">
                                        </div>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="motReports" wire:model="mot.mot_reports">
                                        <label class="form-check-label" for="motReports">MOT reports</label>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="testDate2" class="form-label">Test date</label>
                                            <input type="date" class="form-control" id="testDate2" wire:model="mot.test_date_2">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="expiryDate2" class="form-label">Expiry date</label>
                                            <input type="date" class="form-control" id="expiryDate2" wire:model="mot.expiry_date_2">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="result" class="form-label">Result</label>
                                            <input type="text" class="form-control" id="result" placeholder="Pass" wire:model="mot.result">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="failureDetails" class="form-label">Failure details</label>
                                        <textarea class="form-control" id="failureDetails" rows="3" wire:model="mot.failure_details"></textarea>
                                    </div>
                                       </div>

                                  @endif
                                  @if($step == 5)
                                      <div wire:key="5">
                                          <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="isTaxed" class="form-label">Is vehicle taxed</label>
                                            <select class="form-select" id="isTaxed" wire:model="road_tax.is_taxed">
                                                <option selected disabled>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="expiryDate" class="form-label">Expiry date</label>
                                            <input type="date" class="form-control" id="expiryDate" wire:model="road_tax.expiry_date">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="taxType" class="form-label">Tax</label>
                                            <input type="text" class="form-control" id="taxType" placeholder="Yearly Tax" wire:model="road_tax.tax_type">
                                        </div>
                                    </div>

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="amount" class="form-label">Enter amount</label>
                                                <input type="number" class="form-control" id="amount" wire:model="road_tax.amount">
                                            </div>
                                        </div>
                                      </div>

                                  @endif
                                  @if($step == 6)
                                      <div wire:key="6">
                                          <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="isServiced" class="form-label">Is vehicle serviced</label>
                                            <select class="form-select" id="isServiced" wire:model="service.is_serviced">
                                                <option selected disabled>Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="lastServiceDate" class="form-label">Last Service date</label>
                                            <input type="date" class="form-control" id="lastServiceDate" wire:model="service.last_service_date">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="lastServiceMileage" class="form-label">Last Service mileage</label>
                                            <input type="number" class="form-control" id="lastServiceMileage" wire:model="service.last_service_mileage">
                                        </div>
                                    </div>

                                        <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="nextServiceDate" class="form-label">Next Service date</label>
                                            <input type="date" class="form-control" id="nextServiceDate" wire:model="service.next_service_date">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nextServiceMileage" class="form-label">Next Service mileage</label>
                                            <input type="number" class="form-control" id="nextServiceMileage" wire:model="service.next_service_mileage">
                                        </div>
                                    </div>
                                      </div>
                                  @endif
                                  @if($step == 7)
                                      <!-- Personal Information -->
                                     <div wire:key="7">
                                            <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="driverName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="driverName" wire:model="driver.name" placeholder="John Doe">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="driverPhoto" class="form-label">Photo</label>
                                            <input type="file" class="form-control" id="driverPhoto" wire:model="driver.photo">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="yearsExperience" class="form-label">Years of Experience</label>
                                            <input type="number" class="form-control" id="yearsExperience" wire:model="driver.years_experience" placeholder="15 years">
                                        </div>
                                    </div>

                                                <!-- Experience -->
                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <label for="specialSkills" class="form-label">Special Skills</label>
                                                        <input type="text" class="form-control" id="specialSkills" wire:model="driver.special_skills" placeholder="Defensive driving, off-road driving">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="primaryLanguage" class="form-label">Primary Language</label>
                                                        <input type="text" class="form-control" id="primaryLanguage" wire:model="driver.primary_language" placeholder="English">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="additionalLanguages" class="form-label">Additional Languages</label>
                                                        <input type="text" class="form-control" id="additionalLanguages" wire:model="driver.additional_languages" placeholder="Spanish, French">
                                                    </div>
                                                </div>

                                                <!-- Local Knowledge -->
                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <label for="areaExpertise" class="form-label">Area Expertise</label>
                                                        <input type="text" class="form-control" id="areaExpertise" wire:model="driver.area_expertise" placeholder="New York City">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="tourGuideExperience" class="form-label">Tour Guide Experience</label>
                                                        <input type="text" class="form-control" id="tourGuideExperience" wire:model="driver.tour_guide_experience" placeholder="5 years">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="drivingLicenses" class="form-label">Driving Licenses</label>
                                                        <input type="text" class="form-control" id="drivingLicenses" wire:model="driver.driving_licenses" placeholder="CDL, motorcycle license">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="certifications" class="form-label">Certifications</label>
                                                        <input type="text" class="form-control" id="certifications" wire:model="driver.certifications" placeholder="First Aid Certified, Advanced Defensive Driving">
                                                    </div>
                                                </div>


                                                <!-- Reviews and Ratings -->
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="customerReviews" class="form-label">Customer Reviews</label>
                                                            <textarea class="form-control" id="customerReviews" rows="4" wire:model="driver.customer_reviews" placeholder='"John was an excellent driver and guide..."'></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                        <label for="overallRating" class="form-label">Overall Rating</label>
                                                        <input type="text" class="form-control" id="overallRating" wire:model="driver.overall_rating" placeholder="★★★★☆ (4.8 out of 5)">
                                                    </div>
                                                    </div>
                                                </div>

                                                <!-- Availability -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="workHours" class="form-label">Work Hours</label>
                                                        <input type="text" class="form-control" id="workHours" wire:model="driver.work_hours" placeholder="8:00 AM to 8:00 PM">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="daysOff" class="form-label">Days Off</label>
                                                        <input type="text" class="form-control" id="daysOff" wire:model="driver.days_off" placeholder="Sundays and public holidays">
                                                    </div>
                                                </div>

                                                <!-- Contact Information -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="phoneNumber" class="form-label">Phone Number</label>
                                                        <input type="tel" class="form-control" id="phoneNumber" wire:model="driver.phone_number" placeholder="(555) 123-4567">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="emailAddress" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" id="emailAddress" wire:model="driver.email_address" placeholder="john.doe@example.com">
                                                    </div>
                                                </div>

                                                <!-- Terms and Conditions -->
                                                <h4 class="mt-4">Terms and Conditions</h4>

                                                <div class="mb-3">
                                                    <label for="workingHours" class="form-label">Driver's Working Hours</label>
                                                    <textarea class="form-control" id="workingHours" rows="3" wire:model="driver.working_hours" placeholder="Standard Hours, Overtime..."></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="driverBreaks" class="form-label">Driver Breaks</label>
                                                    <textarea class="form-control" id="driverBreaks" rows="3" wire:model="driver.driver_breaks" placeholder="Mandatory Breaks, Extended Trips..."></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="accommodation" class="form-label">Accommodation for Overnight Stays</label>
                                                    <textarea class="form-control" id="accommodation" rows="3" wire:model="driver.accommodation" placeholder="Customer Responsibility, Additional Charges..."></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="food" class="form-label">Driver’s Food</label>
                                                    <textarea class="form-control" id="food" rows="3" wire:model="driver.food" placeholder="During Standard Hours, Overtime and Overnight..."></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tollTax" class="form-label">Toll Tax</label>
                                                    <textarea class="form-control" id="tollTax" rows="3" wire:model="driver.toll_tax" placeholder="Customer Responsibility, Reimbursement..."></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dropoffLocation" class="form-label">Drop-off Location</label>
                                                    <textarea class="form-control" id="dropoffLocation" rows="3" wire:model="driver.dropoff_location" placeholder="Different Drop-off Location..."></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="miscellaneous" class="form-label">Miscellaneous</label>
                                                    <textarea class="form-control" id="miscellaneous" rows="3" wire:model="driver.miscellaneous" placeholder="Traffic Violations, Personal Belongings, Cancellation Policy..."></textarea>
                                                </div>
                                        </div>

                                  @endif
                                  @if($step == 8)
                                      <div wire:key="8">
                                          <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="documentType" class="form-label">Document type</label>
                                                    <input type="text" class="form-control" id="documentType" placeholder="Enter document type" wire:model="documents.type">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="documentName" class="form-label">Document name</label>
                                                    <input type="text" class="form-control" id="documentName" placeholder="Enter document name" wire:model="documents.name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="uploadDate" class="form-label">Upload date</label>
                                                    <input type="date" class="form-control" id="uploadDate" wire:model="documents.upload_date">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="expiryDate" class="form-label">Expiry date</label>
                                                    <input type="date" class="form-control" id="expiryDate" wire:model="documents.expiry_date">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="actionType" class="form-label">Action type</label>
                                                    <input type="text" class="form-control" id="actionType" placeholder="Enter action type" wire:model="documents.action_type">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="actionDate" class="form-label">Action date</label>
                                                    <input type="date" class="form-control" id="actionDate" wire:model="documents.action_date">
                                                </div>
                                            </div>

                                            <!-- File Upload Section -->
                                            <div class="mb-3 text-center" style="border: 3px dashed #ccc; padding: 20px; position: relative;">
                                                <label for="uploadFile" class="form-label" style="position: absolute; top: -25px; left: 50%; transform: translateX(-50%); background: white; padding: 0 10px;">Upload file</label>
                                                <input type="file" class="form-control" id="uploadFile" wire:model="documents.file" style="border: none; outline: none; height: 60px; text-align: center; padding-top: 20px;">
                                                <div class="mt-3">
                                                    <i class="bi bi-upload" style="font-size: 2rem;"></i>
                                                </div>
                                            </div>

                                            <!-- Add more documents link -->
                                            <div class="text-start mb-3">
                                                <a href="#" wire:click.prevent="addDocument">+ Add more documents</a>
                                            </div>

                                      </div>
                                  @endif
                                  @if($step == 9)
                                      <div wire:key="9">
                                          <!-- Finance Information Toggle -->
                                        <div class="mb-3">
                                            <label for="financeInfo" class="form-label">Do you want to add finance information?</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="financeYes" value="yes" wire:model="finance.add_finance_info">
                                                    <label class="form-check-label" for="financeYes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="financeNo" value="no" wire:model="finance.add_finance_info">
                                                    <label class="form-check-label" for="financeNo">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Finance Fields -->
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="financeType" class="form-label">Finance type</label>
                                                <input type="text" class="form-control" id="financeType" placeholder="Enter finance type" wire:model="finance.type">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="purchasePrice" class="form-label">Purchase price</label>
                                                <input type="number" class="form-control" id="purchasePrice" placeholder="Enter purchase price" wire:model="finance.purchase_price">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="agreementNumber" class="form-label">Agreement number</label>
                                                <input type="text" class="form-control" id="agreementNumber" placeholder="Enter agreement number" wire:model="finance.agreement_number">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="funderName" class="form-label">Funder name</label>
                                                <input type="text" class="form-control" id="funderName" placeholder="Enter funder name" wire:model="finance.funder_name">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="agreementStartDate" class="form-label">Agreement start date</label>
                                                <input type="date" class="form-control" id="agreementStartDate" wire:model="finance.agreement_start_date">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="agreementEndDate" class="form-label">Agreement end date</label>
                                                <input type="date" class="form-control" id="agreementEndDate" wire:model="finance.agreement_end_date">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="loanAmount" class="form-label">Loan amount</label>
                                                <input type="number" class="form-control" id="loanAmount" placeholder="Enter loan amount" wire:model="finance.loan_amount">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="repaymentFrequency" class="form-label">Repayment frequency</label>
                                                <input type="text" class="form-control" id="repaymentFrequency" placeholder="Enter repayment frequency" wire:model="finance.repayment_frequency">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="amount" class="form-label">Amount</label>
{{--                                                <select wire:amount id=""></select>--}}
                                                <input type="number" class="form-control" id="amount" placeholder="Enter amount" wire:model="finance.amount">
                                            </div>
                                        </div>

                                        <!-- File Upload Section -->
                                        <div class="mb-3 text-center" style="border: 2px dashed #ccc; padding: 20px; position: relative;">
                                            <label for="uploadFile" class="form-label" style="position: absolute; top: -25px; left: 50%; transform: translateX(-50%); background: white; padding: 0 10px;">Upload file</label>
                                            <input type="file" class="form-control" id="uploadFile" wire:model="finance.file" style="border: none; outline: none; height: 60px; text-align: center; padding-top: 20px;">
                                            <div class="mt-3">
                                                <i class="bi bi-upload" style="font-size: 2rem;"></i>
                                            </div>
                                        </div>

                                      </div>
                                  @endif
                                  @if($step == 10)
                                        <div wire:key="10">
                                            <!-- Damage History Fields -->
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <label for="reportedDate" class="form-label">Reported date</label>
                                                    <input type="date" class="form-control" id="reportedDate" wire:model="damage.reported_date">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="incidentDate" class="form-label">Incident date</label>
                                                    <input type="date" class="form-control" id="incidentDate" wire:model="damage.incident_date">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="insuranceRefNo" class="form-label">Insurance reference no.</label>
                                                    <input type="text" class="form-control" id="insuranceRefNo" placeholder="Enter insurance reference no." wire:model="damage.insurance_reference_no">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <label for="totalClaimCost" class="form-label">Total claim cost</label>
                                                    <input type="number" class="form-control" id="totalClaimCost" placeholder="Enter total claim cost" wire:model="damage.total_claim_cost">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" id="status" wire:model="damage.status">
                                                        <option selected>Select status</option>
                                                        <option value="open">Open</option>
                                                        <option value="closed">Closed</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Add more damages link -->
                                            <div class="text-start mb-3">
                                                <a href="#" wire:click.prevent="addDamage">+ Add more damages</a>
                                            </div>
                                        </div>
                                  @endif
                                  @if($step == 11)
                                      <div wire:key="11">
                                          <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="bookingId" class="form-label">Booking Id</label>
                                                <input type="text" class="form-control" id="bookingId" placeholder="Enter booking id" wire:model="repair.booking_id">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="bookingDate" class="form-label">Booking date</label>
                                                <input type="date" class="form-control" id="bookingDate" wire:model="repair.booking_date">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="workCarriedOutDate" class="form-label">Date and time work carried out</label>
                                                <input type="datetime-local" class="form-control" id="workCarriedOutDate" wire:model="repair.work_carried_out_date">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="mileageAtRepair" class="form-label">Mileage at repair</label>
                                                <input type="text" class="form-control" id="mileageAtRepair" placeholder="Enter mileage at repair" wire:model="repair.mileage_at_repair">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="workshopName" class="form-label">Workshop name</label>
                                                <input type="text" class="form-control" id="workshopName" placeholder="Enter workshop name" wire:model="repair.workshop_name">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="repairType" class="form-label">Repair type</label>
                                                <input type="text" class="form-control" id="repairType" placeholder="Enter repair type" wire:model="repair.repair_type">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="totalCost" class="form-label">Total cost</label>
                                                <input type="number" class="form-control" id="totalCost" placeholder="Enter total cost" wire:model="repair.total_cost">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="vat" class="form-label">VAT</label>
                                                <input type="number" class="form-control" id="vat" placeholder="Enter VAT" wire:model="repair.vat">
                                            </div>
                                        </div>

                                        <!-- File Upload Section -->
                                        <div class="mb-3 text-center" style="border: 2px dashed #ccc; padding: 20px; position: relative;">
                                            <label for="uploadInvoice" class="form-label" style="position: absolute; top: -25px; left: 50%; transform: translateX(-50%); background: white; padding: 0 10px;">Upload invoice</label>
                                            <input type="file" class="form-control" id="uploadInvoice" wire:model="repair.invoice" style="border: none; outline: none; height: 60px; text-align: center; padding-top: 20px;">
                                            <div class="mt-3">
                                                <i class="bi bi-upload" style="font-size: 2rem;"></i>
                                            </div>
                                        </div>

                                      </div>
                                  @endif


                                  </div>
                              </div>
                        </div>

                        <div class="row justify-content-center-">
                            <div class="col-lg-8 offset-lg-4">
                                <div class="form-group mt-3 w-100">
                                    <button type="submit" style="display: inline" class="btn btn-lg btn-primary col-4 text-center">{{ $step > 3 ? 'Save' : 'Next' }}</button>
                                </div>
                            </div>

                        </div>

                    </form>







                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block -->
