Naty Gonderew, [08-Nov-23 10:04 AM]
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

                                <div class="col-12 col-md-6  mb-3">
                                    <label for="to_branch" class="col-form-label">{{ 'To-Branch' }}</label>
                                    <select name="to_branch" id="to_branch"
                                        class="form-select input-lg dynamic @error('to_branch') is-invalid @enderror">

                                        <option selected disabled value="">{{ 'Select Branch' }}
                                        </option>
                                        @foreach ($data as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->branch_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('to_branch')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
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
                            <h5 class="card-title">{{ 'Package Detail' }}</h5>
                            <div class="row mb-3">

                                {{-- <div class="col-md-2  mb-3">
                                    <label for="package_tag" class=" col-form-label">
                                        {{ 'Package Tag' }}</label>
                                    <input name="package_tag" disabled value="{{ old('price') }}"
                                        class="form-control   @error('package_tag') is-invalid @enderror" type="number"
                                       id="package_tag" placeholder="">
                                    @error('package_tag')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div> --}}

                                {{-- <div class="col-md-2  mb-3">
                                    <label for="package_tag" class="col-form-label" style="display: none;">
                                        {{ 'Package Tag ' }}
                                    </label>
                                    <input name="package_tag">
                                </div> --}}

                                <table class="table table-bordered" id="parcel-items">
                                    <thead>
                                        <tr>
                                            <th>Package Type</th>
                                            <th>Weight</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>

                                                <div class=" col  mb-3">
                                                    <label for="package_type" class="col-form-label"> <span
                                                            class="text-danger">*</span>
                                                        {{ 'Package Type' }}</label>
                                                    <select name="package_type" id="package_type"
                                                        class="form-select input-lg dynamic package_type @error('package_type') is-invalid @enderror">

                                                        <option selected disabled value="">
                                                            {{ 'Select Package Type' }}
                                                        </option>
                                                        @foreach ($category as $categories)
                                                            <option value="{{ $categories->id }}">
                                                                {{ $categories->category }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('package_type')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>

                                            <td>
                                                <div class=" col  mb-3">
                                                    <label for="price" class=" col-form-label"> <span
                                                            class="text-danger">*</span>
                                                        {{ 'Weight' }}</label>
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
                                            </td>

                                            <td>
                                                <div class=" col  mb-3">
                                                    <label for="price" class=" col-form-label"> <span
                                                            class="text-danger">*</span>
                                                        {{ 'price' }}</label>
                                                    <input name="price" value="" readonly class="form-control   "
                                                        type="number" id="price" placeholder="">
                                                    @error('price')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                            </td>
                                            <td>
                                                <div class="col  mb-3">
                                                    <label for="status" class="col-form-label"><span
                                                            class="text-danger">*</span>{{ 'Status' }}</label>
                                                    <select name="status" id="status"
                                                        class="form-select  @error('status') is-invalid @enderror">
                                                        <option value="" disabled selected>{{ '--Select--' }}
                                                        </option>
                                                        <option value="collected"
                                                            {{ old('status') == 'collected' ? 'selected' : '' }}>
                                                            {{ 'Collected' }}
                                                        </option>
                                                        <option value="in-transit"
                                                            {{ old('status') == 'in-transit' ? 'selected' : '' }}>
                                                            {{ 'In-Transit' }}
                                                        </option>
                                                        <option value="deliverd"
                                                            {{ old('status') == 'deliverd' ? 'selected' : '' }}>
                                                            {{ 'Deliverd' }}
                                                        </option>

                                                    </select> @error('status')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td style="text-align: center; ">
                                                <button class="btn btn-danger" style="margin-top:36px;" type="button"
                                                    onclick="removeRow(this)">Remove</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                {{-- <div class=" col-md-3  mb-3">
                                    <label for="price" class=" col-form-label"> <span class="text-danger">*</span>
                                        {{ __('Delivery Charge') }}</label>
                                    <input name="price" value="{{ old('price') }}"
                                        class="form-control   @error('price') is-invalid @enderror" type="number"
                                        id="price" placeholder="">
                                    @error('price')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary p-2" type="button" onclick="addRow()">Add
                        Item</button>
                </div>

                <div class="row">
                    <div class="col-md-3">

                        <button type="submit" class="btn btn-primary mt-3">Save & Print</button>
                    </div>
                </div>
                </form>

            </div>

        </section>
    </main>

    <script>
        // Function to add a new row to the parcel items table
        function addRow() {
            var newRow = $('#parcel-items tbody tr:last').clone();
            newRow.find('select').val('');
            newRow.find('input').val('');
            $('#parcel-items tbody').append(newRow);
        }

        // Function to remove a row from the parcel items table
        function removeRow(button) {
            $(button).closest('tr').remove();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '.package_type', function() {
                var cat_id = $(this).val();

                var div = $(this).parent();
                var op = "";

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('fetchWeight') !!}',
                    data: {
                        'id': cat_id
                    },
                    success: function(data) {

                        //console.log(data.length);
                        op += '<option value="0" selected disabled>choose weight</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].weight +
                                '</option>';

                        }
                        var weightList = document.getElementById('weight');

                        weightList.innerHTML = op;

                    }
                })
            });
            $(document).on('change', '.weight_list', function() {
                var weight_id = $(this).val();

                var a = $(this).parent();
                console.log(weight_id);
                var op = "";
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('fetchPrice') !!}',
                    data: {
                        'id': weight_id
                    },
                    dataType: 'json',
                    success: function(data) {


                        var price_field = document.getElementById('price');

                        price_field.value = data.price;
                    },
                    error: function() {

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
