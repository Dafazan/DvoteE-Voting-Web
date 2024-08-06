<x-slot:title>
    Dashboard
    </x-slot>
    <div class="main-bg">
        <div class="container">
            <div class="ground-a my-3">
                <div class="card-header ">
                    <div class="  slideanim">
                        <div class="row">
                            @section('topn')
                                <div class="container">
                                    <div class="col-7">
                                        <h2 class="pt-2 alph">{{ __('Dashboard') }}</h2>
                                    </div>
                                </div>
                            @endsection
                            <div class="col pt-3">
                                <a href="{{ route('vote.pdf') }}"><button class="button-r">End Vote and Create Report</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ground-a">
                <div class="container slideanim">
                    <div class="row flex justify-content-center">
                        <div class="col-xl-3 my-3 col-lg-3 col-md-3 col-sm-12">
                            {{-- <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h4>Position</h4>
                                    <h5>{{ $totalPositions }}</h5>
                                </div>
                            </div> --}}
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <h4 class="fw-bold">Leader Vote
                                    </h4>

                                </li>
                            </ol>

                        </div>
                        <div class="col-xl-3 my-3 col-lg-3 col-md-3 col-sm-12">
                            {{-- <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h4>Candidates</h4>
                                    <h5>{{ $totalCandidates }}</h5>
                                </div>
                            </div> --}}
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <h4 class="fw-bold">Candidates
                                    </h4>
                                    <span class="badge bg-primary rounded-pill">{{ $totalCandidates }}</span>
                                </li>
                            </ol>

                        </div>
                        <div class="col-xl-3 my-3 col-lg-3 col-md-3 col-sm-12">
                            {{-- <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h4>Voter</h4>
                                    <h5>{{ $totalVoter }}</h5>
                                </div>
                            </div> --}}
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <h4 class="fw-bold">Voters
                                    </h4>
                                    <span class="badge bg-primary rounded-pill">{{ $totalVoter }}</span>
                                </li>
                            </ol>
                        </div>
                        <div class="col-xl-3 my-3 col-lg-3 col-md-3 col-sm-12">
                            {{-- <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h4>Votes</h4>
                                    <h5>{{ $totalVotes }}</h5>
                                </div>
                            </div> --}}
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <h4 class="fw-bold">Votes
                                    </h4>
                                    <span class="badge bg-primary rounded-pill">{{ $totalVotes }}</span>
                                </li>
                            </ol>
                        </div>
                    </div>




                </div>
            </div>
            <div class="row pb-4"></div>
        </div>




        <div class="container my-4 ">
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="ground-a">
                        <div class=" slideanim">
                            <div class="card-header">
                                <h3 class=" alph">Voted User</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="
                                    overflow-y:scroll;
                                    height:380px;
                                    display:block;
                                    ">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class=" alph">ID</th>
                                                <th class=" alph">Name</th>
                                                <th class=" alph">IsVoted</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @if (count($isVotedUser) > 0)
                                                @foreach ($isVotedUser as $user)
                                                    <tr>
                                                        <td class=" alph">{{ $user->id }}</td>
                                                        <td class=" alph">{{ $user->name }}</td>
                                                        <td class=" alph">{{ $user->voted == 1 ? 'Voted' : '' }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4"></div>
                </div>
                <div class="col-md-6">
                    <div class="ground-a">
                        <div class=" slideanim">
                            <div class="card-header">
                                <h3 class=" alph">Haven't Voted User</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="
                                    overflow-y:scroll;
                                    height:380px;
                                    display:block;
                                    ">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class=" alph">ID</th>
                                                <th class=" alph">Name</th>
                                                <th class=" alph">IsVoted</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($notVotedUser) > 0)
                                                @foreach ($notVotedUser as $user)
                                                    <tr>
                                                        <td class=" alph">{{ $user->id }}</td>
                                                        <td class=" alph">{{ $user->name }}</td>
                                                        <td class=" alph">{{ $user->voted == 0 ? 'NotVoted' : '' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="col-md"></div>
    </div>
