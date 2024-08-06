<x-slot:title>
    Position
</x-slot>
<div class="main-bg">
        <div class="container">
            <div class="ground-a my-3">
                <div class="card-header">
                    <div class=" slideanim">
                        <div class="row">
                            @section('topn')
                                <div class="container">
                                    <div class="col-7"><h2 class="pt-2 alph">{{ $total }}{{ __(' Position for Candidate') }}</h2></div>     
                                </div>
                            @endsection
                        <div class="col pt-3"><button wire:click='showForm' class="button">Add New Position</button></div>    
                        </div>                        
                    </div>
                </div>
            </div>
    <div class="ground-a">
        <div class="container pt-3 slideanim">
            @if ($showTable == true)
                 <div class="search-box">
                    <div class="pt-3 pb-3 ps-3 pe-3">
                    <input type="text" wire:model="search" placeholder="Search Here..."></div>
                </div>
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
                <div class="table-responsive my-3">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="alph">Id</th>
                                <th class="alph">Position</th>
                                <th class="alph">Edit</th>
                                <th class="alph">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($positiones) > 0)
                                @foreach ($positiones as $position)
                                    <tr>
                                        <td class="alph">{{ $position->id }}</td>
                                        <td class="alph">{{ $position->positions }}</td>
                                        <td class="alph"><button wire:click="edit({{ $position->id }})" class="btn btn-success">Edit</button></td>
                                        <td class="alph"><button class="btn btn-danger" wire:click.prevent='delete({{ $position->id }})'>Delete</button></td>
                                    </tr>
                                @endforeach
                            @else
                                <h4 class="alph">Record Not Found</h4>
                            @endif

                        </tbody>
                    </table>
                </div>
            @endif
            @if ($showCreate == true)
                <div class="my-2 pb-2">
                    <button class="btn btn-secondary my-2" wire:click='goBack'>Go Back</button>

                    <form wire:submit.prevent='store'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Position:</label>
                            <input type="text" wire:model.lazy="positions" class="form-control"
                                placeholder="Enter positions">
                            @error('positions')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>
            @endif
            @if ($showUpdate == true)
                <div class="my-2 pb-2">
                    <button class="btn btn-secondary my-2 alph" wire:click='goBack'>Go Back</button>

                    <form wire:submit.prevent='update({{ $position_id }})'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Position:</label>
                            <input type="text" wire:model.lazy="edit_position" class="form-control"
                                placeholder="Enter positions">
                            @error('edit_position')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="button">Update</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    </div>
</div>
