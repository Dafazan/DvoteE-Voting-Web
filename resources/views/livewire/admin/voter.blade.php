<x-slot:title>
    Voter
    </x-slot>
    <div class="main-bg">
        <div class="container">
            <div class="ground-a my-3">
                <div class="card-header">
                    <div class=" slideanim">
                        <div class="row">
                            @section('topn')
                                <div class="container">
                                    <div class="col-7">
                                        <h2 class="pt-2 alph">{{ $total }}{{ __(' Voters Registered') }}</h2>
                                    </div>
                                </div>
                            @endsection

                        </div>
                    </div>
                </div>
            </div>
            <div class="ground-a">
                <div class="container pt-3 slideanim">
                    <div class="row">
                        <div class="col-md">
                            <div class="row pb-3">

                                <div class="col-md-6 pb-1">
                                    <button wire:click='showForm' class="button">Add New Voter</button>
                                </div>

                                <div class="col-md-6 pb-1">
                                    <a href="{{ route('users.export') }}"> <button class="button">Export Voter
                                            list</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>


                    @if ($showTable == true)



                        <div class="search-box">
                            <div class="pt-3 pb-3 ps-3 pe-3">
                                <input type="text" wire:model="search" placeholder="Search Here...">
                            </div>
                        </div>
                        {{-- <input type="text" wire:model="search" class="form-control " placeholder="Search Here..."> --}}
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
                        <div class="pt-2">
                        </div>

                        {{-- <div class="rowt header">
                            <div class="cell colm-1">
                                ID
                            </div>
                            <div class="cell colm-2">
                                Name
                            </div>
                            <div class="cell colm-3">
                                Email
                            </div>
                            <div class="cell colm-4">
                                Vote ID
                            </div>
                            <div class="cell colm-5">
                                Status
                            </div>
                            <div class="cell colm-6">
                                Edit
                            </div>
                            <div class="cell colm-7">
                                Delete
                            </div>
                        </div> --}}

                        {{-- <div class="wrappert"> --}}

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    
                                </table>
                            </div>
                            <div class="table-responsive" style="
                                    overflow-y:scroll;
                                    height:400px;
                                    display:block;
                                    ">
                                <table class="table">    
                                    <thead>
                                        <tr>
                                            <th class=" alph">ID</th>
                                            <th class=" alph">Name</th>
                                            <th class=" alph">Email</th>
                                            <th class=" alph">Vote ID</th>
                                            <th class=" alph">Status</th>
                                            <th class=" alph">Edit</th>
                                            <th class=" alph">Delete</th>
                                        </tr>
                                    </thead>                   
                                    <tbody >
                                            @if (count($voters) > 0)
                                                @foreach ($voters as $voter)
                                                    <tr>
                                                        <td class=" alph">{{ $voter->id }}</td>
                                                        <td class=" alph">{{ $voter->name }}</td>
                                                        <td class=" alph">{{ $voter->email }}</td>
                                                        <td class=" alph">{{ $voter->vote_id }}</td>
                                                        <td class=" alph">
                                                            {{ $voter->voted == 0 ? 'Not Voted' : 'Voted' }}</td>
                                                        <td><button wire:click="edit({{ $voter->id }})"
                                                                class="btn btn-success">Edit</button></td>
                                                        <td><button class="btn btn-danger"
                                                                wire:click.prevent='delete({{ $voter->id }})'>Delete</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                    @else
                                        <h4 class=" alph">Record Not Found</h4>
                    @endif

                    </tbody>
                    </table>
                </div>
            </div>
            {{-- ############################### --}}
            {{-- <div class="table">
                                    <div class="rowt">
                                        <div class="cell colm-1" data-title="Id">
                                            {{ $voter->id }}
                                        </div>
                                        <div class="cell colm-2" data-title="Name">
                                            {{ $voter->name }}
                                        </div>
                                        <div class="cell colm-3" data-title="Email">
                                            {{ $voter->email }}
                                        </div>
                                        <div class="cell colm-4" data-title="Vote Id">
                                            {{ $voter->vote_id }}
                                        </div>
                                        <div class="cell colm-5" data-title="Status">
                                            {{ $voter->voted == 0 ? 'NotVoted' : 'Voted' }}
                                        </div>
                                        <div class="cell colm-6" data-title="Edit">
                                            <button wire:click="edit({{ $voter->id }})" class="butt-act-e"
                                                style="height=100%;">Edit</button>
                                        </div>
                                        <div class="cell colm-7" data-title="Delete">
                                            <button class="butt-act-d" style="height=100%;"
                                                wire:click.prevent='delete({{ $voter->id }})'>Delete</button>
                                        </div>
                                    </div>
                                </div> --}}
            {{-- ##################################################### --}}
            {{-- </div> --}}
            {{-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ --}}
            {{-- <div class="pt-3 ">
                                                <div class="search-box data-box">
                                                    <ul class="responsive-table">
                                                        <li class="table-row">
                                                            <div class="colm colm-1">{{ $voter->id }}</div>
                                                            <div class="colm colm-2">{{ $voter->name }}</div>
                                                            <div class="colm colm-3">{{ $voter->email }}</div>
                                                            <div class="colm colm-4">{{ $voter->vote_id }}</div>
                                                            <div class="colm colm-5">
                                                                {{ $voter->voted == 0 ? '' : 'Voted' }}</div>
                                                            <div class="colm colm-6">
                                                                <div class="row">
                                                                    <div class="col-6 alph-r">
                                                                        <button wire:click="edit({{ $voter->id }})"
                                                                            class="butt-act-e">Edit</button>
                                                                    </div>
                                                                    <div class="col-6 alph-r">
                                                                        <button class="butt-act-d"
                                                                            wire:click.prevent='delete({{ $voter->id }})'>Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div> --}}
            {{-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ --}}
            {{-- <tr>
                                        <td class="alph">{{ $voter->id }}</td>
                                        <td class="alph">{{ $voter->name }}</td>
                                        <td class="alph">{{ $voter->email }}</td>
                                        <td class="alph">{{ $voter->vote_id }}</td>
                                        <td class="alph">{{ $voter->vote_limit }}</td>
                                        <td class="alph">{{ $voter->voted == 0 ? 'Not Voted' : 'Voted' }}</td>
                                        <td><button wire:click="edit({{ $voter->id }})" class="btn btn-success">Edit</button></td>
                                        <td><button class="btn btn-danger" wire:click.prevent='delete({{ $voter->id }})'>Delete</button></td>
                                    </tr> --}}

            @endif
            @if ($showCreate == true)
                <div class="my-2 pb-2">
                    <button class="btn btn-secondary my-2" wire:click='goBack'>Go Back</button>
                    <div class="pt-3">
                        <h5>CSV Batch Upload </h5>
                    </div>
                    <form wire:ignore action="{{ route('users.import') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-primary">Import CSV Files</button>
                    </form>
                    <div class="pt-3">
                        <h5>Single Upload</h5>
                    </div>
                    <form wire:submit.prevent='create'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Name:</label>
                            <input type="text" wire:model.lazy="name" class="form-control"
                                placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Email:</label>
                            <input type="text" wire:model.lazy="email" class="form-control"
                                placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph -bottom-3">Password:</label>
                            <input type="password" wire:model.lazy="password" class="form-control"
                                placeholder="Enter Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="pwd" class="form-label">Image:</label>
                            <input type="file" wire:model="image" class="form-control" placeholder="Enter Image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" style="width:70px;height:70px;" alt="">
                            @endif

                        </div> --}}
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>
            @endif
            @if ($showUpdate == true)
                <div class="my-2 pb-2">
                    <button class="btn btn-secondary my-2" wire:click='goBack'>Go Back</button>

                    <form wire:submit.prevent='update({{ $voter_id }})'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Name:</label>
                            <input type="text" wire:model.lazy="edit_name" class="form-control"
                                placeholder="Enter Name">
                            @error('edit_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="pwd" class="form-label">Email:</label>
                            <input type="text" wire:model.lazy="edit_email" class="form-control"
                                placeholder="Enter Email">
                            @error('edit_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="pwd" class="form-label">Image:</label>
                            <input type="file" wire:model="new_image" class="form-control" placeholder="Enter Image">

                            @if ($new_image)
                                <img src="{{ $new_image->temporaryUrl() }}" style="width:70px;height:70px;" alt="">
                            @else
                                <img src="{{ asset('storage') }}/{{ $old_image }}"
                                    style="width:70px;height:70px;" alt="">
                                <input type="text" wire:model='old_image'>
                            @endif

                        </div> --}}
                        <button type="submit" class="button">Update</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    {{-- <style>
        h2 {
            font-size: 26px;
            margin: 10px 0;
            text-align: center;
        }

        h2 small {
            font-size: 0.5em;
        }

        .responsive-table li {
            border-radius: 7px;
            padding: 10px 14px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .responsive-table .table-header {
            background-color: #95a5a6;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .responsive-table .table-row {
            background-color: var(--primary-color-light);
            box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
        }

        .colm-1 {
            flex-basis: 5%;
        }

        .colm-2 {
            width: 35%;
        }

        .colm-3 {
            width: 30%;

        }

        .colm-4 {
            width: 30%;
        }

        .colm-5 {
            width: 25%;

        }

        .colm-6 {
            width: 10%;
        }

        .colm-7 {
            width: 10%;
        }

        @media all and (max-width: 767px) {
            .responsive-table .table-header {
                display: none;
            }

            .responsive-table li {
                display: block;
            }

            .responsive-table .colm {
                flex-basis: 100%;
            }

            .responsive-table .colm {
                display: flex;
                padding: 10px 0;
            }

            .responsive-table .col:before {
                color: #6c7a89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
        }



        body {
            line-height: 20px;
            font-weight: 400;
            color: #3b3b3b;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
            background: #2b2b2b;
        }

        @media screen and (max-width: 580px) {
            body {
                font-size: 16px;
                line-height: 22px;
            }
        }

        .wrappert {
            margin: 0 auto;
            width: 100%;
        }

        .table {
            margin: 0 0 40px 0;
            width: 100%;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            display: table;
        }

        @media screen and (max-width: 580px) {
            .table {
                display: block;
            }
        }

        .rowt {
            display: table-row;
            background: #f6f6f6;
        }

        .rowt:nth-of-type(odd) {
            background: #e9e9e9;
        }

        .rowt.header {
            font-weight: 900;
            color: #ffffff;
            background: #ea6153;
        }

        .rowt.green {
            background: #27ae60;
        }

        .rowt.blue {
            background: #2980b9;
        }

        @media screen and (max-width: 580px) {
            .rowt {
                padding: 14px 0 7px;
                display: block;
            }

            .rowt.header {
                padding: 0;
                height: 6px;
            }

            .rowt.header .cell {
                display: none;
            }

            .rowt .cell {
                margin-bottom: 10px;
            }

            .rowt .cell:before {
                margin-bottom: 3px;
                content: attr(data-title);
                min-width: 98px;
                font-size: 10px;
                line-height: 10px;
                font-weight: bold;
                text-transform: uppercase;
                color: #969696;
                display: block;
            }
        }

        .cell {
            padding: 6px 12px;
            display: table-cell;
        }

        @media screen and (max-width: 580px) {
            .cell {
                padding: 2px 16px;
                display: block;
            }
        }
    </style> --}}
