<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No Cuti</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Cuti</th>
                            <th scope="col">Alasan</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Lama Cuti</th>
                            <th scope="col">Sisa Cuti Tahunan</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suratcuti as $item)
                            <tr>
                            <td>{{ $item->NO_CUTI }}</td>
                            <td>{{ $item->NAMA }}</td>
                            <td>{{ $item->JENIS_CUTI }}</td>
                            <td>{{ $item->ALASAN_CUTI }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SELESAI)->format('d-m-Y') }}</td>
                            <td>{{ $item->LAMA_CUTI }} hari</td>
                            <td>{{ $item->SISA_CUTI_TAHUNAN }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                    <a href="{{ url('/editsuratcuti/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletesuratcuti/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ url('/tampilsuratcuti/'.$item->id) }}" class="btn btn-warning" style="color:white">Review</a> 
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>