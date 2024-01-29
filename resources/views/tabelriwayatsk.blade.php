<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Nomor SK</th>
                            <th scope="col">Tanggal SK</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                            $no=1;
                            @endphp
                            @foreach ($riwayatsk as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->JABATAN }}</td>
                            <td>{{ $item->NOMOR_SK }}</td>
                            <td>{{ $item->TANGGAL_SK }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editriwayatsk/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deleteriwayatsk/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>