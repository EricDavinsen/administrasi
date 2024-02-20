<div style="width:100%;overflow:auto; ">
    <table id="dtHorizontalExample" class="table table-bordered table-striped table-sm scroll" style="width:100%" cellspacing="0" width="100%">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Nomor SK</th>
                            <th scope="col">Tanggal SK</th>
                            <th scope="col">TMT</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($riwayatsk as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->JABATAN }}</td>
                            <td>{{ $item->NOMOR_SK }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TANGGAL_SK)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->TMT_SK)->format('d-m-Y') }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                <a href="{{ url('/editriwayatsk/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    <form action="{{ url('/deleteriwayatsk/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ url('/tampilfilesk/'.$item->id) }}" class="btn btn-warning" style="color:white">File SK</a>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>