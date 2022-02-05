// const { set } = require("lodash");

(function($) {
    "use strict";  
    
    //* Form js
    function verificationForm(){
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })
    }; 
    
    //* Add Phone no select
    function phoneNoselect(){
        if ( $('#msform').length ){   
            $("#phone").intlTelInput(); 
            $("#phone").intlTelInput("setNumber", "+880"); 
        };
    }; 
    //* Select js
    function nice_Select(){
        if ( $('.product_select').length ){ 
            $('select').niceSelect();
        };
    }; 
    /*Function Calls*/  
    verificationForm ();
    phoneNoselect ();
    nice_Select ();
})(jQuery);

// generate education form  

function setEducationForm(constant) {
    
    var string= "<div class='sub-form-title mt-5'>Form #"+constant+"</div>"
    +"<div class='row'>"
      +"<div class='col-md-12'>"
        +"<label for='exampleFormControlInput1' class='form-label'>University/College/Equivalent Institution</label>"
        +"<input type='text' class='form-control' name='institute_"+constant+"' id='exampleFormControlInput1' >"
      +"</div>"
    +"</div>"
    +"<div class='row'>"
      +"<div class='col-md-6'>"
        +"<label for='exampleFormControlInput1' class='form-label'>Degree Class</label>"
        +"<input type='text' class='form-control' name='degree_class_"+constant+"' id='exampleFormControlInput1' >"
      +"</div>"
      +"<div class='col-md-6 phone-mt'>"
        +"<label for='exampleFormControlInput1' class='form-label'>Qualification awarded</label>"
        +"<input type='text' class='form-control' name='qualification_"+constant+"' id='exampleFormControlInput1' >"
      +"</div>"
    +"</div>"
      +"<div class='row'>"
       +" <div class='col-md-6 '>"
          +"<label for='exampleFormControlInput1' class='form-label'>Start Date</label>"
         +" <input type='date' class='form-control' name='education_start_date_"+constant+"'>"
        +"</div>"
        +"<div class='col-md-6 phone-mt'>"
          +"<label for='exampleFormControlInput1' class='form-label'>End Date</label>"
          +"<input type='date' class='form-control' name='education_end_date_"+constant+"' >"
        +"</div>"
      +"</div>";

    return string;
}

function addEducationForm(id) {
    
    //parent
    var parent = document.getElementById(id)
    // get node count
    var node_count = parent.childNodes.length;
    // append node

    if(node_count == 3){
        //constant
            var constant = 2;
        // create element
            var element= document.createElement("div");
                element.classList.add("second-node");
                element.innerHTML=setEducationForm(constant);
        // append node
            return parent.appendChild(element);
    }
    if(node_count == 4){
        //constant
            var constant = 3;
        // create element
            var element= document.createElement("div");
                element.classList.add("third-node");
                element.innerHTML=setEducationForm(constant);
        // append node
            return parent.appendChild(element);
    }
    
}

function setEmploymentForm(constant) {
    var string="<div class='sub-form-title mt-5'>Records #"+constant+"</div>"
    +"<div class='row'>"
    +"<div class='col-md-6'>"
      +"<label  class='form-label'>Company Name</label>"
      +"<input type='text' class='form-control' name='employment_company_"+constant+"'>"
    +"</div>"
    +"<div class='col-md-6'>"
      +"<label  class='form-label'>Title/Responsibility</label>"
      +"<input type='text' class='form-control' name='employment_title_"+constant+"'  >"
    +"</div>"
  +"</div>"
  +"<div class='row'>"
    +"<div class='mb-3'>"
      +"<label f class='form-label'>Remarks</label>"
      +"<textarea class='form-control'  rows='3' name='remarks_"+constant+"'></textarea>"
    +"</div>"
  +"</div>"
  +"<div class='row'>"
    +"<div class='col-md-6'>"
      +"<label for='exampleFormControlInput1' class='form-label'>Start Date</label>"
      +"<input type='date' name='employment_start_date_"+constant+"' class='form-control'>"
    +"</div>"
    +"<div class='col-md-6 phone-mt'>"
      +"<label for='exampleFormControlInput1' class='form-label'>End Date</label>"
      +"<input type='date' name='employment_end_date_"+constant+"' class='form-control'>"
    +"</div>"
  +"</div>";
    return string;
}


              

function addEmploymentForm(id) {
    //parent
    var parent = document.getElementById(id)
    // get node count
    var node_count = parent.childNodes.length;
    // append node

    if(node_count == 3){
        //constant
           var constant = 2;
        // create element
            var element= document.createElement("div");
                element.classList.add("second-node");
                element.innerHTML=setEmploymentForm(constant);
        // append node
            return parent.appendChild(element);
    }
    if(node_count == 4){
        //constant
           var constant = 3;
        // create element
            var element= document.createElement("div");
                element.classList.add("third-node");
                element.innerHTML=setEmploymentForm(constant);
        // append node
            return parent.appendChild(element);
    }
    
}

// set referee

function setRefereeForm(constant) {
    var string="<div class='sub-form-title mt-5'>Referee #"+constant+"</div>"
    +"<div class='row'>"
      +"<div class='col-md-6'>"
        +"<label for='exampleFormControlInput1' class='form-label'>Name</label>"
        +"<input type='text' name='referee_name_"+constant+"' class='form-control' id='exampleFormControlInput1' >"
      +"</div>"
      +"<div class='col-md-6 phone-mt'>"
        +"<label for='exampleFormControlInput1' class='form-label'>Address</label>"
        +"<input type='text' name='referee_address_"+constant+"' class='form-control' id='exampleFormControlInput1' >"
      +"</div>"
    +"</div>"
    +"<div class='row'>"
      +"<div class='col-md-6'>"
        +"<label for='exampleFormControlInput1' class='form-label'>Telephone</label>"
        +"<input type='number' class='form-control' name='referee_phone_"+constant+"' id='exampleFormControlInput1' >"
      +"</div>"
      +"<div class='col-md-6 phone-mt'>"
       +" <label for='exampleFormControlInput1' class='form-label'>Work/Title</label>"
        +"<input type='text' class='form-control' name='referee_title_"+constant+"' id='exampleFormControlInput1' >"
      +"</div>"
    +"</div>"
    +"<div class='row'>"
      +"<div class='col-md-6'>"
        +"<label for='exampleFormControlInput1' class='form-label'>Fax</label>"
        +"<input type='text' class='form-control' name='referee_fax_"+constant+"' id='exampleFormControlInput1' >"
      +"</div>"
      +"<div class='col-md-6 phone-mt'>"
        +"<label for='exampleFormControlInput1' class='form-label'>E-mail</label>"
        +"<input type='email' class='form-control' name='referee_email_"+constant+"' id='exampleFormControlInput1' >"
      +"</div>"
    +"</div>";

    return string;
}

function addRefereeForm(id) {
        //parent
        var parent = document.getElementById(id);
        // get node count
        var node_count = parent.childNodes.length;
        // append node
    
        if(node_count == 3){
            //constant
               var constant = 2;
            // create element
                var element= document.createElement("div");
                    element.classList.add("mt-5");
                    element.innerHTML=setRefereeForm(constant);
            // append node
                return parent.appendChild(element);
        }
        if(node_count == 4){
            //constant
               var constant = 3;
            // create element
                var element= document.createElement("div");
                    element.classList.add("mt-5");
                    element.innerHTML=setRefereeForm(constant);
            // append node
                return parent.appendChild(element);
        }
        
}



// disable carousel

$('.carousel').carousel({
  interval: false,
});
