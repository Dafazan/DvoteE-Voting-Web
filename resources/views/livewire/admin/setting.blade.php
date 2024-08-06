<div>
    <x-slot:title>
        setting
        </x-slot>

        <div class="my-5">
            <h1 class="text-center"> Setting</h1>
            <div class="container my-4">
                <div class="row flex justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <form wire:submit.prevent='updateSetting({{ $setting_id }})'>
                            <div class="mb-3 mt-3">
                                <label for="id" class="form-label">Website Name</label>
                                <input type="text" wire:model='website_name' class="form-control" id="voteid"
                                    placeholder="Enter website_name" name="website_name">
                                @error('website_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Home name:</label>
                                <input type="text" wire:model='home_name' class="form-control" id="pwd"
                                    placeholder="Enter home_name" name="pswd">
                                @error('home_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
