<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($datakeluarga as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->NAMA_KELUARGA }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_LAHIR)->format('d-m-Y') }}</td>
                            <td>{{ $item->STATUS }}</td>
                            <td>{{ $item->PEKERJAAN }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editdatakeluarga/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deletedatakeluarga/'.$item->id) }}" method="POST">
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