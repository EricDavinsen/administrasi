<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">Kode Surat</th>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Tanggal Surat</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Jenis Surat</th>
                            <th scope="col">Asal Surat</th>
                            <th scope="col">Sifat</th>
                            <th scope="col">Perihal</th>
                            <th colspan ="2" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratmasuk as $item)
                                <tr>
                                <td>{{ $item->KODE_SURAT }}</td>
                                <td>{{ $item->NOMOR_SURAT }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SURAT)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->TANGGAL_MASUK)->format('d-m-Y') }}</td>
                                <td>{{ $item->JENIS_SURAT }}</td>
                                <td>{{ $item->ASAL_SURAT }}</td>
                                <td>{{ $item->SIFAT_SURAT }}</td>
                                <td>{{ $item->PERIHAL_SURAT }}</td>
                                <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                    <a href="{{ url('/editsuratmasuk/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                        <form action="{{ url('/deletesuratmasuk/'.$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ url('/createdisposisi/'.$item->id) }}" class="btn btn-success">Disposisi</a>
                                        <a href="{{ url('/tampilsuratmasuk/'.$item->id) }}" class="btn btn-warning" style="color:white">Review</a>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>