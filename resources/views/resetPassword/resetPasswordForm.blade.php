<main class="login-form">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Reset Password</div>

                    <div class="card-body">



                        <form action="{{ route('forgot.change',$user_id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputpassword1">New password</label>
                                <input type="password" class="form-control" id="exampleInputpassword1"
                                    aria-describedby="passwordHelp" name="password" placeholder="Enter password" required>
                                {{-- @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                    
                                @enderror --}}
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputcpassword1">Confirm cpassword</label>
                                <input type="password" class="form-control"  name="cpassword" id="exampleInputcpassword1"
                                    placeholder="cpassword" required>
                                    {{-- @error('cpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                        
                                    @enderror --}}
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
