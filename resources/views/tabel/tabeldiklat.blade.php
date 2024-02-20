<div style="width:100%;overflow:auto; ">
    <table id="dtHorizontalExample" class="table table-bordered table-striped table-sm scroll" style="width:100%" cellspacing="0" width="100%">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Diklat</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Jumlah Jam</th>
                            <th scope="col">Penyelenggara</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($diklat as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->NAMA_DIKLAT }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SELESAI)->format('d-m-Y') }}</td>
                            <td>{{ $item->JUMLAH_JAM }}</td>
                            <td>{{ $item->PENYELENGGARA }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editdiklat/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletediklat/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ url('/tampilsertifikat/'.$item->id) }}" class="btn btn-warning" style="color:white">Sertifikat</a> 
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>