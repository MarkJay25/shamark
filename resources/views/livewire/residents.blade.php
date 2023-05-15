<div>
<div class="card-body">
    <h5>Attendance</h5>
    <form wire:submit.prevent="saveResident">
        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label">First Name</div>
                                    <input type="" wire:model="FirstName" class="form-control">
                                    @error('FirstName')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-label">Middle Name</div>
                                    <input type="" wire:model="MiddleName" class="form-control">
                                    @error('MiddleName')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-label">Last Name</div>
                                    <input type="" wire:model="LastName" class="form-control">
                                    @error('LastName')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-label">Suffix</div>
                                    <input type="" wire:model="Suffix" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-label">Time In</div>
                                    <input type="" wire:model="TimeIn" class="form-control">
                                    @error('TimeIn')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1.5">
                                <div class="form-group">
                                    <div class="form-label">AM or PM</div>
                                    <select wire:model="AMorPM" class="form-control">
                                        <option value="">----Select----</option> 
                                        <option value="AM">AM</option> 
                                        <option value="PM">PM</option> 
                                    </select>
                                    @error('AMorPM')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                @if($forUpdate)
                                <button class="btn btn-primary form-group mt-4">Update</button>
                                @else
                                <button class="btn btn-primary form-group mt-4">Save</button>
                                @endif
                             </div>
                        </div>
                    </form>
    </div>
 
                <hr>
                <table class="table">
                    <thead>
                        <th>QRcode</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Suffix</th>
                        <th>Time In</th>
                        <th>AM or PM</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(isset($list))
                            @foreach($list as $c)
                                <tr>
                                    <td>{!! QrCode::size(50)->generate($c->FirstName)!!}</td>
                                    <td>{{ $c->FirstName }}</td>
                                    <td>{{ $c->MiddleName }}</td>
                                    <td>{{ $c->LastName }}</td>
                                    <td>{{ $c->Suffix }}</td>
                                    <td>{{ $c->TimeIn }}</td>
                                    <td>{{ $c->AMorPM }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm"
                                        wire:click="update('{{ $c->id }}')">
                                        Edit</button>

                                        <button class="btn btn-danger btn-sm"
                                        wire:click="delete('{{ $c->id }}')">
                                        Log Out</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
    </table>
    </hr>
</div>