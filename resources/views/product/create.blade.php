<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-start">
                <h4 class="page-title mb-0 font-size-18">Tambah data produk</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-bt-input label="Nama Produk" name="name" value="{{ old('name') }}" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="desc" id="" cols="5" rows="5" class="form-control">
                                {{ old('desc') }}
                            </textarea>
                            <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                        </div>
                        <x-bt-input label="harga" name="price" type="number" value="{{ old('price') }}" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        <div class="mb-3">
                            <label class="form-label">Upload</label>
                            <input type="file" name="photo" class="form-control">
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>
                        <div class="d-flex justify-content-end gap-4">
                            <a href="{{ route('products.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
