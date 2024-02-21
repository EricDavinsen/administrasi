<table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $no=1;
                            @endphp
                            @foreach ($users as $item)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->USERNAME }}</td>
                            <td>{{ $item->EMAIL_ADMIN }}</td>
                            <td>
                                <div class="action-buttons d-flex w-100  justify-content-center gap-2">
                                    <a href="{{ url('/edituser/'.$item->id) }}" class="btn btn-info">Edit</a> 
                                    @if ($item->EMAIL_ADMIN != "admin")
                                    <form action="{{ url('/deleteuser/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>