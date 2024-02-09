<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Tanggal Surat</th>
                            <th scope="col">Jenis Surat</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Sifat</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratkeluar as $item)
                            <tr>
                            <td>{{ $item->NOMOR_SURAT }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SURAT)->format('d-m-Y') }}</td>
                            <td>{{ $item->JENIS_SURAT }}</td>
                            <td>{{ $item->TUJUAN_SURAT }}</td>
                            <td>{{ $item->SIFAT_SURAT }}</td>
                            <td>{{ $item->PERIHAL_SURAT }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editsuratkeluar/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletesuratkeluar/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ url('/tampilsuratkeluar/'.$item->id) }}" class="btn btn-warning" style="color:white">Review</a> 
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>