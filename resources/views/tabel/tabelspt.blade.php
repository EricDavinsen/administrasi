<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No SPT</th>
                            <th scope="col">Tanggal SPT</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Lama Tugas</th>
                            <th scope="col">Keperluan</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spt as $item)
                            <tr>
                            <td>{{ $item->NO_SPT }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SPT)->format('d-m-Y') }}</td>
                            <td>{{ $item->NAMA }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_MULAI)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SELESAI)->format('d-m-Y') }}</td>
                            <td>{{ $item->LAMA_TUGAS }} hari</td>
                            <td>{{ $item->KEPERLUAN }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editspt/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletespt/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ url('/tampilspt/'.$item->id) }}" class="btn btn-warning" style="color:white">Review</a> 
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>