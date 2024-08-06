


<x-slot:title>
    Position
</x-slot>

    <div class="main-bg">
                <div class="container">
            <div class="ground-a my-3">
                <div class="card-header ">
                    <div class="  slideanim">
                        @section('topn')
                        
               <div class="container">
                <h2 class="pt-2 alph">{{ $total }}{{ __(' Candidate Registered') }}</h2></div>
                        @endsection
                            <div class="col pt-3"><button wire:click='showForm' class="button">Add New Candidate</button></div>
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
                {{-- <input type="text" wire:model="search" class="form-control" placeholder="Search Here..."> --}}
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
                <div class="table-responsive my-3 " style="
                                    overflow-y:scroll;
                                    height:400px;
                                    display:block;
                                    ">
                    <table class="table">
                        <thead>
                            <tr class=" alph">
                                <th class=" alph">Id</th>
                                <th class=" alph">Fname</th>
                                <th class=" alph">Lname</th>
                                <th class=" alph">Email</th>
                                <th class=" alph">Points</th>
                                <th class=" alph">Position</th>
                                <th class=" alph">Image</th>
                                <th class=" alph">Add Detail/Edit</th>
                                <th class=" alph">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($condidates) > 0)
                                @foreach ($condidates as $condidate)
                                    <tr>
                                        <td class=" alph">{{ $condidate->id }}</td>
                                        <td class=" alph">{{ $condidate->fname }}</td>
                                        <td class=" alph">{{ $condidate->lname }}</td>
                                        <td class=" alph">{{ $condidate->email }}</td>
                                        <td class=" alph">{{ $condidate->points }}</td>
                                        <td class=" alph">{{ $condidate->positions->positions }}</td>
                                        <td><img src="{{ asset('storage') }}/{{ $condidate->image }}"
                                                style="width:70px;height:70px;" alt=""></td>
                                        <td><button wire:click="edit({{ $condidate->id }})" class="btn btn-success">Edit</button></td>
                                        <td><button class="btn btn-danger" wire:click.prevent='delete({{ $condidate->id }})'>Delete</button></td>
                                    </tr>
                                @endforeach
                            @else
                                <h4 class=" alph">Record Not Found</h4>
                            @endif

                        </tbody>
                    </table>
                </div>
            @endif
            @if ($showCreate == true)
                <div class="my-2 pb-2">
                    <button class="btn btn-secondary my-2" wire:click='goBack'>Go Back</button>
                  
                     <form  wire:submit.prevent='store'>
                     <div class="mb-3">
                            <label for="pwd" class="form-label alph">Image:</label>
                            <input type="file" wire:model="image" class="form-control" placeholder="Enter Image">
                            @error('image')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" style="width:70px;height:70px;" alt="">
                            @endif

                        </div>
                   
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">First Name:</label>
                            <input type="text" wire:model.lazy="fname" class="form-control"
                                placeholder="Enter First Name">
                            @error('fname')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Last Name:</label>
                            <input type="text" wire:model.lazy="lname" class="form-control"
                                placeholder="Enter Last Name">
                            @error('lname')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Positions:</label>
                            <select wire:model.lazy='pos_id' class="form-control">
                                <option style=" alph" selected>Select the position</option>

                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->positions }}</option>
                                @endforeach
                            </select>
                            @error('pos_id')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Email:</label>
                            <input type="text" wire:model.lazy="email" class="form-control" placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror

                        </div>
                        <div wire:ignore class="mb-3">
                            {{-- <label for="detail" class="form-label alph">Detail:</label>
                            <textarea wire:model.lazy='detail' type="hidden"    id="trix" name="detail" rows="5" placeholder="detail">{{ old('detail') }}</textarea> --}}
                            
                        {{-- <div >
                            <input id="detail" wire:model="detail" name="detail">
                            <trix-editor
                            wire:model.debounce.1000ms="detail"
                            input="detail"></trix-editor>
                        </div> --}}


                                {{-- <label for="detail" class="form-label alph">Detail:</label>
                                <textarea class="form-control" wire:model.lazy='detail'id='detail'></textarea> --}}
                                {{-- <!-- error message untuk detail --> --}}
                                @error('detail')
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

                    <form wire:submit.prevent='update({{ $condidate_id }})'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">First Name:</label>
                            <input type="text" wire:model.lazy="edit_fname" class="form-control"
                                placeholder="Enter First Name">
                            @error('edit_fname')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Last Name:</label>
                            <input type="text" wire:model.lazy="edit_lname" class="form-control"
                                placeholder="Enter Last Name">
                            @error('edit_lname')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Positions:</label>
                            <select wire:model.lazy='edit_pos_id' class="form-control">
                                <option selected class=" alph">Select the position</option>

                                @foreach ($positions as $position)
                                    <option class=" alph"value="{{ $position->id }}">{{ $position->positions }}</option>
                                @endforeach
                            </select>
                            @error('edit_pos_id')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Email:</label>
                            <input type="text" wire:model.lazy="edit_email" class="form-control" placeholder="Enter Email">
                            @error('edit_email')
                                <span class="text-danger alph">{{ $message }}</span>
                            @enderror

                        </div>
                       <div class="mb-3">
                            {{-- <label for="detail" class="form-label alph">Detail:</label>
                            <textarea wire:model.lazy='detail' class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" rows="5" placeholder="detail">{{ old('detail') }}</textarea>
                            <input id="trix" wire:model.lazy="detail" type="hidden" name="detail">
                                <trix-editor input="trix"></trix-editor>
                                <!-- error message untuk detail -->
                                @error('detail')
                                    <span class="text-danger alph">{{ $message }}</span>
                                @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label alph">Image:</label>
                            <input type="file" wire:model="new_image" class="form-control" placeholder="Enter Image">
                            @if ($new_image)
                                <img src="{{ $new_image->temporaryUrl() }}" style="width:70px;height:70px;" alt="">
                            @else
                                <img src="{{ asset('storage') }}/{{ $old_image }}"
                                    style="width:70px;height:70px;" alt="">
                            @endif
                            <input type="hidden" wire:model="old_image">

                        </div>
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>
            @endif
            
        </div>
        </div>
    </div>
</div>

     {{-- <script>
      $('#detail').summernote({
        placeholder: 'Hello Bootstrap 5',
        tabsize: 2,
        height: 100
      });
    </script> --}}
    {{-- <script>
    window.addEventListener('turbolinks:load', function () {
        var trixEditor = document.getElementById('trix-editor');
        var input = document.getElementById('detail');

        trixEditor.addEventListener('trix-change', function () {
            input.value = trixEditor.innerHTML;
        });
    });
</script> --}}
