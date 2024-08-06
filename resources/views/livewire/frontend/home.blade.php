<div>
    <x-slot:title>
        Home
        </x-slot>
        <x-slot:image_title>
            Polling
            </x-slot>

            <div class="container">
                <div class="">
                    @foreach ($candidates as $candidate)
                    <div class="popup-vote">
                        <div class="popup-content-vote">
                            <h3> Are you sure want to vote {{ $candidate->fname }} {{ $candidate->lname }}?</h3>
                            <div class="pt-2">
                                <button class="close-vote-btn button-r">Not sure yet</button>
                            </div>
                            <div class="pt-2">
                                <button class="button"wire:click='addVote({{ $candidate->id }})'>Yes I am sure</button>
                            </div>
                        </div>
                        </div>
                    @endforeach
                    @foreach ($candidates as $candidate)
                        <div class="popup-window">
                            <button class="close-popup-btn btns--primary">Close</button>
                            {{-- <div class="popup-content-out "> --}}
                            <div class="popup-content">
                                <h3>Candidate No {{ $candidate->id }}</h3>

                                <h3>{{ $candidate->fname }} {{ $candidate->lname }}</h3>
                                <h3>Visi</h3>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ipsum vero
                                    voluptatem nemo veniam, recusandae veritatis ab explicabo totam! Perspiciatis error
                                    obcaecati neque ut sapiente vitae ipsam mpedit doloribus sunt explicabo! Dolor
                                    eligendi quibusdam neque, at earum ea nihil perferendis accusantium a molestiae
                                    dolorum ullam eius ipsum placeat nam odit quia! Quia eius laudantium saepe eum.
                                    Maxime?</p>
                                <h3>Misi</h3>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ipsum vero
                                    voluptatem nemo veniam, recusandae veritatis ab explicabo totam! Perspiciatis error
                                    obcaecati neque ut sapiente vitae ipsam mpedit doloribus sunt explicabo! Dolor
                                    eligendi quibusdam neque, at earum ea nihil perferendis accusantium a molestiae
                                    dolorum ullam eius ipsum placeat nam odit quia! Quia eius laudantium saepe eum.
                                    Maxime?</p>
                                <h3>Lain-lain</h3>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ipsum vero
                                    voluptatem nemo veniam, recusandae veritatis ab explicabo totam! Perspiciatis error
                                    obcaecati neque ut sapiente vitae ipsam mpedit doloribus sunt explicabo! Dolor
                                    eligendi quibusdam neque, at earum ea nihil perferendis accusantium a molestiae
                                    dolorum ullam eius ipsum placeat nam odit quia! Quia eius laudantium saepe eum.
                                    Maxime?</p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ipsum vero
                                    voluptatem nemo veniam, recusandae veritatis ab explicabo totam! Perspiciatis error
                                    obcaecati neque ut sapiente vitae ipsam mpedit doloribus sunt explicabo! Dolor
                                    eligendi quibusdam neque, at earum ea nihil perferendis accusantium a molestiae
                                    dolorum ullam eius ipsum placeat nam odit quia! Quia eius laudantium saepe eum.
                                    Maxime?</p>
                                <img src="{{ asset('storage') }}/{{ $candidate->image }}" alt=""
                                    class="card-img">fccc
                            </div>

                            {{-- </div> --}}
                        </div>
                    @endforeach


                    <div class="row pt-3"></div>


                    <div class="row pb-4">
                        <div class="container" style="text-align:center;">
                            <h2 style="color:#fff;">Vote your choice wisely</h2>
                        </div>
                        @if (count($candidates) > 0)
                            @foreach ($candidates as $candidate)
                                <div class="col-md-4 cbdy pt-1">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            <strong>{{ session('success') }}</strong>
                                        </div>
                                    @endif
                                    <article class="profile">
                                        <div class="profile-image">
                                            <img src="{{ asset('storage') }}/{{ $candidate->image }}"
                                                alt="candidate image" />
                                        </div>
                                        <small class="profile-user-handle">Candidate No.{{ $candidate->id }}</small>
                                        <h2 class="profile-username">{{ $candidate->fname }} {{ $candidate->lname }}
                                        </h2>
                                        @php
                                            $isVoted = \App\Models\Votes::where(['user_id' => Auth::user()->id, 'con_id' => $candidate->id])->first();
                                        @endphp
                                        @isset($isVoted)
                                            @if ($isVoted->user_id == Auth::user()->id || $isVoted->con_id == $candidate->id)
                                                <td class="text-center" style="vertical-align: middle"><button disabled
                                                        class="button">Voted</button></td>
                                            @endif
                                        @endisset
                                        <div class="profile-actions">
                                            @empty($isVoted)
                                                <button class="open-popup-btn btns btns--info">Info</button>
                                                <button class="open-vote-btn btns btns--primary">Vote</button>
                                            @endempty
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                    </div>
                @else
                    <h3>Record Not Found</h3>
                    @endif
                    <div class="row pb-3 pt-3"></div>
                </div>
            </div>



</div>
<style>
    .cbdy {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    button,
    input,
    select,
    textarea {
        font: inherit;
    }

    a {
        color: inherit;
    }

    /* End basic CSS override */
    .wrap {
        background-color: #110B30;
        border-radius: 9px;
    }

    .profile {
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 20px;
        width: 90%;
        max-width: 300px;
        background-color: #0a132c;
        border-radius: 16px;
        position: relative;
        border: 3px solid transparent;
        background-clip: padding-box;
        text-align: center;
        color: #fff;

        /* background-image: linear-gradient(135deg, rgba(117, 46, 124, 0.35), rgba(115, 74, 88, 0.1) 15%, #1b2028 20%, #1b2028 100%); */
    }

    .profile:after {
        content: "";
        display: block;
        top: -3px;
        left: -3px;
        bottom: -3px;
        right: -3px;
        z-index: -1;
        position: absolute;
        border-radius: 16px;
        /* background-image: linear-gradient(135deg, #752e7c, #734a58 20%, #1b2028 30%, #2c333e 100%); */
    }

    .profile-image {
        border-radius: 50%;
        overflow: hidden;
        width: 200px;
        height: 200px;
        position: relative;
    }

    .profile-image img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;

    }

    .profile-username {
        font-size: 1.5rem;
        font-weight: 600;
        margin-top: 0.5rem;
    }

    .profile-user-handle {
        margin-top: .5rem;
        color: #fff;
    }

    .profile-actions {
        margin-top: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-actions>* {
        margin: 0 0.25rem;
    }

    .btns {
        border: 0;
        background-color: transparent;
        padding: 0;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        line-height: 1;
        transition: 0.15s ease;
    }

    .btns--primary {
        border-radius: 7px;
        background-color: #003ce0;
        color: #fff;
        padding: 0 1.375em;
    }

    .btns--primary:hover,
    .btns--primary:focus {
        background-size: 150%;
        background-color: #7e7e7e;
    }

    .btns--info {
        border-radius: 7px;
        padding: 0 1.375em;
        border: 2px solid #003ce0;
        color: #bcc8ff;
    }

    .btns--info:hover,
    .btns--info:focus {
        border-color: #7e7e7e;
        color: #7e7e7e;
    }
    .popup-vote{
         display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 2;
    }
    .popup-window {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 2;
        animation: fadein 0.6s ease-in-out forwards;

    }

    .popup-content-out {
        transform: translateX(-100%);
        animation: slide-in 0.3s ease-in-out forwards;

    }

    @keyframes slide-in {
        0% {

            opacity: 0;
        }

        65% {
            opacity: 0.4
        }

        100% {

            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .detail,
    .choose,
    h2 {
        animation: slide-in-2 0.7s ease-in-out forwards;
    }

    .ground {
        animation: slidef 0.3s ease-in-out forwards;
    }

    @keyframes slide-in-2 {
        0% {
            opacity: 0;

        }

        100% {
            opacity: 1;

        }
    }

    @keyframes slidef {
        0% {
            opacity: 0;

        }

        100% {
            opacity: 1;

        }
    }

    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        max-width: 850px;
        width: 90%;
        height: 90%;
        z-index: 3;
        overflow-y: scroll;
        /* make the content scrollable */
        max-height: 80%;
        /* limit the maximum height */
        background: #0a132c;
        border-radius: 8px;
        color: #fff;
        border: 2px solid #1543c2;

    }
    .popup-content-vote {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        width: 300px;
    
        z-index: 3;
        background: #0a132c;
        border-radius: 8px;
        color: #fff;
        border: 2px solid #1543c2;

    }

    .popup-content-out {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        max-width: 850px;
        width: 90%;
        height: 90%;
        z-index: 2;
        max-height: 80%;
        /* limit the maximum height */
        background: rgba(255, 255, 255, 0.342);
        border-radius: 8px;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        margin: auto;
        overflow: auto;
        resize: both;

    }
</style>
<script>
    var openPopupBtns = document.querySelectorAll('.open-popup-btn');
    var closePopupBtns = document.querySelectorAll('.close-popup-btn');
    var popupWindows = document.querySelectorAll('.popup-window');

    openPopupBtns.forEach(function(openPopupBtn, index) {
        openPopupBtn.addEventListener('click', function() {
            popupWindows[index].style.display = 'block';
        });
    });

    closePopupBtns.forEach(function(closePopupBtn, index) {
        closePopupBtn.addEventListener('click', function() {
            popupWindows[index].style.display = 'none';
        });
    });
</script>
<script>
    var openVoteBtns = document.querySelectorAll('.open-vote-btn');
    var closeVoteBtns = document.querySelectorAll('.close-vote-btn');
    var popupVote = document.querySelectorAll('.popup-vote');

    openVoteBtns.forEach(function(openVoteBtn, index) {
        openVoteBtn.addEventListener('click', function() {
            popupVote[index].style.display = 'block';
        });
    });

    closeVoteBtns.forEach(function(closeVoteBtn, index) {
        closeVoteBtn.addEventListener('click', function() {
            popupVote[index].style.display = 'none';
        });
    });
</script>
