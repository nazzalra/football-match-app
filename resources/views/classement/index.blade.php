@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Klasemen Liga Tarkam Dunia
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Klub</th>
                                <th>Ma</th>
                                <th>Me</th>
                                <th>S</th>
                                <th>K</th>
                                <th>GM</th>
                                <th>GK</th>
                                <th>Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clubs as $club)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{$club->name}}
                                </td>
                                <td>
                                    {{ $club->match_count }}
                                </td>
                                <td>
                                    {{ $club->win_count }}
                                </td>
                                <td>
                                    {{ $club->draw_count }}
                                </td>
                                <td>
                                    {{ $club->lose_count }}
                                </td>
                                <td>
                                    {{ $club->goal_in_count }}
                                </td>
                                <td>
                                    {{ $club->goal_concede_count }}
                                </td>
                                <td>
                                    {{ $club->point_count }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection