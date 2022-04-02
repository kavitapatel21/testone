<?php
/*
Template Name: contact-form
Template Post Type: post, page, my-post-type;
*/
get_header();
?>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Contact Form</h3>
              <form method="POST" accept-charset="UTF-8">
  
                <div class="row">
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                    <label class="form-label" for="firstName">First Name</label>
                      <input type="text" id="firstName" class="form-control form-control-lg" name="firstname" />
                     
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                    <label class="form-label" for="lastName">Last Name</label>
                      <input type="text" id="lastName" class="form-control form-control-lg" name="lastname" />
                     
                    </div>
  
                  </div>
                </div>
  
              
                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                    <label class="form-label" for="emailAddress">Email</label>
                      <input type="email" id="emailAddress" class="form-control form-control-lg" name="email" />
                      
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                      <input type="tel" id="phoneNumber" class="form-control form-control-lg" name="phoneno"/>
                      
                    </div>
  
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-12">
                  <label class="form-label" for="comment">Comment</label>
          <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
          </div>
          </div>
      
                <div class="mt-4 pt-2">
                  <input class="btn btn-primary btn-lg" id="submit" type="submit" value="Submit" name="btn_submit"/>
                </div>   
               
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section>
<?php
get_footer();
?>