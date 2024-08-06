<html>
<div>
    <a href="{{ route('get.report') }}">
        <button>Generate PDF</button>
    </a>
     @foreach ($candidates as $candidate)
                  
                                    @section('topn')
                                        <div class="container">
                                            <div class="col-7"><h2 class="pt-2 alph">{{ __('All Candidates Points') }}</h2></div>
                                        </div>
                                    @endsection
                                <img src="{{ asset('storage') }}/{{ $candidate->image }}" style="width: 100px; "
                                    alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="my-2 alph">{{ $candidate->fname }} {{ $candidate->lname }}</h5>
                                <h3 class="button" style="width: 100%;">points ( {{ $candidate->points }}
                                    )</h3>

                @endforeach
</div>
</html>