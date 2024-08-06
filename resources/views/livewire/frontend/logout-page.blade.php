<div>
    <x-slot:title>
        Logout
        </x-slot>
        <x-slot:image_title>
            Logout
            </x-slot>
            <div class="container">
                <div class="row pt-4"></div>
                    <div class="ground" >
                        <div class="container pt-3 pb-2">
                            <h3 style="color:#fff;">Your choice has been recorded, thank you.</h3>
                        </div>
                    </div>
                <div class="row pt-4"></div>
                <div class="row pt-4"></div>
                    <div class="ground" >
                        <div class="container pt-3 pb-2">
                            <h3 style="color:#fff;">About My Account</h3>
                        </div>
                    </div>
                <div class="row pt-4"></div>
                    <div class="ground" >
                        <div class="container pt-3 pb-2">
                            @auth
                                <div class="row">
                                    <div class="col-3" style="text-align:end"><h6 style="color:white;" class="pt-1">Name</h6></div>
                                    <div class="col"><h2 style="color:#fff;">{{ Auth::user()->name }}</h2></div>
                                </div>
                                <div class="row">
                                    <div class="col-3" style="text-align:end"><h6 style="color:white;" class="pt-1">Email</h6></div>
                                    <div class="col"><h2 style="color:#fff;">{{ Auth::user()->email }}</h2></div>
                                </div>
                                <div class="row">
                                    <div class="col-3" style="text-align:end"><h6 style="color:white;" class="pt-1">Vote Id</h6></div>
                                    <div class="col"><h2 style="color:#fff;">{{ Auth::user()->vote_id }}</h2></div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-3" style="text-align:end"><h6 style="color:white;" class="pt-1">Vote Limit</h6></div>
                                    <div class="col"><h2 style="color:#fff;">{{ Auth::user()->vote_limit }} Vote Remaining</h2></div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-3" style="text-align:end"><h6 style="color:white;" class="pt-1">Action</h6></div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-6">@livewire('frontend.logout')</div>
                                            <div class="col"></div>
                                        </div>
                                    </div>
                                </div>
                                
                            @endauth
                        </div>
                    </div>
                <div class="row pt-4"></div>
                <div class="row pt-4"></div>
            </div>
</div>
<style>
    body{
        color: #fff;
    }
    </style>