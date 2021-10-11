@extends('layouts.apps.teacher.teacher-global')
@section('contents')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<main class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Absent Grafik</h5>
            </div>
            <div class="card-body py-3">
                <canvas height="100px" id="myChart"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Calendar</h5>
                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div class="chart">
                                <div id="datetimepicker-dashboard"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-2">Memo</h5>
                        <a class="btn btn-primary my-2" href="{{ route('memos.create') }}">Add Memo</a>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="d-none d-xl-table-cell">Description</th>
                                <th>Date</th>
                                <th class="d-none d-md-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memos as $key => $memo)
                            <tr>
                                <td scope="row">{{ $key +1 }}</td>
                                <td>{{ $memo->memo }}</td>
                                <td>{{ $memo->date }}</td>
                                <td>
                                    <a href="{{ route('memos.edit', $memo->id) }}"
                                        class="btn btn-warning waves-effect waves-light">Update</a>
                                    <form class="d-inline"
                                        onsubmit="return confirm('Data will be Deleted, Are you sure?')"
                                        action="{{ route('memos.destroy', $memo->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete"
                                            class="btn btn-danger waves-effect waves-light">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

{{-- Chart Config --}}
    <script>
        const labels = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
        ];
        const data = {
            labels: labels,
            datasets: [{
                    label: 'Absent',
                    backgroundColor: 'rgb(0, 128, 255)',
                    borderColor: 'rgb(0, 128, 255)',
                    data: [0, 10, 5, 2, 20, 30, 45],
                },
                {
                    label: 'Not Absent',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [3, 9, 10, 20, 15, 9, 30],
                }
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>

    {{-- Kalender --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });

    </script>
</main>


@endsection
