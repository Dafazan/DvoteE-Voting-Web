
    <x-slot:title>
        Candidate
    </x-slot>

    <div class="main-bg">
        <div class="container">
            <div class="ground-a my-3">
                <div class="card-header ">
                </div>
            </div>
            <div class="row">
                @foreach ($candidates as $candidate)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 my-3">
                        <div class="ground-a">
                            <div class=" slideanim">
                                <div class="card-body">
                                    @section('topn')
                                        <div class="container">
                                            <div class="col-7"><h2 class="pt-2 alph">{{ __('All Candidates Points') }}</h2></div>
                                        </div>
                                    @endsection
                                <img src="{{ asset('storage') }}/{{ $candidate->image }}" style="width: 100%; "
                                    alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="my-2 alph">{{ $candidate->fname }} {{ $candidate->lname }}</h5>
                                <button class="button" style="width: 100%;">points ( {{ $candidate->points }}
                                    )</button>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>
