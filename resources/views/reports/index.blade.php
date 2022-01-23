@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class=" mb-4 text-right">
                    <a href="/reports/create">
                        <button type="button" class="btn btn-primary">
                            Create
                        </button>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>
                                    User Id
                                </th>
                                <th>
                                    User Email
                                </th>
                                <th>
                                    Email content
                                </th>
                                <th>
                                    Deliverd
                                </th>
                                <th>
                                    Sent At
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($userReports as $report)
                                <tr>
                                    <td>
                                        {{ $report->user_id }}
                                    </td>
                                    <td>
                                        {{ $report->user_email }}
                                    </td>
                                    <td>
                                        {{ $report->email_content }}
                                    </td>
                                    <td>
                                        @if ($report->delivered === 1)
                                            <div class="text-success">
                                                Sussuccful
                                            </div>
                                        @else
                                            <div class="text-danger">
                                                Failed
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $report->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
