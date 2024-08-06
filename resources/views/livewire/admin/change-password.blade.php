<div>
    <x-slot:title>
        Change password
        </x-slot>

        <div class="main-bg my-5">
            <div class="container pt-2 pb-4  my-4">
                <div class="row flex">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">
                        <h3 class="alph">Change Password</h3>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif
                        <form wire:submit.prevent='changePassword'>
                            <div class="mb-3 mt-3">
                                <label for="id" class="alph form-label">Username:</label>
                                <input type="text" wire:model='username' class="form-control" id="username"
                                    placeholder="Enter Username" name="username">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="alph form-label">Password:</label>
                                <input type="password" wire:model='password' class="form-control" id="pwd"
                                    placeholder="Enter password" name="pswd">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
