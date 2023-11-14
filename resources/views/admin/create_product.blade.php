
@extends('admin.body.admin_master')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Add Package</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Add Package</li>
                </ol>
            </nav>
        </div>
        <section class="section ">
            <div class="row">
                <div class="col col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('products.store') }}" class="text-capitalize">
                                @csrf
                                <h5 class="card-title">{{ 'Sender Information' }}</h5>
                                <div class="row mb-3">

                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="sender_name" class=" col-form-label"><span
                                                class="text-danger">*</span>{{ 'Sender Name' }}</label>
                                        <input name="sender_name" value="{{ old('sender_name') }}"
                                            class="form-control  @error('sender_name') is-invalid @enderror" type="text"
                                            placeholder="Isac Newton">
                                        @error('sender_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3 ">
                                        <label for="sender_phone" class=" col-form-label"><span
                                                class="text-danger">*</span>{{ 'Sender Phone' }}</label>
                                        <div class=" input-group">
                                            <span class="input-group-text" id="basic-addon1">+251</span>
                                            <input name="sender_phone"value="{{ old('sender_phone') }}"
                                                class="form-control   @error('sender_phone') is-invalid @enderror"
                                                type="number" id="sender_phone" aria-label="sender_phone"
                                                aria-describedby="basic-addon1" placeholder="911******   ">
                                        </div>
                                        @error('sender_phone')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6  mb-3">
                                        <label for="from_branch" class="col-form-label">{{ 'From-Branch' }}</label>
                                        <input type="hidden" name="from_branch" value="{{ $firstBranch->id }}">
                                        <input type="text" value="{{ $firstBranch->branch_name }}" readonly
                                            class="form-control   @error('from_branch') is-invalid @enderror" type="phone"
                                            id="from_branch">
                                        @error('from_branch')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12   mb-3">

                                        <label for="sender_city" class=" col-form-label"><span
                                                class="text-danger">*</span>{{ 'Sender City' }}</label>
                                        {{-- <input name="description"value="{{ old('description') }}"
                                            class="form-control   @error('description') is-invalid @enderror" type="text"
                                            id="description" placeholder="Description"> --}}

                                        <textarea name="sender_city" class="form-control   @error('sender_city') is-invalid @enderror" id="sender_city"
                                            placeholder="Address"></textarea>
                                        @error('sender_city')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                {{-- /////////////////// --}}

                <div class="col col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ 'Receivers Information' }}</h5>
                            <div class="row mb-3">

                                <div class="col-12 col-md-6  mb-3">
                                    <label for="receiver_name" class=" col-form-label"><span
                                            class="text-danger">*</span>{{ 'Receiver Name' }}</label>
                                    <input name="receiver_name" value="{{ old('receiver_name') }}"
                                        class="form-control  @error('receiver_name') is-invalid @enderror" type="text"
                                        placeholder="Isac Newton"> @error('receiver_name')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="col-12 col-md-6  mb-3">
                                    <label for="price" class=" col-form-label"> <span class="text-danger">*</span>
                                        {{ ('Receiver Phone') }}</label>
                                    <input name="receiver_phone"value="{{ old('receiver_phone') }}"
                                        class="form-control   @error('receiver_phone') is-invalid @enderror" type="number"
                                        id="receiver_phone" placeholder="911******">
                                    @error('receiver_phone')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="col-12 col-md-6  mb-3 ">
                                    <label for="receiver_phone" class=" col-form-label"><span
                                            class="text-danger">*</span>{{ 'Reciver Phone' }}</label>
                                    <div class=" input-group">
                                        <span class="input-group-text" id="basic-addon1">+251</span>
                                        <input name="receiver_phone"value="{{ old('receiver_phone') }}"
                                            class="form-control   @error('receiver_phone') is-invalid @enderror"
                                            type="number" id="receiver_phone" aria-label="phone"
                                            aria-describedby="basic-addon1" placeholder="911******   ">
                                    </div>
                                    @error('receiver_phone')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                               
                                <div class="container">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="to_branch" class="col-form-label">{{ __('To-Branch') }}</label>
                                        <input type="text" id="branch_autocomplete" class="form-control" placeholder="Search Branch">
                                        <div class="autocomplete-dropdown">
                                            <select name="to_branch" id="to_branch" class="border custom-select @error('to_branch') is-invalid @enderror">
                                                <option selected disabled value="">{{ __('Select Branch') }}</option>
                                                @foreach ($receiversBranch as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('to_branch')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                


                                <div class="col-12   mb-3">
                                    <label for="description" class=" col-form-label"><span
                                            class="text-danger">*</span>{{ 'Receiver City' }}</label>

                                    <textarea name="receiver_city" class="form-control   @error('receiver_city') is-invalid @enderror" id="receiver_city"
                                        placeholder="Address"></textarea>
                                    @error('receiver_city')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Shipment Detail --}}
                <div class="col col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Package Detail') }}</h5>
                            <div class="row mb-3">
                               
                                <div class=" col-md-2  mb-3">
                                    <label for="package_type" class="col-form-label"> <span class="text-danger">*</span>
                                        {{ __('Package Type') }}</label>
                                        <select name="package_type" id="package_type"
                                        class="form-select input-lg dynamic package_type @error('package_type') is-invalid @enderror">
                                       
                                        <option selected disabled value="">{{ __('Select Package Type') }}
                                        </option>
                                        @foreach ($category as $categories)
                                            <option value="{{ $categories->id }}">{{ $categories->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('package_type')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                               
                                 <div class=" col-md-2  mb-3">
                                    <label for="price" class=" col-form-label"> <span class="text-danger">*</span>
                                        {{ __('Weight') }}</label>
                                        <select name="weight" id="weight"
                                        class="form-select input-lg weight_list @error('weight') is-invalid @enderror">
                                        <option value="0" selected disabled>weight</option>
                                    </select>
                                    @error('weight')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                 <div class=" col-md-2  mb-3">
                                    <label for="price" class=" col-form-label"> <span class="text-danger">*</span>
                                        {{ __('price') }}</label>
                                    <input name="price" value="" readonly
                                        class="form-control   " type="number"
                                        id="price" placeholder="">
                                    @error('price')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2  mb-3">
                                    <label for="status" class="col-form-label">{{ __('Status') }}</label>
                                    
                                    <input name="status" type="text" value="{{"collected"}}" readonly
                                    class="form-control   @error('status') is-invalid @enderror" type="phone"
                                    id="status">
                                    @error('status')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        {{-- <button class="btn btn-primary" type="submit">Save</button> --}}
                        <button type="submit" class="btn btn-primary">Save & Print</button>
                    </div>
                </div>
                </form>

            </div>

        </section>
    </main>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var branchSelect = document.getElementById('to_branch');
        var branchAutocompleteInput = document.getElementById('branch_autocomplete');
        var autocompleteDropdown = document.querySelector('.autocomplete-dropdown');

        branchAutocompleteInput.addEventListener('input', function() {
            var filter = branchAutocompleteInput.value.toLowerCase();
            var options = branchSelect.getElementsByTagName('option');

            // Clear the dropdown before populating it with matching options
            autocompleteDropdown.innerHTML = '';

            for (var i = 0; i < options.length; i++) {
                var option = options[i];
                var branchName = option.textContent.toLowerCase();

                // Check if branchName starts with the filter
                if (branchName.indexOf(filter) === 0) {
                    // Create a new option element for the autocomplete dropdown
                    var autocompleteOption = document.createElement('div');
                    autocompleteOption.textContent = branchName;

                    // Add a click event listener to populate the select and close the dropdown
                    autocompleteOption.addEventListener('click', function() {
                        branchAutocompleteInput.value = this.textContent;
                        branchSelect.value = option.value;
                        autocompleteDropdown.innerHTML = '';  // Close the dropdown
                    });

                    // Append the option to the autocomplete dropdown
                    autocompleteDropdown.appendChild(autocompleteOption);
                }
            }
        });
    });
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
    $(document).on('change', '.package_type', function(){  
        var cat_id = $(this).val();
       
        var div = $(this).parent();
        var op = "";

        $.ajax({
            type: 'get',
            url:'{!!URL::to('fetchWeight')!!}',
            data:{'id':cat_id},
            success:function(data){
            
                // console.log(data.length);
                op+='<option value="0" selected disabled>choose weight</option>';
                for(var i=0;i<data.length;i++){
                op+='<option value="'+data[i].id+'">'+data[i].weight+'</option>';
                
            }
            var weightList = document.getElementById('weight');
         
               weightList.innerHTML = op;
                
        }
        })
    });
    $(document).on('change','.weight_list',function () {
        var weight_id=$(this).val();

        var a=$(this).parent();
        console.log(weight_id);
        var op="";
        $.ajax({
            type:'get',
            url:'{!!URL::to('fetchPrice')!!}',
            data:{'id':weight_id},
            dataType:'json',
            success:function(data){
        
        
                var price_field = document.getElementById('price');
              
                price_field.value = data.price;
            },
            error:function(){

            }
        });


    });

});
</script>

      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (Session::has('success'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
                "background-color": "#3498db",
                "color": "#ffffff",
            }
            toastr.success(" Success! <br> {{ Session::get('success') }}  ");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error(" Error! <br> {{ Session::get('error') }}  ");
        </script>
    @endif
@endsection
