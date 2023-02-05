<main class="login-form">

    <div class="container">
  
        <div class="row justify-content-center">
  
            <div class="col-md-8">
  
                <div class="card">
  
                    <div class="card-header">Reset Password</div>
  
                    <div class="card-body">
  
    
  
                      {{-- @if (Session::has('message'))
  
                           <div class="alert alert-success" role="alert">
  
                              {{ Session::get('message') }}
  
                          </div>
  
                      @endif --}}
  
    
  
                        <form  id="formId">
  
                            <div class="form-group row">
  
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
  
                                <div class="col-md-6">
  
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    <span class="text-danger error-email"></span>

  
                                </div>
  
                            </div>
  
                            <div class="col-md-6 offset-md-4" style="margin-top
                            :1em">
  
                                <button type="button" onclick="resetPassword('{{ route('forgot.store') }}','POST','formId','forgot-otp-input-view','otp-btn')" class="btn btn-primary otp-btn" >
                                    <i class="fa fa-spinner fa-spin louder show-loader"></i>
  
                                    Send
  
                                </button>
  
                            </div>
  
                        </form>
  
                          
  
                    </div>
  
                </div>
  
            </div>
  
        </div>
  
    </div>
  
  </main>