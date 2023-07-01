@extends('admin.master.master')

@section('content')
<div class="container">

    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
            <form action="https://veryfrais.com/admin/timeSlot/store" method="post">
                <input type="hidden" name="_token" value="uvTcTmQp7HuXlE96atrdIvZ7ihZ2dTDj29drlyGQ">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="input-label" for="exampleFormControlInput1"> Time Start </label>
                            <input type="time" name="start_time" class="form-control" value="10:30:00"
                                placeholder="Ex : 10:30 am" required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="input-label" for="exampleFormControlInput1"> Time Ends </label>
                            <input type="time" name="end_time" class="form-control" value="19:30:00"
                                placeholder="5:45 pm" required="">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>

        <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
            <hr>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title"></h5>
                </div>
                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table id="columnSearchDatatable"
                        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                        data-hs-datatables-options="{
                         &quot;order&quot;: [],
                         &quot;orderCellsTop&quot;: true
                       }">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>

                                <th class="text-center">Start Time </th>
                                <th class="text-center">End Time </th>
                                <th>status</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>


                                <td class="text-center"><input
                                    style="background: white !important; border: none !important; " type="time"
                                        value="11:00:00" disabled=""> </td>
                                <td class="text-center"><input
                                    style="background: white !important; border: none !important; " type="time"
                                    value="12:30:00" disabled=""></td>
                                    <td>
                                    <div style="padding: 10px;border: 1px solid;cursor: pointer"
                                        onclick="location.href='https://veryfrais.com/admin/timeSlot/status/3/0'">
                                        <span class="legend-indicator bg-success"></span>active
                                    </div>
                                </td>
                                <td>
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="tio-settings"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="https://veryfrais.com/admin/timeSlot/update/3">edit</a>
                                            <a class="dropdown-item" href="javascript:"
                                                onclick="form_alert('timeSlot-3','Want to delete this Time Slot')">delete
                                            </a>
                                            <form action="https://veryfrais.com/admin/timeSlot/delete/3" method="post"
                                                id="timeSlot-3">
                                                <input type="hidden" name="_token"
                                                    value="uvTcTmQp7HuXlE96atrdIvZ7ihZ2dTDj29drlyGQ"> <input type="hidden"
                                                    name="_method" value="delete">
                                                </form>
                                            </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>


                                <td class="text-center"><input
                                        style="background: white !important; border: none !important; " type="time"
                                        value="14:00:00" disabled=""> </td>
                                <td class="text-center"><input
                                        style="background: white !important; border: none !important; " type="time"
                                        value="16:00:00" disabled=""></td>
                                <td>
                                    <div style="padding: 10px;border: 1px solid;cursor: pointer"
                                        onclick="location.href='https://veryfrais.com/admin/timeSlot/status/2/0'">
                                        <span class="legend-indicator bg-success"></span>active
                                    </div>
                                </td>
                                <td>
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="tio-settings"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="https://veryfrais.com/admin/timeSlot/update/2">edit</a>
                                            <a class="dropdown-item" href="javascript:"
                                            onclick="form_alert('timeSlot-2','Want to delete this Time Slot')">delete
                                            </a>
                                            <form action="https://veryfrais.com/admin/timeSlot/delete/2" method="post"
                                                id="timeSlot-2">
                                                <input type="hidden" name="_token"
                                                    value="uvTcTmQp7HuXlE96atrdIvZ7ihZ2dTDj29drlyGQ"> <input
                                                    type="hidden" name="_method" value="delete">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>


                                <td class="text-center"><input
                                        style="background: white !important; border: none !important; " type="time"
                                        value="16:00:00" disabled=""> </td>
                                <td class="text-center"><input
                                        style="background: white !important; border: none !important; " type="time"
                                        value="20:00:00" disabled=""></td>
                                <td>
                                    <div style="padding: 10px;border: 1px solid;cursor: pointer"
                                        onclick="location.href='https://veryfrais.com/admin/timeSlot/status/1/0'">
                                        <span class="legend-indicator bg-success"></span>active
                                    </div>
                                </td>
                                <td>
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="tio-settings"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="https://veryfrais.com/admin/timeSlot/update/1">edit</a>
                                            <a class="dropdown-item" href="javascript:"
                                                onclick="form_alert('timeSlot-1','Want to delete this Time Slot')">delete
                                            </a>
                                            <form action="https://veryfrais.com/admin/timeSlot/delete/1" method="post"
                                                id="timeSlot-1">
                                                <input type="hidden" name="_token"
                                                    value="uvTcTmQp7HuXlE96atrdIvZ7ihZ2dTDj29drlyGQ"> <input
                                                    type="hidden" name="_method" value="delete">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Table -->
    </div>
</div>
    @endsection

