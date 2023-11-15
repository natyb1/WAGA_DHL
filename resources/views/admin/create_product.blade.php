
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
                                    <!-- Include the provided HTML code for the select dropdown with search -->
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="to_branch" class="col-form-label">{{ ('To-Branch') }}</label>
                                        <input type="text" id="branch_search" class="form-control" placeholder="Search Branch">
                                        <select name="to_branch" id="to_branch" class="border custom-select @error('to_branch') is-invalid @enderror">
                                            <option selected disabled value="">{{ ('Select Branch') }}</option>
                                            @foreach ($receiversBranch as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                            @endforeach
                                        </select>
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
                                    <label for=""
                                        class=" col-form-label">{{ __('Package Type') }}</label>
                                    <select name="package_type" id="package_type"
                                        class="form-select  @error('package_type') is-invalid @enderror">
                                        <option value="" selected disabled>{{ __('--Select--') }}</option>
                                        <option value="breakable" >
                                            {{ __('Breakable') }}
                                        </option>
                                        <option value="unbreakable">
                                            {{ __('Unbreakable') }}</option>
                                    </select>
                                    @error('package_type')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3 mb-3">
                                    <label for="from_to" class="col-form-label"> <span class="text-danger">*</span>
                                        {{ __('From-To Branch') }}</label>
                                        <select name="from_to" id="from_to"
                                        class="form-select input-lg dynamic from_to @error('from_to') is-invalid @enderror">
                                       
                                        <option selected disabled value="">{{ __('Select From-To branch') }}
                                        </option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->fromTo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('from_to')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                               
                                <div class=" col-md-2  mb-3">
                                    <label for="weight" class="col-form-label"> <span class="text-danger">*</span>
                                        {{ __('weight') }}</label>
                                        <select name="weight" id="weight"
                                        class="form-select input-lg dynamic weight_list @error('weight') is-invalid @enderror">
                                       
                                        <option selected disabled value="">{{ __('Select Weight') }}
                                        </option>
                                        @foreach ($weight as $weight_list)
                                            <option value="{{ $weight_list->id }}">{{ $weight_list->weight }}
                                            </option>
                                        @endforeach
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
            var branchSearchInput = document.getElementById('branch_search');

            branchSearchInput.addEventListener('input', function() {
                var filter = branchSearchInput.value.toLowerCase();
                var options = branchSelect.getElementsByTagName('option');

                for (var i = 0; i < options.length; i++) {
                    var option = options[i];
                    var branchName = option.textContent.toLowerCase();
                    if (branchName.includes(filter)) {
                        option.style.display = '';
                    } else {
                        option.style.display = 'none';
                    }
                }
            });
        });
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var price;
    $(document).on('change', '.from_to', function(){  
        var country_id = $(this).val();
        $.ajax({
            type: 'get',
            url:'/fetchPrice',
            data:{'id':country_id},
            success:function(data){
                price = data.price;

                  
        }
        })
    });
    $(document).on('change','.weight_list',function () {
        var weight_id=$(this).val();

        console.log(weight_id);

        $.ajax({
            type:'get',
            url:'/fetchRate',
            data:{'id':weight_id},
            dataType:'json',
            success:function(data){
                var rate = data.rate;
     
                var total = price * rate;
        
                var price_field = document.getElementById('price');
              
                price_field.value = total;
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
