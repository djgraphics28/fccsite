<div>
    <div class="p-4">
        <div class="text-center">
            <img src="{{ asset('FCCPI.png') }}" alt="FCCPI Logo" width="50px" class="mb-2">
            <h1 class="h4 text-dark mb-4">Membership Form</h1>
        </div>
        {{-- @error('nameCombination') <span class="error">{{ $message }}</span> @enderror --}}
        <form class="user" wire:submit.prevent="store">
            <div class="form-group">
                <label for="">Ito ba ang unang pagkakataon mo na dumalo sa FCC Bugayong Church?</label>
                <select class="form-control form-control-lg id="isFirstTime" wire:model="isFirstTime">
                        <option value="">-- choose option --</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                </select>
                @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control form-control-lg @error('firstName') is-invalid @enderror" id="firstName" wire:model="firstName">

                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="middleName">Middle Name</label>
                    <input type="text" class="form-control form-control-lg" id="middleName" wire:model="middleName">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6  mb-3 mb-sm-0">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control form-control-lg @error('lastName') is-invalid @enderror" id="lastName" wire:model="lastName">
                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="extName">Extension Name (ex. JR,SR.)</label>
                    <input type="text" class="form-control form-control-lg" id="extName" wire:model="extName">
                </div>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
               <select class="form-control form-control-lg @error('gender') is-invalid @enderror" id="gender" wire:model="gender">
                    <option value="">-- choose option --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
               </select>
               @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="birthDate">Birth Date</label>
                <input type="date" class="form-control form-control-lg @error('birthDate') is-invalid @enderror" id="birthDate" wire:model="birthDate">
                @error('birthDate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="number" class="form-control form-control-lg" id="contactNumber" wire:model="contactNumber">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" cols="30" rows="3" wire:model="address"></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control form-control-lg" id="email" placeholder="example@gmail.com">
            </div>
            <div class="form-group">
                <label for="dateBaptized">Kailan ka na-baptized? (optional)</label>
                <input type="date" class="form-control form-control-lg" id="dateBaptized" wire:model="dateBaptized">
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block mt-4">
                SUBMIT REGISTRATION
            </button>
            <hr>
            {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                <i class="fab fa-google fa-fw"></i> Register with Google
            </a>
            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
            </a> --}}
        </form>
        {{-- <hr>
        <div class="text-center">
            <a class="small" href="forgot-password.html">Forgot Password?</a>
        </div>
        <div class="text-center">
            <a class="small" href="login.html">Already have an account? Login!</a>
        </div> --}}
    </div>
</div>
