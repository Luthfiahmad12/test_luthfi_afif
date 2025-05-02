<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-start">
                <h4 class="page-title mb-0 font-size-18">Daftar Transaksi</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="card-title">Default Datatable</h4>
                        <a class="btn btn-primary" href="{{ route('transaction.create') }}">Tambah data
                        </a>
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nama customer</th>
                                <th>nama produk (harga)</th>
                                <th>qty</th>
                                <th>total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transactions as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>
                                        {{ $item->product->name }}
                                        ({{ number_format($item->product->price) }})
                                    </td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ number_format($item->total) }}</td>
                                    <td class="d-flex justify-content-start gap-2">
                                        <a class="btn btn-warning" href="{{ route('transaction.edit', $item->id) }}">
                                            edit
                                        </a>
                                        <form action="{{ route('transaction.destroy', $item->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    @push('styles')
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
            rel="stylesheet" type="text/css" />
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    @endpush
</x-app-layout>
