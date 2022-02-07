<div class="wizard-form">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
      @endif
      <main>
          <article>
        
              <!-- Start Multiform HTML -->
          <section class="multi_step_form">  
          <form id="msform" action="" method="POST" enctype="multipart/form-data"> 
            {{ csrf_field() }}
            <!-- Tittle -->
            <div class="tittle">
              <h2 class="text-green alt-header-title">Membership Application</h2>
              <p>Please fill in the application form. It will take a couple of minutes. </p>
              <div class="disclaimer">
                  <img src="/icons/lock.svg" width="20px" alt="" style="width: fit-content;">
                  <div>
                  We take privacy issues seriously. You can be sure that your personal data is securely protected.
  
                  </div>
              </div>
            </div>
            <!-- progressbar -->
            <ul id="progressbar" style="padding-left: 0px;">
              <li class="active"></li>  
              <li></li> 
              <li></li>
              <li></li>
              {{-- <li></li> --}}
              <li></li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
               <div role="group">
                <div class="form-body row">
                  <div class="col-md-4 form-check">
                    <div class="check-content">
                      <input class="form-check-input" type="radio" name="member" value="new" id="newMember">
                      <label class="form-check-label" for="newMember">
                      New Member
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4 form-check">
                    <div class="check-content">
                      <input class="form-check-input" type="radio" name="member" value="old" id="re-entry">
                      <label class="form-check-label" for="re-entry">
                        Re-entry
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4 form-check">
                    <div class="check-content">
                      <input class="form-check-input" type="radio" name="member" value="other" id="other">
                      <label class="form-check-label" for="other">
                        Other
                      </label>
                    </div>
                  </div>
                </div>
              </div>
  
              {{-- <button type="button" class="action-button previous_button">Back</button> --}}
              <button type="button" class="next action-button my-5 px-10">Start application</button>  
            </fieldset>
  
            <!-- Personal Information -->
            <fieldset>
              <div class="inner-title">1.0 PERSONAL INFORMATION</div>
              <div class="form-body">
                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Joined in Year</label>
                    <input type="date" class="form-control" name="joindate"  >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Date of Entry</label>
                    <input type="date" class="form-control" name="currentdate"  >
                  </div>
                  <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Citizenship</label>
                    <input type="text" class="form-control" name="citizenship"  >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email"  >
                  </div>
                  <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                    <input type="phone" class="form-control" name="phone"  >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Designation</label>
                    <input type="text" class="form-control" name="designation"  disabled>
                  </div>
                  <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Work Address</label>
                    <input type="text" class="form-control" name="work_address"  >
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 phone-mt">
                    <label for="exampleFormControlInput1" class="form-label">Religion</label>
                    <select class="form-select" name="religion" aria-label=".form-select-lg example">
                      <option selected>Select Religion</option>
                      <option value="christianity">Christianity</option>
                      <option value="islam">Islam</option>
                      <option value="hindu">Hindu</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                  <div class="col-md-4 phone-mt">
                    <label for="exampleFormControlInput1" class="form-label">Marital Status</label>
                    <select class="form-select" name="marital_status" aria-label=".form-select-lg example">
                      <option selected>Select Status</option>
                      <option value="single">Single</option>
                      <option value="married">Married</option>
                      <option value="divorced">Divorced</option>
                    </select>
                  </div>
                  <div class="col-md-4 phone-mt">
                    <label for="exampleFormControlInput1" class="form-label">Gender</label>
                    <select class="form-select" name="gender" aria-label=".form-select-lg example">
                      <option selected>Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                </div>            
              </div>
                <button type="button" class="action-button previous previous_button mt-5">Back</button>
                <button type="button" class="next action-button mb-5">Continue</button>  
                
            </fieldset>
            
            <!-- Educational Qualifications -->
            <fieldset>
              <div class="inner-title">2.0 EDUCATIONAL QUALIFICATIONS</div>
              <div class="form-body">
                <div id="education-forms-wrapper">
                  <div class="defoult-form">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="exampleFormControlInput1" class="form-label">University/College/Equivalent Institution</label>
                          <input type="text" class="form-control" name="institute"  >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label for="exampleFormControlInput1" class="form-label">Degree Class</label>
                          <input type="text" class="form-control" name="degree_class"  >
                        </div>
                        <div class="col-md-6 phone-mt">
                          <label for="exampleFormControlInput1" class="form-label">Qualification awarded</label>
                          <input type="text" class="form-control" name="qualification"  >
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-md-6 ">
                            <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                            <input type="date" name="education_start_date" class="form-control" >
                          </div>
                          <div class="col-md-6 phone-mt">
                            <label for="exampleFormControlInput1" class="form-label">End Date</label>
                            <input type="date" name="education_end_date" class="form-control" >
                          </div>
                        </div>
                  </div>
                </div>
                <div class="mt-5 text-center">
                  <a   style="font-weight: 700" onclick="addEducationForm('education-forms-wrapper')">Add Education</a>
                  <div class="row"><div class="col-12 bg-custom d-none d-lg-block py-custom px-0 my-3"></div></div>
                </div>
              </div>
  
              <div class="mb-3"></div>
  
  
              <div class="inner-title">2.1 PROFESSIONAL QUALIFICATION</div>
              <div class="form-body">
                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Professional Qualification</label>
                    <input type="text" class="form-control"  name="profession_qualification" >
                  </div>
                  <div class="col-md-6 phone-mt">
                    <label for="exampleFormControlInput1" class="form-label">Institute</label>
                    <input type="text" class="form-control"  name="profession_institute">
                  </div>
                </div>
              </div>
  
              <button type="button" class="action-button previous previous_button mt-5">Back</button> 
              <button type="button" class="next action-button mb-5">Continue</button>   
              
            </fieldset>
  
            <!-- Employment record -->
            <fieldset>
              <div class="inner-title">3.0 EMPLOYMENT RECORD</div>
              <div class="form-body">
              <div id="employment-forms-wrapper">
                <div class="default">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleFormControlInput1" class="form-label">Company Name</label>
                      <input type="text" class="form-control" name="employment_company"  >
                    </div>
                    <div class="col-md-6">
                      <label for="exampleFormControlInput1" class="form-label">Title/Responsibility</label>
                      <input type="text" class="form-control" name="employment_title"  >
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Remarks</label>
                      <textarea class="form-control" id="exampleFormControlTextareaa1" rows="3" name="remarks"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                      <input type="date" name="employment_start_date" class="form-control">
                    </div>
                    <div class="col-md-6 phone-mt">
                      <label for="exampleFormControlInput1" class="form-label">End Date</label>
                      <input type="date" name="employment_end_date" class="form-control">
                    </div>
                  </div>
                </div>
  
              </div>
                <div class="mt-5 text-center">
                  <a  class="" style="font-weight: 700" onclick="addEmploymentForm('employment-forms-wrapper')" >Add employment record</a>
                  <div class="row"><div class="col-12 bg-custom d-none d-lg-block py-custom px-0 my-3"></div></div>
                </div>
              </div>
              <button type="button" class="action-button previous previous_button mt-5">Back</button> 
              <button type="button" class="next action-button mb-5">Continue</button>  
               
            </fieldset>
            
            
            <!-- Submission requirements -->
            <fieldset>
              <div class="inner-title">5.0 FILE UPLOADS</div>
                  
                    <div class="row">
                      <div class="col-md-6 upload-wrapper">
                        <div class="input-group ">
                          <div class="custom-file">
                        <img src="/icons/upload.svg" width="37px" alt="">
                            <input type="file" name="certificate" class="custom-file-input" id="upload">
                            <label class="custom-file-label" for="upload"><i class="ion-android-cloud-outline"></i> Education Certificates</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 upload-wrapper">
                        <div class="input-group ">
                          <div class="custom-file">
                        <img src="/icons/upload.svg" width="37px" alt="">
                            <input type="file" name="passport" class="custom-file-input" id="upload1">
                            <label class="custom-file-label" for="upload1"><i class="ion-android-cloud-outline"></i> Passport Size</label>
                          </div>
                        </div>
                      </div>
                    </div>
              <button type="button" class="action-button previous previous_button mt-5">Back</button> 
              <button  class="action-button mb-5" type="submit">Finish</button> 
            </fieldset>  
          </form>  
        </section> 
              <!-- END Multiform HTML -->
          </article>
         </main>
  </div>
  