<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-start">
                <h4 class="page-title mb-0 font-size-18">edit data Transaksi</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div>
                            <x-bt-input label="Nama Customer" name="customer_name"
                                value="{{ $transaction->customer_name }}" />
                            <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Produk</label>
                            <select class="form-select" name="product_id" aria-label="Default select example">
                                <option value="" selected></option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}" @selected($transaction->product_id === $item->id)>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-bt-input label="Jumlah" name="qty" type="number" value="{{ $transaction->qty }}" />
                            <x-input-error :messages="$errors->get('qty')" class="mt-2" />
                        </div>

                        <div class="d-flex justify-content-end gap-4">
                            <a href="{{ route('products.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
