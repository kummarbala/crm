
<!-- Content Wrapper. Contains page content -->

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="annexureList" class="table table-bordered table-striped">
                                <thead class="thead-purple">
                                    <tr>
                                        <th>No</th>
                                        <th>Quation No</th>
                                        <th>Customer Name</th>                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($data as $annexures)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$annexures->ctsRef}}</td>
                                        <td>{{$annexures->name}}</td>
                                        <td><a href="{{ route('editannexure',[$annexures->annexureId]) }}"
                                                class="actionbutwrapper"><i
                                                    class="fas fa-edit actionbuttonsize"></i></a><a
                                                    href="{{ route('deleteannexure',[$annexures->annexureId]) }}"
                                                class="actionbutwrapper "  id="{{$annexures->annexureId}}" onclick="return confirm('Are you sure you want to delete this Annexure?');"><i
                                                    class="fas fa-trash-alt actionbuttonsize"></i></a></td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                    
                                </tbody>
                                <tfoot class="thead-purple">
                                    <tr>
                                        <th>No</th>
                                        <th>Quation No</th>
                                        <th>Customer Name</th>  
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
