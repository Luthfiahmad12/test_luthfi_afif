<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-start">
                <h4 class="page-title mb-0 font-size-18">Tambah data Transaksi</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-bt-input label="Nama Customer" name="customer_name" value="{{ old('customer_name') }}" />
                            <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Produk</label>
                            <select class="select2 form-control select2-multiple" multiple="multiple" name="product_id">
                                <option value="" selected></option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-bt-input label="Jumlah" name="qty" type="number" value="{{ old('qty') }}" />
                            <x-input-error :messages="$errors->get('qty')" class="mt-2" />
                        </div>

                        <div class="d-flex justify-content-end gap-4">
                            <a href="{{ route('transaction.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    @endpush
</x-app-layout>
